<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assests/style/main.css">
    <title>Take Test</title>
</head>
<body>
    <div id="take-test-content">
        <div id="stepper-component">
            <i class="fa-solid fa-house-chimney myIcon "></i>
            <i class="fa-solid fa-pen myIcon"></i>
            <i class="fa-solid fa-graduation-cap myIcon"></i>
        </div>
        <div id="progress-infos">
            <div id="counter">Time left :<span id="myTimer"></span></div>
            <div id="progress-bar"><div id="inner-progress-bar"></div></div>
        </div>
        
        <div id="question-container">
            <span id="myQuestion"></span>
        </div>    
        
        <div id="responses-area">

            <div id="first-responses">
                <div id="res1" class="response" onclick="submitAnswer(this)">
                    
                </div>
                <div id="res2" class="response" onclick="submitAnswer(this)">
                    
                </div>
            </div>
            <div id="second-responses">
                <div id="res3" class="response" onclick="submitAnswer(this)">
                    
                </div>
                <div id="res4" class="response" onclick="submitAnswer(this)">
                    
                </div>
            </div>
        </div>
    </div>
    <script src="../assests/js/questions.js"></script>
    <script src="../assests/js/app.js"></script>
    <script src="https://kit.fontawesome.com/6360d947ff.js" crossorigin="anonymous"></script>
</body>
</html>