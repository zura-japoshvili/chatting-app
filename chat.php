<?php 
    require_once './views/header.php';
    require_once 'php/config.php';
    session_start();
    
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
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
                <img src="images/<?php echo $userData[0]['image'] ?>" alt="">
                <div class="details">
                    <span><?php echo $userData[0]['fname'] . " " . $userData[0]['lname']  ?></span>
                    <p><?php echo $userData[0]['status'] ?></p>
                </div>
            </header>
            <div class="chat-box">
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque enim possimus, voluptatum incidunt culpa commodi!</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="img.jpg" alt="">
                    <div class="details">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque enim possimus, voluptatum incidunt culpa commodi!</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="img.jpg" alt="">
                    <div class="details">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
                <div class="chat outgoing">
                    <div class="details">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eaque enim possimus, voluptatum incidunt culpa commodi!</p>
                    </div>
                </div>
                <div class="chat incoming">
                    <img src="img.jpg" alt="">
                    <div class="details">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
            <form action="#" class="typing-area">
                <input type="text" placeholder="Type your message here...">
                <button><i class="fab fa-telegram-plane"></i></button>
            </form>
        </section>
    </div>
</body>
</html>