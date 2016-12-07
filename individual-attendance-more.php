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

	<title> CPCA attendance </title>
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
				<a class="navbar-brand" href="#">Attendance Reports</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav navbar-right">
					<li><a href="admin-tools.php">Admin Tools</a></li>
					<li><a href="attendance-reports.php">Reports</a></li>
					<li><a href="participant-search.php">Search</a></li>
					<li><a href="index.php">Log out</a></li>   
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav> <!-- end of navbar-->
	
	
	<?php
	
		
	// Connecting, selecting database
$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());
	
	session_start();
	#checks if user is logged in
	if (!isset($_SESSION["username"]) ){
		header('Location: index.php');
		echo "hello";
	}
	
	echo "Username = " . $_SESSION["username"]; 
	//for testing
	
	
	
	$pnum = $_POST['participant_num_attended']; //from individual-attendance
	echo "$pnum";
	
	
	
	
	$participantinfoquery = "
	SELECT DISTINCT referrals.ref_f_name, referrals.ref_l_name, participants.cid 
	FROM referrals, participants 
	WHERE participants.p_num = '$pnum '";
	
	
	$participantinforesult = pg_query($participantinfoquery) or die('Query failed: ' . pg_last_error());
	$participantinforow = pg_fetch_array($participantinforesult, 0, PGSQL_ASSOC);
	
	
	
echo 	'<div class = "container">	';
echo		'<div class = "row">';
		
		
		
echo		'<div class = "jumbotron">';
echo		'<div class = "col-md-4"> ';
echo			'<p class="label label-info"> Individual Attendance  </p>';
			
echo		'</div>';
		
echo		'<div class = "col-md-4"> ';
echo			'<p> Name: _______ </p>';
echo		'</div>';
		
echo		'<div class = "col-md-4"> ';
echo			'<p> Curriculum: _______ </p>';
echo		'</div>';
		
echo 			'<table class="table">';
echo    '<thead>';
echo      '<tr>';
        
       
echo        '<th>Class</th>';
echo 		'<th>Attended?</th>';
echo 		'<th>Comments</th>';
echo      '</tr>';
echo    '</thead>';
echo    '<tbody>';
echo     '<tr>';
echo       '<td>Class #1</td>';
echo        '<td>Yes</td>';
echo        '<td>None</td>';
       
echo      '</tr>';
echo     '<tr>';
echo        '<td>Class #2</td>';
echo        '<td>No</td>';
echo        '<td>Participant gave no excuse, did not show</td>';
    
echo     '</tr>';
echo      '<tr>';
echo        '<td>CLass #3</td>';
echo        '<td>Yes</td>';
echo        '<td>None</td>';
   
echo      '</tr>';
echo    '</tbody>';
echo  '</table>';
		
		
		
echo			'</div>';
		

		
		
			
echo		'<div class = "col-md-6"> ';
		
		
		
echo		'</div>';
	
	
echo	'</div>';
		
	
	
echo '</div>		';

?>
	
	
	
	
	
	
	
	
</body>


</html>
