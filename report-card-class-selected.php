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
	  // Connecting, selecting database
$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
	


 $participantnumber = $_SESSION['report-card-pnum'] ; //gets pnum 
 
 $cidSession = $_SESSION['report_card_curr'] ;
 

 
 

 
 
 
 $_SESSION['classidreport'] = $_POST['class_selected_attended']; //from classes attended form report-card
 
 $classidfromreport =  $_POST['class_selected_attended']; //working fine using the wrong $post value
 
 
 
 
 echo " $classidfromreport";
 

 


$participantfname =  $_SESSION['report-card-fname']; //part first name


$participantlname = $_SESSION['report-card-lname']; //part last name



$currname = $_SESSION['curr_name_report_card'] ;


//with the class id from report-card(classidreport), we now need the class name
$classnamequery =  "SELECT class_subjects.class_subject FROM class_subjects 
inner join curriculum_subjects on curriculum_subjects.c_subject = class_subjects.c_subject
inner join classes_scheduled on classes_scheduled.c_subject = curriculum_subjects.c_subject
where classes_scheduled.class_id =  '$classidfromreport'"; 



$classnameresult = pg_query($classnamequery) or die('Query failed: ' . pg_last_error());
$classnamerow = pg_fetch_array($classnameresult, 0, PGSQL_ASSOC);

	
$classdisplayname = $classnamerow['class_subject'];	

																
//going to query class attendence table for matching pnum and classid, will show if class was attended for html
$classattendedquery = " SELECT class_id FROM class_attendence where class_id = '$classidfromreport' and p_num = ' $participantnumber '";
$classattendedresult = pg_query($classattendedquery) or die('Query failed: ' . pg_last_error());
$classattendedrow = pg_fetch_array($classattendedresult, 0, PGSQL_ASSOC);





//need the specific class id

//$attendedclassquery = "SELECT ca.class_id from class_attendence ca inner join classes_scheduled csch on ca.class_id = csch.class_id inner join curriculum_subjects curr_sub on csch.cid = curr_sub.cid inner join class_subjects c_sub on c_sub.c_subject = curr_sub.c_subject where c_sub.class_subject = '$class_selected' and ca.p_num = '$participantnumber' ";

		


	

	
	

echo	'<div class = "container">';
echo		'<div class = "jumbotron">';

echo			'<form action = "" method="post" class="navbar-form">';
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



					
						
echo						"<option value='$classidfromreport'> Class Picked:  '$classdisplayname'</option>"; //this needs to be a seperate php form so that the correct attendence value can be used

						


					
							


echo					'</div>';
echo			'</div>';

#echo				'<button type="submit" name="submitClass" class="btn btn-default ">Submit Class</button> ';   
echo			'</form>';



//if 

/*
<td><input type="radio" name="id" value="<?php echo $row['id']; ?>" <?php if($row['selected'] == 1) echo "checked"; ?> /></td>
*/
echo			'<form action = "post-report-card.php" method="post" >'; //posting attendance to the db
echo				'<div class="row">';
echo					'<div class="col-sm-5">';
				
					
echo						'<div id="checkbox1">';

//$_SESSION['submit_attended_yes'] 
			if(pg_num_rows($classattendedresult) > 0  ){
				echo  '<h2>  CLASS WAS ATTENDED </h2>';
			} 
			else{
				echo  '<h2>  CLASS WAS NOT ATTENDED </h2>';
			}
			

				echo						'<label>';
				echo								'<input type="radio" value="submit_attended" name="radio" >';
				echo								'Attended';
				echo							'</label>';
				echo						'<div id="checkbox2">';
				echo							'<label>';
				echo								'<input type="radio" value="submit_not_attended" name="radio">';
				echo								'Not attended';
				echo							'</label>';
			
				echo						'</div>';
					
									
echo					'<!--<div class="col-sm-3">-->';
echo					'<label style="text-align:left">';
echo						'Instructor Comments';
echo						'<textarea rows="10" cols="50"></textarea>	';					
echo					'</label>';
echo						'<!-- this needs to become an input -->';
echo					'</div>';
echo					'<!--</div>-->';



echo		'</div>';
echo				'</div>';
echo				'<button type="submit" name="submitAttendance" class="btn btn-default ">Submit</button> ';   
echo           '</form>';

echo 	'</div>';


//if form is submitted(attended clicked, insert record into db

	


					


?>


</body>
</html>
