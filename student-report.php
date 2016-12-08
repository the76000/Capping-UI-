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
		<h1><a class="home-button" href="homepage.html">CPCA</a></h1>
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
					<li><a href="admin-tools-course.html">Courses</a></li>
					<li><a href="attendance-reports.html">Reports</a></li>
					<li><a href="participant-search.html">Search</a></li>
					<li><a href="index.html">Log out</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav> <!-- end of navbar-->



	<!--- main info goes in this div -->
	<div class="container">
		<div class = "jumbotron">
			<div class = "row"> <!-- start row one -->
				<form class="navbar-form" role="search">
					<div class="input-group">
						<input type="text" class="form-control input-lg" placeholder="Search" name="srch-term" id="srch-term" oninput="validateAlpha('srch-term');">
						<div class="input-group-btn ">
							<button class="btn btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
						<!-- CERTAINLY needs a link to the database for search capabilities -->
					</div>
				</form>
			</div> <!-- end row one -->
			<div class="row">
				<div class="col-md-4 input-lg">
					<label>Select option</label>
					<!--Per the template on lucid, this is supposed to be a drop down of different options, but I'm not sure what the options are supposed to be -->
					<select id = "myList">
					<option selected disabled class="hideoption">Select One</option>
						<option value = "1">one</option>
						<option value = "2">two</option>
						<option value = "3">three</option>
						<option value = "4">four</option>
					</select>
				</div>
				<!-- I didnt add any of the form tags to this cause I wasnt sure how we were gonna do it-->
			<div class="col-md-4 input-lg"> Start Date: <input type="date" /></div>
			<div class="col-md-4 input-lg"> End Date: <input type="date" /></div>
			</div>
			
			<!-- we need to php the shit out of this section -->
			<div><h3>Student Name:</h3></div>
			<div><h3>Age:</h3></div>
			<div><h3>Classes Completed:</h3></div>
			<div><h3>Instructor Notes:</h3></div>

			<div class = "row">
				<div class = "col-md-8">
					<!-- filler for whitespace -->
				</div>
				<div class = "col-md-4">
					<button class="btn btn-default " type="submit"><a href="#">Download As Excel Sheet</a></button>
				</div>
			</div>
		</div>

	</div>

<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>
	
</body>
</html>
