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
	<?php
		session_start();

		if (!isset($_SESSION["username"]) ){
			header('Location: index.php');
		}
	  
	  
		// Connecting, selecting database
		$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
			or die('Could not connect: ' . pg_last_error());
	?>	
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
				<a class="navbar-brand" href="#">Report Card</a>
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

	<div class = "container">

		<div class = "jumbotron">
			<h3>Class Attendance Report</h3>
			<form style="margin-left: 15px" action="class-attendance-submitted.php" method="post">
				<div class="row">
				<div class="col-sm-4">
						<div class="form-group">
							<label for="sel1">Select A Curriculum:</label> <!-- this is for the 28 indivual classes, not for the course/groups. data mismatch -->
							<select class="form-control" id="sel1" name="curriculumSelect" disabled>							
								<?php 
									if(isset($_POST['curriculumSelect'])){
										echo "<option selected=`".$_POST['curriculumSelect']."`>".$_POST['curriculumSelect']."</option>";
									}								
								?>							
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="sel1">Select A Class:</label> <!-- this is for the 28 indivual classes, not for the course/groups. data mismatch -->
							<select class="form-control" id="sel1" name="classSelect">
							<?php
								
								$cname = $_POST['curriculumSelect'];
								
								$cidquery = "SELECT cid FROM public.curriculum WHERE curriculum_name = '".$cname."'";							
								
								$cidresult = pg_query($cidquery) or die('Query failed: ' . pg_last_error());
								
								$cid = pg_fetch_array($cidresult);
								
								$cid = $cid[0];
								
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
								
								
							?>
								
							</select>
						</div>
					</div>
					</div>
					<div class="row">
				</div>

				<button type="submit" class="btn btn-default ">Submit</button>    
			</form>

		</div>

	</div>		
	
	<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>
			
</body>
</html>
