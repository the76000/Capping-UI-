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
					<li><a href="index.php">Log out</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav> <!-- end of navbar-->
	
	<div class = "row">
		
		
		
		<div class = "container">


		

			<div class = "row ">
				<div class = "col-md-6">
					<h1> <?php echo $_POST['selected'];?> </h1>
					<select>
					<?php
						session_start();
	
						if (!isset($_SESSION["username"]) ){
							header('Location: index.php');
							echo "hello";
						}
					  
					  
						// Connecting, selecting database
						$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
							or die('Could not connect: ' . pg_last_error());

						// Performing SQL query
						$query = "SELECT DISTINCT Class_Subjects.Class_Subject FROM Class_Subjects, Curriculum_Subjects, Curriculum WHERE (Class_Subjects.C_Subject = 
						Curriculum_Subjects.C_Subject) AND (Curriculum_Subjects.CID = Curriculum.CID) AND (Curriculum.Curriculum_Name = '".$_POST['selected']."');";
						
						$result = pg_query($query) or die('Query failed: ' . pg_last_error());
						
					while($row = pg_fetch_array($result)){
						echo "<option value='".$row['class_subject']."'>".$row['class_subject']."</option>";
					}
					?>
					</select> 
					<h1> Meets at 0:00 at Filler Location</h1>
					
				</div>
			</div>


			<div class = "jumbotron">


				<form class="form-horizontal">
					<div class="form-group">
    				<label for="curriculumTitle" class="col-sm-4 control-label">Change Curriculum Title </label>
   						 <div class="col-sm-8">
      						<input  class="form-control" id="curriculumTitle" placeholder="Title" oninput="validateAlphaWithSpace('curriculumTitle');">
    					</div>
 					 </div>

 					 <div class="form-group">
   						 <div class="col-sm-offset-2 col-sm-10">
      						<button type="submit" class="btn btn-default">Submit Change</button>
	  						<!-- needs apache/php link to database -->
    					</div>
 					 </div>


 					 <div class="form-group">
    				<label for="curriculumTime" class="col-sm-4 control-label">Change Meeting time for all classes </label>
   						 <div class="col-sm-8">
      						<input  class="form-control" id="curriculumTime" placeholder="Time" oninput="validateAlphaWithSpace('curriculumTime');">
    					</div>
 					 </div>


 					 <div class="form-group">
   						 <div class="col-sm-offset-2 col-sm-10">
      						<button type="submit" class="btn btn-default">Submit Change</button>
	  						<!-- needs apache/php link to database -->
    					</div>
 					 </div>

 					  <div class="form-group">
    				<label for="curriculumLocation" class="col-sm-4 control-label">Change Location for all classes </label>
   						 <div class="col-sm-8">
      						<input  class="form-control" id="curriculumLocation" placeholder="Time" oninput="validateAlphaWithSpace('curriculumLocation');">
    					</div>
 					 </div>


 					 <div class="form-group">
   						 <div class="col-sm-offset-2 col-sm-10">
      						<button type="submit" class="btn btn-default">Submit Change</button>
	  						<!-- needs apache/php link to database -->
    					</div>
 					 </div>

 					 <div class="form-group">
    				<label for="curriculumTeacher" class="col-sm-4 control-label">Change Teacher for all classes </label>
   						 <div class="col-sm-8">
      						<input  class="form-control" id="curriculumTeacher" placeholder="Time" oninput="validateAlphaWithSpace('curriculumTeacher');">
    					</div>
 					 </div>


 					 <div class="form-group">
   						 <div class="col-sm-offset-2 col-sm-10">
      						<button type="submit" class="btn btn-default">Submit Change</button>
	  						<!-- needs apache/php link to database -->
    					</div>
 					 </div>


					<button type="submit" class="btn btn-default " id="adminChangeCourseButton">Submit All Changes</button>  

				</form>



			</div>
		
		
		
		</div>
	
	
	
	
	</div>
	
	
	
	
	
<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>
	
</body>


</html>
	
	
	
	
	
	
	
	
	
	
	
