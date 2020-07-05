<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<style type="text/css">
  span{
    text-align: center;
  }
</style>
<body>




<?php
$server="sql212.epizy.com";
$UserName="epiz_26108998";
$password="1234567890@A";
$HostName="epiz_26108998_covid19ind";
$connect = mysqli_connect("$server","$UserName", "$password","$HostName");


mysqli_select_db($connect,'covid');
if (isset($_POST['submit'])) { 
  if (empty($_POST['quizcheck'])) {
    echo "Please answer atleast one question.";
    # code...
  }


  if (!empty($_POST['quizcheck'])) {


    $count = count($_POST['quizcheck']);



    $result=0;
    $i=1;

    $selected =$_POST['quizcheck'];
  

    $q = "select * from questions";
    $query=mysqli_query($connect,$q);

    while($rows = mysqli_fetch_array($query)) {
      $checked = $rows['ans_id'] == $selected[$i];
     
      if($checked){

        $result++;
      }
      $i++;

    }
   
    if ($result==5) {
      echo "<span >Risk of covid is High . please contact to your nearest hospital</span> ";

      # code...
    }
    elseif ($result < 5 and $result > 2) {
      echo "<h2>Risk of covid is Medium ,but consult a doctor once</h2> ";
      # code...
    }
    else{
      echo "<h2 >Risk of covid is low, No need to get panic </h2> ";
    }
  }
  
}
?>
<h2 style="text-align: center;">Thanks for taking the quiz:)</h2>
<br>

<a href="Quiz.php "> click here to go back</a>
<br>
<a href="indiacorona.php "> click here to go to home page</a>
</body>
</html>