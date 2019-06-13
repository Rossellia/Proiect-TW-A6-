<?php 
require_once '../controllers/eventsController.php'; 

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
<link rel="stylesheet" href="events.css">
<title>Events</title>

</head>
<body>

    <header><a class="Back" href="mainpage.php">Go back</a></header>

    <div class="Events">
     <h1>Events to be held in the near future</h1> 
     
      <!-- <form class="searchbox" action="action_page.php">
            <input type="text" placeholder="Search keywords..." name="search">
            <button type="submit">
                <img src="./lupa.png" width="12" height="10" alt="submit" /></button>
          </form> -->

     <?php if(count($errors) > 0){
         print_r($errors['event']);
     }
     ?>

         <?php for($x = 0; $x < count($events); $x++) { ?>
            <div class="mydiv">
          <img src="<?php echo $events[$x]['poza']; ?>" style="width:100%;height:auto;"/>
          <form action="" method="POST">
            <input type="hidden" name="inscriere_eveniment" value="1">
            <input type="hidden" name="event_id" value="<?=$events[$x]['id']?>">
            <input type="submit" class="buton-inscriere" value="Inscriere">
          </form>
          <p class="event-title"><?php echo $events[$x]['nume']; ?></p>
          <p class="event-desc"><?php echo $events[$x]['descriere']; ?></p>
          <p class="event-tip">Tip eveniment: <?php echo $events[$x]['tip']; ?></p>
            </div>
       <?php } ?>


      
    </div>
    

</body>
</html>