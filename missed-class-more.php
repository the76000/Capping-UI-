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
		
		<title> CPCA search </title>
  </head>
  
  
  <body>
  
  
  
  
  <!-- Top left Logo -->
	<div class="page-header">
  <h1><a class="home-button" href="homepage.php">CPCA</a></h1>
	</div>
	
	<nav class="navbar navbar-default CPCA_navbar">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Participant Search</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
      <ul class="nav navbar-nav navbar-right">
        <li><a href="admin-tools.php">Admin Tools</a></li>
					<li><a href="attendance-reports.php">Reports</a></li>
					<li><a href="participant-search.php">Search</a></li>
					<li><a href="log-out.php">Log out</a></li>   
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav> <!-- end of navbar-->



<?php
  
  
  // Connecting, selecting database
$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());
  
  session_start();
	
	if (!isset($_SESSION["username"]) ){
		header('Location: index.php');
		echo "hello";
	}
	
	echo "Username = " . $_SESSION["username"]; 
	//for testing
	
	// Performing SQL query
	echo $_SESSION["searchp"];
$p_num = $_SESSION["searchp"];
echo $p_num;
$c_a_query = "Select * from class_attendence where p_num = '$p_num'"; // query for all info related to searched participant

//$c_a_query = "Select * from class_attendence ";



$c_a_results = pg_query($c_a_query) or die('Query failed: ' . pg_last_error());
	
	$c_a_row = pg_fetch_array($c_a_results, null, PGSQL_ASSOC); // create array of result 
	
	$p_numDB = $c_a_row['p_num']; // set variable correct row and column of db
	
	echo "$p_numDB";
	
	$class_idDB = $c_a_row['class_id'];
	echo "$class_idDB";
	
	$participant_commentDB = $c_a_row['participant_comment'];
	
	
	$num_of_classes = pg_num_rows($c_a_results) - 1; //bug? idk
	
// Printing results in HTML

// get the class name

$c_s_query = "Select * from classes_scheduled where class_id = '$class_idDB'"; //query classes scheduled table

	$c_s_results = pg_query($c_s_query) or die('Query failed: ' . pg_last_error());
	
	$c_s_row = pg_fetch_array($c_s_results, null, PGSQL_ASSOC); // create array of result
	
	 $c_s_c_subjectDB = $c_s_row['c_subject']; // get the c_subject
	 
	 $classTime = $c_s_row['date_time_schedules'];
	 

$cur_query = "Select * from curriculum_subjects where c_subject = '$c_s_c_subjectDB'"; //query the curriculum table

	$cur_results = pg_query($cur_query) or die('Query failed: ' . pg_last_error());
	
	$cur_row = pg_fetch_array($cur_results, null, PGSQL_ASSOC); // create array of result
	
	$cur_c_subjectDB = $cur_row['c_subject'];
	
	
	

$sub_query = "Select * from class_subjects where c_subject = '$cur_c_subjectDB'"; //query the class subjects  table

	$sub_results = pg_query($sub_query) or die('Query failed: ' . pg_last_error());
	
	$sub_row = pg_fetch_array($sub_results, null, PGSQL_ASSOC); // create array of result
	
	
$className = $sub_row['class_subject']; //hopefully the name of the god damn class


  
  
  
  
  
  
  
  


echo	'<!--- main info goes in this div -->';
echo 	'<div class="container">';

echo		'<div class = "jumbotron">';
		
echo			'<div class = "row"> <!-- start row one -->';
echo				'<div class = "col-md-4"> ';

				
echo					'<p> ';
echo					'Participant Name:';
echo				" $p_numDB ";

echo               '</p>';
					
					
				
echo				'</div>';
				
echo				'<div class = "col-md-4">';
					
echo					'<p> Not Completed Classes </p>';
					
					
				
echo				'</div>';
				
echo				'<div class = "col-md-4">';
					
echo					'<p>';

echo                  " $num_of_classes";
echo                  '   </p>';
					
					
				
echo				'</div>';
				
				
echo			'</div> <!-- end row one -->';
			
	# for each row, generate a class table
while   	($c_a_row = pg_fetch_array($c_a_results, null, PGSQL_ASSOC) )
	
	{
echo		'<div class = "row"> <!-- start row two -->';
				
echo				'<div class = "col-md-12"> 											<!-- six tabs (band aid solution) -->';
echo					'<p class="label label-info" style="white-space: pre;">';
echo                 "	$className ";					

echo                     " $classTime";      

echo                '</p> ';
echo				'</div>';
				
				
				
echo		'</div> <!-- end row two -->';
		
echo		'<div class = "row" > ';
echo			'<div class = "col-md-8"> ';
echo			'<p> ';

echo              " $participant_commentDB";

echo               '</p>';
echo			'</div>';
			
		
echo		'</div>';
	}		
		

		
echo		'<div class = "row">';
		
echo		'<div class = "col-md-4">';
		
echo		'</div>';
		
echo		'<div class = "col-md-4">';
echo				'<!-- placeholder link -->';
echo				'<p><button class="btn btn-default" type="submit"><a href="#">Click for more</a></button></p>';
echo			'</div>';
		
echo		'</div>';
		
		
echo		'<div class = "row">';
		
echo			'<div class = "col-md-4">';
				
echo				'<p><button class="btn btn-default" type="submit"><a href="participant-search-results.php"> <!--- for demo purposes only -->Go back to results</a></button></p>';
echo			'</div>';
echo			'<div class = "col-md-4">';
				
echo				'<!-- filler for whitespace -->';
echo			'</div>';
		
echo			'<div class = "col-md-4">';
				
echo				'<button class="btn btn-default " type="submit"><a href="#">Download As Excel Sheet</a></button>';
				
echo			'</div>';
		
echo		'</div>';
		
		
echo		'</div>';



	
echo	'</div>';
	
	?>
	
  </body>
</html>
