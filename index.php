<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assests/style/main.css">
</head>
<body>
    <div id="login-container">
        <div id="left-side">
            <div id="php-logo-container">
                <img src="assests/img/php-logo.png" alt="" id="php-logo">
            </div>
            <p>In order to continue ,you need to login ,or <a href="https://amineelaabdi14.github.io/PHP-QUIZZ-/" target="_blank">continue as a guest</a> but you wont be added to the scoreboard</p>
        </div>
        <form action="controller/User.controller.php" method="POST" id="login-form">
            <label for="username" class="myLabel">USERNAME</label>
            <input type="text" name="username" class="myInput">
            <label for="password" class="myLabel">PASSWORD</label>
            <input type="password" name="password" class="myInput">
            <button type="submit" name="login" id="login-buttton">Start</button>
            <?php if(isset($_SESSION['message'])) echo '<div id="error">'.$_SESSION['message'].'</div>'; unset($_SESSION['message']) ?>
        </form>
    </div>
    <script src="assests/js/app.js"></script>
</body>
</html>