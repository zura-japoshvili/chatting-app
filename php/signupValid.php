<?php 
    require_once "config.php";
    session_start();

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];

    if(!empty($fname) and !empty($lname) and !empty($email) and !empty($pass)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $statement = $pdo->prepare("SELECT email FROM users WHERE email = '${email}'");
            $statement->execute();
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            if(!empty($data)){
                echo "This email already exist";
            }else{
                if(isset($_FILES['image'])){
                    $file_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.', $file_name);
                    $img_ext = end($img_explode);

                    $extentions = ['png', 'jpg', 'jpeg'];

                    if(in_array($img_ext, $extentions) === true){
                        $time = time();

                        $new_img_name = $file_name . $time; 
                        if(move_uploaded_file($tmp_name, '../images/'. $new_img_name)){
                            $pass = password_hash($pass, PASSWORD_DEFAULT);
                            $status = "Active now";

                            $random_id = rand(time(), 10000000);
                            
                            $statement = $pdo->prepare('INSERT INTO users (unique_id, fname, lname, email, password, image, status)
                                VALUES(:unique_id, :fname, :lname, :email, :password, :image, :status)');

                            $statement->bindValue(':unique_id', $random_id);
                            $statement->bindValue(':fname', $fname);
                            $statement->bindValue(':lname', $lname);
                            $statement->bindValue(':email', $email);
                            $statement->bindValue(':password', $pass);
                            $statement->bindValue(':image', $new_img_name);
                            $statement->bindValue(':status', $status);

                            $statement->execute();

                            $dataFrom_db = $pdo->prepare("SELECT * FROM users WHERE email = '{$email}'");
                            $dataFrom_db->execute();
                            $email_db = $dataFrom_db->fetchAll(PDO::FETCH_ASSOC);
                            $_SESSION['unique_id'] = $email_db[0]['unique_id'];
                            echo "success";
                        }
                    }else{
                        echo "Please select an image - png, jpg, jpeg";
                    }
                }
            }
        }
    }else{
        echo "Please fill every field";
    }

?>