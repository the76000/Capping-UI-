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
	
	
	
	$pnum = $_POST['pnumSelect'];
	
	
	
	
	$deleteparticpant = "DELETE FROM participants where p_num = '$pnum'";
		
	$partresult = pg_query($deleteparticpant );
	echo 'Participant deleted from participant table';
	
	
	$deleteintake = "DELETE FROM participant_intake where p_num = '$pnum'";
		
	$intakeresult = pg_query($deleteintake );
	echo 'Participant deleted from intake table';
	
	
	$deletehouse = "DELETE FROM ref_household_info where p_num = '$pnum'";
		
	$houseresult = pg_query($deletehouse );
	echo 'Participant deleted from household_info table';
	
	$deleteindiv = "DELETE FROM ref_indiv_condition where p_num = '$pnum'";
		
	$indivresult = pg_query($deleteindiv );
	echo 'Participant deleted from indiv_condition table';
	
	
	
	$deleteagen = "DELETE FROM other_agencies where p_num = '$pnum'";
		
	$agenresult = pg_query($deleteagen );
	echo 'Participant deleted from other_agencies table';
	
	
	$deleteref = "DELETE FROM referrals where p_num = '$pnum'";
		
	$partref = pg_query($deleteref );
	echo 'Participant deleted from referrals table';
	
			
	echo "<a href='homepage.php'> Go Back To The Homepage </a>";
	
	
	
	


	
	
	?>




</body>


</html>