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
	
	$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());
	
	
	$attendence = $_POST['radio'];
	
	echo "$attendence";
	
	//$class_selected = $_POST['class_selected'];
	
	//echo "$class_selected";
	
	//$cidselect = $_SESSION['report_card_curr'] ;
	
	$pnum = $_SESSION['pnumreportcard'];
	
	$classpicked = $_SESSION['report_card_class_selected'];
	
    $classidfromreport = $_SESSION['classidreport']; //this is the class id from the select class(attended classes) should change all classidreport variables to classidattendeD???
	
	
	
	
	
	
	
	
	$employeeselectquery = "SELECT e.eid FROM employees e inner join classes_scheduled csch on csch.eid = e.eid where csch.class_id = '$classidfromreport'";
	$employeeselectresult = pg_query($employeeselectquery) or die('Query failed: ' . pg_last_error());
	$employeeselectrow = pg_fetch_array($employeeselectresult, null, PGSQL_ASSOC);
	
	$eidattendence = $employeeselectrow['eid'];
	
	
	
if (($_POST['radio']) == "submit_attended"){
	
		
		
		$submitattendance = "INSERT INTO class_attendence (eid,class_id,p_num,participant_comment) VALUES('$eidattendence', '$classidfromreport','$pnum', 'THIS IS A TEST FROM REPORT CARD HI')";
		
		$result = pg_query($submitattendance);
		echo "Attendence was submmited";
			
		
	}
	
	elseif (($_POST['radio']) == "submit_not_attended"){
		
		$deleteattendedrecord = "DELETE FROM class_attendence WHERE p_num = '$pnum' and class_id = '$classidfromreport'";
		
		$deleteresult = pg_query($deleteattendedrecord );
		echo "Attendence record was deleted";
		
		
		echo " <a href='/homepage.php'> Go back to homepage </a>";
	}
	
	
	
	
?>




</body>


</html>