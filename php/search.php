<?php 
    require_once 'config.php';
    session_start();

    $searchTerm = $_POST['searchTerm'];
    
    $statement = $pdo->prepare("SELECT * FROM users WHERE 
                            fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%' ");
    $statement->execute();
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    $output = '';

    if(empty($data)){
        $output .= "No users found related to your search term";
    }else{
        foreach($data as $i){
            if($i['unique_id'] === $_SESSION['unique_id']){
                continue;
            }
            $output .= '<a href="chat.php?user_id='.$i['unique_id'].'">
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