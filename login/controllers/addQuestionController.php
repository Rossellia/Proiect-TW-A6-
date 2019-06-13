<?php 
session_start();
require '../config/db.php';
  $errorsss=array();
  $question1="";
  $answer1="";
  $answer2="";
  $answer3="";
  //$rightanswer1="";
  $level="";
  $language="";


  //if user press the register button
  
if(isset($_POST['addQuestion-btn'])){ 
  $question1=$_POST['question1'];
  $answer1=$_POST['answer1'];
  $answer2=$_POST['answer2'];
  $answer3=$_POST['answer3'];
  $rightanswer1=$_POST['rightanswer'];
  if($rightanswer1==1)$rightanswer1=$answer1;
  else if($rightanswer1==2)$rightanswer1=$answer2;
        else if ($rightanswer1==3)$rightanswer1=$answer3;
        $language=$_POST['language'];
        $level=$_POST['level'];
 

        $emailQuery="SELECT * FROM tests WHERE question=? LIMIT 1";
        $stmt1=$conn->prepare($emailQuery);
        $stmt1->bind_param('s',$question1);
        $stmt1->execute();
        $result1=$stmt1->get_result();
        $userCount=$result1->num_rows;
        $stmt1->close();
        if($userCount>0){
            $errorsss['question']="Question already exists" ;
            
        }


$zero=0;

    $sql="INSERT INTO tests (question,answer_1,answer_2,answer_3,right_answer,id_user,number_likes,number_dislikes,programming_language,test_level) VALUES(?,?,?,?,?,?,?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param('sssssiiiss',$question1,$answer1,$answer2,$answer3,$rightanswer1,$_SESSION['id'],$zero,$zero,$language,$level);
    $stmt->execute();
    if( $stmt -> affected_rows == 0)
      echo $stmt->error_log;
      else
      echo 'am inserat';
    header('location:teach.php');
exit();


//echo $questions[0];
// $_SESSION['questions']=$questions;
}
$questions=array();

$query="SELECT * FROM tests where id_user=?";
$stmt=$conn->prepare($query);
$stmt->bind_param('i',$_SESSION['id']);
$stmt->execute();
$result=$stmt->get_result();
$stmt->close();
while($row = $result->fetch_assoc()){
  array_push($questions,$row['question']);
  
}
$_SESSION['questions']=$questions;
?>





