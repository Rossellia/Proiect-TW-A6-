<?php 
require_once '../controllers/knowledgeController.php'; 

if(!isset($_SESSION['id'])){
    header('location:login.php');
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="X-UA-Compatible" content="ie=edge">   
<link rel="stylesheet" type="text/css" href="Knowledge.css">
<title>Knowledge</title>

</head>
<body>
        <header><a class="Back" href="mainpage.php">Go back</a></header>
        <div class="Knowledge">
         <h1>Knowledge you have gained so far</h1>    
         <div>
         <?php if(count($errors) > 0){
                print_r($errors['event']);
                }
            ?> </div>


        <?php for($x = 0; $x < count($events); $x++) { ?>
            <div class="mydiv">
            <img src="<?php echo $events[$x]['poza']; ?>" style="width:100%;height:60%;"/>
            <p class="event-title"><?php echo $events[$x]['nume']; ?></p>
            <p class="event-desc"><?php echo $events[$x]['descriere']; ?></p>
            <p class="event-desc">Tip eveniment: <?php echo $events[$x]['tip']; ?></p>
            <?php if(!empty($events[$x]['feedback'])){ ?>
            <p class="event-desc">Feedbackul tau: <?php echo $events[$x]['feedback']; ?></p>
            <?php } else {?>
                <p class="event-desc">Lasa o parere</p>
            <?php } ?>
            </div>
       <?php } ?>

      
        
        <div class="box">
                <a class="button" href="#popup1">Give your feedback</a>
            </div>
            <?php 
            if(count($eroare)>0): ?>
  <div class="alert alert-danger">
    <?php for($x=0; $x < count($eroare); $x++) {?>
        <li><?php echo $eroare[$x]; ?> </li>
    <?php }?>
  </div>
<?php endif;?>
            <div id="popup1" class="overlay">
            <form action="" method="POST">
                <div class="popup">
                    <h2>Please add an event you attended.You can also give feedback.</h2>
                    <a class="close" href="#">&times;</a>
                <div class="content">
                    <input type = "text" name="event_name" class = "linkText" placeholder = "Name of event..." >
                </div> 
                <div class="feedback"> 
                    <input type = "text" name="feedback" class = "feed" placeholder = "Did you learn something new?" >
                </div>
                   <div> <button type="submit" class="sendbttn"  name="sendbutton">Send</button></div>
                   <h3><?php if(!empty($resulttxt)){ 
                                print_r($resulttxt);
                   } 
                    ?></h3>
                </div>
                </form>
                
            </div>
                

    
    
    </div>

    </body>
    </html>
