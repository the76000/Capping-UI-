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
	
	echo '<div class="logout-placeholder-div col-md-12"<h3>You have been logged out</h3></div>';
	echo '<div class="placement-div col-md-4"></div> <div class="logout-div col-md-6"> <a href="index.php"><button id="logout-button" class="btn btn-default launcher-links" type="submit"> Back to Login: </button></a></div>';
	

  ?>
  
  <!-- display CPCA logo -->
			<p>
			<center><img src="Images/logo.png" alt="Logo" style="height:200px;width:300px;"></br>
			35 Van Wagner Road</br>
			Poughkeepsie, New York 12603</br>
			(845) 454-0595</br>
			</center>
			</p>
  
  
  </body>
  
  
  
 </html>