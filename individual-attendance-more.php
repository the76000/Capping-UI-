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
?>
	
	
 	<div class = "container">
		<div class = "row">
		
		
		
		<div class = "jumbotron">
		<div class = "col-md-4"> 
			<p class="label label-info"> Individual Attendance  </p>
			
		</div>
		
		<div class = "col-md-4">
			<p> Name:

           "firsName"
            "lastName"
        </p>
		</div>
		
		<div class = "col-md-4">
			<p> Curriculum:

         cidDB</p>
		</div>
		
 			<table class="table">
    <thead>
      <tr>
        
       
        <th>Class</th>
 		<th>Attended?</th>
 		<th>Comments</th>
      </tr>
    </thead>
    <tbody>
     <tr>
       <td>Class #1</td>
        <td>Yes</td>
        <td>None</td>
       
      </tr>
     <tr>
        <td>Class #2</td>
        <td>No</td>
        <td>Participant gave no excuse, did not show</td>
    
     </tr>
      <tr>
        <td>CLass #3</td>
        <td>Yes</td>
        <td>None</td
   
      </tr>
    </tbody>
  </table>
		
		
		
			</div>
		

		
		
			
		<div class = "col-md-6">
		
		
		
		</div>
	
	
	</div>
		
	
	
 </div>
	
	
	
	
	
	
	
</body>


</html>
