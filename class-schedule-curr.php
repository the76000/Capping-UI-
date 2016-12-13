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

	<title> CPCA Class Scheduler </title>
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
				<a class="navbar-brand" href="#">Class Scheduler</a>
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
	
		<?php
		
		session_start();
			
								if (!isset($_SESSION["username"]) ){
									header('Location: index.php');
									echo "hello";
								}
							  
							  
								// Connecting, selecting database
								$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
									or die('Could not connect: ' . pg_last_error());
									
									
								$cid = $_POST['currselected'];	
								
								$_SESSION['cid_class_schedule'] = $cid;
								
								
								
	echo '<div class = "container">';
	echo		'<h3>Schedule a Class</h3>';
	
	echo 	'<div class = "jumbotron">';
	echo	'<center><div class="error" id="errorID" style="display:none"></div></center>';
	echo			'<div class="row">';
	echo			'<div class="col-sm-4">';
	echo					'<div class="form-group">';
	
	
						
								

								// Performing SQL query
								$query = "SELECT * FROM public.curriculum  WHERE cid = '$cid' ORDER BY cid ASC ";
								
								$result = pg_query($query) or die('Query failed: ' . pg_last_error());
								
								while($row = pg_fetch_array($result)){
									$currname = $row['curriculum_name'];							
									echo '<label for="sel1">Curriculum Selected: '.$currname.'</label>'; 
									echo '<!-- this is for the 28 indivual classes, not for the course/groups. data mismatch -->';
								}			
				echo		'</div></div>';
				echo		'<form style="margin-left: 15px"  action="class-schedule-post.php" method="post" onsubmit="return validateInput()">';
				
				echo	'</div>';
				echo	'<div class="row">';
				echo	'<div class="col-sm-4">';
				echo		'<div class="form-group">';
				echo			'<label for="usr">Teacher</label>';
				echo						'<select class="form-control" name = "teacher_selected" id="teacherName">
											<option selected disabled class="hideoption">Select One</option>';
						
								

								// Performing SQL query
								$teachernamequery = "SELECT * FROM Employees ORDER BY e_f_name ASC";
								
								$teachernameresult = pg_query($teachernamequery) or die('Query failed: ' . pg_last_error());
								
								while($teachernamerow = pg_fetch_array($teachernameresult)){
									echo "<option value='".$teachernamerow['eid']."'>".$teachernamerow['e_f_name']."   ".$teachernamerow['e_l_name']."</option>";
								}
							
				echo		'</select>';						
				echo		'</div>';
				echo	'</div>';
				echo 	'<div class="col-sm-4">';
				echo		'<div class="form-group">';
				echo			'<label for="usr">Class Name</label>';
				
				
				echo						'<select class="form-control" name = "class_selected" id="className">
											<option selected disabled class="hideoption">Select One</option>';
						
								

								// Performing SQL query
								$classnamequery = "SELECT class_subjects.* 
								FROM class_subjects, curriculum_subjects, curriculum
								WHERE class_subjects.c_subject = curriculum_subjects.c_subject
								AND curriculum_subjects.cid = curriculum.cid
								AND curriculum.cid = '$cid'
								ORDER BY class_subjects.c_subject ASC ";
								
								$classnameresult = pg_query($classnamequery) or die('Query failed: ' . pg_last_error());
								
								while($classnamerow = pg_fetch_array($classnameresult)){
									echo "<option value='".$classnamerow['c_subject']."'>".$classnamerow['class_subject']."</option>";
								}
							
				echo		'</select>';						
				echo		'</div>';
				echo	'</div>';
				echo '</div>';			
				
				echo	'<div class="row">';
				echo	'<div class="col-sm-4">';
				echo		'<div class="form-group">';
				echo			'<label for="usr">Location</label>';
				echo						'<select class="form-control" name = "location_selected" id="locationName">
											<option selected disabled class="hideoption">Select One</option>';
						
								

								// Performing SQL query
								$locnamequery = "SELECT * FROM locations ORDER BY location_name ASC";
								
								$locnameresult = pg_query($locnamequery) or die('Query failed: ' . pg_last_error());
								
								while($locnamerow = pg_fetch_array($locnameresult)){
									echo "<option value='".$locnamerow ['location_id']."'>".$locnamerow ['location_name']." </option>";
								}
							
				echo		'</select>';			
				echo		'</div>';
				echo	'</div>';
				echo	'<div class="col-sm-4">';
				echo		'<div class="form-group">';
				echo			'<label for="usr">Time</label>';
				echo			'<input  name="currTime" class="form-control" id="curriculumTime" placeholder="yyyy-mm-dd 00:00:00">';
    			
				echo		'</div>';
				echo	'</div>';
				echo	'</div>';

			
			?>

		<br><button type="submit" class="btn btn-default ">Submit</button>
		</form>
		</div>
	</div>
	</div>		
	<script type="text/javascript">
	function validateInput(){
		document.getElementById("errorID").value = ""
		document.getElementById("errorID").style.display = "none";
		
		if(document.getElementById("teacherName").value == "Select One"){
			document.getElementById("errorID").innerHTML = "Please select an instructor";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		if(document.getElementById("className").value == "Select One"){
			document.getElementById("errorID").innerHTML = "Please select a class";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		if(document.getElementById("locationName").value == "Select One"){
			document.getElementById("errorID").innerHTML = "Please select a location";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		if(document.getElementById("curriculumTime").value == ""){
			document.getElementById("errorID").innerHTML = "Please enter a time";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		
		//If we got here then everything is as it should be
		return true; 
		
	}
</script>
</body>
</html>
									
									
									
									
									
	