<?php
session_start();
require "../config/db.php";
$errors = array();

//preluam evenimentele respective userului
$idQuery = "SELECT id_event FROM knowledge WHERE id_user=?";
$stmt=$conn->prepare($idQuery);
$stmt->bind_param('s',$_SESSION['id']);
$stmt->execute();
$result=$stmt->get_result();
$userCount=$result->num_rows;
$stmt->close();
if($userCount == 0){
        $errors['event'] = "Nu te-ai inscris la niciun eveniment.";
}
//le punem intr un array
$events = array();
$i =0;
while($row = $result->fetch_assoc()){   
            $eventQuery = "SELECT * FROM events WHERE id=?";
            $stmt=$conn->prepare($eventQuery);
            $stmt->bind_param('s',$row['id_event']);
            $stmt->execute();
            $result1=$stmt->get_result();
            while($row1 = $result1->fetch_array()){
                array_push($events,$row1);
            }
            $i=$i+1;
}

//chestionarul de feedback
$eroare = array();
if(isset($_POST['sendbutton'])){
    $eventName = $_POST['event_name'];
    $feedback = $_POST['feedback'];
    if(empty($eventName)){
        $eroare['event_name'] = "Introdu numele evenimentului";
    }
    if(empty($feedback)){
        $eroare['feedback'] = "Scrieti parerea ta";
    }

    if(count($eroare) === 0){
        $resulttxt = '';

        $eventQuery = "SELECT feedback FROM events WHERE nume=?";
        $stmt=$conn->prepare($eventQuery);
        $stmt->bind_param('s',$eventName);
        $stmt->execute();
        $result1=$stmt->get_result();
        // echo count($result1);
        // echo $eventName;
        // print_r($result1);
        // die($eventQuery);
        if(count($result1) === 1){
            $upQuery = "UPDATE events SET feedback = '$feedback' WHERE nume = '$eventName'";
            $stmt = $conn->prepare($upQuery);
            if($stmt->execute()){
                $resulttxt = 'Multumim pentru timpul acordat!';
                $feedback = null;
                $eventName = null;
            }
        }

        //preluam feedback ul 
        // $eventQuery = "SELECT feedback FROM events WHERE nume=?";
        // $stmt=$conn->prepare($eventQuery);
        // $stmt->bind_param('s',$eventName);
        // $stmt->execute();
        // $result1=$stmt->get_result();

        
    }

}



?>