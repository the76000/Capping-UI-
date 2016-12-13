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
				<a class="navbar-brand" href="#">Create A New Class Subject</a>
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
<!-- So I hear you hired a new employee. Congratz! Well this is where the magic happens, and by magic I mean HTML. Cause this is the language I know.... -->	

<div class = "container">
<h3><center>Create A New Class Subject</center></h3>
<div class="jumbotron login_panel">
<center><div class="error" id="errorID" style="display:none"></div></center>
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
	
	
	$curquery = "
	SELECT * FROM curriculum";
	$curresult = pg_query($curquery) or die('Query failed: ' . pg_last_error());
	
	





echo '<!-- this launches another php file --->';
echo  '<form onsubmit="return validateInput()" class="form-horizontal" action="post-subject-add.php" method="post">';
  

  

  
echo  '<div class="form-group">';
echo   '<label for="sex3" class="col-sm-4 control-label">Class Name </label>';
echo    '<div class="col-sm-8">';


echo    '<input type="classname" class="form-control" id="classnameID3" placeholder="Class Name" name = "classname">';



echo    '</div>';
echo  '</div>';

echo  '<div class="form-group">';
echo   '<label for="raceID3" class="col-sm-4 control-label">Curriculum Select </label>';
echo    '<div class="col-sm-8">';

echo      '<select class="form-control" name="cidSelect" id="cidSelect">';

echo							'<option selected disabled class="hideoption">Select One</option>';

//$nameline = pg_fetch_array($classesnameresult, null, PGSQL_ASSOC);
		//this is the best way to display multiple columns from a query that selects more than one column
				while ($cur_line = pg_fetch_assoc($curresult ) ){
				
							
							$cur_col_value_var = $cur_line['cid'];
							
							$cur_col_value_var2 = $cur_line['curriculum_name'];
							
						
						
							
							
echo						"<option value='$cur_col_value_var'>   $cur_col_value_var2  </option>"; 
							
								
						
						
						
						

				}
							
echo						'</select>  ';


echo    '</div>';
echo  '</div>';

;


  
  
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

<script type="text/javascript">
	function validateInput(){
		document.getElementById("errorID").value = ""
		document.getElementById("errorID").style.display = "none";
		
		if(document.getElementById("classnameID3").value == ""){
			document.getElementById("errorID").innerHTML = "Please enter a class name";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		if(document.getElementById("cidSelect").value == "Select One"){
			document.getElementById("errorID").innerHTML = "Please select a curriculum";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		
		//If we got here then everything is as it should be
		return true; 
		
	}
</script>

</body>
</html>