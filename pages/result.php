<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link rel="stylesheet" href="../assests/style/main.css">
</head>
<body>
    <div id="result-content">
        <div id="stepper-component">
            <i class="fa-solid fa-house-chimney myIcon "></i>
            <i class="fa-solid fa-pen myIcon"></i>
            <i class="fa-solid fa-graduation-cap myIcon"></i>
        </div>
        <h1>Well Done!</h1>

        <div id="stats">

            <div id="correct-answers">
                <p>Correct answer</p>
                <span><?= $_SESSION['correct']?></span>
            </div>

            <div id="false-answers">
                <p>False answer</p>
                <span><?= $_SESSION['false']?></span>
            </div>

            <div id="avg-time">
                <p>Avg response time</p>
                <span><?= $_SESSION['avg']?></span>
            </div>
        </div>
        
    </div>
    <script src="../assests/js/data.js"></script>
    <script src="../assests/js/app.js"></script>
    <script src="https://kit.fontawesome.com/6360d947ff.js" crossorigin="anonymous"></script>
</body>
</html>