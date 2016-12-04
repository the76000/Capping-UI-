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
	
	$class_selected = $_POST['class_selected'];
	
	echo "$class_selected";
	
	$cidselect = $_SESSION['report_card_curr'] ;
	echo "hey";
	echo "$cidselect";
	$pnum = $_SESSION['pnumreportcard'];
	
	$query = "SELECT ca.class_id FROM class_attendence ca inner join participants p on p.p_num = ca.p_num where p.cid = '$cidselect' ";
	$result = pg_query($query) or die('Query failed: ' . pg_last_error());
	$row = pg_fetch_array($result, null, PGSQL_ASSOC);
	
	
	$cidattendence = $row['class_id'];
	echo"hello";
	echo "$cidattendence ";
	
	
	$employeeselectquery = "SELECT e.eid FROM employees e inner join classes_scheduled csch on csch.eid = e.eid where csch.cid = '$cidselect'";
	$employeeselectresult = pg_query($employeeselectquery) or die('Query failed: ' . pg_last_error());
	$employeeselectrow = pg_fetch_array($employeeselectresult, null, PGSQL_ASSOC);
	
	$eidattendence = $employeeselectrow['eid'];
	
	
	
if ((isset($_POST['submitAttendance'])) == 1){
	
		
		
		$submitattendance = "INSERT INTO class_attendence (eid,class_id,p_num,participant_comment) VALUES('$eidattendence', '$cidattendence','$pnum', 'THIS IS A TEST FROM REPORT CARD HI')";
		
		$result = pg_query($submitattendance);
		
		
			
		
	}
	
?>




</body>


</html