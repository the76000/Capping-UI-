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
				<a class="navbar-brand" href="#">Add a Participant</a>
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
<!-- So I hear you hired a new employee. Congratz! Well this is where the magic happens, and by magic I mean HTML. Cause this is the language I know.... -->	

<div class = "container">
<h3><center>ADD A PARTICIPANT (PARTICIPANT MUST HAVE FILLED OUT AN INTAKE AND REFERRAL FORM AND SUBMITTED)</center></h3>
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
	
	
	$refquery = "
	SELECT * FROM referrals";
	$refresult = pg_query($refquery) or die('Query failed: ' . pg_last_error());
	
	
	$curquery = "
	SELECT * FROM curriculum";
	$curresult = pg_query($curquery) or die('Query failed: ' . pg_last_error());






echo '<!-- this launches another php file --->';
echo  '<form class="form-horizontal" action="post-participant-add.php" method="post">';
  
echo  '<div class="form-group">';
echo    '<label for="inputFirstName3" class="col-sm-4 control-label">Participant</label>';
echo    '<div class="col-sm-8">';


echo      '<select class="form-control" name="pnumSelect">';

echo							'<option selected disabled class="hideoption">Select One</option>';

//$nameline = pg_fetch_array($classesnameresult, null, PGSQL_ASSOC);
		//this is the best way to display multiple columns from a query that selects more than one column
				while ($participant_line = pg_fetch_assoc($refresult ) ){
				
							
							$participant_col_value_var = $participant_line['p_num'];
							
							$participant_col_value_var2 = $participant_line['ref_f_name'];
							
							$participant_col_value_var3 = $participant_line['ref_l_name'];
							
							$participant_col_value_var4 = $participant_line['dob'];
						
							
							
echo						"<option value='$participant_col_value_var'>   '$participant_col_value_var2'   '$participant_col_value_var3' '$participant_col_value_var4'</option>"; 
							
								
						
						
						
						

				}
							
echo						'</select>  ';









echo   ' </div>';
echo  '</div>';
  
echo   ' <div class="form-group">';
echo    '<label for="Curriculum3" class="col-sm-4 control-label">Curriculum</label>';
echo    '<div class="col-sm-8">';

echo      '<select class="form-control" name="cidSelect">';

echo							'<option selected disabled class="hideoption">Select One</option>';

//$nameline = pg_fetch_array($classesnameresult, null, PGSQL_ASSOC);
		//this is the best way to display multiple columns from a query that selects more than one column
				while ($cur_line = pg_fetch_assoc($curresult ) ){
				
							
							$cur_col_value_var = $cur_line['cid'];
							
							$cur_col_value_var2 = $cur_line['curriculum_name'];
							
						
						
							
							
echo						"<option value='$cur_col_value_var'>   '$cur_col_value_var2'  </option>"; 
							
								
						
						
						
						

				}
							
echo						'</select>  ';




echo    '</div>';
echo  '</div>';
  
echo  '<div class="form-group">';
echo   '<label for="sex3" class="col-sm-4 control-label">Gender </label>';
echo    '<div class="col-sm-8">';


echo      '<select class="form-control" name="sexSelect">';

echo							'<option selected disabled class="hideoption">Select One</option>';


echo              '<option value="M">   Male </option>';
echo              '<option value="F">   Female </option>';
echo              '<option value=" ">   Undisclosed </option>';

echo						'</select>  ';



echo    '</div>';
echo  '</div>';

echo  '<div class="form-group">';
echo   '<label for="raceID3" class="col-sm-4 control-label">Ethnicity </label>';
echo    '<div class="col-sm-8">';
echo     '<input type="race" class="form-control" id="raceID3" placeholder="Ethnicity" name = "race">';
echo    '</div>';
echo  '</div>';

echo  '<div class="form-group">';
echo   '<label for="childnumID3" class="col-sm-4 control-label">Number of Children </label>';
echo    '<div class="col-sm-8">';
echo     '<input type="childnum" class="form-control" id="childnumID3" placeholder="Number of Childern (in digits)" name = "childnum">';
echo    '</div>';
echo  '</div>';

  
echo  '<div class="form-group">';
echo    '<label for="status3" class="col-sm-4 control-label">Status</label>';
echo    '<div class="col-sm-8">';
echo     ' <input type="status3" class="form-control" id="status33" placeholder="Status (well)" name = "status3">';
echo    '</div>';
echo ' </div>';
  
  
  /* leave this commented out unless a password check feature is actually implemented
echo  '<div class="form-group">';
echo    '<label for="inputPassword3" class="col-sm-4 control-label">Re-enter Password</label>';
echo    '<div class="col-sm-8">';
echo      '<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name = "password">';
echo    '</div>';
echo  '</div>';

*/
  
echo  '<div class="form-group">';
echo    '<div class="col-sm-offset-2 col-sm-10">';
echo      '<button type="submit" class="btn btn-default">Submit</button>';
echo	  '<!-- needs apache/php link to database -->';
echo	  '<!-- Need to add an alert that says "The information added is correct?" y/n prompt  nah fuck that -->';
echo   ' </div>';
echo  '</div>';
  
echo '</form> <!-- end of login form -->';
echo '</div> <!-- end of login wrapper -->';
echo '</div> <!-- end of jumbotron login -->';

?>
</div>
</body>
</html>