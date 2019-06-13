<?php 
 require_once '../controllers/getTestController.php';
 
 if(!isset($_SESSION['id'])){
  header('location:login.php');
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Website Layout</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="Tst.css">


</head>
<body>
<header>
  <h1>Test your skills!</h1>
  <p>Choose a test!</p>
</header>
<form action="test.php" method="post">
<div class="header2">
    <input type="text" name="searchlanguage" placeholder="Search.." >
    <select id="level" name="level">
      <option value="beginner">beginner</option>
      <option value="experienced">experienced</option>
      <option value="advanced">advanced</option>
    </select>
    <input type="submit" value="Search" class="search">
    <a href="mainpage.php" class="back">Go back</a>
  
  </div>
</form>
<?php if($variabila>0): ?>
  

  
<div class="content">
<div class="row">
<form action="#" method="post">
<div class="column">
   <div class="q1"><p><?php echo($question1);?></p></div>
       <input type="radio" name="answer1" value=""><?php echo($answer_11);?><br>
       <input type="radio" name="answer1" value=""><?php echo($answer_21);?><br>
       <input type="radio" name="answer1" value=""><?php echo($answer_31);?><br>
       <input type="checkbox" class="dislike" name="dislike1" value="dislike">Did you dislike the question?Check this!<br>
 
</div>

<div class="column">
   <div class="q1"><p><?php echo($question2);?></p></div>
       <input type="radio" name="answer2" value=""><?php echo($answer_12);?><br>
       <input type="radio" name="answer2" value=""><?php echo($answer_22);?><br>
       <input type="radio" name="answer2" value=""><?php echo($answer_32);?><br>
       <input type="checkbox" class="dislike" name="dislike2" value="dislike2">Did you dislike the question?Check this!<br>
 
</div>

<div class="column">
   <div class="q1"><p><?php echo($question3);?></p></div>
       
       <input type="radio" name="answer3" value=""><?php echo($answer_13);?><br>
       <input type="radio" name="answer3" value=""><?php echo($answer_23);?><br>
       <input type="radio" name="answer3" value=""><?php echo($answer_33);?><br>
       <input type="checkbox" class="dislike" name="dislike3" value="dislike3">Did you dislike the question?Check this!<br>
</div>

<div class="column">
   <div class="q1"><p><?php echo($question4);?></p></div>
       
       <input type="radio" name="answer4" value=""><?php echo($answer_14);?><br>
       <input type="radio" name="answer4" value=""><?php echo($answer_24);?><br>
       <input type="radio" name="answer4" value=""><?php echo($answer_34);?><br>
       <input type="checkbox" class="dislike"  name="dislike4" value="dislike4">Did you dislike the question?Check this!<br>
</div>

<div class="column">
   <div class="q1"><p><?php echo($question5);?></p></div>
       
       <input type="radio" name="answer5" value=""><?php echo($answer_15);?><br>
       <input type="radio" name="answer5" value=""><?php echo($answer_25);?><br>
       <input type="radio" name="answer5" value=""><?php echo($answer_35);?><br>
       <input type="checkbox" class="dislike"  name="dislike5" value="dislike5">Did you dislike the question?Check this!<br>
</div>

<div class="column">
   <div class="q1"><p><?php echo($question6);?></p></div>
       
       <input type="radio" name="answer6" value=""><?php echo($answer_16);?><br>
       <input type="radio" name="answer6" value=""><?php echo($answer_26);?><br>
       <input type="radio" name="answer6" value=""><?php echo($answer_36);?><br>
       <input type="checkbox" class="dislike"  name="dislike6" value="dislike6">Did you dislike the question?Check this!<br>
</div>
</div>
<div class="box">
    <input type="submit" class="button" value="Submit your answers">
  </div>
  
</form>
</div>
</div>   
<?php endif;?>
  <div id="popup1" class="overlay">
    <div class="popup">
      <h2>Your results:</h2>
      <?php echo($_SESSION['id']);?>
      <a class="close" href="#">&times;</a>
      <div class="content1">
      <?php echo($_SESSION['countright']);?>/6<br> 
        
        

      </div>
    </div>
  </div>
  
</body>
</html>
