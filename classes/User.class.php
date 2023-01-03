<?php 
require 'Dbh.class.php';
class User{
    public $username;
    protected $id;
    protected $password;
    
public function __construct($username,$password){
    $this->username=$username;
    $this->password=$password;
    }
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
    public function insertScore($correct,$false,$avg){
        $conn=Dbh::connect();
        $sql = "INSERT INTO `score`(`id_user`, `correct_answers`, `incorrect_answers`, `avg_time`) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(1,$correct,$false,$avg));
        Dbh::disconnect();
    }
    public function login(){
        $username=$this->username;
        $password=$this->password;
        $conn=Dbh::connect();
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute(array($username));
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(count($user)>0){
            if($user[0]['password']==$password){
                return true;
            }
            else{
                return false;
            }
        }
        else {
            $sql="INSERT INTO `user`( `username`, `password`, `ip_address`, `browser`, `os`) VALUES (?,?,null,null,null)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(array($username,$password));
            return 'new';
        }
        Dbh::disconnect();
    }
}

