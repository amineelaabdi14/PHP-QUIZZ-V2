<?php
require '../classes/User.class.php';

//____ROUTING
if ( isset($_GET['getQuestions'])) fetchQuestions();



function fetchQuestions(){
    $me=new User;
    echo $me->getQuestions();
}