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
    require( 'includes/connect.php' ) ;
	
	// Connecting, selecting database
$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query = 'SELECT referrals.ref_f_name, referrals.ref_l_name, participants.* FROM referrals inner join participants on participants.p_num = referrals.p_num';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML



#returns referral info for testing
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";
  
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


	<!-- launches a different php file -->
	<form class="navbar-form" role="search" action="searchp.php" method="post" >
			<div class="input-group">
				<input type="text" class="form-control input-lg" placeholder="first name" name="f_name" id="srch-term" oninput="validateAlpha('srch-term');">
				<div class="input-group-btn ">
			
			<div class="input-group">
				<input type="text" class="form-control input-lg" placeholder="last name" name="l_name" id="srch-term" oninput="validateAlpha('srch-term');">
				<div class="input-group-btn ">
				
			<div class="input-group">
				<input type="text" class="form-control input-lg" placeholder="particpant number(optional)" name="p_num" id="srch-term" oninput="isNumberKey('srch-term');">
				<div class="input-group-btn ">
				
			
					<button class="btn btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
				</div>
				<!-- CERTAINLY needs a link to the database for search capabilities -->
			</div>
			</form>

			
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


<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>
		
  </body>
</html>
