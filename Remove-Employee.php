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
					<li><a href="index.php">Log out</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav> <!-- end of navbar-->

<div class = "container">
<h3><center>REMOVE AN EMPLOYEE</center></h3>
<div class="jumbotron login_panel">
<div class= "login_wrapper">

<!-- this launches another php file --->
  <form class="form-horizontal" action="includes/users.php" method="post">
  
  <div class="form-group">
    <label for="inputFirstName3" class="col-sm-4 control-label">First Name</label>
    <div class="col-sm-8">
      <input type="firstname" class="form-control" id="inputFirstName3" placeholder="First Name" name = "First Name">
    </div>
  </div>
  
    <div class="form-group">
    <label for="inputLastName3" class="col-sm-4 control-label">Last Name</label>
    <div class="col-sm-8">
      <input type="lastname" class="form-control" id="inputLastName3" placeholder="Last Name" name = "Last Name">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputLoginID3" class="col-sm-4 control-label">Login ID</label>
    <div class="col-sm-8">
      <input type="loginid" class="form-control" id="inputLoginID3" placeholder="Login ID" name = "LoginID">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputLoginID3" class="col-sm-4 control-label">Re-enter Login ID</label>
    <div class="col-sm-8">
      <input type="loginid" class="form-control" id="inputLoginID3" placeholder="Login ID" name = "LoginID">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Remove this Employee</button>
	  <!-- needs apache/php link to database -->
	  <!-- Need to add an alert that says "ARE YOU SURE YOU WANT TO DELETE THIS EMPLOYEE FROM THE DATABASE?" y/n prompt -->
    </div>
  </div>
  
</form> <!-- end of login form -->
</div> <!-- end of login wrapper -->
</div> <!-- end of jumbotron login -->
</div>	
</body>
</html>