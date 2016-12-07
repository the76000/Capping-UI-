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

	<title>CPCA Report Card </title>
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
				<a class="navbar-brand" href="#">Submit Attendance</a>
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
	
	
	<?php 
session_start();
	
	if (!isset($_SESSION["username"]) ){
		header('Location: index.php');
		echo "hello";
	}


	
	
 
 
 

 $cidSession = $_SESSION['report_card_curr'] ; //from report-card-search 
 

   
  // Connecting, selecting database
$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());

$currname = $_SESSION['curr_name_report_card'];

$participantlname = $_SESSION['report-card-lname']; 

$participantfname = $_SESSION['report-card-fname']; 


 $participantnumber = $_SESSION['report-card-pnum'] ;
 
 $cidSession = $_SESSION['report_card_curr'] ;
 
   $_SESSION['eidreport'] = $_POST['Instructor_select']; //from classes attended form report-card
 
 $eidfromreport =  $_POST['Instructor_select']; //working fine using the wrong $post value
 
 //with the class id from report-card(classidreport), we now need the class name
$empnamequery =  "SELECT * FROM employees where eid = '$eidfromreport '";



$empnameresult = pg_query($empnamequery) or die('Query failed: ' . pg_last_error());
$empnamerow = pg_fetch_array($empnameresult, 0, PGSQL_ASSOC);

	
$empdisplayfname = $empnamerow['e_f_name'];	
 
 
$empdisplaylname = $empnamerow['e_l_name'];	
 

# Gets the id of all the classes a specific participant has already taken



$classesattendedquery = "
SELECT DISTINCT
Classes_Scheduled.Class_ID,
Class_Subjects.Class_Subject

FROM 
Referrals,
Participants,
Class_Attendence,
Classes_Scheduled,
Curriculum_Subjects,
Class_Subjects,
Employees

WHERE

Referrals.P_Num = '$participantnumber'
And Referrals.P_Num = Participants.P_Num
AND Participants.P_Num = Class_Attendence.P_Num
AND Class_Attendence.Class_ID = Classes_Scheduled.Class_ID
AND Classes_Scheduled.C_Subject = Curriculum_Subjects.C_Subject
AND Classes_Scheduled.EID = Employees.EID
AND Curriculum_Subjects.C_Subject = Class_Subjects.C_Subject
AND Employees.eid =  $eidfromreport";


$classesattendedresult = pg_query($classesattendedquery) or die('Query failed: ' . pg_last_error());
$classesattendedrow = pg_fetch_array($classesattendedresult, 0, PGSQL_ASSOC);


//gets the class id and class subject that a participant has not attended yet
$classesnotattendedquery = "

                 SELECT DISTINCT
				Classes_Scheduled.Class_ID
				

				FROM 
				Classes_Scheduled
				WHERE
				Classes_Scheduled.Class_ID NOT IN (
									-- Gets the id and names of all the classes a specific participant has already taken
									SELECT DISTINCT
									Classes_Scheduled.Class_ID

									FROM 
									Referrals,
									Participants,
									Class_Attendence,
									Classes_Scheduled,
									Curriculum_Subjects,
									Class_Subjects,
									Employees

									WHERE
									Referrals.P_Num = '$participantnumber'
									And Referrals.P_Num = Participants.P_Num
									AND Participants.P_Num = Class_Attendence.P_Num
									AND Class_Attendence.Class_ID = Classes_Scheduled.Class_ID
									AND Classes_Scheduled.C_Subject = Curriculum_Subjects.C_Subject
									AND Classes_Scheduled.EID = Employees.EID
									AND Curriculum_Subjects.C_Subject = Class_Subjects.C_Subject									
									AND Employees.eid =  '$eidfromreport')

ORDER BY Classes_Scheduled.Class_ID";




$classesnotattendedresult = pg_query($classesnotattendedquery) or die('Query failed: ' . pg_last_error());
$classesnotattendedrow = pg_fetch_array($classesnotattendedresult, 0, PGSQL_ASSOC);

//$classesnotattendedrow['class_id'];



 





# Gets the name of all the classes a specific participant has already taken












	
	

echo	'<div class = "container">';
echo		'<div class = "jumbotron taller">';


echo				'<div class="input-group">';
echo					"<h1>  $participantfname    $participantlname              </h1>";
echo				'</div>';
echo				'<div class="row" id="attendanceRow">';

echo					'<div class="col-md-4 input-lg">';
echo					'<label>Curriculum Name:';
echo                    " $currname ";

echo                 '</label>';
						
echo					'</div>';

echo			'<form action = "report-card-instructor.php" method="post" class="navbar-form">';
echo					'<div class="col-md-6 input-lg">';
echo					'<label>Instructors</label>';
echo						"<option value=' $eidfromreport '> Instructor Picked:   $empdisplayfname    $empdisplaylname</option>"; 




 echo			'</div>';
 
 echo			'</form>';

echo			'</div>';


echo			'<form action = "report-card-class-selected.php" method="post" class="navbar-form">';
echo					'<div class="col-md-6 input-lg">';
echo					'<label>Classes Attended</label>';
echo						'<select class="form-control" name="class_selected_attended">';

//$nameline = pg_fetch_array($classesnameresult, null, PGSQL_ASSOC);
		//this is the best way to display multiple columns from a query that selects more than one column
				while ($attended_line = pg_fetch_assoc($classesattendedresult) ){
					//will make another one of these when i get the query from frank that gets classes not attended	
							
							
							$attended_col_value_var = $attended_line['class_id'];
							
							$attended_col_value_var2 = $attended_line['class_subject'];
						
							
							
echo						"<option value='$attended_col_value_var'>   '$attended_col_value_var2'</option>"; 
							
								
						
						
						
						

				}
							
echo						'</select>  ';


echo				'<button type="submit" name="submitClassAttended" class="btn btn-default ">Select Class</button> '; 

 echo			'</div>';
 
 echo			'</form>';


echo			'<form action = "report-card-class-selected.php" method="post" class="navbar-form">';
echo					'<div class="col-md-4 input-lg">';
echo					'<label>Classes NOT Attended</label>';
echo						'<select class="form-control" name="class_selected_not_attended">';

//$nameline = pg_fetch_array($classesnameresult, null, PGSQL_ASSOC);

		//this is the best way to display multiple columns from a query that selects more than one column
				while ($not_attended_line = pg_fetch_assoc($classesnotattendedresult) ){
				
							
							
							$not_attended_col_value_var = $not_attended_line['class_id'];
							
							//$not_attended_col_value_var2 = $classesnotattendedsubjectrow['class_subject'];
						
							
							
echo						"<option value='$not_attended_col_value_var'>   '$not_attended_col_value_var'</option>"; //not displaying actual name, just class id
							
								
						
						
						
						

				}
							
echo						'</select>  ';


echo				'<button type="submit" name="submitClassNotAttended" class="btn btn-default ">Select Class</button> ';   


//if 

/*
<td><input type="radio" name="id" value="<?php echo $row['id']; ?>" <?php if($row['selected'] == 1) echo "checked"; ?> /></td>
*/ 

echo					'</div>';

 echo			'</form>';















	


					


?>


</body>
</html>