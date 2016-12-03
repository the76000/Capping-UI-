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
session_start();
	
	if (!isset($_SESSION["username"]) ){
		header('Location: index.php');
		echo "hello";
	}
	
	$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());
	
		
	
	
	
	$msg = '';
	
	$l_name = pg_escape_string($_POST['l_name']);
	
	$f_name = pg_escape_string($_POST['f_name']);
	
	$p_num = pg_escape_string($_POST['p_num']);
	
	
	
	if($p_num == null){
		$p_num = 0; //dummy value
		echo "im null";
		
	} else{
		echo "im set testing";
	}
	
	
	$query = "Select * from participants inner join referrals on participants.p_num = referrals.p_num  where participants.p_num = '$p_num'";
	
	$results = pg_query($query) or die('Query failed: ' . pg_last_error());
	
	$numrows = 'SELECT count(*) AS exact_count FROM employees'; #this will not scale well
	
	$row = pg_fetch_array($results, 0, PGSQL_ASSOC);
	
	
	
	
								
	$p_numDB = $row['p_num'];
	
	
	$l_nameDB2 = $row['l_name'];
	
	$f_nameDB2 = $row['f_name'];
	
		// Check to see if the credentials are right
		if($p_num == $p_numDB){
			
			$_SESSION["searchp"] = $p_numDB;
			
			$_SESSION['l_name'] =  $l_nameDB2 ;

			$_SESSION['f_name'] =  $f_nameDB2 ;
			
			echo "<a href='participant-search-results.php'> $p_numDB  $f_name   $l_name</a>";
			//header('Location: http://localhost:8080/participant-search.php');
			
			// Crawling in my skin here
			
			
			

			
			
			
		}else{
			echo "<h1>Error: User not found.</h1>";
		}				
			
	
			
	$ref_query = "Select * from referrals where ref_l_name = '$l_name' and ref_f_name = '$f_name'";
	
	$ref_results = pg_query($ref_query) or die('Query failed: ' . pg_last_error());
	

	
	$ref_row = pg_fetch_array($ref_results, 0, PGSQL_ASSOC);
	// if number of rows is more than one
	
	$num_rows = pg_num_rows($ref_results) - 1;
	
	$p_numDB = $ref_row['p_num'];
	
	
	
	
	
	$l_nameDB = $ref_row['ref_l_name'];
	
	$f_nameDB = $ref_row['ref_f_name'];
	
	
	
	//$dupliate_name = 0;
	
		// Check to see if the credentials are right
		if($l_name == $l_nameDB && $f_name == $f_nameDB){
			
			
			
			$num_rows = pg_num_rows($ref_results);
			
		
		
			
			
			
			$_SESSION['l_name'] =  $l_nameDB ;

			$_SESSION['f_name'] =  $f_nameDB ;
			
			$_SESSION['searchp'] =  $ref_row['p_num'] ;
			
			
	
			
			echo  "<a href='participant-search-results.php?add=clicked'>$f_nameDB $l_nameDB </a>";
			//header('Location: http://localhost:8080/participant-search.php');
			
			// Crawling in my skin here
			
			
			

			
			
			
		}else{
			echo "<h1>Error: User not found.</h1>";
		}	
		

/* i will get to this -- COLIN
if ($_GET['add'] == 'clicked'){
	$_SESSION['l_name'] =  $l_nameDB ;

	$_SESSION['f_name'] =  $f_nameDB ;
	


}	
*/			
	
	
								
	
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
      <a class="navbar-brand" href="#">Particpant Search</a>
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

<div class = "row search">
<!--
	<form class="navbar-form" role="search" action="includes/searchp.php" method="post" >
			<div class="input-group">
				<input type="text" class="form-control input-lg" placeholder="Search" name="p_num" id="srch-term">
				<div class="input-group-btn ">
					<button class="btn btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
				</div>
				
			</div>
			</form>
-->
			
</div>	<!-- end of row search -->		





<div class = "row search-links">
<div class="page-header">
  <h2>Recently Viewed</h2>
	</div>

		<div class ="participant-result-names col-md-8">
		
				<div class = "col-md-2">
				<button class="btn btn-lg" type="submit"><a href="participant-search-results.php" <!-- this is for demo purposes -->Filler Name</a></button>
														<!-- needs to be generated from the database -->
				</div>
		
				<div class = "col-md-2">
				<button class="btn btn-lg" type="submit"><a href="#">Filler Name</a></button>
				</div>
		
				<div class = "col-md-2">
				<button class="btn btn-lg" type="submit"><a href="#">Filler Name</a></button>
				</div>
		</div>	



</div>



		
  </body>
  
  
  </html>
	