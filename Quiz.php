<!DOCTYPE html>
<html>
<head>
	<title></title>
		<title>covid|symptom checker</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
	 <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	
</head>
<style >
	#form1{
		margin: auto;
		width: 50%;
		
		
		
		line-height: 1.5em;
			}
  
	.card-body{
			padding: 4px;
			line-height: 2em;
			border: 0px solid;
			
			width: 30%;
			

			margin: auto;
			text-align: center;
			font-size: 1.3em;
			border-radius: 47%;
			background-color: #D59393;
		}
		.card-body:hover{
			padding-left: 10px;
		
			color: lime;
		}
		.card-header{
			font-size: 1.1em;
		}
		.btn{
			margin-left: 0%;
			background-color: red;
			width: 100%;
			font-size: 1.3em;
			line-height: 1.8em;
		}
		.btn:hover{
			color: lime;
		}
	
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
<br>
<br>


			<div>
				<p style="  margin-left:15%;width: 75%; font-size: 1.3em; font-style: italic;"> "This quiz is made to check the symptom that you have are they really risky or not.
				so if you think you are feeling not well and you need a quick guide so just go through this simple quiz ,it will help you to clear all your doubts regarding to your health. " </p>
			</div>
<br><br><br>
	

<form id="form1" action="check.php" method="post">
<?php
$server="localhost";
$UserName="root";


$connect = mysqli_connect("$server","$UserName");


mysqli_select_db($connect,'covid');
for ($i=1; $i<6 ; $i++) { 
	

$q="select * from questions where qid = $i";
$query=mysqli_query($connect,$q);
 while ($rows = mysqli_fetch_array($query)) {
 	?>
 	<div class="card">
 	<br>
 		<h4 class="card-header"><?php echo $rows['question']?></h4>
 		<?php
 		$q="select * from answer1 where ans_id= $i";
              $query=mysqli_query($connect,$q);
              while ($rows = mysqli_fetch_array($query)) {
 	?>
<br>

 	<div class="card-body">
 		

 		<input type="radio" name="quizcheck[<?php echo $rows['ans_id'];?>]" value="<?php echo $rows['aid'] ;?>">

 		<?php echo $rows['answer']; ?> 

 		
 	</div>

 		

 	
<?php
}
}


}
?>
<br>
<br>
<input type="submit" name="submit" class="btn ">
</form>
<br>
<br>

<br>
<br>
</div>
</body>
</html>