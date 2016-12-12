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
	
	
	$cid = $_SESSION['cid_class_schedule'];
	
	$c_subject = $_POST['class_selected'];   
	
	$location_id =$_POST['location_selected'];
	
	$eid = $_POST['teacher_selected'];

	
	$date_times_schedules = $_POST['currTime'];
	
	
		$scheduleclass = "INSERT INTO classes_scheduled(cid,eid,location_id,c_subject,date_time_schedules) VALUES('$cid', '$eid', '$location_id ','$c_subject', '$date_times_schedules' )";
		
		$result = pg_query($scheduleclass);
		echo "Class Was Scheduled";
		
		echo "<a href='homepage.php'> Go Back To The Homepage </a>
	
	
?>


</body>

</html>	