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


	
	
 $participantnumber = $_POST['participant_name']; //from report-card-search selector
 
 $_SESSION['report-card-pnum'] = $participantnumber ; //add pnum to the session
 
 

 $cidSession = $_SESSION['report_card_curr'] ; //from report-card-search 
 
 $_SESSION['pnumreportcard'] = $participantnumber;
 
   
   # Connect to Postgres server and the database
    require( 'includes/connect.php' ) ;

// Performing SQL query
$fnamequery = "SELECT r.ref_f_name FROM referrals r 
inner join participants p on p.p_num = r.p_num 
where p.p_num =  '$participantnumber'";
$fnameresult = pg_query($fnamequery) or die('Query failed: ' . pg_last_error());
$fnamerow = pg_fetch_array($fnameresult, null, PGSQL_ASSOC);

$participantfname = $fnamerow['ref_f_name']; //get the first name of the pnum selected

$_SESSION['report-card-fname'] = $participantfname;



$lnamequery = "SELECT r.ref_l_name FROM referrals r 
inner join participants p on p.p_num = r.p_num 
where p.p_num =  '$participantnumber'";
$lnameresult = pg_query($lnamequery) or die('Query failed: ' . pg_last_error());
$lnamerow = pg_fetch_array($lnameresult, null, PGSQL_ASSOC);

$participantlname = $lnamerow['ref_l_name']; //get the last name of the pnum selected

$_SESSION['report-card-lname'] = $participantlname;


$currnamequery = "SELECT curriculum_name FROM curriculum where cid = '$cidSession' ";
$currnameresult = pg_query($currnamequery) or die('Query failed: ' . pg_last_error());
$currnamerow = pg_fetch_array($currnameresult, null, PGSQL_ASSOC);

$currname = $currnamerow['curriculum_name']; //get the correct curriculum name

$_SESSION['curr_name_report_card'] = $currnamerow['curriculum_name'];

/*
Referrals.Ref_F_Name,
Referrals.Ref_L_Name,
Curriculum.Curriculum_Name,
Class_Subjects.Class_Subject
*/


$classesquery = "SELECT DISTINCT
Classes_Scheduled.Class_ID


FROM 
Referrals,
Curriculum,
Participants,
Classes_Scheduled,
Curriculum_Subjects,
Class_Subjects

WHERE

Referrals.P_Num = '$participantnumber'

AND Referrals.P_Num = Participants.P_Num

AND Participants.CID = Curriculum.CID

AND Curriculum.CID = Curriculum_Subjects.CID

AND Curriculum_Subjects.C_Subject = Class_Subjects.C_Subject "; 



//make a teacher dropdown, and location dropdown   possibly
$classesresult = pg_query($classesquery) or die('Query failed: ' . pg_last_error());
$classesrow = pg_fetch_array($classesresult, 0, PGSQL_ASSOC); //get the class id from schedules

$classesnamequery = "SELECT DISTINCT
Class_Subjects.Class_Subject


FROM 
Referrals,
Curriculum,
Participants,
Classes_Scheduled,
Curriculum_Subjects,
Class_Subjects

WHERE

Referrals.P_Num = '$participantnumber'

AND Referrals.P_Num = Participants.P_Num

AND Participants.CID = Curriculum.CID

AND Curriculum.CID = Curriculum_Subjects.CID

AND Curriculum_Subjects.C_Subject = Class_Subjects.C_Subject "; 
//make a teacher dropdown, and location dropdown   possibly
$classesnameresult = pg_query($classesnamequery) or die('Query failed: ' . pg_last_error());
$classesnamerow = pg_fetch_array($classesnameresult, 0, PGSQL_ASSOC);
//get the class name from schedule


	/*
$employeequery = "SELECT e.eid FROM employees e	
inner join classes_scheduled csch on csch.eid = e.eid 
inner join class_attendence ca on ca.eid = csch.eid 
where ca.p_num = '$participantnumber'";
$employeeresult = pg_query($employeequery) or die('Query failed: ' . pg_last_error());
$employeerow = pg_fetch_array($employeeresult, null, PGSQL_ASSOC);	
	
$employeeID = 	$employeerow['eid'];

*/


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
Class_Subjects

WHERE

Referrals.P_Num = '$participantnumber'
And Referrals.P_Num = Participants.P_Num
AND Participants.P_Num = Class_Attendence.P_Num
AND Class_Attendence.Class_ID = Classes_Scheduled.Class_ID
AND Classes_Scheduled.C_Subject = Curriculum_Subjects.C_Subject
AND Curriculum_Subjects.C_Subject = Class_Subjects.C_Subject";


$classesattendedresult = pg_query($classesattendedquery) or die('Query failed: ' . pg_last_error());


if (pg_numrows($classesattendedresult) == 0){
	
}
else{
$classesattendedrow = pg_fetch_array($classesattendedresult, 0, PGSQL_ASSOC);
}

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
									Class_Subjects

									WHERE
									-- TESTING WITH P_Num 1
									Referrals.P_Num = 1
									And Referrals.P_Num = Participants.P_Num
									AND Participants.P_Num = Class_Attendence.P_Num
									AND Class_Attendence.Class_ID = Classes_Scheduled.Class_ID
									AND Classes_Scheduled.C_Subject = Curriculum_Subjects.C_Subject
									AND Curriculum_Subjects.C_Subject = Class_Subjects.C_Subject)

ORDER BY Classes_Scheduled.Class_ID";




$classesnotattendedresult = pg_query($classesnotattendedquery) or die('Query failed: ' . pg_last_error());
$classesnotattendedrow = pg_fetch_array($classesnotattendedresult, 0, PGSQL_ASSOC);

//$classesnotattendedrow['class_id'];



$employeesquery = " SELECT employees.* FROM employees";
$employeesresult = pg_query($employeesquery) or die('Query failed: ' . pg_last_error());
$employeesrow = pg_fetch_array($employeesresult, 0, PGSQL_ASSOC);





# Gets the name of all the classes a specific participant has already taken













	
	

echo	'<div class = "container">';
echo		'<div class = "jumbotron taller">';
echo		'<center><div class="error" id="errorID" style="display:none"></div></center>';

echo				'<div class="input-group">';
echo					"<h1>  $participantfname    $participantlname              </h1>";
echo				'</div>';
echo				'<div class="row" id="attendanceRow">';

echo					'<div class="col-md-4 input-lg">';
echo					'<label>Curriculum Name:';
echo                    " $currname ";

echo                 '</label>';
						
echo					'</div>';

echo			'<form onsubmit="return validateInput()" action = "report-card-instructor.php" method="post" class="navbar-form">';
echo					'<div class="col-md-6 input-lg">';
echo					'<label>Instructors</label>';
echo						'<select class="form-control" name="Instructor_select" id="instructorSelect">
							<option selected disabled class="hideoption">Select One</option>';

//$nameline = pg_fetch_array($classesnameresult, null, PGSQL_ASSOC);
		//this is the best way to display multiple columns from a query that selects more than one column
				while ($employee_line = pg_fetch_assoc($employeesresult) ){
				
							
							$employee_col_value_var = $employee_line['eid'];
							
							$employee_col_value_var2 = $employee_line['e_f_name'];
							
							$employee_col_value_var3 = $employee_line['e_l_name'];
						
							
							
echo						"<option value='$employee_col_value_var'>   '$employee_col_value_var2'   '$employee_col_value_var3'</option>"; 
							
								
						
						
						
						

				}
							
echo						'</select>  ';


echo				'<button type="submit" name="submitInstructor" class="btn btn-default ">Submit Instructor</button> '; 

 echo			'</div>';
 
 echo			'</form>';

echo			'</div>';



					


?>

<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>

<script type="text/javascript">
	function validateInput(){
		document.getElementById("errorID").value = ""
		document.getElementById("errorID").style.display = "none";
		
		if(document.getElementById("instructorSelect").value == "Select One"){
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
