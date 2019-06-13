<?php 
 require_once '../controllers/registrationAndLoginController.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="X-UA-Compatible" content="ie=edge">   
<link rel="stylesheet" href="Register.css">
<title>Register</title>

</head>
<body>
<div class="Register">
<h1>Register</h1>
    
  <form action="register.php" method="post">
  <?php if(count($errors)>0): ?>
  <div class="alert alert-danger">
    <?php foreach($errors as $error): ?>
        <li><?php echo $error; ?> </li>
    <?php endforeach;?>
  </div>
<?php endif;?>
  
     <label > Username</label>
    <div> <input type="text" id="username" name="username" value="<?php echo $username; ?>"placeholder="Please enter your username."></div>
    <label> Mail</label>
   <div> <input type="text" id="email" name="email" value="<?php echo $email; ?>" placeholder="Please enter your mail address."></div>

    <label >Password</label>
    <div><input type="password" id="password" name="password" placeholder="Please enter your password."></div>    

     <div class="box">
            <a class="button" href="#popup1">Programming languages.</a>
        </div>
        
        <div id="popup1" class="overlay">
            <div class="popup">
                <h2>Which of the following programming languages do you know?</h2>
                <a class="close" href="#">&times;</a>
                <div class="content">
                                <p><label class="container">C/C++
                                <input type="checkbox" name="c">
                                <span class="checkmark"></span></label></p>

                                <p><label class="container">HTML
                                <input type="checkbox" name="html">
                                <span class="checkmark"></span></label></p>

                                <p><label class="container" >CSS
                                <input type="checkbox" name="css">
                                <span class="checkmark"></span></label></p>


                                <p><label class="container" >JAVASCRIPT
                                <input type="checkbox" name="javascript">
                                <span class="checkmark"></span>
                                </label></p>
                              
                                <p><label class="container">JAVA
                                <input type="checkbox" name="java">
                                <span class="checkmark"></span></label></p>

                                <p><label class="container" >PHP
                                <input type="checkbox" name="php">
                                <span class="checkmark"></span>
                                </label></p>

                             
                             </div>
                             
            </div>
        </div>

    <button type="submit" class="RegisterCont" name="signup-btn">Register.</button>
  </form>
 <div class="accountnotfound">
Already have an account?Go back to the <a href="login.php">main website.</a>
</div>
</div>
</body>
</html>