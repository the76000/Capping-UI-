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
				<a class="navbar-brand" href="#">Add an Employee</a>
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
<h3><center>ADD AN EMPLOYEE</center></h3>
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
 # Connect to Postgres server and the database
    require( 'includes/connect.php' ) ;
echo '<!-- this launches another php file --->';
echo  '<form onsubmit="return validateInput()" class="form-horizontal" action="post-add-employee.php" method="post">';

// Set an invisible email and password field so it doesn't get prepopulated with the current user's password
echo     ' <input style="display:none" type="password">';
echo     '<input style="display:none" type="email">'; 


echo  '<div class="form-group">';
echo    '<label for="inputFirstName3" class="col-sm-4 control-label">First Name</label>';
echo    '<div class="col-sm-8">';
echo      '<input type="firstname" class="form-control" id="inputFirstName3" placeholder="First Name" name = "first_name" oninput="validateAlpha(`inputFirstName3`);">';
echo   ' </div>';
echo  '</div>';
  
echo   ' <div class="form-group">';
echo    '<label for="inputLastName3" class="col-sm-4 control-label">Last Name</label>';
echo    '<div class="col-sm-8">';
echo     ' <input type="lastname" class="form-control" id="inputLastName3" placeholder="Last Name" name = "last_name" oninput="validateAlpha(`inputLastName3`);">';
echo    '</div>';
echo  '</div>';
  
echo  '<div class="form-group">';
echo   '<label for="emailID3" class="col-sm-4 control-label">Email </label>';
echo    '<div class="col-sm-8">';
																										#validation is not working correctly for email
echo     '<input type="text" class="form-control" id="emailID3" placeholder="Email" value="" name = "email" onblur="isEmailOffFocus(`emailID3`) ;">';
echo    '</div>';
echo  '</div>';
echo  '<div class="form-group">';
echo   '<label for="homePhoneID3" class="col-sm-4 control-label">Home Phone </label>';
echo    '<div class="col-sm-8">';
echo     '<input type="homePhone" class="form-control" id="homePhoneID3" placeholder="Home Phone (No Dashes)" name = "homePhone" oninput="isNumberKey(`homePhoneID3`);">';
echo    '</div>';
echo  '</div>';
echo  '<div class="form-group">';
echo   '<label for="cellPhoneID3" class="col-sm-4 control-label">Cell Phone </label>';
echo    '<div class="col-sm-8">';
echo     '<input type="cellPhone" class="form-control" id="cellPhoneID3" placeholder="Cell Phone (No Dashes)" name = "cellPhone" oninput="isNumberKey(`cellPhoneID3`);">';
echo    '</div>';
echo  '</div>';
  
echo  '<div class="form-group">';
echo    '<label for="inputPassword3" class="col-sm-4 control-label">Password</label>';
echo    '<div class="col-sm-8">';

echo     ' <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name = "password">';
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


<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>

<script type="text/javascript">
	function validateInput(){
		document.getElementById("errorID").value = ""
		document.getElementById("errorID").style.display = "none";
		debugger;
		if(document.getElementById("inputFirstName3").value == ""){
			document.getElementById("errorID").innerHTML = "Please enter a first name";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		if(document.getElementById("inputLastName3").value == ""){
			document.getElementById("errorID").innerHTML = "Please enter a last name";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		if(document.getElementById("emailID3").value == ""){
			document.getElementById("errorID").innerHTML = "Please enter an email";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		if(document.getElementById("homePhoneID3").value == ""){
			document.getElementById("errorID").innerHTML = "Please enter a home phone";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		if(document.getElementById("cellPhoneID3").value == ""){
			document.getElementById("errorID").innerHTML = "Please enter a cell phone";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		if(document.getElementById("inputPassword3").value == ""){
			document.getElementById("errorID").innerHTML = "Please enter a password";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		
		//If we got here then everything is as it should be
		return true; 
	}

		
	
	
</script>

</body>
</html>