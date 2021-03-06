<?php 
    $page_name = 'Chatting Space'; 
    require_once '../views/header.php';
    require_once '../php/config.php';
    session_start();
    
    if(!isset($_SESSION['unique_id'])){
        header('Location: ../public/login.php');
    }
    $useId = $_GET['user_id'];

    $statement = $pdo->prepare("SELECT * FROM users WHERE unique_id = {$useId}");
    $statement->execute();
    $userData = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<body>
    <div class="wrapper">
        <section class="chat-area">
            <header>
                <a href="user.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
                <img src="../images/<?php echo $userData[0]['image'] ?>" alt="">
                <div class="details">
                    <span><?php echo $userData[0]['fname'] . " " . $userData[0]['lname']  ?></span>
                    <p><?php echo $userData[0]['status'] ?></p>
                </div>
            </header>
            <div class="chat-box">
            </div>
            <form action="#" class="typing-area" autocomplete="off">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id'] ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $useId ?>" hidden>
                <input type="text" name="message" class="input-field" placeholder="Type your message here...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
    <script src="js/chat.js"></script>
</body>
</html>