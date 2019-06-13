<?php 
 require '../config/db.php';
session_start();
 if(!isset($_SESSION['id'])){
  header('location:login.php');
  exit();}

  $questions=array();

$query="SELECT * FROM tests where id_user=?";
$stmt=$conn->prepare($query);
$stmt->bind_param('i',$_SESSION['id']);
$stmt->execute();
$result=$stmt->get_result();
$stmt->close();
while($row = $result->fetch_assoc()){
  array_push($questions,$row);
  
}

  ?>

<!DOCTYPE html>
<html lang="en" >

<head>
    <title>CSS Website Layout</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="feedbac.css">


</head>


<script></script>
<body>
<a href="teach.php">Back to tests </a>
<div class="content" style="text-align:center;">
<?php foreach($questions as $show): ?>
     <div class="question"> <i> <?php echo $show['question']; ?> </i></div>
     <div class="number"><img src="like.png" style="height:30px;margin-right:5px;"/><?php echo $show['number_likes'];?>  <img src="dislike.png" style="height:30px;margin-left:5px;margin-right:5px;";/> <?php echo $show['number_dislikes'];?></div>
    <?php endforeach;?>
    </div>

</body>

</html>