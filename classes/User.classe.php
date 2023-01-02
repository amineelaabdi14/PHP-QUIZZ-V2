<?php 
require 'Dbh.classe.php';
class User{
    public $username;
    protected $id;
    protected $password;
    
    public function getQuestions(){
        $conn=Dbh::connect();
        $res = $conn->query("SELECT * FROM questions ");
        $questions = $res->fetchAll(PDO::FETCH_ASSOC);
        $res = $conn->query("SELECT * FROM answers ");
        $answers = $res->fetchAll(PDO::FETCH_ASSOC);
        $result=array();
        for($i=0;$i<count($questions);$i++){
            $result[]['question']=$questions[$i]['question'];
            $myAnswers=array();
            foreach($answers as $answer){
                if($answer['question_id']==$i){
                    $myAnswers[]=$answer['answer1'];
                    $myAnswers[]=$answer['answer2'];
                    $myAnswers[]=$answer['answer2'];
                    $myAnswers[]=$answer['answer3'];
                }
            }
            for($k=1;$k<=4;$k++){
                $result[count($result)-1]['choice'.$k]=$myAnswers[0];
            }
        }
        echo "<pre>";
        var_dump($result);
        echo "</pre>";
        Dbh::disconnect();
        
    }
    public function insertScore(){
        
    }
}