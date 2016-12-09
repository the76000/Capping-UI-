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
		
		<title> CPCA Homepage </title>
  </head>
  
  
  <body>
  
  <?php
  
  # Connect to Postgres server and the database
    require( 'includes/connect.php' ) ;
  session_start();
	#check to see if the browser session has logged in.
	if (!isset($_SESSION["username"]) ){
		header('Location: index.php');
		echo "hello";
	}
	
	echo "Username = " . $_SESSION["username"]; 
	//for testing
  ?>
  
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
      <a class="navbar-brand" href="#">Homepage</a>
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


	<div class = "row homepage-row-1"> <!-- row one -->
		
		
		<!-- display CPCA logo -->
		<div class ="logo col-md-4">
			<img src="Images/logo.png" alt="Logo" style="height:200px;width:300px;">
		</div>
		
		
		<!-- display launcher links -->
		<div class = "col-md-8">
		
			<div class = "jumbotron launcher">
			
			
			<div class = "row homepage-links">
				<div class = "col-md-4">
					<a href="participant-search.php"><button class="btn btn-default launcher-links" type="submit"> Participant Search</button></a>
				</div>
				<div class = "col-md-4">
					<a href=" generated-reports.php"><button class="btn btn-default launcher-links" type="submit">Generate Reports</button></a>
				</div>
				
				<div class = "col-md-4">
					<a href=" report-card-search.php "><button class="btn btn-default launcher-links" type="submit">Report Cards</button></a>
				</div>
				
			</div>
			
			<div class = "row homepage-links">
			
				<div class = "col-md-4">
					<a href="Intake/ReferralApp.php"><button class="btn btn-default launcher-links" type="submit">Referral Form</button></a>
				</div>
				
				<div class = "col-md-4">
					<a href="Intake/IntakeApp.php"><button class="btn btn-default launcher-links" type="submit">Intake Packet</button></a>
				</div>
				<div class = "col-md-4">
					<a href="admin-tools.php"><button class="btn btn-default launcher-links" type="submit">Admin Tools</button></a>
				</div>	
			</div>
			
			</div> <!-- end of jumbotron -->
		
		</div> <!-- end of right column -->
		
		
		<div class = "col-md-4">
		
		
		</div>
		
	
	
	
	
	
	</div> <!-- end of row one -->
	
	
	<div class = "row"> <!-- row two -->
		
		
	
		
		<!-- display launcher links -->
		<div class = "col-md-8">
		
			<div class = "jumbotron courses-launcher">
			
			<div class = "row">
			<h3> Courses </h2>
			</div>
			
			
			<div class = "row homepage-links">
				<div class = "col-md-6">
					<button class="btn btn-default course-launcher-links" type="submit"><a href="#">Women's In-House</a></button>
				</div>													<!-- will need to link up to the database -->
				<div class = "col-md-6">
					<button class="btn btn-default course-launcher-links" type="submit"><a href="#">Cornerstone</a></button>
				</div>
			
			</div>
			
			<div class = "row homepage-links">
				<div class = "col-md-6">
					<button class="btn btn-default course-launcher-links" type="submit"><a href="#">Spanish Speaking Women In-House</a></button>
				</div>
				<div class = "col-md-6">
					<button class="btn btn-default course-launcher-links" type="submit"><a href="#">Men's In-house</a></button>
				</div>
				
			</div>
			
			<div class = "row homepage-links">
				<div class = "col-md-6">
					<button class="btn btn-default course-launcher-links" type="submit"><a href="#">Men's DC Jail</a></button>
				</div>
				<div class = "col-md-6">
					<button class="btn btn-default course-launcher-links" type="submit"><a href="#">Meadow Run</a></button>
				</div>
				
			</div>
			
			</div> <!-- end of jumbotron -->
		
		</div> <!-- end of right column -->
		
		<div class = "col-md-4">
		
		
		
		</div>
		
	
	
	
	
	
	</div> <!-- end of row two -->
	
	
	
	
	
	
	  </body>
</html>
