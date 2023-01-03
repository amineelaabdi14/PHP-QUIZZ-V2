<?php
require '../classes/User.class.php';

session_start();
//____ROUTING
if ( isset($_GET['getQuestions'])) fetchQuestions();
if ( isset($_GET['correct'])) setResult();
if ( isset($_POST['login'])) login();



function fetchQuestions(){
    $me=$_SESSION['user'];
    echo $me->getQuestions();
    unset($_GET['getQuestions']);
}

function setResult(){
    $me=$_SESSION['user'];
    $result=$me->insertScore($_SESSION['user']['id'],$_GET['correct'],$_GET['false'],$_GET['avg']);
    $_SESSION['correct']=$_GET['correct'];
    $_SESSION['false']=$_GET['false'];
    $_SESSION['avg']=$_GET['avg'];
    header ('Location: ../pages/result.php');
}

function login(){
    $me=new User($_POST['username'],$_POST['password']);
    if($me->login()=='new'){
        $_SESSION['user']=$me;
        header ('Location: ../pages/quizz.php?getQuestions');
    }
    else if($me->login()==true){
        $_SESSION['user']=$me;
        header ('Location: ../pages/quizz.php?getQuestions');
    }
    else if($me->login()==false){
        $_SESSION['message']='Wrong password';
        header ('Location: ../index.php');
    }
}