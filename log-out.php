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
		
		<title> CPCA Homepage </title>
  </head>
  
  
  <body>
   <?php
  
  # Connect to Postgres server and the database
    require( 'includes/connect.php' ) ;
  session_start();
	#check to see if the browser session has logged in.
	if (!isset($_SESSION["username"]) ){
		header('Location: index.php');
		echo "hello";
	} 
	else{
		unset($_SESSION["username"]);
		unset($_SESSION["username"]);
		
	}
	

  ?>
  
  
  
  
  </body>
  
  
  
 </html>