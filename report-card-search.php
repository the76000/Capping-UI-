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
		
		<title> CPCA Report Card </title>
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
      <a class="navbar-brand" href="#">Report Card Search</a>
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

	<form class="navbar-form" role="search" action="report-card-searchp.php" method="post" >
			<div class="input-group">
				<input type="text" class="form-control input-lg" placeholder="Search" name="p_num" id="srch-term">
				<div class="input-group-btn ">
					<button class="btn btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
				</div>
				<!-- CERTAINLY needs a link to the database for search capabilities -->
			</div>
			</form>

			
</div>	<!-- end of row search -->		

<hr> </hr>

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
$query = 'SELECT * FROM participants';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML


 $curr_query3 = 'SELECT curriculum_name FROM curriculum';
 $curr_result3 = pg_query($curr_query3) or die('Query failed: ' . pg_last_error());


  
  
  
  

echo '<div class = "container">';

echo	'<div class="form-group ">';
echo			'<form action="report-card-search.php" method="post">';
echo				  '<label for="sel1">Select A Curriculum:</label> <!-- this is for the 28 indivual classes, not for the course/groups. data mismatch -->';
echo				  '<select name="CURRICULUM" class="form-control" id="sel1">';
				  
				  
					while ($line = pg_fetch_array($curr_result3, null, PGSQL_ASSOC)) {
						
						foreach ($line as $col_value) {
							echo "<option value= '$col_value'>";
							echo "$col_value";
						}
							echo "</option>";
							}
							
							
					
					
					
echo				  '</select>';
echo				'<button class="btn btn-lg" type="submit" name="submit"> Submit </button>';
echo				'</div>';
echo				'</form>';


if ((isset($_POST['submit'])) == 1){
	echo "test";
	$value_select = $_POST['CURRICULUM'];
	
	$_SESSION['curr_name'] = $value_select;
	echo "$value_select";




	$curr_picked = $value_select;
  
  
	
	echo "Username = " . $_SESSION["username"]; 
	//for testing
	
 
 $curr_query = 'SELECT curriculum_name FROM curriculum';
 $curr_result = pg_query($curr_query) or die('Query failed: ' . pg_last_error());
 //$row = pg_fetch_array($result, null, PGSQL_ASSOC);
 

 
 $curr_query2 = "SELECT CID FROM curriculum where curriculum_name = '$curr_picked'";
 $curr_result2 = pg_query($curr_query2) or die('Query failed: ' . pg_last_error());
 $curr2_row = pg_fetch_array($curr_result2, null, PGSQL_ASSOC);
 
  $cidDB = $curr2_row['cid'];
 
 echo "$cidDB";
 
 $part_query = 'SELECT p.p_num FROM participants p inner join curriculum c on c.cid = p.cid inner join referrals r on r.p_num =p.p_num where p.cid = c.cid ';
 $part_result = pg_query($part_query) or die('Query failed: ' . pg_last_error());
 $part_row = pg_fetch_array($part_result, null, PGSQL_ASSOC);
 
 $part_query2 = 'SELECT c.cid FROM participants p inner join curriculum c on c.cid = p.cid inner join referrals r on r.p_num =p.p_num where p.cid = c.cid ';
 $part_result2 = pg_query($part_query2) or die('Query failed: ' . pg_last_error());
 $part_row2 = pg_fetch_array($part_result2, null, PGSQL_ASSOC);
 
 
 while (($line = pg_fetch_array($part_result, null, PGSQL_ASSOC)) and ($line2  = pg_fetch_array($part_result2, null, PGSQL_ASSOC))) {
					
					
echo 				'<table class = "table">';
						echo "<thead>";
						echo "<tr>";
						echo "<th> PNUM </th>";
						echo "<th> CID </th>";
						
						

						foreach ($line as $pnumvalue ) {
						
							foreach ($line2 as $cidvalue){
							
							echo "<tr>";
							echo "<td>";
							echo "$pnumvalue";
							echo "</td>";
							echo "<td>";
							echo "$cidvalue";
							echo "</td>";
							echo "<td>";
							echo "<form action = 'report-card.php' method='post'>";
							 
							#echo "<option name = 'participant_selected' value = '$pnumvalue'> Go to report card  </option>";
							echo "<input type = 'submit' name = 'participant_name'  value = '$pnumvalue'/>";
							echo "</form>";
							
							#$_SESSION['report_card_part'] = $_POST['participant_name'];
							
							echo "</td>";
							
							echo "</tr>";
							}
						}
							echo "</table>";
							}
							
							
 
 
 
}
  




?>


		
  </body>
</html>