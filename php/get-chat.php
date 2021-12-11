<?php 
    session_start();

    if(isset($_SESSION['unique_id'])){
        require_once 'config.php';

        $outgoing = $_POST['outgoing_id'];
        $incoming = $_POST['incoming_id'];

        $output = '';

        $statement = $pdo->prepare("SELECT * FROM messages 
                LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = '{$outgoing}' AND incoming_msg_id = {$incoming})
                OR (outgoing_msg_id = '{$incoming}' AND incoming_msg_id = {$outgoing}) ORDER BY msg_id");
        
        $statement->execute();
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        $msg = $i['message'];

        if($i['message'] == ''){
            $msg = 'The message field is empty';
        }

        if(!empty($data)){
            foreach($data as $i){
                if($i['outgoing_msg_id'] == $outgoing){
                    $output .= '<div class="chat outgoing">
                                    <div class="details">
                                        <p>'. $msg .'</p>
                                    </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                    <img src="images/'. $i['image'].'" alt="">
                                    <div class="details">
                                        <p>'. $msg .'</p>
                                    </div>
                                </div>';
                }
            }
            echo $output;
        }

    }else{
        header('Location: ../login.php');
    }
?>