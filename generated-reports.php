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
				<a class="navbar-brand" href="#">Generate Reports</a>
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
	
	<div class = "row">		
		
		<div class="col-md-4">	
		
			<input type="text" class="form-control input-lg" placeholder="Participant 1" id="reportParticipant1">
			<select multiple class="form-control" id="reportSelect1">
				<option>Attendance</option>
				<option>Birthday</option>
				<option>Courses to complete</option>
			</select>		
		</div>
		<div class="col-md-4">	
			<input type="text" class="form-control input-lg" placeholder="Participant 2" id="reportParticipant2">
			<select multiple class="form-control" id="reportSelect1">
				<option>Attendance</option>
				<option>Birthday</option>
				<option>Courses to complete</option>
			</select>		
		</div>	
		<div class="col-md-4">	
			<input type="text" class="form-control input-lg" placeholder="Participant 3" id="reportParticipant3">
			<select multiple class="form-control" id="reportSelect1">
				<option>Attendance</option>
				<option>Birthday</option>
				<option>Courses to complete</option>
			</select>		
		
		</div>
	
	
	
	</div>
	
	
	
	
	

	
</body>


</html>
	
	
	
	
	
	
	
	
	
	
	
