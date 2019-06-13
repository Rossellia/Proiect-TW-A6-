<?php
session_start();
require "../config/db.php";
$errors = array();

$limbajQuery = "SELECT * FROM languages WHERE id_user=?";
$stmt=$conn->prepare($limbajQuery);
$stmt->bind_param('s',$_SESSION['id']);
$stmt->execute();
$result=$stmt->get_result();
$userCount=$result->num_rows;
$stmt->close();
// if($userCount == 0){
//         $errors['event'] = "Nu sunt evenimente in apropiere.";
// }
$row= $result->fetch_assoc();
//verificam nivelul utilizatorului la fiecare limbaj
    $nivele = array();
    foreach($row as $linie =>$linie_valoare){
        if($linie != "id_user"){
        if($linie_valoare < "5")
        {
            $nivele[$linie] = "beginner";
        }
        elseif($linie_valoare < "10" && $linie_valoare >= "5"){
            $nivele[$linie] = "mediu";
        }
        elseif($linie_valoare < "15" && $linie_valoare >= "10"){
            $nivele[$linie] = "advanced";
        }
        else{
            $nivele[$linie] = "experienced";
        }
    }
    }

//selectam evenimentele specifice acestuia
$events = array();
foreach($nivele as $limbaj =>$limbaj_valoare){
    $eventQuery = "SELECT * FROM events WHERE nivel=? AND limbaj=?";
    $stmt=$conn->prepare($eventQuery);
    $stmt->bind_param('ss',$limbaj_valoare, $limbaj);
    $stmt->execute();
    $result=$stmt->get_result();
    $stmt->close();
    while($repartitii= $result->fetch_assoc()){
        array_push($events, $repartitii);
    }
}
if(count($events) == 0){
    $errors['event'] = "Nu sunt evenimente in apropiere.";
}

//inscriere la eveniment
if(isset($_POST['inscriere_eveniment']) && $_POST['event_id'] ){
    $eventId = $_POST['event_id'];
    $userId = $_SESSION['id'];

    $registerQuery = "INSERT INTO knowledge (id_user, id_event) VALUES (?, ?)";
    $stmt = $conn->prepare($registerQuery);
    $stmt->bind_param('ii', $userId, $eventId);
    $stmt->execute();
}



?>