
<!-- STATE OF THIS PAGE !-->
<!--
This page is pretty self explanatory
This is the landing page of the website, it has login and password fields,
thats pretty much it.
Like most pages, it uses our includes/connect.php file to connect to the database.
The login is handled by the includes/users.php
In the state it is currently in, there is no security on the login
This will take you to homepage.php

Outstanding issues(outside of security) none AFAIK

 -Colin Ferris 4/27/17
 !-->

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
		
		<title> CPCA Login </title>
  </head>
  
  
  <body>

  <?php
    
    # Connect to Postgres server and the database
    require( 'includes/connect.php' ) ;
    
	
	
	
?>
  
  <!-- Top left Logo -->
	<div class="page-header">
  <h1>CPCA</h1>
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
      <a class="navbar-brand" href="#">Employee Login Portal</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
      <ul class="nav navbar-nav navbar-right">
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav> <!-- end of navbar-->
<div class = "container">
<div class="jumbotron login_panel">
<div class= "login_wrapper">

<!-- this launches another php file --->
  <form class="form-horizontal" action="includes/users.php" method="post">
  
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Login ID</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Login ID" name = "email">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name = "password">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
	  <!-- needs apache/php link to database -->
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
       <!--  <label>
          <a id="forgot-password" href="Reset-Password.php">Forgot your password?</a>
        </label> -->
      </div>
    </div>
  </div>
  
</form> <!-- end of login form -->
</div> <!-- end of login wrapper -->
</div> <!-- end of jumbotron login -->
</div>
	
	<!-- JS Functions  -->
	<script src="FormAppFunctions.js"></script>
  
  </body>
</html>