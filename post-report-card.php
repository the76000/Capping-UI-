<html>
<head>

</head>


<body>
<?php
session_start();
	
	if (!isset($_SESSION["username"]) ){
		header('Location: index.php');
		echo "hello";
	}
	
	 # Connect to Postgres server and the database
    require( 'includes/connect.php' ) ;
	
	
	$attendence = $_POST['radio'];
	
	echo "$attendence";
	
	//$class_selected = $_POST['class_selected'];
	
	//echo "$class_selected";
	
	//$cidselect = $_SESSION['report_card_curr'] ;
	
	$pnum = $_SESSION['pnumreportcard'];
	
	//$classpicked = $_SESSION['report_card_class_selected'];
	
    $classidfromreport = $_SESSION['classidreport']; //this is the class id from the select class(attended classes) should change all classidreport variables to classidattendeD???
	
	$comment = $_POST['attencomment'];
	
	echo "<a href='homepage.php'> Go Back To The Homepage </a>";
	
	
	
	
	
	
	
	
	
	
if (($_POST['radio']) == "submit_attended"){
	
		$employeeselectquery = "SELECT employees.eid 
		FROM employees, classes_scheduled, curriculum_subjects, class_subjects
		WHERE employees.eid = classes_scheduled.eid
		AND classes_scheduled.c_subject = curriculum_subjects.c_subject
		AND curriculum_subjects.c_subject = class_subjects.c_subject
		AND class_subjects.class_subject = '$classidfromreport'";
		
		
		$employeeselectresult = pg_query($employeeselectquery) or die('Query failed: ' . pg_last_error());
		$employeeselectrow = pg_fetch_array($employeeselectresult, null, PGSQL_ASSOC);
	
		$eidattendence = $employeeselectrow['eid'];
		
		$realclassid = "SELECT classes_scheduled.class_id 
		FROM classes_scheduled, curriculum_subjects, class_subjects
		WHERE classes_scheduled.c_subject = curriculum_subjects.c_subject
		AND curriculum_subjects.c_subject = class_subjects.c_subject
		AND class_subjects.class_subject = '$classidfromreport'";
		$classidresult = pg_query($realclassid) or die('Query failed: ' . pg_last_error());
		$classidrow = pg_fetch_array($classidresult, null, PGSQL_ASSOC);
		
		
		$classid = $classidrow['class_id']; 
		
		
		$submitattendance = "INSERT INTO class_attendence (eid,class_id,p_num,participant_comment) VALUES('$eidattendence', '$classid','$pnum', '$comment')";
		
		$result = pg_query($submitattendance);
		echo "Attendence was submmited";
			
		
	}
	
	elseif (($_POST['radio']) == "submit_not_attended"){
		
		
		$employeeselectquery = "SELECT e.eid FROM employees e inner join classes_scheduled csch on csch.eid = e.eid where csch.class_id = '$classidfromreport'";
	$employeeselectresult = pg_query($employeeselectquery) or die('Query failed: ' . pg_last_error());
	$employeeselectrow = pg_fetch_array($employeeselectresult, null, PGSQL_ASSOC);
	
	$eidattendence = $employeeselectrow['eid'];
		
		$deleteattendedrecord = "DELETE FROM class_attendence WHERE p_num = '$pnum' and class_id = '$classidfromreport'";
		
		$deleteresult = pg_query($deleteattendedrecord );
		echo "Attendence record was deleted";
		
		
		echo " <a href='/homepage.php'> Go back to homepage </a>";
	}
	
	
	
	
?>




</body>


</html>