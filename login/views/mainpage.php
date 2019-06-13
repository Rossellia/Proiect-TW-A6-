<?php 
require_once '../controllers/registrationAndLoginController.php'; 

if(!isset($_SESSION['id'])){
    header('location:login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="pp.css">



    <title>Pagina Principala</title>
</head>
<body >
        <ul>
                <li><a class="active" href="mainpage.php?logout=1"><b>Log out</b></a></li>
                <p class="welcome"> Welcome, <?php echo $_SESSION['username'];?>!</p>
                
                 
        </ul>
        <div class="buttons">
            <div class="divT"><a href="teach.php" class="T">Teach  <span class="tooltiptext"><b>TEACH others! Add your own questions and create test for others! Click here for redirecting you to Create Tests Page!</b></span></a></div>
            <div class="divE"><a href="events.php" class="E">Events<span class="tooltiptext"><b>Find EVENTS! Click here to view events that you are interested in!</b></span></a></div>
            <div class="divA"><a href="statistics.php" class="A">Activities<span class="tooltiptext"><b>See your ACTIVITIES! Click here to see your evolution for every programming language!</b></span></a></div>
            <div class="divS"><a href="test.php" class="S">Skills<span class="tooltiptext"><b>Test your SKILLS! Click here to solve tests which show you how much do you know about a programming language!</b></span></a></div>
            <div class="divK"><a href="knowledge.php" class="K">Knowledge<span class="tooltiptext"><b>Click here to see your historic!</b></span></a></div>
        </div>
</body>
</html>