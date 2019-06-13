<?php
session_start();
require '../config/db.php';
  $errors=array();
//preluam din bd
$idQuery = "SELECT * FROM events ";
$stmt=$conn->prepare($idQuery);
//$stmt->bind_param('s',$_SESSION['id']);
$stmt->execute();
$result=$stmt->get_result();
$userCount=$result->num_rows;
$stmt->close();
if($userCount == 0){
        $errors['event'] = "Nu sunt evenimente disponbile.";
}
$events = array();
while($row = $result->fetch_assoc()){   
    array_push($events,$row );
}



  $username="";
  $email="";
//if user press the register button
if(isset($_POST['signup-btn'])){
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
  


//validation
if(empty($username)){
    $errors['username']="Username required";
    }

 if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors['email']="Email adress is invalid";

 }
if(empty($email)){
    $errors['email']="Email required";
    }

if(empty($password)){
    $errors['password']="Password required";
    }

$emailQuery="SELECT * FROM users WHERE email=? LIMIT 1";
$stmt=$conn->prepare($emailQuery);
$stmt->bind_param('s',$email);
$stmt->execute();
$result=$stmt->get_result();
$userCount=$result->num_rows;
$stmt->close();
if($userCount>0){
    $errors['email']="Email already exists" ;
}
if(count($errors)===0){
    $password=password_hash($password,PASSWORD_DEFAULT);
    $token=bin2hex(random_bytes(50));

   
     //if there are no errors we insert the user in the table

    $sql="INSERT INTO users (username,email,password,token) VALUES(?,?,?,?)";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param('ssss',$username,$email,$password,$token);


    

    if($stmt->execute()){
//login user
$user_id=$conn->insert_id;
$_SESSION['id']=$user_id;
$_SESSION['username']=$username;
$_SESSION['email']=$email;
//insert languages that the user know
if(isset($_POST['c'])) $c=5;
else $c=0;
if(isset($_POST['html'])) $html=1;
else $html=0;
if(isset($_POST['css'])) $css=7;
else $css=0;
if(isset($_POST['javascript'])) $javascript=1;
else $javascript=0;
if(isset($_POST['java'])) $java=10;
else $java=0;
if(isset($_POST['php'])) $php=15;
else $php=0;
$sql2="INSERT INTO languages (id_user,C,HTML,CSS,JavaScript,Java,PHP) VALUES(?,?,?,?,?,?,?)";
$stmt2=$conn2->prepare($sql2);
$stmt2->bind_param('iiiiiii',$user_id,$c,$html,$css,$javascript,$java,$php);
$stmt2->execute();
header('location:mainpage.php');
exit();
    }else{
        $errors['db_error']="Database error: failed to register";
    }
}
}


//login


//if user press the login button
if(isset($_POST['Login-btn'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
//validation
if(empty($username)){
    $errors['username']="Username required";
    }

if(empty($password)){
    $errors['password']="Password required";
    }
if(count($errors)==0){
    $sql="SELECT * FROM users WHERE username=? or email=? LIMIT 1  ";
    $stmt=$conn->prepare($sql);
    $stmt->bind_param('ss',$username,$username);
    $stmt->execute();
    $result=$stmt->get_result();
    $user=$result->fetch_assoc();
    if(password_verify($password,$user['password'])){
        //login succes
$_SESSION['id']=$user['id']; echo $_SESSION['id'];
$_SESSION['username']=$user['username'];
$_SESSION['email']=$user['email'];
//$_SESSION['password']=$user['password'];
header('location:mainpage.php');
exit();
  
}
    else {
        $errors['login_fail']="Wrong credentials";
    }
    }
}

//logout user
if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    //unset($_SESSION['password']);
    header('location:login.php');
    exit();


}
?>


