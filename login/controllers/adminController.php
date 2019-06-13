<?php 
require "../config/db.php";

$html = file_get_contents("https://www.softlead.ro/evenimente-it-c");
$list = explode('<div id="event_div"', $html);
//selectam evenimentele din bd, pentru a evita dublurile
$eventQuery = "SELECT nume FROM events";
$stmt = $conn->prepare($eventQuery);
$stmt->execute();
$result1 = $stmt->get_result();
$numeE = array();
while($row1 = $result1->fetch_assoc()){   
    array_push($numeE,$row1);
}

//preluam informatiile despre evenimente
for($i = 1; $i < sizeof($list); $i++) {
    $element = $list[$i];
    
    $title0 = explode('<h2 class="font-22 mar-bottom-0 text-dark">', $element)[1];
    $title = explode('</h2>', $title0)[0];

    $img0 = explode('<img id="event_avatar" src="', $element)[1];
    $img = 'https://www.softlead.ro' . explode('"', $img0)[0];

    $desc0 = explode('t-16 text-dark mar-top-10"> ', $element)[1];
    $desc = explode('</p>', $desc0)[0];

    $ok=1;
    for($j=0; $j < count($numeE); $j++){
        if($title == $numeE[$j]['nume']){
            $ok=0;
        }
    }

    //inseram in bd 
    //echo $title;
    if($ok == 1){
        $eventQuery = "INSERT INTO events (nume, descriere) VALUES (?, ?)";
        $stmt = $conn->prepare($eventQuery);
        $stmt->bind_param('ss', $title, $desc);
        $stmt->execute();
        echo "DA";
    }
    


}



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
// die();
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
        <?php print_r($events);
        ?>


</body>

</html>
