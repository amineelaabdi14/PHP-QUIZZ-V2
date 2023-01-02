let currentQuestion=0;
let timer=5;
let myTimer;
let correctAnswers=0;
let falseAnswers=0;

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

function showQuestions(){
    if(currentQuestion<questions.length)
    {   
        document.getElementById('myQuestion').innerText=questions[currentQuestion].question;
        document.getElementById('res1').innerHTML=questions[currentQuestion].choice1;
        document.getElementById('res2').innerHTML=questions[currentQuestion].choice2;
        document.getElementById('res3').innerHTML=questions[currentQuestion].choice3;
        document.getElementById('res4').innerHTML=questions[currentQuestion].choice4;
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
        falseAnswers++;
        timer=5;
        showQuestions();
    }
}    


function submitAnswer(answer){
    console.log(questions[currentQuestion-1].anwer);
    // document.getElementById('inner-progress-bar').style.width=( currentQuestion*100 / myUser.totalQuestions)+'%';
    if(answer.innerText==questions[currentQuestion-1].anwer)
    {   console.log('gg');
        timer=30;
        clearTimeout(myTimer);
        showQuestions();
    }
    else {
        console.log('maloko');
        timer=30;
        clearTimeout(myTimer);
        showQuestions();
    }
}