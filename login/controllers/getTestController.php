<?php
session_start();
require '../config/db.php';
$variabila=0;

 $answer_11='';
 $answer_21='';
 $answer_31='';
 $question1='';

 $answer_12='';
 $answer_22='';
 $answer_32='';
 $question2='';

 $answer_13='';
 $answer_23='';
 $answer_33='';
 $question3='';

 $answer_14='';
 $answer_24='';
 $answer_34='';
 $question4='';

 $answer_15='';
 $answer_25='';
 $answer_35='';
 $question5='';

 $answer_16='';
 $answer_26='';
 $answer_36='';
 $question6='';

 $eventlevel='';
 $eventlanguage='';

 $_SESSION['correct1']='';
 $_SESSION['correct2']='';
 $_SESSION['correct3']='';
 $_SESSION['correct4']='';
 $_SESSION['correct5']='';
 $_SESSION['correct6']='';

 $answer1='';
 $answer2='';
 $answer3='';
 $answer4='';
 $answer5='';
 $answer6='';

 
 $_SESSION['radioVal1'] = "";
 $_SESSION['radioVal2'] = "";
 $_SESSION['radioVal3'] = "";
 $_SESSION['radioVal4'] = "";
 $_SESSION['radioVal5'] = "";
 $_SESSION['radioVal6'] = "";

 $_SESSION['countright']=0;
$_SESSION['points']=0;
$_SESSION['totalpoints']=0;






 if(isset($_POST["level"]) && isset($_POST["searchlanguage"]))
 {
  $eventlevel = $_POST["level"];
  $eventlanguage = $_POST["searchlanguage"]; 
  $_SESSION['language']=$eventlanguage;
  $_SESSION['lvl']=$eventlevel;

  $questionQuery="SELECT * FROM tests where programming_language='$eventlanguage' and  test_level='$eventlevel' ";
  $result = $conn->query($questionQuery);
  $count=$result->num_rows;
  $variabila=1;
  
 }
 elseif(isset($_SESSION["level"])&& isset($_SESSION["searchlanguage"]))
 {
  $eventlevel =$_SESSION["level"];
  $eventlanguage = $_SESSION["searchlanguage"];
  $_SESSION['language']=$eventlanguage;
  $_SESSION['lvl']=$_SESSION["level"];

  $questionQuery="SELECT * FROM tests where programming_language='$eventlanguage' and  test_level='$eventlevel' ";
  $result = $conn->query($questionQuery);
  $count=$result->num_rows;
 }



  

$chosen=array();
$index=0;
if(isset($count))
{
while($index<$count)
{
  array_push($chosen,0);
  $index=$index+1;
}
// print_r($chosen);
}



if(isset($result))
{if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
$to_choose=rand(0,1);
if($to_choose===1 && $chosen[0]===0)
{
$question1=$row['question'];
$answer_11=$row['answer_1'];
$answer_21=$row['answer_2'];
$answer_31=$row['answer_3'];
$_SESSION['correct1']=$row['right_answer'];
$_SESSION['dislike1']=$row['number_dislikes'];
$_SESSION['like1']=$row['number_likes'];
$_SESSION['id1']=$row['id_question'];
$like1=$_SESSION['like1']=$row['number_likes'];
$chosen[0]=1;

}
elseif($to_choose===1 && $chosen[1]===0)
{
$question2=$row['question'];
$answer_12=$row['answer_1'];
$answer_22=$row['answer_2'];
$answer_32=$row['answer_3'];
$_SESSION['correct2']=$row['right_answer'];
$_SESSION['dislike2']=$row['number_dislikes'];
$_SESSION['like2']=$row['number_likes'];
$_SESSION['id2']=$row['id_question'];
$chosen[1]=1;
}
elseif($to_choose===1 && $chosen[2]===0)
{
$question3=$row['question'];
$answer_13=$row['answer_1'];
$answer_23=$row['answer_2'];
$answer_33=$row['answer_3'];
$_SESSION['correct3']=$row['right_answer'];
$_SESSION['dislike3']=$row['number_dislikes'];
$_SESSION['like3']=$row['number_likes'];
$_SESSION['id3']=$row['id_question'];
$chosen[2]=1;
}
elseif($to_choose===1 && $chosen[3]===0)
{
$question4=$row['question'];
$answer_14=$row['answer_1'];
$answer_24=$row['answer_2'];
$answer_34=$row['answer_3'];
$_SESSION['correct4']=$row['right_answer'];
$_SESSION['dislike4']=$row['number_dislikes'];
$_SESSION['like4']=$row['number_likes'];
$_SESSION['id4']=$row['id_question'];
$chosen[3]=1;
}
elseif($to_choose===1 && $chosen[4]===0)
{
$question5=$row['question'];
$answer_15=$row['answer_1'];
$answer_25=$row['answer_2'];
$answer_35=$row['answer_3'];
$_SESSION['correct5']=$row['right_answer'];
$_SESSION['dislike5']=$row['number_dislikes'];
$_SESSION['like5']=$row['number_likes'];
$_SESSION['id5']=$row['id_question'];
$chosen[4]=1;
}
elseif($to_choose===1 && $chosen[5]===0)
{
$question6=$row['question'];
$answer_16=$row['answer_1'];
$answer_26=$row['answer_2'];
$answer_36=$row['answer_3'];
$_SESSION['correct6']=$row['right_answer'];
$_SESSION['dislike6']=$row['number_dislikes'];
$_SESSION['like6']=$row['number_likes'];
$_SESSION['id6']=$row['id_question'];
$chosen[5]=1;
}
}
}
}

function modify_likes_dislikes($idquestion,$likes,$dislikes)
{

  $connn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
  $questionnQuery="UPDATE tests SET number_likes='$likes', number_dislikes='$dislikes' WHERE id_question='$idquestion' ";

  if ($connn->query($questionnQuery) === TRUE) {
    // set response code - 200 OK
    http_response_code(200);
    
  } else {
     
      http_response_code(404);
  }
  $connn->close();
}

if (isset($_POST['answer1']))
{
  $_SESSION['radioVal1'] = $_POST['answer1'];
if( $_SESSION['radioVal1'] == $_SESSION['correct1'])
$_SESSION['countright']=$_SESSION['countright']+1;

if(isset($_POST['dislike1']))
$_SESSION['dislike1']=$_SESSION['dislike1']+1;
else
$_SESSION['like1']=$_SESSION['like1']+1;


modify_likes_dislikes($_SESSION['id1'],$_SESSION['like1'],$_SESSION['dislike1']);
}

if(!isset($_POST["level"]) && !isset($_POST["searchlanguage"]))
{
if (isset($_POST['answer2']))
{
  $_SESSION['radioVal2'] = $_POST['answer2'];
if( $_SESSION['radioVal2'] == $_SESSION['correct2'])
$_SESSION['countright']=$_SESSION['countright']+1;

if(isset($_POST['dislike2']))
$_SESSION['dislike2']=$_SESSION['dislike2']+1;
else
$_SESSION['like2']=$_SESSION['like2']+1;

modify_likes_dislikes($_SESSION['id2'],$_SESSION['like2'],$_SESSION['dislike2']);
}


if (isset($_POST['answer3']))
{
$_SESSION['radioVal3'] = $_POST["answer3"];
if( $_SESSION['radioVal3'] == $_SESSION['correct3'])
$_SESSION['countright']=$_SESSION['countright']+1;

if(isset($_POST['dislike3']))
$_SESSION['dislike3']=$_SESSION['dislike3']+1;
else
$_SESSION['like3']=$_SESSION['like3']+1;

modify_likes_dislikes($_SESSION['id3'],$_SESSION['like3'],$_SESSION['dislike3']);
}


if (isset($_POST['answer4']))
{
$_SESSION['radioVal4'] = $_POST["answer4"];
if($_SESSION['radioVal4'] == $_SESSION['correct4'])
$_SESSION['countright']=$_SESSION['countright']+1;

if(isset($_POST['dislike4']))
$_SESSION['dislike4']=$_SESSION['dislike4']+1;
else
$_SESSION['like4']=$_SESSION['like4']+1;

modify_likes_dislikes($_SESSION['id4'],$_SESSION['like4'],$_SESSION['dislike4']);
}


if (isset($_POST['answer5']))
{
$_SESSION['radioVal5'] = $_POST["answer5"];
if( $_SESSION['radioVal5'] == $_SESSION['correct5'])
$_SESSION['countright']=$_SESSION['countright']+1;

if(isset($_POST['dislike5']))
$_SESSION['dislike5']=$_SESSION['dislike5']+1;
else
$_SESSION['like5']=$_SESSION['like5']+1;

modify_likes_dislikes($_SESSION['id5'],$_SESSION['like5'],$_SESSION['dislike5']);
}


if (isset($_POST['answer6']))
{
  $_SESSION['radioVal6'] = $_POST["answer6"];
if( $_SESSION['radioVal6'] == $_SESSION['correct6'])
$_SESSION['countright']=$_SESSION['countright']+1;

if(isset($_POST['dislike6']))
$_SESSION['dislike6']=$_SESSION['dislike6']+1;
else
$_SESSION['like6']=$_SESSION['like6']+1;

modify_likes_dislikes($_SESSION['id6'],$_SESSION['like6'],$_SESSION['dislike6']);
}
}

function addpoints($id,$language,$eventlevel)
{

  if($eventlevel == 'beginner')
  $_SESSION['points']=$_SESSION['countright'];
  elseif($eventlevel == 'experienced')
  $_SESSION['points']=$_SESSION['countright']*2;
  elseif($eventlevel == 'advanced')
  $_SESSION['points']=$_SESSION['countright']*3;

  $connn2 = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

  $Query1="SELECT * from languages WHERE id_user='$id'";
  $result1 = $connn2->query($Query1);
  $count1=$result1->num_rows;
    $row = $result1->fetch_assoc();
    if($language== 'C')
    {
      $_SESSION['totalpoints']=$row['C'];
      $_SESSION['totalpoints']=$_SESSION['totalpoints']+$_SESSION['points'];
      $total=$_SESSION['totalpoints'];
      $Query2="UPDATE languages SET C='$total' WHERE id_user = '$id'  ";
      if ($connn2->query($Query2) === TRUE) {
        // set response code - 200 OK
        http_response_code(200);
        
      } else {
         
          http_response_code(404);
      }
      $connn2->close();
    }
    elseif($language== 'HTML')
    {
        $_SESSION['totalpoints']=$row['HTML'];
        $_SESSION['totalpoints']=$_SESSION['totalpoints']+$_SESSION['points'];
        $total=$_SESSION['totalpoints'];
        $Query2="UPDATE languages SET HTML='$total' WHERE id_user = '$id'  ";
        if ($connn2->query($Query2) === TRUE) {
          // set response code - 200 OK
          http_response_code(200);
          
        } else {
           
            http_response_code(404);
        }
        $connn2->close();
    }
    elseif($language == 'CSS')
    {
      $_SESSION['totalpoints']=$row['CSS'];
      $_SESSION['totalpoints']=$_SESSION['totalpoints']+$_SESSION['points'];
      $total=$_SESSION['totalpoints'];
      $Query2="UPDATE languages SET CSS='$total' WHERE id_user = '$id'  ";
      if ($connn2->query($Query2) === TRUE) {
        // set response code - 200 OK
        http_response_code(200);
        
      } else {
         
          http_response_code(404);
      }
      $connn2->close();
    }
    elseif($language =='JavaScript')
    {
      $_SESSION['totalpoints']=$row['JavaScript'];
      $_SESSION['totalpoints']=$_SESSION['totalpoints']+$_SESSION['points'];
      $total=$_SESSION['totalpoints'];
      $Query2="UPDATE languages SET JavaScript='$total' WHERE id_user = '$id'  "; 
      if ($connn2->query($Query2) === TRUE) {
        // set response code - 200 OK
        http_response_code(200);
        
      } else {
         
          http_response_code(404);
      }
      $connn2->close();
    }
    elseif($language =='Java')
    {
      $_SESSION['totalpoints']=$row['Java'];
      $_SESSION['totalpoints']=$_SESSION['totalpoints']+$_SESSION['points'];
      $total=$_SESSION['totalpoints'];
      $Query2="UPDATE languages SET Java='$total' WHERE id_user = '$id'  "; 
      if ($connn2->query($Query2) === TRUE) {
        // set response code - 200 OK
        http_response_code(200);
        
      } else {
         
          http_response_code(404);
      }
      $connn2->close();
    }
    elseif($language=='PHP')
    {
      $_SESSION['totalpoints']=$row['PHP'];
      $_SESSION['totalpoints']=$_SESSION['totalpoints']+$_SESSION['points'];
      $total=$_SESSION['totalpoints'];
      $Query2="UPDATE languages SET PHP='$total' WHERE id_user = '$id'  "; 
      if ($connn2->query($Query2) === TRUE) {
        // set response code - 200 OK
        http_response_code(200);
        
      } else {
         
          http_response_code(404);
      }
      $connn2->close();
    }

  

}





function addstatistics($id,$language,$valuetest)
{
  $connn3 = new mysqli('localhost','root','','login');
  $Query3="SELECT * FROM statistics where id_user='$id' and programming_language='$language'";
  $result3 = $connn3->query($Query3);
  $count3=$result3->num_rows;
  if($count3==1)
  {$row = $result3->fetch_assoc();
   $t1=$row['test1'];
   $t2=$row['test2'];
   $t3=$row['test3'];
   $t4=$row['test4'];
   $t5=$row['test5'];
   if($t1 == -1)
   {
    $Query5="UPDATE statistics SET test1='$valuetest' WHERE  id_user='$id' AND programming_language='$language' ";
    if ($connn3->query($Query5) === TRUE) {
      // set response code - 200 OK
      http_response_code(200);
      
    } else {
       
        http_response_code(404);
    }
    $connn3->close();
   }
   elseif($t2 == -1)
   {
    $Query5="UPDATE statistics SET test2='$valuetest' WHERE  id_user='$id' AND programming_language='$language' ";
    if ($connn3->query($Query5) === TRUE) {
      // set response code - 200 OK
      http_response_code(200);
      
    } else {
       
        http_response_code(404);
    }
    $connn3->close();
   }
   elseif($t3 ==-1)
   {
    $Query5="UPDATE statistics SET test3='$valuetest' WHERE  id_user='$id' AND programming_language='$language' ";
    if ($connn3->query($Query5) === TRUE) {
      // set response code - 200 OK
      http_response_code(200);
      
    } else {
       
        http_response_code(404);
    }
    $connn3->close();
   }
   elseif($t4==-1)
   {
    $Query5="UPDATE statistics SET test4='$valuetest' WHERE  id_user='$id' AND programming_language='$language' ";
    if ($connn3->query($Query5) === TRUE) {
      // set response code - 200 OK
      http_response_code(200);
      
    } else {
       
        http_response_code(404);
    }
    $connn3->close();
   }
   elseif($t5 == -1)
   {
    $Query5="UPDATE statistics SET test5='$valuetest' WHERE  id_user='$id' AND programming_language='$language' ";
    if ($connn3->query($Query5) === TRUE) {
      // set response code - 200 OK
      http_response_code(200);
      
    } else {
       
        http_response_code(404);
    }
    $connn3->close();
   }
   else
   {
    $connn3->close();
   }
  }
  else
  {
  $Query4="INSERT INTO  statistics (id_user,programming_language,test1,test2,test3,test4,test5)
  VALUES ('$id','$language','$valuetest',-1,-1,-1,-1)";
  if ($connn3->query($Query4) === TRUE) {
    // set response code - 200 OK
    http_response_code(200);
    
  } else {
     
      http_response_code(404);
  }
  $connn3->close();
}
}
if(isset($_POST['answer1'])||isset($_POST['answer2'])||isset($_POST['answer3'])||isset($_POST['answer4'])||isset($_POST['answer5'])||isset($_POST['answer6']))
{addstatistics($_SESSION['id'],$_SESSION['language'],$_SESSION['countright']);
  addpoints($_SESSION['id'],$_SESSION['language'],$_SESSION['lvl']);
  $variabila=0;
}

  ?>