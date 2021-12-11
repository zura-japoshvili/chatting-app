<?php 
    session_start();

    if(isset($_SESSION['unique_id'])){
        require_once 'config.php';

        $outgoing = $_POST['outgoing_id'];
        $incoming = $_POST['incoming_id'];
        $message = $_POST['message'];
        var_dump($_POST);
        if(!empty($message)){
            $statement = $pdo->prepare("INSERT INTO messages (incoming_msg_id, outgoing_msg_id, message)
            VALUES(:incoming, :outgoing ,:message)");

            $statement->bindValue(':outgoing', $outgoing);
            $statement->bindValue(':incoming', $incoming);
            $statement->bindValue(':message', $message);

            $statement->execute();
        }
    }else{
        header('Location: ../login.php');
    }
?>