<?php 
 require_once '../controllers/addQuestionController.php';

 if(!isset($_SESSION['id'])){
  header('location:login.php');
  exit();
}
// $question1="ds";
// $emailQuery="SELECT question FROM tests WHERE question=? ";
// $stmt1=$conn->prepare($emailQuery);
// $stmt1->bind_param('s',$question1);
// $stmt1->execute();
// $result1=$stmt1->get_result();
// $userCount=$result1->num_rows;
// $stmt1->close();
// echo $userCount;
// if($userCount>0){
//     $errorss['question']="Question already exists" ;
    



?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Website Layout</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="teac.css">


</head>



<body>



<div class="content">
<h1>Teach others!</h1>
  <h3>Add your own questions for others!</h3>

<div class="div1">

    <a href="feedback.php" class="feedback">Your questions</a>
    

 <a href="mainpage.php" class="logout"><b>Home</b></a>
</div>


  <div class="column"style="margin-left:35%">
    
    <form action="teach.php" method="POST" class="question1">
    <?php if(count($errorsss)>0): ?>
    <div class="alert alert-danger"><?php echo $errorsss['question']; ?>
    <?php foreach($errorsss as $error): ?>
        <li><?php echo $error; ?> </li>
    <?php endforeach;?>
  </div>
<?php endif;?>

        Question:<br>
          <input type="text" name="question1" required><br>
        Answers:<br>
        1:<input type="text" name="answer1" required > <br>
        2:<input type="text" name="answer2" required > <br>
        3:<input type="text" name="answer3" required> <br>
        Right answer:<br>
        <select  name="rightanswer" required>
        <option value="">None</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        </select>
    
   
<br>
<div class="choose">

        Programming Language:<br>
          <input type="text" name="language" required > <br>
        Level:<br>
        <select  name="level" required>
            <option value="">None</option>
            <option value="beginner">beginner</option>
            <option value="experienced">experienced</option>
            <option value="advanced">advanced</option>
            </select> <br>
          <br>
          <input type="submit" value="Add question" class="addQuestion-btn"name="addQuestion-btn">
  </form> 
</div>
</body>
</html>
