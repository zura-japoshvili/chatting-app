<?php 
    require_once '../views/header.php';
    require_once '../php/config.php';

    session_start();

    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }

    $statement = $pdo->prepare("SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
    $statement->execute();
    $userData = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
                <div class="content">
                    <img src="../images/<?php echo $userData[0]['image']  ?>" alt="">
                    <div class="details">
                        <span><?php echo $userData[0]['fname'] . " " . $userData[0]['lname']  ?></span>
                        <p><?php echo $userData[0]['status'] ?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $userData[0]['unique_id']?>" class="logout">Log Out</a>
            </header>
            <div class="search">
                <span class="text">Select an user to start chat</span>
                <input type="text" placeholder="Enter name to search">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="users-list">
            </div>
        </section>
    </div>
    <script src="js/users.js"></script>
</body>
</html>