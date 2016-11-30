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
		
		<title> CPCA search </title>
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


	<!--- main info goes in this div -->
	<div class="container">

		<div class = "jumbotron">
		
			<div class = "row"> <!-- start row one -->
				<div class = "col-md-4"> 
					
					<p> Filler Name </p>
					
					
				
				</div>
				
				<div class = "col-md-4">
					
					<p> Missed Classes </p>
					
					
				
				</div>
				
				<div class = "col-md-4">
					
					<p> 8</p>
					
					
				
				</div>
				
				
			</div> <!-- end row one -->
			
			
		<div class = "row"> <!-- start row two -->
				
				<div class = "col-md-8"> 
					<p class="label label-info" style="white-space: pre;">Problem Solving                    01/01/2016       </p> 
				</div>
				
				
				
			
		</div> <!-- end row two -->
		
		<div class = "row" > 
			<div class = "col-md-8"> 
			<p> This is the reason </p>
			</div>
			
		
		</div>
		
		
		<div class = "row"> <!-- start row three -->
				
				<div class = "col-md-8"> 
					<p class="label label-info" style="white-space: pre;">Health & Nutrition                  01/01/2016       </p> 
				</div>
				
				
				
			
		</div> <!-- end row three -->
		
		<div class = "row" > 
			<div class = "col-md-8"> 
			<p> This is the reason </p>
			</div>
			
		
		</div>
		
		
		<div class = "row">
		
			<div class = "col-md-4">
				
				<p><button class="btn btn-default " type="submit"><a href="participant-search-results.php"> <!--- for demo purposes only -->Go back to results</a></button></p>
			</div>
			<div class = "col-md-4">
				
				<!-- filler for whitespace -->
			</div>
		
			<div class = "col-md-4">
				
				<button class="btn btn-default " type="submit"><a href="#">Download As Excel Sheet</a></button>
				
			</div>
		
		</div>
		
		
		</div>



	
	</div>


	
	<script>
	
	
	function reasonBox(){
			
			var which = document.getElementById("reasonBox");

			if (which.style.visibility == "hidden")
				which.style.visibility = "visible"
			else
			which.style.visibility = "hidden"
	
	}
	
	
	</script>
	
  </body>
</html>
