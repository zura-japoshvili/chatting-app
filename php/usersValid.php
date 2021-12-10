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
            $output .= '<a href="#">
                        <div class="content">
                            <img src="'."images/".$i['image'].'" alt="">
                            <div class="details">
                                <span>'.$i['fname']. " " .$i['lname'].'</span>
                                <p>This is test message</p>
                            </div>
                        </div>
                        <div class="status-dot"><i class="fas fa-circle"></i></div>
                    </a>';
        }
    }
    echo $output;

?>