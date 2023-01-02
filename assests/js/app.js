function getData(){
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                questions = JSON.parse(this.responseText);
            }
        };
        xmlhttp.open("GET", "../controller/User.controller.php?getQuestions" , false);
        xmlhttp.send();
        
}
getData();
let currentQuestion=0;
let timer=5;
let myTimer;

function showQuestions(){
    if(currentQuestion<questions.length)
    {   
        document.getElementById('myQuestion').innerText=questions[currentQuestion].question;
        document.getElementById('res1').innerText=questions[currentQuestion].choice1;
        document.getElementById('res2').innerText=questions[currentQuestion].choice2;
        document.getElementById('res3').innerText=questions[currentQuestion].choice3;
        document.getElementById('res4').innerText=questions[currentQuestion].choice4;
        currentQuestion++;
        startTimer();
    }else
    console.log('done');
    
}
showQuestions();



function startTimer(){
    document.getElementById('myTimer').innerText=timer;
    timer--;    
    if(timer!=-1) 
    {
        myTimer=setTimeout(startTimer,1000);
    }    
    else {
        document.getElementById('inner-progress-bar').style.width=( currentQuestion*100 / questions.length)+'%';
        timer=5;
        showQuestions();
    }
}    
