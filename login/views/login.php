<?php 
 require_once '../controllers/registrationAndLoginController.php';
 


?>
<!DOCTYPE html>
<html lang="en"> 
       
    <head>
        <title> Pagina principala </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="Homecss.css">
    </head>
    <body>
        <div class="div1"> 
            <h2 class="text">TEASK</h2>
        </div>

        <div class="div2">
                <img src="p2.png" class="image" alt="userphoto">
                <form action="login.php" method="post">
                <?php if(count($errors)>0): ?>
  <div class="alert alert-danger">
    <?php foreach($errors as $error): ?>
        <li><?php echo $error; ?> </li>
    <?php endforeach;?>
  </div>
<?php endif;?>
                    <div class="row">
                        <div class="col-25"><label>Username:</label></div>
                        <div class="col-75"><input type="text" name="username" class="input"></div>
                    </div>
                    <div class="row">
                        <div class="col-25"> <label>Pasword:</label></div>
                        <div class="col-75"><input type="password" name="password" class="input"></div>
                    </div>
                    <div class="row">
                        <!--<a href="./pp/pp.html">Submit</a>-->
                        <button type="submit" class="LoginCont" name="Login-btn">Login</button>

                    </div>
                    </form>
                      
                <p>If you want one <a href="register.php">create an account</a></p>
        </div>
        <div class="div3">
                <!-- <form >
                    <input type="text" name="search" placeholder="Search.." class="field"> 
                </form> -->
                <div class="div4">
                <div>
         <!-- <?php //if(count($errors) > 0){
               // print_r($errors['event']);
               // }
            ?> </div> -->
                     <?php for($x = 0; $x < count($events); $x++) { ?>
            <div class="mydiv">
            <img src="<?php echo $events[$x]['poza']; ?>" style="width:50%;height:auto;"/>
            <p class="event-title"><?php echo $events[$x]['nume']; ?></p>
            <p class="event-desc"><?php echo $events[$x]['descriere']; ?></p>
            </div>
       <?php } ?>
                    
                </div>
        </div>
        
    </body>
</html>
    