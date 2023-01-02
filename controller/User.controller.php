<?php
require '../classes/User.class.php';

session_start();
//____ROUTING
if ( isset($_GET['getQuestions'])) fetchQuestions();
if ( isset($_GET['correct'])) setResult();



function fetchQuestions(){
    $me=new User;
    echo $me->getQuestions();
}

function setResult(){
    $me=new User;
    $result=$me->insertScore($_GET['correct'],$_GET['false'],$_GET['avg']);
    $_SESSION['correct']=$_GET['correct'];
    $_SESSION['false']=$_GET['false'];
    $_SESSION['avg']=$_GET['avg'];
    header ('Location: ../pages/result.php');
}