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

<!-- NEEDS PHP -->

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
				<a class="navbar-brand" href="#">Remove an Employee</a>
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

<div class = "container">
<h3><center>REMOVE AN EMPLOYEE</center></h3>
<div class="jumbotron login_panel">
<div class= "login_wrapper">


<?php

session_start();
	
	if (!isset($_SESSION["username"]) ){
		header('Location: index.php');
		echo "hello";
	}
  
  
  // Connecting, selecting database
$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());
	
	
	
	$employeequery = "
	SELECT * FROM Employees";
	$employeeresult = pg_query($employeequery) or die('Query failed: ' . pg_last_error());
	
	
	
	
	
	




echo '<!-- this launches another php file --->';
echo  '<form class="form-horizontal" action="post-remove-employee.php" method="post">';
  
echo  '<div class="form-group">';
echo   '<label for="eid3" class="col-sm-4 control-label">Employee</label>';
echo    '<div class="col-sm-8">';

echo      '<select class="form-control" name="eidSelect">';

echo							'<option selected disabled class="hideoption">Select One</option>';

//$nameline = pg_fetch_array($classesnameresult, null, PGSQL_ASSOC);
		//this is the best way to display multiple columns from a query that selects more than one column
				while ($employee_line = pg_fetch_assoc($employeeresult ) ){
				
							
							$employee_col_value_var = $employee_line['eid'];
							
							$employee_col_value_var2 = $employee_line['e_f_name'];
							
							$employee_col_value_var3 = $employee_line['e_l_name'];
						
							
							
echo						"<option value='$employee_col_value_var'>   '$employee_col_value_var2'   '$employee_col_value_var3'</option>"; 
							
								
						
						
						
						

				}
							
echo						'</select>  ';


echo    '</div>';
echo  '</div>';
  

  
echo  '<div class="form-group">';
echo    '<div class="col-sm-offset-2 col-sm-10">';
echo     ' <button type="submit" class="btn btn-default">Remove this Employee</button>';
echo	  '<!-- needs apache/php link to database -->';
echo	  '<!-- Need to add an alert that says "ARE YOU SURE YOU WANT TO DELETE THIS EMPLOYEE FROM THE DATABASE? nah " y/n prompt -->';
echo    '</div>';
echo  '</div>';
  
echo '</form> <!-- end of login form -->';
echo '</div> <!-- end of login wrapper -->';
echo '</div> <!-- end of jumbotron login -->';


?>
</div>	
</body>
</html>