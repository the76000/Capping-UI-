<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"> 

	<!--- this is for bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel='stylesheet' media='screen and (min-width: 701px) and (max-width: 900px)' href='css/mobile.css' />
	<link rel="stylesheet" href="CSS/style.css">

	<title> CPCA Admin Tools </title>
</head>


<body>


<?php
	
session_start();
	
	if (!isset($_SESSION["username"]) ){
		header('Location: index.php');
		echo "hello";
	}
  
  
  // Connecting, selecting database
$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());
	
	
	
	$curriculum_name = $_POST['currname'];
	
	$classes_needed= $_POST['numcomp'];
	
	$classes_total = $_POST['numtot'];
	
	
	
	
	$createcurr = "INSERT INTO Curriculum (curriculum_name,classes_needed,classes_total) VALUES('$curriculum_name ','$classes_needed','$classes_total')";
		
	$result = pg_query($createcurr );
	echo 'Curriculum created';
			
	
	
	
	
	


	
	
	?>




</body>


</html>