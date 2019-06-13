<?php 
 require '../config/db.php';
session_start();
 if(!isset($_SESSION['id'])){
  header('location:login.php');
  exit();}
  $lang='';$ok=0;
  if(isset($_POST['Java'])){
  $lang='Java';

 }
  if(isset($_POST['C'])){
    $lang='C';
    }
    if(isset($_POST['HTML'])){
        $lang='HTML';
        }
        if(isset($_POST['CSS'])){
            $lang='CSS';
            }
            if(isset($_POST['JavaScript'])){
                $lang='JavaScript';
                }
                if(isset($_POST['PHP'])){
                    $lang='PHP';
                    }
    if(strcmp($lang,'')!=0){
    $sql="SELECT * FROM statistics WHERE programming_language=?  and id_user=?  ";
      $stmt=$conn->prepare($sql);
      $stmt->bind_param('si',$lang,$_SESSION['id']);
      $stmt->execute();
      $result=$stmt->get_result(); $statistic=$result->fetch_assoc();
      //echo json_encode($statistic);
      $sql1="SELECT * FROM languages WHERE  id_user=?  ";
      $stmt1=$conn->prepare($sql1);
      $stmt1->bind_param('i',$_SESSION['id']);
      $stmt1->execute();
      $result1=$stmt1->get_result(); $statistic1=$result1->fetch_assoc();
      if( $statistic1[$lang]<5)$xx='beginner';
      elseif( $statistic1[$lang]>=5 && $statistic1<10)$xx='experienced';
            else $xx='advanced';
      // $nivel='test1';$xx=$statistic[$nivel];
      if( count($statistic)==0) {$statistic['test1']=0;$statistic['test2']=0;$statistic['test3']=0;$statistic['test4']=0;$statistic['test5']=0;  $xx='beginner';}
      
    }
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Website Layout</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="stat.css">
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Teste', 'Rezultat test'],
         
          ['Test 1',    <?php echo $statistic['test1']?>],  
          ['Test 2',    <?php echo $statistic['test2']?>],  
          ['Test 3',    <?php echo $statistic['test3']?>],  
          ['Test 4',    <?php echo $statistic['test4']?>],  
          ['Test 5',    <?php echo $statistic['test5']?>],  
        
        ]);

        var options = {
          title: 'Test Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {maxValue: 6}
          
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>
<header>
  <h1>See your evolution!</h1>

    <form action="statistics.php" method="post">
  <input type="submit" value="C" name="C">
    </form>
    <form action="statistics.php" method="post">
  <input type="submit" value="HTML" name="HTML">
    </form>
    <form action="statistics.php" method="post">
  <input type="submit" value="CSS" name="CSS">
    </form>
    <form action="statistics.php" method="post">
  <input type="submit" value="JavaScript" name="JavaScript">
    </form>  
    <form action="statistics.php" method="post">
  <input type="submit" value="Java" name="Java">
    </form>
    <form action="statistics.php" method="post">
  <input type="submit" value="PHP" name="PHP">
    </form>
    <form action="mainpage.php" method="post">
  <input type="submit" value="Back to home" >
    </form>
</header>


<div class="statistics">



   <?php if(strcmp($lang,'')!=0): ?>
<?php echo "<br><br><h2>Here are the results for $lang : your level is -> $xx</h2>" ;?>
   <div id="chart_div" style="width: 95%; height: 500px; margin-left:50px;margin-right:60px; "></div>
  <?php endif;?>


    
      
</div>

</body>
</html>
