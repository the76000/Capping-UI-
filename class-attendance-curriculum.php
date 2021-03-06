<!-- STATE OF THIS PAGE !-->
<!--
This is the class attendance report page(s). In this part select a curriculum and then it redirects you to class-attendance.php

Outstanding issues(outside of security):
none afaik

 -Colin Ferris 5/11/17
 !-->



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

	<title> CPCA Report Card </title>
	<?php
		session_start();
		
		if (!isset($_SESSION["username"]) ){
			header('Location: index.php');
		}
	  
	  
		 # Connect to Postgres server and the database
    require( 'includes/connect.php' ) ;
	?>
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
				<a class="navbar-brand" href="#">Report Card</a>
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
		<center><div class="error" id="errorID" style="display:none;"></div></center>
			<h3>Class Attendance Report</h3><br>
			<form onsubmit="return validateInput()" style="margin-left: 15px" action="class-attendance.php" method="post">
				<div class="row">
				<div class="col-sm-4">
						<div class="form-group">
							<label for="sel1">Select A Curriculum:</label> <!-- this is for the 28 indivual classes, not for the course/groups. data mismatch -->
							<select class="form-control" id="sel1" name="curriculumSelect">
							<option selected disabled class="hideoption">Select One</option>
							<?php
							// Performing SQL query
							
							$query = 'SELECT * FROM public.curriculum ORDER BY cid ASC '; //get all of the available curriculums
							
							$result = pg_query($query) or die('Query failed: ' . pg_last_error());
							
							while($row = pg_fetch_array($result)){
								if($row['curriculum_name'] != "No Curriculum"){
									echo "<option value='".$row['curriculum_name']."'>".$row['curriculum_name']."</option>"; //list them as options to be POST
								}								
							}
							
							?>
								
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<br><button type="submit" class="btn btn-default ">Submit</button> 
						</div>
					</div>
			</form>

		</div>

	</div>		
	
	<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>
<script type="text/javascript">
	function validateInput(){
		document.getElementById("errorID").value = ""
		document.getElementById("errorID").style.display = "none";
		
		if(document.getElementById("sel1").value == "Select One"){
			document.getElementById("errorID").innerHTML = "Please select a curriculum";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		
		//If we got here then everything is as it should be
		return true; 
		
	}
</script>
			
</body>
</html>
