<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assests/style/main.css">
</head>
<body>
    <div id="login-container">
        <form action="../controller/User.controller.php" method="POST">
            <label for="username"></label>
            <input type="text" name="username">
            <br>
            <label for="password"></label>
            <input type="password" name="password">
            <button type="submit" name="login">Start</button>
        </form>
    </div>
    <script src="../assests/js/app.js"></script>
</body>
</html>