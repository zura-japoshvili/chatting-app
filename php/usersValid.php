<?php 
    require_once "config.php";
    session_start();
    $statement = $pdo->prepare("SELECT * FROM users");
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);


    $output = '';

    if(empty($data)){
        $output = 'No users available now';
    }else{
        foreach($data as $i){
            if($i['unique_id'] === $_SESSION['unique_id']){
                continue;
            }

            $lastMsg = $pdo->prepare("SELECT * FROM messages 
            WHERE (outgoing_msg_id = '{$i['unique_id']}' OR incoming_msg_id = {$i['unique_id']}) 
            ORDER BY msg_id DESC LIMIT 1");
            $lastMsg->execute();
            $LastMessage = $lastMsg->fetchAll(PDO::FETCH_ASSOC);

            $msg = '';

            if(empty($LastMessage)){
                $msg = 'The message field is empty';
            }else{
                $msg = $LastMessage[0]['message'];
            }

            (strlen($msg) > 28) ? $msg = substr($msg, 0, 28). '...' : $msg = $msg;

            ($i['status'] == 'Offline now') ? $offline = 'offline': $offline = '';
            

            $output .= '<a href="chat.php?user_id='.$i['unique_id'].'">
                        <div class="content">
                            <img src="'."images/".$i['image'].'" alt="">
                            <div class="details">
                                <span>'.$i['fname']. " " .$i['lname'].'</span>
                                <p>'.$msg.'</p>
                            </div>
                        </div>
                        <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
                    </a>';
        }
    }
    echo $output;

?>