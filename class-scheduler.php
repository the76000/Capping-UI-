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

	<title> CPCA Class Scheduler </title>
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
				<a class="navbar-brand" href="#">Add Class</a>
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
			<h3>Class Attendance Report</h3>
			<form style="margin-left: 15px">
				<div class="row">
				<div class="col-sm-4">
						<div class="form-group">
							<label for="sel1">Select A Curriculum:</label> <!-- this is for the 28 indivual classes, not for the course/groups. data mismatch -->
							<select class="form-control" name = "selected" id="curriculumName">
							<?php
								session_start();
			
								if (!isset($_SESSION["username"]) ){
									header('Location: index.php');
									echo "hello";
								}
							  
							  
								// Connecting, selecting database
								$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
									or die('Could not connect: ' . pg_last_error());

								// Performing SQL query
								$query = 'SELECT * FROM public.curriculum ORDER BY cid ASC ';
								
								$result = pg_query($query) or die('Query failed: ' . pg_last_error());
								
								while($row = pg_fetch_array($result)){
									echo "<option value='".$row['curriculum_name']."'>".$row['curriculum_name']."</option>";
								}
							?>
						</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="usr">Class Name</label>
							<input type="textbox" name="cName" id="cName" class="form-control" >
							<!-- date picker to force data normalcy ---->							
						</div>
					</div>
					</div>
					<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="usr">Start Date:</label>
							<input type="date" name="RCdate" id="dateIds"  class="form-control" id="usr">
							<!-- date picker to force data normalcy ---->							
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="usr">End Date:</label>
							<input type="date" name="RCdate" id="dateIde"  class="form-control" id="usr">
							<!-- date picker to force data normalcy ---->							
						</div>
					</div>
				</div>

				<button type="submit" class="btn btn-default ">Submit</button>    
			</form>

		</div>

	</div>		
</body>
</html>
