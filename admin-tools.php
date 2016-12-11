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
				<a class="navbar-brand" href="#">Admin Tools</a>
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
	
	<div class = "row">
		
		
		
		<div class = "container">

			<div class = "row">

				<a href="admin-tools-course.php"><button class="btn btn-default course-launcher-links" type="submit"><b>Change a Curriculum/Schedule</button></a>

				<a href="class-scheduler.php"><button class="btn btn-default course-launcher-links" type="submit"><b>Schedule a Class</b></button></a>

				<a href="#"><button class="btn btn-default course-launcher-links" type="submit"><b>Change Attendance Record</b></button></a>
				
				<a href="participant-add.php"><button class="btn btn-default course-launcher-links" type="submit"><b>Enter a Participant Into the System</b></button></a>
				
				<a href="employee-portal.php"><button class="btn btn-default course-launcher-links" type="submit"><b>Add/Delete/Update Employee</b></button></a>
				
				<a href="curriculum-add.php"><button class="btn btn-default course-launcher-links" type="submit"><b>Add A New Curriculum</b></button></a>
				
				<a href="subject-add.php"><button class="btn btn-default course-launcher-links" type="submit"><b>Add A Class Subject</b></button></a>
		
			</div>
			
		
		
		
		</div>
	
	
	
	
	</div>

	
	
	
	

	
</body>


</html>
	
	
	
	
	
	
	
	
	
	
	
