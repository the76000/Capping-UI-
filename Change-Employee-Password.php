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
				<a class="navbar-brand" href="#">Change Employee Password</a>
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
<h3><center>Change Employee Password</center></h3>
<div class="jumbotron login_panel">
<center><div class="error" id="errorID" style="display:none"></div></center>
<div class= "login_wrapper">
<!-- this launches another php file --->
  <form onsubmit="return validateInput()" class="form-horizontal" action="includes/users.php" method="post">
  
  <!-- put a password field and hide it to avoid pre-populating the password field -->
  <input type="password" style="display:none">
  
  <div class="form-group">
    <label for="inputLoginID3" class="col-sm-4 control-label">Login ID</label>
    <div class="col-sm-8">
      <input type="loginid" class="form-control" id="inputLoginID3" placeholder="Login ID" name = "LoginID">
    </div>
  </div>
  
 <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">New Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPassword1" placeholder="Password" name = "password">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Re-enter New Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPassword2" placeholder="Password" name = "password">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Change Password</button>
	  <!-- needs apache/php link to database -->
	  <!-- Need to add an alert that says "The information added is correct?" y/n prompt -->
    </div>
  </div>
   
</form> <!-- end of login form -->
</div> <!-- end of login wrapper -->
</div> <!-- end of jumbotron login -->
</div>	

<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>

<script type="text/javascript">
	function validateInput(){
		document.getElementById("errorID").value = ""
		document.getElementById("errorID").style.display = "none";
		
		if(document.getElementById("inputLoginID3").value == ""){
			document.getElementById("errorID").innerHTML = "Please enter the username";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		if(document.getElementById("inputPassword1").value == ""){
			document.getElementById("errorID").innerHTML = "Please enter the new password";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		if(document.getElementById("inputPassword2").value == ""){
			document.getElementById("errorID").innerHTML = "Please re-enter the password";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		
		//If we got here then everything is as it should be
		return true; 
		
	}
</script>

</body>
</html>