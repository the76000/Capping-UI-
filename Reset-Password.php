<!Doctype html>
<head>
	<meta charset="utf-8"> 

	<!--- this is for bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel='stylesheet' media='screen and (min-width: 701px) and (max-width: 900px)' href='css/mobile.css' />
	<link rel="stylesheet" href="CSS/style.css">

	<title>CPCA Reset Password</title>
</head>

<body>

<?php

  # Connect to Postgres server and the database
    require( 'includes/connect.php' ) ;

	# username maristcappinggroup@gmail.com Password: Algozinesquad2016
    $to = $LoginID
	$subject = "CPCA Email Change"
	$message = 
	#I have no idea how to send emails with php
	
    
# email validation 	match with email from db
oninput="isEmailOffFocus('ID_Name');"	

?>

<!-- Top left Logo -->
	<div class="page-header">
		<h1><a class="home-button" href="#">CPCA</a></h1>
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
				 <a class="navbar-brand" href="#">Re-set Password</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
</nav> <!-- end of navbar-->
<div class = "container">
<div class="jumbotron login_panel">
<div class= "login_wrapper">
<form class="form-horizontal" action="includes/users.php" method="post">
<div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Enter Login ID</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Login ID" name = "email">
    </div>
  </div>
  
<div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Re-enter Login ID</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Login ID" name = "email">
    </div>
  </div>
  
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Send Email</button>
	  <!-- needs apache/php link to database -->
    </div>
  </div>
  </form>
  </div>
  </div>
 </div>
 
 
</body>  
</html>