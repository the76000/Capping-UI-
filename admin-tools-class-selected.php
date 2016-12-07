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
				<?php
					session_start();
	
						if (!isset($_SESSION["username"]) ){
							header('Location: index.php');
							echo "hello";
						}
						
						//declaration
						$curriculumName = $_SESSION['admin-course-curr'] ;
						
					    $locationName = $_SESSION['admin-course-loc'] ;
						
						$employeeEID = $_SESSION['admin-coursee-eid'];
						
			
					echo '<div class = "col-md-2">';
					echo '<h2> Curriculum Name:  ';
					echo "$curriculumName ";

					echo '</h2>';
					
					echo '</div>';
					echo '<div class = "col-md-2">';
					echo ' <h2> Location Name:';  
					echo " $locationName ";
					echo '</h2>';
					echo '</div>';
				
						
						
						
						
						
						
						
						
					  
					  
						// Connecting, selecting database
						$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
							or die('Could not connect: ' . pg_last_error());

					echo '<div class = "col-md-2">';
					echo " <h2> Teacher Name: ";
					$tempvar = $employeeEID ;
					$empnamequery = "SELECT E_F_Name, E_L_Name FROM Employees where EID = '$tempvar' ";
					$empnameresult = pg_query($empnamequery ) or die('Query failed: ' . pg_last_error());
					$empnamerow = pg_fetch_array($empnameresult);
					$employeefname = $empnamerow['e_f_name'];
					$employeelname = $empnamerow['e_l_name'];
					echo  "$employeefname ";
					echo   "$employeelname";
					echo  "</h2>";
					echo  "</div>";
					
					
						
					$classidfromtools = 	$_POST['classidPicked'];
					
					$_SESSION['classid_tools'] = $classidfromtools;
					
			
					echo					'<label>Class Picked </label>';
					
					$classnamefromtoolsquery = "
					SELECT Class_Subjects.Class_Subject, Classes_Scheduled.Class_ID, Classes_Scheduled.Date_Time_Schedules, Classes_Scheduled.C_Subject
					From Class_Subjects, Curriculum_Subjects,  Classes_Scheduled
					WHERE Class_Subjects.C_Subject = Curriculum_Subjects.C_Subject
					AND Curriculum_Subjects.C_Subject = Classes_Scheduled.C_Subject
					AND Classes_Scheduled.Class_ID = '$classidfromtools'";
				
					$classnamefromtoolsresult = pg_query($classnamefromtoolsquery) or die('Query failed: ' . pg_last_error());
				
					while($classnamefromtoolsrow = pg_fetch_array($classnamefromtoolsresult )){
						echo "<option value='$classidfromtools'>".$classnamefromtoolsrow['class_subject']."</option>";
						$time = $classnamefromtoolsrow['date_time_schedules'];
						$_SESSION['classsubjecttools'] = $classnamefromtoolsrow['c_subject'];
						
					}
					
					
					
					
					
					
					
					
				
					
					
					
					
					
					
					
				
			echo  '</div>';
			
		


			echo '<div class = "jumbotron">';


				echo "<form action = 'admin-tools-course-post.php' method='post'>";
				


 				echo	 '<div class="form-group">';
    			echo	'<label for="curriculumTime" class="col-sm-4 control-label">Change Meeting time (Current Time: ';
				echo   "$time";
				
				echo ')</label>';
   				echo		 '<div class="col-sm-8">';
      			echo			'<input  name="currTime" class="form-control" id="curriculumTime" placeholder="yyyy-mm-dd 00:00:00" oninput="validateAlphaWithSpace("curriculumTime");">';
    			echo		'</div>';
 				echo	 '</div>';
				
			


 				echo	 '<div class="form-group">';
   				echo		 '<div class="col-sm-offset-2 col-sm-10">';
      			echo			'<button type="submit" class="btn btn-default">Submit Change</button>';
	  			
    			echo		'</div>';
 				echo	' </div>';

 				echo	  '<div class="form-group">';
    			echo	'<label for="curriculumLocation" class="col-sm-4 control-label">Change Location (Current Location: ';
				echo    " $locationName "; //change this to query
			
				echo    ') </label>';
   				echo		 '<div class="col-sm-4">';
					echo      "<select name = 'lidPicked'>";
				$locquery = "SELECT * FROM Locations";
				$locresult = pg_query($locquery) or die('Query failed: ' . pg_last_error());
				while($locrow = pg_fetch_array($locresult)){
						echo "<option value='".$locrow['location_id']."'>".$locrow['location_name']." </option>";
					}
					
					echo "</select> ";	
				
				echo		'</div>';
 				echo	 '</div>';


 				echo	 '<div class="form-group">';
   				echo		 '<div class="col-sm-offset-2 col-sm-10">';
      			echo			'<button type="submit" class="btn btn-default">Submit Change</button>';
	  					
    			echo		'</div>';
 				echo	 '</div>';

 				echo	 '<div class="form-group">';
    			echo	'<label for="curriculumTeacher" class="col-sm-4 control-label">';
				echo 'Teacher Name: ';
				echo  "$employeefname ";
					echo   "$employeelname";
				echo '</label>';
   				echo		 '<div class="col-sm-4">';
      			
				echo      "<select name = 'eidPicked'>";
				$allempquery = "SELECT * FROM Employees";
				$allempresult = pg_query($allempquery) or die('Query failed: ' . pg_last_error());
				while($allemprow = pg_fetch_array($allempresult)){
						echo "<option value='".$allemprow['eid']."'>".$allemprow['e_f_name']." ".$allemprow['e_l_name']."</option>";
					}
					
					echo "</select> ";	
				echo		'</div>';
 				echo	 '</div>';


 				echo	 '<div class="form-group">';
   				echo		 '<div class="col-sm-offset-2 col-sm-10">';
      			echo			'<button type="submit" class="btn btn-default">Submit Change</button>';
	  			echo			'<!-- needs apache/php link to database -->';
    			echo		'</div>';
 				echo	 '</div>';


echo					'<button type="submit" class="btn btn-default " id="adminChangeCourseButton">Submit All Changes</button>  ';

echo             '<p> *Clicking any of these buttons will update everything written in the field to the db* </p>';

echo				'</form>';



echo			'</div>';
		
		
		
echo		'</div>';
	
	
	
	
echo	'</div>';
	
	?>
	
	
	
	
<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>
	
</body>


</html>
	