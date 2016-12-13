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
				<a class="navbar-brand" href="#">Admin Tools</a>
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
	
	<div class = "row">
		
		
		
		<div class = "container">
			<h1> Curriculum Edit </h1>
			<div class = "jumbotron">
				<center><div class="error" id="errorID" style="display:none"></div></center>
			<div class = "row admin-courses" style= "text-align: center;">
			<?php
			session_start();
	
						if (!isset($_SESSION["username"]) ){
							header('Location: index.php');
							echo "hello";
						}
					  
					  
						// Connecting, selecting database
						$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
							or die('Could not connect: ' . pg_last_error());

				echo '<h2> Pick a curriculum, location, and employee </h2>';
				echo '<div class = "col-md-4">';
				echo	'<form onsubmit="return validateInput()" class="navbar-form" role="search" action="admin-tools-course-selected.php" method="post">';
				echo	'<select class="form-control" name = "curr_selected" id="curriculumName">';
				echo '<option selected disabled class="hideoption">Select One</option>';
					
					
						
						// Performing SQL query
						$query = 'SELECT * FROM public.curriculum ORDER BY cid ASC ';
						
						$result = pg_query($query) or die('Query failed: ' . pg_last_error());
						
					while($row = pg_fetch_array($result)){
						//Obviously we don't want them modifying no curriculum
						if($row['curriculum_name'] != "No Curriculum"){
							echo "<option value='".$row['curriculum_name']."'>".$row['curriculum_name']."</option>";
						}
						
					}
					
					echo '</select> ';
					echo '</div>';
					
					
						echo '<div class = "col-md-4">';
						echo	'<select class="form-control" name = "loc_selected" id="curriculumLocation">';
						echo '<option selected disabled class="hideoption">Select One</option>';
					
						
						// Performing SQL query
						$locquery = 'SELECT * FROM Locations order by Location_Name ASC';
						
						$locresult = pg_query($locquery) or die('Query failed: ' . pg_last_error());
						
					while($locrow = pg_fetch_array($locresult)){
						echo "<option value='".$locrow['location_name']."'>".$locrow['location_name']."</option>";
					}
					
					echo '</select> ';
					echo '</div>';
					
					
						echo '<div class = "col-md-4">';
						echo	'<select class="form-control" name = "emp_selected" id="curriculumInstructor">';
						echo '<option selected disabled class="hideoption">Select One</option>';
					
						
						// Performing SQL query
						$empquery = 'SELECT * FROM Employees order by E_L_Name ASC';
						
						$empresult = pg_query($empquery) or die('Query failed: ' . pg_last_error());
						
					while($emprow = pg_fetch_array($empresult)){
						echo "<option value='".$emprow['eid']."'>".$emprow['e_f_name']."  ".$emprow['e_l_name']."</option>";
					}
					
					echo '</select> ';
					echo '</div>';
					
					
					echo '</div>';
					echo '<input type="submit" value="Edit" id="edit" class="btn btn-default" style="width:20%; font-weight:bold;"></input>';
			
			echo		'</form>';
				
			
			?>
			
			<!--	<div class = "col-md-6">
			
					<a href="admin-tools-course-selected.php"> [Edit] </a>
					<p class="label label-info">Spanish Speaking Women In-House</p>
				</div>
			
			</div>
			
			
			<div class = "row admin-courses" style= "text-align: left;">
			
				<div class = "col-md-6">
			
					<a href="admin-tools-course-selected.php"> [Edit] </a>
					<p class="label label-info">Men's DC Jail</p>
				
				</div>
				
				<div class = "col-md-6">
			
					<a href="admin-tools-course-selected.php"> [Edit] </a>
					<p class="label label-info">Cornerstone</p>
				
				</div>
			
			</div>
			
			
			<div class = "row admin-courses" style= "text-align: left;">
			
				<div class = "col-md-6">
			
					<a href="admin-tools-course-selected.php"> [Edit] </a>
					<p class="label label-info">Men's in-house</p>
					
				</div>
				
				
				<div class = "col-md-6">
			
					<a href="admin-tools-course-selected.php"> [Edit] </a>
					<p class="label label-info">Meadow Run</p>
				
				</div>
				
			</div>-->	
			
			<hr> </hr>
			
			
		
				
			
			</div>
		
		
		
		
		</div>
	
	
	
	
	</div>
	
	
	
<script type="text/javascript">
function validateInput(){
	document.getElementById("errorID").value = ""
	document.getElementById("errorID").style.display = "none";
	
	if(document.getElementById("curriculumName").value == "Select One"){
		document.getElementById("errorID").innerHTML = "Please select a curriculum";
		document.getElementById("errorID").style.display = "block";
		return false;
	}
	if(document.getElementById("curriculumLocation").value == "Select One"){
		document.getElementById("errorID").innerHTML = "Please select a location";
		document.getElementById("errorID").style.display = "block";
		return false;
	}
	if(document.getElementById("curriculumInstructor").value == "Select One"){
		document.getElementById("errorID").innerHTML = "Please select an instructor";
		document.getElementById("errorID").style.display = "block";
		return false;
	}
	
	//If we got here then everything is as it should be
	return true; 
	
}
</script>
	

	
</body>


</html>
	
	
	
	
	
	
	
	
	
	
	
