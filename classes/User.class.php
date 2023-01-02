<?php 
require 'Dbh.class.php';
class User{
    public $username;
    protected $id;
    protected $password;
    
    public function getQuestions(){
        $conn=Dbh::connect();
        $stmt = $conn->query("SELECT * FROM question");
        $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = $conn->query("SELECT * FROM choice");
        $answers= $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($questions as &$question)
        {   
            $k=1;
            foreach($answers as $answer)
            {   
                if($answer['id_question']==$question['id']) {
                    $question['choice'.$k]=$answer['choice'];
                    if($answer['correctAnswer']==1)  $question['anwer']= $answer['choice'];
                    $k++;
                }
            }
            krsort($question);
        }
        Dbh::disconnect();
        return json_encode($questions);
    }
    public function insertScore(){
        
    }
}

