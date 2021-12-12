<?php 
    require_once '../views/header.php'
?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header>Real Time Chat App</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt">Error Msg</div>
                    <div class="field input">
                        <label for="">FirstName</label>
                        <input type="text" name="fname" placeholder="Enter your name">
                    </div>
                    <div class="field input">
                        <label for="">Last name</label>
                        <input type="text" name="lname" placeholder="Enter your last name">
                    </div>
                    <div class="field input">
                        <label for="">Email Address</label>
                        <input type="text" name="email" placeholder="Enter your Email">
                    </div>
                    <div class="field input">
                        <label for="">password</label>
                        <input type="password" name="pass" placeholder="Enter password">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label for="">Select image</label>
                        <input type="file" name="image">
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue To Chat">
                    </div>
                    <div class="link">Already signed up? <a href="login.php">Login in</a></div>
            </form>
        </section>
    </div>
    <script src="js/pass-show-hide.js"></script>
    <script src="js/sign-up.js"></script>
</body>
</html>