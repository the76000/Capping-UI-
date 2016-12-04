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
		
		<form class="form" role="search">
			<div class = "col-md-3"> 
		
				<div class="input-group">
						<input type="text" class="form-control input-lg" placeholder="first name" name="f_name" id="attendance-f_name" oninput="validateAlpha('attendance-f_name');">
				</div>
			</div>
			<div class = "col-md-3"> 
				<div class="input-group">
					<input type="text" class="form-control input-lg" placeholder="last name" name="l_name" id="attendance-l_name" oninput="validateAlpha('attendance-l_name');">
				</div>
			</div>
			<div class = "col-md-3"> 
				<div class="input-group-btn ">
					<button class="btn btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
				</div>
			</div>
			</form>
		</div>
	
	</div>
	
	</div>
	
	
	</div>

	
	<div class = "container">
	
	
		<div class = "jumbotron">
	
			<div class = "row attendance-reports">
			
			
				<div class = "col-md-4"> 
					<button class="btn btn-lg" type="submit"><a href="individual-attendance-more.php">Filler Name</a></button>
				</div>
				
				
				<div class = "col-md-4"> 
					<button class="btn btn-lg" type="submit"><a href="individual-attendance-more.php">Filler Name</a></button>
				</div>
				
				
				<div class = "col-md-4"> 
					<button class="btn btn-lg" type="submit"><a href="individual-attendance-more.php">Filler Name</a></button>
				</div>
			
			
			
			
			</div>
			
			<div class = "row attendance-reports">
			
			
				<div class = "col-md-4"> 
					<button class="btn btn-lg" type="submit"><a href="individual-attendance-more.php">Filler Name</a></button>
				</div>
				
				
				<div class = "col-md-4"> 
					<button class="btn btn-lg" type="submit"><a href="individual-attendance-more.php">Filler Name</a></button>
				</div>
				
				
				<div class = "col-md-4"> 
					<button class="btn btn-lg" type="submit"><a href="individual-attendance-more.php">Filler Name</a></button>
				</div>
			
			
			
			
			</div>
			
			<div class = "row attendance-reports">
			
			
				<div class = "col-md-4"> 
					<button class="btn btn-lg" type="submit"><a href="individual-attendance-more.php">Filler Name</a></button>
				</div>
				
				
				<div class = "col-md-4"> 
					<button class="btn btn-lg" type="submit"><a href="individual-attendance-more.php">Filler Name</a></button>
				</div>
				
				
				<div class = "col-md-4"> 
					<button class="btn btn-lg" type="submit"><a href="individual-attendance-more.php">Filler Name</a></button>
				</div>
			
			
			
			
			</div>
			
			
			<div class = "row attendance-reports">
			
			
				<div class = "col-md-4"> 
					<button class="btn btn-lg" type="submit"><a href="individual-attendance-more.php">Filler Name</a></button>
				</div>
				
				
				<div class = "col-md-4"> 
					<button class="btn btn-lg" type="submit"><a href="individual-attendance-more.php">Filler Name</a></button>
				</div>
				
				
				<div class = "col-md-4"> 
					<button class="btn btn-lg" type="submit"><a href="individual-attendance-more.php">Filler Name</a></button>
				</div>
			
			
			
			
			</div>
	
	
	
	
			<hr> </hr>
	
		</div>
	
	
	</div>
	
	<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>
	
	
	
	
	
	
	</body>
</html>
