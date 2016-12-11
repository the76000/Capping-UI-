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
			echo "hello";
		}
	  
	  
		// Connecting, selecting database
		$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
			or die('Could not connect: ' . pg_last_error());
			
			$mainquery = "SELECT ref_f_name, ref_l_name, comments FROM public.class_attendence INNER JOIN public.referrals ON public.class_attendence.p_num = public.referrals.p_num WHERE class_id = '".$_POST['classSelect']."'";
			
			$mainresult = pg_query($mainquery) or die('Query failed: ' . pg_last_error());
			
			$result = pg_fetch_array($mainresult);
			
			foreach ($result as $test){
				echo "$test </br>";
			} 
			
			
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
								
								if(isset($_POST['classSelect'])){
										echo "<option selected=`".$_POST['classSelect']."`>".$_POST['classSelect']."</option>";
									}								
								
							?>
								
							</select>
						</div>
					</div>
				</div>  
				
				<div class="row">
				
					<table border="1px">
						<tr>
							<td> First Name </td>
							<td> Last Name </td>
							<td> Comments </td>
						</tr>
						<?php
						
							$mainquery = "SELECT ref_f_name, ref_l_name, comments FROM public.class_attendence INNER JOIN public.referrals ON public.class_attendence.p_num = public.referrals.p_num WHERE class_id = '".$_POST['classSelect']."'";
			
							$mainresult = pg_query($mainquery) or die('Query failed: ' . pg_last_error());
							
							while($row = pg_fetch_array($mainresult)){
							echo "<tr><td>".$row['ref_f_name']."</td><td>".$row['ref_l_name']."</td><td>".$row['comments']."</td></tr>";
							}
							
							
						?>
					
					</table>
				
				</div>
					
					

		</div>

	</div>		
	
	<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>
			
</body>
</html>