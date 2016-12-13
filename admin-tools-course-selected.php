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
	
	<center><div class="error" id="errorID" style="display:none"></div></center>
	
	<div class = "row">
		
		
		
		<div class = "container">


		

			<div class = "row ">
					<div class = "col-md-2">
					<h2> Curriculum Name:  <?php echo $_POST['curr_selected'];?> </h2>
					
					</div>
					<div class = "col-md-2">
					<h2> Location Name:  <?php echo $_POST['loc_selected'];?> </h2>
					</div>
					<?php
					session_start();
	
						if (!isset($_SESSION["username"]) ){
							header('Location: index.php');
							echo "hello";
						}
						
						//declaration
						$curriculumName = $_POST['curr_selected'];
						
						
						
					    $locationName = $_POST['loc_selected'];
						
						$employeeEID = $_POST['emp_selected'];
						
						
						$_SESSION['admin-course-curr'] = $curriculumName;
						
						$_SESSION['admin-course-loc'] = $locationName;
						
						$_SESSION['admin-coursee-eid'] = $employeeEID;
					  
					  
						// Connecting, selecting database
						$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
							or die('Could not connect: ' . pg_last_error());

					echo '<div class = "col-md-2">';
					echo " <h2> Teacher Name: ";
					$tempvar = $_POST['emp_selected'];
					$empnamequery = "SELECT E_F_Name, E_L_Name FROM Employees where EID = '$tempvar' ";
					$empnameresult = pg_query($empnamequery ) or die('Query failed: ' . pg_last_error());
					$empnamerow = pg_fetch_array($empnameresult);
					$employeefname = $empnamerow['e_f_name'];
					$employeelname = $empnamerow['e_l_name'];
					echo  "$employeefname ";
					echo   "$employeelname";
					echo  "</h2>";
					echo  "</div>";
					
					
						
						// Performing SQL query
						$uniqueclassquery = "SELECT DISTINCT Class_Subjects.Class_Subject, Classes_Scheduled.Class_ID, Classes_Scheduled.Date_Time_Schedules, Class_Subjects.C_Subject
						FROM Class_Subjects, Curriculum_Subjects, Curriculum, Classes_Scheduled, Locations, Employees 
						WHERE (Class_Subjects.C_Subject = Curriculum_Subjects.C_Subject) 
						AND (Curriculum_Subjects.CID = Curriculum.CID) 
						AND (Curriculum.Curriculum_Name = '$curriculumName' )
						AND (Curriculum_Subjects.CID = Classes_Scheduled.CID)
						AND (Classes_Scheduled.EID = Employees.EID)
						AND (Classes_Scheduled.Location_ID = Locations.Location_ID)
						AND (Classes_Scheduled.C_Subject = Curriculum_Subjects.C_Subject)
						AND (Locations.Location_Name =  '$locationName')
						AND (Employees.EID = '$employeeEID ')		order by Class_Subjects.C_Subject ASC";
						
						$uniqueclassresult = pg_query($uniqueclassquery) or die('Query failed: ' . pg_last_error());
						
						$uniqueclassrow = pg_fetch_array($uniqueclassresult);
						
						if(empty($uniqueclassrow)){
							
							echo "<h2>There are no classes scheduled.</h2>";
							echo "<a href='class-scheduler.php'>Schedule a class</a>";
							
						} else {
							echo "<form onsubmit='return validateInput()' action = 'admin-tools-class-selected.php' method='post'>";
							echo					'<label>Classes in the curriculum</label>';
							echo      "<select  name = 'classidPicked' id='classidPicked'>";
							echo 		'<option selected disabled class="hideoption">Select One</option>';
							while($uniqueclassrow = pg_fetch_array($uniqueclassresult)){
								echo "<option value='".$uniqueclassrow['class_id']."'>".$uniqueclassrow['class_subject']." ".$uniqueclassrow['date_time_schedules']."</option>";
							}
							
							
							
							
							
							
							echo "</select> ";
							
							
							echo '<input type="submit" name =  "classPick" value="Choose Class" id="edit" class="btn btn-default" style="width:20%; font-weight:bold;"></input>';
					
							echo		'</form>';
						}
					
					
					
					
					
					
					
					
				
			echo  '</div>';
			
		


		
		
		
echo		'</div>';
	
	
	
	
echo	'</div>';
	
	?>
	
	
	
	
<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>
<script type="text/javascript">
function validateInput(){
	document.getElementById("errorID").value = ""
	document.getElementById("errorID").style.display = "none";
	
	if(document.getElementById("classidPicked").value == "Select One"){
		document.getElementById("errorID").innerHTML = "Please select a curriculum";
		document.getElementById("errorID").style.display = "block";
		return false;
	}
	
	//If we got here then everything is as it should be
	return true; 
	
}
</script>
	
</body>


</html>
	
	
	
	
	
	
	
	
	
	
	
