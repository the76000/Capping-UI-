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
	
	
	
	
	<div class = "container">
	
	
	<div class = "jumbotron">
	<div class = "row search">
		
		<div class = "col-md-4" style="padding-top: 15px;"> 
			<p class="label label-info"> Individual Attendance  </p>
		</div>
		
		<!-- i have no idea why this looks wonky, need to come back to thise 
		//Added a 15px padding as a fix.  Looks fine, shouldn't have issues.  If there's any other solution feel free to change it -Kevin
		-->
		
		<div class = "col-md-8">
		
	
	<!-- launches a different php file -->
	<form class="navbar-form" role="search" action="individual-attendance.php" method="post" >
			<div class="input-group">
				<input type="text" class="form-control input-lg" placeholder="first name" name="f_name" id="srch-f_name" oninput="validateAlpha('srch-f_name');">
				<div class="input-group-btn ">
			
			<div class="input-group">
				<input type="text" class="form-control input-lg" placeholder="last name" name="l_name" id="srch-l_name" oninput="validateAlpha('srch-l_name');">
				<div class="input-group-btn ">
				<!--
			<div class="input-group">
				<input type="text" class="form-control input-lg" placeholder="participant number(optional)" name="p_num" id="srch-p_num" oninput="isNumberKey('srch-p_num');">
				<div class="input-group-btn ">
				-->
			
					<button class="btn btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
				</div>
				<!-- CERTAINLY needs a link to the database for search capabilities -->
			</div>
			</form>
		</div>
	
	</div>
	
	</div>
	
	
	</div>
	
	<?php
session_start();
	#checks if user is logged in
	if (!isset($_SESSION["username"]) ){
		header('Location: index.php');
		echo "hello";
	}
	#connect to database
	$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());
	
	
	
//if ((isset($_POST['submit'])) == 1){ 

			$l_name = pg_escape_string($_POST['l_name']); #last name entered on participant-search
	
	$f_name = pg_escape_string($_POST['f_name']); #first name entered on participant-search
	
	
	
	$msg = '';
	

	
	//$p_num = pg_escape_string($_POST['p_num']); # participant number entered
	
	
	//if number isnt entered
	
	
	/*
	
	if($p_num != null){
		
		echo "im set";
		
	
	
	$query = "Select * from referrals inner join participants on participants.p_num = referrals.p_num  where participants.p_num = '$p_num'"; //select all rows from participants where
	
	$results = pg_query($query) or die('Query failed: ' . pg_last_error());
	
	$numrows = 'SELECT count(*) AS exact_count FROM employees'; #this will not scale well
	
	$row = pg_fetch_array($results, 0, PGSQL_ASSOC);
	
	
	
	
								
	$p_numDB = $row['p_num'];
	echo "pnumdb";
	echo "$p_numDB";
	
	
	$l_nameDB2 = $row['ref_l_name'];
	
	$f_nameDB2 = $row['ref_f_name'];
	
		// Check to see if the credentials are right
		if($p_num == $p_numDB){
			
			$_SESSION['searchp'] = $p_numDB;
			
			$_SESSION['l_name'] =  $l_nameDB2 ;

			$_SESSION['f_name'] =  $f_nameDB2 ;
			
			$testvar = $_SESSION['searchp'];
			
			echo "pnumsession";
			echo "$testvar";
			
			echo "<a href='participant-search-results.php'> $p_numDB  $f_name   $l_name</a>";
			//header('Location: http://localhost:8080/participant-search.php');
			
			// Crawling in my skin here
			
			
			

			
			
			
		}else{
			echo "<h1>Error: User not found.</h1>";
		}				
			
	
	}else{	

*/	
	//if only first name is given
	if($f_name != null && $l_name == null){
		$ref_f_query = "Select * from referrals where ref_f_name = '$f_name'";
	
		$ref_f_results = pg_query($ref_f_query) or die('Query failed: ' . pg_last_error());
	

	
		$ref_f_row = pg_fetch_array($ref_f_results, 0, PGSQL_ASSOC);
		// if number of rows is more than one
	
		$num_rows = pg_num_rows($ref_f_results) ;
	
		echo "this is number of results";
		echo "$num_rows";
		
	

		
		
		//echo "$first_names";
	
		
		
		while ($f_line = pg_fetch_assoc($ref_f_results)){
    

			
		
		
		//$p_numDB = $ref_row['p_num'];
		
		
			$f_col_value = $f_line['ref_f_name'];
			
			$l_col_value = $f_line['ref_l_name'];
			
			$p_col_value = $f_line['p_num'];
			
			$dob_col_value = $f_line['dob'];
			
			
	
		
		
		echo "<form action = 'individual-attendance-more.php' method='post'>";
		echo "$f_col_value ";
		echo "$l_col_value ";
		echo "$dob_col_value";
		echo "<input type = 'submit' name = 'participant_num'  value = ' $p_col_value  '/>";
		//echo  "<a href='participant-search-results.php?add=clicked'>$f_col_value   $l_col_value $p_col_value </a>";
		echo "</form>";
		
		
			
		
				}
			
		
	
	
	
	
	}
	
	//if only last name is given
	
	if($f_name == null && $l_name != null){
		
		$ref_l_query = "Select * from referrals where ref_l_name = '$l_name'";
	
		$ref_l_results = pg_query($ref_l_query) or die('Query failed: ' . pg_last_error());
	

	
		$ref_l_row = pg_fetch_array($ref_l_results, 0, PGSQL_ASSOC);
		// if number of rows is more than one
	
		$num_rows = pg_num_rows($ref_l_results) ;
	
		echo "this is number of results";
		echo "$num_rows";
		
	

		
		
		//echo "$first_names";
	
		
		
		while ($l_line = pg_fetch_assoc($ref_l_results)){
    

			
		
		
		//$p_numDB = $ref_row['p_num'];
		
		
			$f_col_value = $l_line['ref_f_name'];
			
			$l_col_value = $l_line['ref_l_name'];
			
			$p_col_value = $l_line['p_num'];
			
			$dob_col_value = $l_line['dob'];
			
			
	
		
		
		echo "<form action = 'participant-search-results.php' method='post'>";
		echo "$f_col_value ";
		echo "$l_col_value ";
		echo "$dob_col_value";
		echo "<input type = 'submit' name = 'participant_num'  value = ' $p_col_value  '/>";
		//echo  "<a href='participant-search-results.php?add=clicked'>$f_col_value   $l_col_value $p_col_value </a>";
		echo "</form>";
		
		
			
		
				}
			
		
	
	
	
	
	}
	
	
	//if both first and last name are entered
	if($f_name != null && $l_name != null){
		$ref_b_query = "Select * from referrals where ref_l_name = '$l_name' and ref_f_name = '$f_name'";
	
		$ref_b_results = pg_query($ref_b_query) or die('Query failed: ' . pg_last_error());
	

	
		$ref_b_row = pg_fetch_array($ref_b_results, 0, PGSQL_ASSOC);
		// if number of rows is more than one
	
		$num_rows = pg_num_rows($ref_b_results) ;
	
		echo "this is number of results";
		echo "$num_rows";
		
	

		
		
		//echo "$first_names";
	
		
		
		while ($b_line = pg_fetch_assoc($ref_b_results)){
    

			
		
		
		//$p_numDB = $ref_row['p_num'];
		
		
			$f_col_value = $b_line['ref_f_name'];
			
			$l_col_value = $b_line['ref_l_name'];
			
			$p_col_value = $b_line['p_num'];
			
			$dob_col_value = $b_line['dob'];
			
			
	
		
		
		echo "<form action = 'participant-search-results.php' method='post'>";
		echo "$f_col_value ";
		echo "$l_col_value ";
		echo "$dob_col_value";
		echo "<input type = 'submit' name = 'participant_num'  value = ' $p_col_value  '/>";
		//echo  "<a href='participant-search-results.php?add=clicked'>$f_col_value   $l_col_value $p_col_value </a>";
		echo "</form>";
		
		
			
		
				}
			
		
	
	
	
	
	}
	
	//}
	
	?>
	<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>
	
	
	
	
	
	
	</body>
</html>
