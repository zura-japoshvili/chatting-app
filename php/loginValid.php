<?php 
        require_once "config.php";
        session_start();
    
        $pass = $_POST['pass'];
        $email = $_POST['email'];

        if(!empty($email) and !empty($pass)){
            $statement = $pdo->prepare("SELECT * FROM users WHERE email = '{$email}'");
            $statement->execute();
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);
            if(empty($data)){
                echo "Email isn't match !";
            }else{
                if(password_verify($pass, $data[0]['password'])){
                    $_SESSION['unique_id'] = $data[0]['unique_id'];
                    echo "success";
                }else{
                    echo "Password isn't match !";
                }                
            }
        }else{
            echo "All input field are required !";
        }
?>