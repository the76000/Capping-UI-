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
    
    # Connect to MySQL server and the database
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
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav> <!-- end of navbar-->
<div class = "container">
<div class="jumbotron login_panel">
<div class= "login_wrapper">
  <form class="form-horizontal">
  
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-4 control-label">Login ID</label>
    <div class="col-sm-8">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Login ID">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
	  <!-- needs apache/php link to database -->
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <a hreft="#">Forgot your password?</a>
        </label>
      </div>
    </div>
  </div>
  
</form> <!-- end of login form -->
</div> <!-- end of login wrapper -->
</div> <!-- end of jumbotron login -->
</div>
	
  
  </body>
</html>