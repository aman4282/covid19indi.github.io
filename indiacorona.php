<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
	 <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
  margin-top: 7%;
}
table, th, td {
  border: transparent;
}

th, td {
  padding: 8px;
  text-align: left;

}
tr:nth-child(even) {background-color: #f2f2f2;}


</style>
<body>
	    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
  <div class="sidebar">
	     <header>Menu</header>
  <ul>
<li><a href="indiacorona.php"><i class="fas fa-qrcode"></i>Home</a></li>
<li><a href="safety.html"><i class="fas fa-link"></i>Precautions</a></li>
<li><a href="Quiz.php"><i class="fas fa-stream"></i>Quiz</a></li>

<li><a href="About.html"><i class="far fa-question-circle"></i>About</a></li>

<li><a href="Contact.html"><i class="far fa-envelope"></i>Helpline</a></li>
</ul>
</div>
        <br>
        <br>
        <h1 style="text-align: center;">INDIA COVID-19 LIVE STATUS ..</h1>

		
	
	

<?php

$data = file_get_contents('https://api.covid19india.org/data.json');
$coranalive = json_decode($data, true);

$statescount = count($coranalive['statewise']);










?>

<p style="text-align: center; color: yellow;">lastupdatedtime <?php echo $coranalive['statewise']['0']["lastupdatedtime"] ?><i  class="fa fa-bell" aria-hidden="true"></i></p>
<table style="width: 60%; margin-left: 20%; margin-top: 0%;  " >
	<tr style="font-size:1.5em;">
		<th style="color: red;">Total confirmed</th>
	    <th style="color: blue;">Total active</th>
	  	<th style="color: green;">Total recovered</th>
		<th style="color: red;">Total deaths</th>
    </tr>
    <tr style="font-size:1.2em; background-color: silver; " >
		<td style="color: red;  " ><?php echo $coranalive['statewise']['0']['confirmed'] ?></td>
		<td style="color: blue;" ><?php echo $coranalive['statewise']['0']['active'] ?></td>
	    <td style="color: green;"><?php echo $coranalive['statewise']['0']['recovered'] ?></td>
	  	
		<td style="color: red;"><?php echo $coranalive['statewise']['0']['deaths'] ?></td>
    </tr>


</table>

	
        <table >

        
		
			<tr>
				<th class="text-capitalize">States</th>
				<th class="text-capitalize">Confirmed</th>
				<th class="text-capitalize">Active</th>
				<th class="text-capitalize">Recovered</th>
				<th class="text-capitalize">Deaths</th>
			</tr>

<?php
$i=1;




while ($i < $statescount) {

?>

		<tr>
		    <td><?php  echo $coranalive['statewise'][$i]['state'] ?></td>
		    <td><?php  echo $coranalive['statewise'][$i]['confirmed'] ?></td>
		    <td><?php  echo $coranalive['statewise'][$i]['active'] ?></td>
		    <td><?php  echo $coranalive['statewise'][$i]['recovered'] ?></td>
		    <td><?php  echo $coranalive['statewise'][$i]['deaths'] ."<br>";?></td>
	    </tr>

<?php

  $i++;
}





?>
</table>
</body>
</html>