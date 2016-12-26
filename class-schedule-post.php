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
	
	
	$cid = $_SESSION['cid_class_schedule'];
	
	$c_subject = $_POST['class_selected'];   
	
	$location_id = 1; //dummy value, location id is no longer neccesary
	
	$eid = $_POST['teacher_selected'];

	
	$date_times_schedules = $_POST['currTime'];
	
	
		$scheduleclass = "INSERT INTO classes_scheduled(cid,eid,location_id,c_subject,date_time_schedules) VALUES('$cid', '$eid', '$location_id ','$c_subject', '$date_times_schedules' )";
		
		$result = pg_query($scheduleclass);
		echo "Class Was Scheduled";
		
		echo "<a href='homepage.php'> Go Back To The Homepage </a>";
	
	
?>


</body>

</html>	