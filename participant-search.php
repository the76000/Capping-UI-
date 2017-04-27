<!-- STATE OF THIS PAGE !-->
<!--
This is a fairly critical part of the site.
Users should be able to easily look up users in the system. 
The searching is pretty rudimentary, you have to spell the names exactly like 
it is stored in the database, it will not find a closest match or anything like that.
It is caps sensitive, so searching for john smith will return no results if the value
in the database is John Smith. You can search for everyone named John, or everyone with the
last name Smith. For disambiguation, the D.O.B is listed after the full name.
This page works in conjuction with searchp.php


Outstanding issues(outside of security):
Caps sensitive search is not intuitive, and suggesting a close match 
for a misspelling could be useful.
Adding a middle name to the search could be useful, but nothing
is really broken on this page. It could be rewritten to be less of a mess,
but outside of that works ok.

 -Colin Ferris 4/27/17
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
		
		<title> CPCA search </title>
  </head>
  
  
  <body>
  
  <?php
  
  # Connect to Postgres server and the database
    include ( 'includes/connect.php' ) ;
	


// Performing SQL query
$query = 'SELECT referrals.ref_f_name, referrals.ref_l_name, participants.* FROM referrals inner join participants on participants.p_num = referrals.p_num';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML




  
  session_start();
	#checks if user is logged in
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
      <a class="navbar-brand" href="#">Participant Search</a>
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

<div class = "row search">


	<!-- launches a different php file -->
	<form class="navbar-form" role="search" action="searchp.php" method="post" >
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

			
</div>	<!-- end of row search -->		






<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>
		
  </body>
</html>
