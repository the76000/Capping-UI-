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
	
	<?php
	
	session_start();
		
		if (!isset($_SESSION["username"]) ){
			header('Location: index.php');
		}
	  
	  
	  // Connecting, selecting database
	$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
		or die('Could not connect: ' . pg_last_error());
		
		echo $_POST['first_name'];
		
		// Check to see if everything is set, and do the insert if it is	
		if((isset($_POST['first_name'])) && (isset($_POST['last_name'])) && (isset($_POST['email'])) && (isset($_POST['homePhone'])) && (isset($_POST['cellPhone'])) && (isset($_POST['password']))){
			echo "we're here";
			$fname = $_POST['first_name'];	
			$lname = $_POST['last_name'];		
			$email = $_POST['email'];		
			$hphone = $_POST['homePhone'];		
			$cphone = $_POST['cellPhone'];		
			$password = $_POST['password'];		
			$lvl = 'Employee';	
			
			$createemp = "INSERT INTO Employees (e_f_name,e_l_name,email,home_phone,cell_phone,permission_lvl,password) VALUES('$fname','$lname','$email','$hphone','$cphone','$lvl','$password')";
				
			$result = pg_query($createemp );
			echo 'employee created';
		} else {
			if(!isset($_POST['first_name'])){
				echo "<h2 style='font-color:red;'> Please supply a first name </h2>";
			}
		}

?>
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
<h3><center>Add An Employee</center></h3>
<div class="jumbotron login_panel">
<div class= "login_wrapper">

 
  <form class="form-horizontal" action="Add-Employee.php" method="post">
  
  <div class="form-group">
    <label for="inputFirstName3" class="col-sm-4 control-label">First Name</label>
    <div class="col-sm-8">
      <input type="firstname" class="form-control" id="inputFirstName3" placeholder="First Name" name = "first_name">
   </div>
  </div>

  <div class="form-group">
    <label for="inputLastName3" class="col-sm-4 control-label">Last Name</label>
    <div class="col-sm-8">
     <input type="lastname" class="form-control" id="inputLastName3" placeholder="Last Name" name = "last_name">
    </div>
  </div>
  
  <div class="form-group">
   <label for="emailID3" class="col-sm-4 control-label">Email </label>
    <div class="col-sm-8">
     <input type="email" class="form-control" id="emailID3" placeholder="Email" name = "email">
    </div>
 </div>

  <div class="form-group">
   <label for="homePhoneID3" class="col-sm-4 control-label">Home Phone </label>
    <div class="col-sm-8">
     <input type="homePhone" class="form-control" id="homePhoneID3" placeholder="Home Phone (No Dashes)" name = "homePhone">
    </div>
  </div>

  <div class="form-group">
   <label for="cellPhoneID3" class="col-sm-4 control-label">Cell Phone </label>
    <div class="col-sm-8">
     <input type="cellPhone" class="form-control" id="cellPhoneID3" placeholder="Cell Phone (No Dashes)" name = "cellPhone">
    </div>
  </div>

  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
    <div class="col-sm-8">
     <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name = "password">
    </div>
   </div>
  
  
<!--  leave this commented out unless a password check feature is actually implemented
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Re-enter Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name = "password">
    </div>
  </div>
-->
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
   </div>
  </div>
 
 </form> <!-- end of login form -->
 </div> <!-- end of login wrapper -->
 </div> <!-- end of jumbotron login -->

</div>
</body>
</html>