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
function showQuestions(){
    document.getElementById('myQuestion').innerText=questions[currentQuestion].question;
    document.getElementById('res1').innerText=questions[currentQuestion].choice1;
    document.getElementById('res2').innerText=questions[currentQuestion].choice2;
    document.getElementById('res3').innerText=questions[currentQuestion].choice3;
    document.getElementById('res4').innerText=questions[currentQuestion].choice4;
    currentQuestion++;
    setTimeout(showQuestions,30000);
}
showQuestions();
