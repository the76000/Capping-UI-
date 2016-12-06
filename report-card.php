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


	
	
 $participantnumber = $_POST['participant_name'];
 
 $_SESSION['report-card-pnum'] = $participantnumber ;
 
 

 $cidSession = $_SESSION['report_card_curr'] ;
 
 $_SESSION['pnumreportcard'] = $participantnumber;
 
   
  // Connecting, selecting database
$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$fnamequery = "SELECT r.ref_f_name FROM referrals r inner join participants p on p.p_num = r.p_num where p.p_num =  '$participantnumber'";
$fnameresult = pg_query($fnamequery) or die('Query failed: ' . pg_last_error());
$fnamerow = pg_fetch_array($fnameresult, null, PGSQL_ASSOC);

$participantfname = $fnamerow['ref_f_name'];

$_SESSION['report-card-fname'] = $participantfname;

$lnamequery = "SELECT r.ref_l_name FROM referrals r inner join participants p on p.p_num = r.p_num where p.p_num =  '$participantnumber'";
$lnameresult = pg_query($lnamequery) or die('Query failed: ' . pg_last_error());
$lnamerow = pg_fetch_array($lnameresult, null, PGSQL_ASSOC);

$participantlname = $lnamerow['ref_l_name'];

$_SESSION['report-card-lname'] = $participantlname;


$currnamequery = "SELECT curriculum_name FROM curriculum where cid = '$cidSession' ";
$currnameresult = pg_query($currnamequery) or die('Query failed: ' . pg_last_error());
$currnamerow = pg_fetch_array($currnameresult, null, PGSQL_ASSOC);

$currname = $currnamerow['curriculum_name'];


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
$classesrow = pg_fetch_array($classesresult, 0, PGSQL_ASSOC);

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


	
$employeequery = "SELECT e.eid FROM employees e	
inner join classes_scheduled csch on csch.eid = e.eid 
inner join class_attendence ca on ca.eid = csch.eid 
where ca.p_num = '$participantnumber'";
$employeeresult = pg_query($employeequery) or die('Query failed: ' . pg_last_error());
$employeerow = pg_fetch_array($employeeresult, null, PGSQL_ASSOC);	
	
$employeeID = 	$employeerow['eid'];


$attendedclassquery = "SELECT ca.* FROM class_attendence ca inner join participants p on ca.p_num = p.p_num where ca.p_num = '$participantnumber'";
$attendedclassresult = pg_query($attendedclassquery) or die('Query failed: ' . pg_last_error());
//$attendedclassrow = pg_fetch_array($attendedclassresult, null, PGSQL_ASSOC);		


	
	

echo	'<div class = "container">';
echo		'<div class = "jumbotron">';

echo			'<form action = "report-card-class-selected.php" method="post" class="navbar-form">';
echo				'<div class="input-group">';
echo					"<h1>  $participantfname    $participantlname              </h1>";
echo				'</div>';
echo				'<div class="row" id="attendanceRow">';

echo					'<div class="col-md-4 input-lg">';
echo					'<label>Curriculum Name:';
echo                    " $currname ";

echo                 '</label>';
						
echo					'</div>';
echo					'<div class="col-md-4 input-lg">';
echo					'<label>Select class</label>';
echo						'<select class="form-control" name="class_selected">';

//$nameline = pg_fetch_array($classesnameresult, null, PGSQL_ASSOC);

					while (($line = pg_fetch_array($classesresult, null, PGSQL_ASSOC)) and ($nameline = pg_fetch_array($classesnameresult, null, PGSQL_ASSOC))){
						foreach($line as $col_value){
							
							
							foreach($nameline as $name_col_value){
							
							
echo						"<option value='$col_value'>   '$name_col_value'</option>"; 
							
								
						}
						
						
						}


					}
							
echo						'</select>  ';



//if 

/*
<td><input type="radio" name="id" value="<?php echo $row['id']; ?>" <?php if($row['selected'] == 1) echo "checked"; ?> /></td>
*/ 

echo					'</div>';
echo			'</div>';

echo				'<button type="submit" name="submitClass" class="btn btn-default ">Submit Class</button> ';   
echo			'</form>';





	


					


?>


</body>
</html>
