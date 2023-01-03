let currentQuestion=0;
let timer=10;
let myTimer;
let correctAnswers=0;
let falseAnswers=0;
let avgTime=[];
let averageResponse=0;
function getData(){
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                questions = JSON.parse(this.responseText);
            }
        };
        xmlhttp.open("GET", "../controller/User.controller.php?getQuestions" , false);
        xmlhttp.send();
        for(let i=questions.length-1;i>0;i--)
        {   
            let randIndex= Math.floor( Math.random()*questions.length);
            [ questions[randIndex] , questions[i] ] = [ questions[i] , questions[randIndex] ];
        }
        
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
    {
        averageResponse=0;
        avgTime.forEach(element => averageResponse+=element);
        window.location.href='../controller/User.controller.php?correct='+correctAnswers+'&false='+falseAnswers+'&avg='+averageResponse/questions.length;
    }
    
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
        avgTime.push(10);
        falseAnswers++;
        timer=10;
        showQuestions();
    }
}    


function submitAnswer(answer){
    document.getElementById('inner-progress-bar').style.width=( currentQuestion*100 / questions.length)+'%';
    avgTime.push(10-Number(document.getElementById('myTimer').innerText));
    if(answer.innerText==questions[currentQuestion-1].anwer)
    {   
        timer=10;
        correctAnswers++;
        clearTimeout(myTimer);
        showQuestions();
    }
    else {
        timer=10;
        falseAnswers++;
        clearTimeout(myTimer);
        showQuestions();
    }
}