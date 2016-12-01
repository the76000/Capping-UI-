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
		
		<title> CPCA Report Card </title>
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
      <a class="navbar-brand" href="#">Particpant Search</a>
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

<div class = "row search">

	<form class="navbar-form" role="search">
			<div class="input-group">
				<input type="text" class="form-control input-lg" placeholder="Search" name="srch-term" id="srch-term">
				<div class="input-group-btn ">
					<button class="btn btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
				</div>
				<!-- CERTAINLY needs a link to the database for search capabilities -->
			</div>
			</form>

			
</div>	<!-- end of row search -->		

<hr> </hr>

<div class = "container">

	<div class="form-group ">
				  <label for="sel1">Select A Curriculum:</label> <!-- this is for the 28 indivual classes, not for the course/groups. data mismatch -->
				  <select class="form-control" id="sel1">
					<option>1.   Women's in-house</option>
					<option>2.   Spanish speaking women in-house</option>
					<option>3.   Florence Manor</option>
					<option>4.   Women's DC Jail</option>
					<option>5.   Women's New Vision Church</option>
					<option>6.   ITAP</option>
					<option>7.   Men's DC jail</option>
					<option>8.   Cornerstone</option>
					<option>9.   Meadow Run</option>
					<option>10.   Men's in-house</option>
					<option>11.    Spanish Speaking Men's in-house</option>
					<option>12.    Fox Run</option>
					<option>12.    Men's New Vision Church</option>
				
				  </select>
				</div>



  
  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Curriculum</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Filler</td>
        <td>Name</td>
        <td>fillerName@example.com</td>
        <td>Women's in-house </td>
        <th> <a href="attendance.php">Go to report card</a></th>
      </tr>
      <tr>
        <td>Filler</td>
        <td>Name</td>
        <td>fillerName@example.com</td>
        <td> Women's in-house</td>
        <th> <a href="attendance.php">Go to report card</a></th>
      </tr>
      <tr>
        <td>Filler</td>
        <td>Name</td>
        <td>fillerName@example.com</td>
        <td> Women's in-house</td>
        <th> <a href="attendance.php">Go to report card</a></th>
      </tr>
    </tbody>
  </table>
</div>







		
  </body>
</html>