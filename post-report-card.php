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
	
	
	$attendence = $_POST['radio1'];
	
	echo "$attendence";
	
	//$class_selected = $_POST['class_selected'];
	
	//echo "$class_selected";
	
	$cidselect = $_SESSION['report_card_curr'] ;
	echo "hey";
	echo "$cidselect";
	$pnum = $_SESSION['pnumreportcard'];
	
	$classpicked = $_SESSION['report_card_class_selected'];
	
	$query = "SELECT ca.class_id FROM class_attendence ca 
	inner join classes_scheduled csch on ca.class_id = csch.class_id 
	inner join curriculum_subjects curr_sub on curr_sub.cid = csch.cid 
	inner join class_subjects class_sub on curr_sub.c_subject = class_sub.c_subject  
	where csch.cid = '$cidselect' and class_sub.class_subject = '$classpicked  '  ";
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
	$row = pg_fetch_array($result, null, PGSQL_ASSOC);
	
	
	
	
	$classidattendence = $row['class_id'];
	echo"hello";
	echo "$classidattendence ";
	
	
	$employeeselectquery = "SELECT e.eid FROM employees e inner join classes_scheduled csch on csch.eid = e.eid where csch.cid = '$cidselect'";
	$employeeselectresult = pg_query($employeeselectquery) or die('Query failed: ' . pg_last_error());
	$employeeselectrow = pg_fetch_array($employeeselectresult, null, PGSQL_ASSOC);
	
	$eidattendence = $employeeselectrow['eid'];
	
	
	
if ((isset($_POST['submitAttendance'])) == 1){
	
		
		
		$submitattendance = "INSERT INTO class_attendence (eid,class_id,p_num,participant_comment) VALUES('$eidattendence', '$classidattendence','$pnum', 'THIS IS A TEST FROM REPORT CARD HI')";
		
		$result = pg_query($submitattendance);
		
		
			
		
	}
	
	
	
	
?>




</body>


</html