<?php 
    require_once './views/header.php';
    

?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Real Time Chat App</header>
            <form action="#">
                <div class="error-txt">Error Msg</div>
                    <div class="field input">
                        <label for="">Email Address</label>
                        <input type="text" name="email" placeholder="Enter your Email">
                    </div>
                    <div class="field input">
                        <label for="">password</label>
                        <input type="password" name="pass" placeholder="Enter password">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue To Chat">
                    </div>
                    <div class="link">Not yet signed up? <a href="index.php">Sign up now</a></div>
            </form>
        </section>
    </div>
    <script src="js/pass-show-hide.js"></script>
    <script src="js/login.js"></script>
</body>
</html>