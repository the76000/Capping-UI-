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

	<title> CPCA attendance </title>
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
				<a class="navbar-brand" href="#">Attendance Reports</a>
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
	
		
	// Connecting, selecting database
$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());
	
	session_start();
	#checks if user is logged in
	if (!isset($_SESSION["username"]) ){
		header('Location: index.php');
	}	
	
?>
	
	
 	<div class = "container">
		<div class = "row">
		
		
		
		<div class = "jumbotron">
		<div class = "col-md-4"> 
			<p class="label label-info"> Individual Attendance  </p>
			
		</div>
		
		<div class = "col-md-4">
			
				<?php
					echo "<p>Name: ".$_POST['f_name']." ".$_POST['l_name']." </p>"
				?>
			
		</div>
		
		<div class = "col-md-4">
			<?php
				$pnumquery = "SELECT curriculum_name, curriculum.cid
							  FROM public.referrals
							  INNER JOIN public.participants ON public.referrals.p_num = public.participants.p_num
							  INNER JOIN public.curriculum ON public.curriculum.cid = public.participants.cid
							  WHERE ref_f_name = '".$_POST['f_name']."' AND ref_l_name = '".$_POST['l_name']."'";
				
				$result = pg_query($pnumquery) or die('Query failed: ' . pg_last_error());
				
				$p_num = pg_fetch_array($result);
				
				echo "<p>Curriculum: ".$p_num['curriculum_name']." </p>"
			?>
		</div>
		
 			<table class="table">
    <thead>
      <tr>      
        <th>Class</th>
 		<th>Attended?</th>
 		<th>Comments</th>
      </tr>
    </thead>
    <tbody>
		<?php
			$firstname = $_POST['f_name'];
			$lastname = $_POST['l_name'];
					
			$query = "SELECT p_num FROM referrals WHERE ref_f_name = '$firstname' AND ref_l_name = '$lastname'";
					
			$result = pg_query($query) or die('Query failed: ' . pg_last_error());
					
			$p_num = pg_fetch_array($result);
			$p_num = $p_num['p_num'];
			
			$attendedquery = "SELECT DISTINCT
							  Class_Subjects.C_Subject,
							  Class_Subjects.Class_Subject,
							  Class_Attendence.Participant_Comment

							  FROM
							  Referrals,
							  Participants,
							  Class_Attendence,
							  Classes_Scheduled,
							  Curriculum_Subjects,
							  Class_subjects 
							  
							  WHERE
							  Referrals.P_Num = '$p_num'
							  AND Referrals.P_num = participants.p_num
							  AND participants.p_num = class_Attendence.p_num
							  AND class_Attendence.class_id = classes_scheduled.class_id
						 	  AND Classes_scheduled.c_subject = curriculum_subjects.c_subject
							  AND curriculum_subjects.c_subject = class_subjects.c_subject

							  ORDER BY class_subjects.c_subject";
							
			$result1 = pg_query($attendedquery) or die('Query failed: ' . pg_last_error());
			
						
			while($row = pg_fetch_array($result1)){
				echo "<tr>";
				echo "<td style='float:left;'>".$row['class_subject']."</td>";
				echo "<td>Yes</td>";
				echo "<td style='float:left;'>".$row['participant_comment']."</td>";				
				echo "</tr>";
			}
			
			$notattendedquery = "SELECT DISTINCT
								 Class_Subjects.C_Subject,
								 Class_Subjects.Class_Subject

								 FROM 
								 Referrals,
								 Participants,
								 Curriculum,
								 Curriculum_Subjects,
								 Class_Subjects

								 WHERE
								 Referrals.P_Num = '$p_num'
								 AND Referrals.P_Num = Participants.P_Num
								 AND Participants.CID = Curriculum.CID
								 AND Curriculum.CID = Curriculum_Subjects.CID
								 AND Curriculum_Subjects.C_Subject = Class_Subjects.C_Subject
								 AND Curriculum_Subjects.C_Subject NOT IN 
								 (SELECT DISTINCT
								  Curriculum_Subjects.C_Subject

								  FROM 
								  Referrals,
								  Participants,
								  Class_Attendence,
								  Classes_Scheduled,
								  Curriculum_Subjects,
								  Class_Subjects

								  WHERE
								  Referrals.P_Num = '$p_num'
								  AND Referrals.P_Num = Participants.P_Num
								  AND Participants.P_Num = Class_Attendence.P_Num
								  AND Class_Attendence.Class_ID = Classes_Scheduled.Class_ID
								  AND Classes_Scheduled.C_Subject = Curriculum_Subjects.C_Subject
								  AND Curriculum_Subjects.C_Subject = Class_Subjects.C_Subject)
								  
								  ORDER BY Class_Subjects.C_Subject";
			
			$result2 = pg_query($notattendedquery) or die('Query failed: ' . pg_last_error());
			
						
			while($row = pg_fetch_array($result2)){
				echo "<tr>";
				echo "<td style='float:left;'>".$row['class_subject']."</td>";
				echo "<td>No</td>";				
				echo "</tr>";
			}
		
		?>
    </tbody>
  </table>
		
		
		
			</div>
		

		
		
			
		<div class = "col-md-6">
		
		
		
		</div>
	
	
	</div>
		
	
	
 </div>
	
	
	
	
	
	
	
</body>


</html>
