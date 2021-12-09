<?php 
    require_once "config.php";

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];

    if(!empty($fname) or !empty($lname) or!empty($email) or!empty($pass)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $statement = $pdo->prepare("SELECT email FROM users");
            $statement->execute();
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            if(in_array($email, $data)){
                echo "arsebobs";
            }else{
                if(isset($_FILES['image'])){
                    $file_name = $_FILES['image'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                }
            }
        }
    }else{
        echo "carielia jigg";
    }

?>