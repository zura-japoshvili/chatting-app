<?php 
    session_start();
    require_once 'config.php';

    $user_id = $_GET['logout_id'];
    $status = 'Offline now';
    if(isset($_SESSION['unique_id'])){
        $statement = $pdo->prepare("UPDATE users SET status = '{$status}' WHERE unique_id = '{$user_id}' ");
        $statement->execute();

        session_unset();
        session_destroy();

        header('Location: ../public/login.php');
    }else{
        header('Location: ../public/login.php');
    }
?>