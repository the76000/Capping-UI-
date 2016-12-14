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
					<li><a href="log-out.php">Log out</a></li>    
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
	<form class="navbar-form" role="search" action="individual-attendance-more.php" method="post" >
			<div class="input-group">
				<input type="text" class="form-control input-lg" placeholder="first name" name="f_name" id="srch-f_name" readonly>
				<div class="input-group-btn ">
			
			<div class="input-group">
				<input type="text" class="form-control input-lg" placeholder="last name" name="l_name" id="srch-l_name" readonly>
				<div class="input-group-btn ">
			
					<button class="btn btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
				</div>
				<!-- CERTAINLY needs a link to the database for search capabilities -->
				
				
			</div>
			</form>
		</div>
	
	</div>
	
	</div>
	<?php
					session_start();
					
					if (!isset($_SESSION["username"]) ){
						header('Location: index.php');
						echo "hello";
					}
				  
				  
					 # Connect to Postgres server and the database
					require( 'includes/connect.php' ) ;
						
					$msg = '';
	
					$l_name = pg_escape_string($_POST['l_name']); #last name entered on participant-search
	
					$f_name = pg_escape_string($_POST['f_name']); #first name entered on participant-search
						
					//if only first name is given
					if($f_name != null && $l_name == null){
						$ref_f_query = "Select * from referrals where ref_f_name = '$f_name'";
					
						$ref_f_results = pg_query($ref_f_query) or die('Query failed: ' . pg_last_error());
					
						$num_rows = pg_num_rows($ref_f_results) ;
						
						if($num_rows == 0 ){
							
							echo ' <p> There are no participants in the system with that first name. </p>';
							
						}
						else{
					
							$ref_f_row = pg_fetch_array($ref_f_results, 0, PGSQL_ASSOC);
						
							echo "This is number of participants with that first name: ";
							echo " $num_rows";						
							
							while ($f_line = pg_fetch_assoc($ref_f_results)){
								
								$f_col_value = $f_line['ref_f_name'];
								
								$l_col_value = $f_line['ref_l_name'];
								
								$p_col_value = $f_line['p_num'];
								
								$dob_col_value = $f_line['dob'];
							
								echo "<form action = 'individual-attendance-more.php' method='post'>";
								echo "$f_col_value ";
								echo "$l_col_value ";
								echo "$dob_col_value";
								
								echo "<button type = 'submit' name = 'participant_num' value = ' $p_col_value  '>  Click Here For Full Results    </button>";
								echo "</form>";
							}							
						}					
					}
					
					//if only last name is given
					if($f_name == null && $l_name != null){
			
						$ref_l_query = "Select * from referrals where ref_l_name = '$l_name'";
					
						$ref_l_results = pg_query($ref_l_query) or die('Query failed: ' . pg_last_error());
					

						$num_rows = pg_num_rows($ref_l_results) ;
						
						if($num_rows == 0 ){
							
							echo ' <p> There are no participants in the system with that last name. </p>';
							
						}
						else{
					
							echo "This is number of results: ";
							echo "$num_rows";
							
							while ($l_line = pg_fetch_assoc($ref_l_results)){			
							
								$f_col_value = $l_line['ref_f_name'];
								
								$l_col_value = $l_line['ref_l_name'];
								
								$p_col_value = $l_line['p_num'];
								
								$dob_col_value = $l_line['dob'];
								
								echo "<form action = 'individual-attendance-more.php' method='post'>";
								echo "$f_col_value ";
								echo "$l_col_value ";
								echo "$dob_col_value";
								echo "<button type = 'submit' name = 'participant_num' value = ' $p_col_value  '>  Click Here For Full Results    </button>";
								echo "</form>";
							}
						}
					}
					
					//if both first and last name are entered
					if($f_name != null && $l_name != null){
						$ref_b_query = "Select * from referrals where ref_l_name = '$l_name' and ref_f_name = '$f_name'";
					
						$ref_b_results = pg_query($ref_b_query) or die('Query failed: ' . pg_last_error());
					

						$num_rows = pg_num_rows($ref_b_results) ;
						
						if($num_rows == 0 ){
							
							echo ' <p> There are no participants in the system with that exact first name and last name. </p>';
							
						}
						else{
					
							echo "This is number of results: ";
							echo "$num_rows";
						
							while ($b_line = pg_fetch_assoc($ref_b_results)){
								
								$f_col_value = $b_line['ref_f_name'];
								
								$l_col_value = $b_line['ref_l_name'];
								
								$p_col_value = $b_line['p_num'];
								
								$dob_col_value = $b_line['dob'];
								
								echo "<form action = 'individual-attendance-more.php' method='post'>";
								echo "$f_col_value ";
								echo "$l_col_value ";
								echo "$dob_col_value";
								echo "<button type = 'submit' name = 'participant_num' value = ' $p_col_value  '>  Click Here For Full Results    </button>";
								echo "</form>";
							}			
						}				
					}								
				?>
	
	</div>
	
	
	<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>
	
	
	
	
	
	
	</body>
</html>
