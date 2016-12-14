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
  
  
   # Connect to Postgres server and the database
    require( 'includes/connect.php' ) ;
	
	
	
	$classname= $_POST['classname'];
	
	$curriculum= $_POST['cidSelect'];
	
	
	
	
	
	
	$createclass = "INSERT INTO class_subjects (class_subject) VALUES('$classname')";
		
	$result = pg_query($createclass );
	
	
	$csubquery = "SELECT c_subject FROM class_subjects where class_subject = '$classname'";
	$csubresult = pg_query($csubquery) or die('Query failed: ' . pg_last_error());
	$csubrow = pg_fetch_array($csubresult, null, PGSQL_ASSOC);
	
	$c_subject = $csubrow['c_subject'];
	
	
	$linkclass= "INSERT INTO curriculum_subjects (c_subject,cid) VALUES('$c_subject','$curriculum') ";
		
	$result = pg_query($linkclass );
	
	
	
	
	echo 'class created';
			
	echo "<a href='homepage.php'> Go Back To The Homepage </a>";
	
	
	
	


	
	
	?>




</body>


</html>