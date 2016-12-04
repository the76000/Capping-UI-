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

/*
if ((isset($_POST['submitAttendance'])) == 1){
	
		
		if (($_POST['radio']) == 'submit_attended'){
		$submitattendance = "INSERT INTO class_attendence (eid,class,_id,p_num,participant_comment) VALUES('$employeeID', '$cidSession','$participantnumber', 'THIS IS A TEST FROM REPORT CARD HI')";
		
		if ($dbconn->query($submitattendance) === TRUE){
			echo ' <script language="javascript">';
		echo 'alert("sql ran")';
		echo '</script>';
			
		} else{
			echo ' <script language="javascript">';
		echo 'alert("botched sql")';
		echo '</script>';
			
		}
		}
		else{
			echo ' <script language="javascript">';
		echo 'alert("not attended is not working")';
		echo '</script>';
			
		}
		
		
		
		
		
	}
	*/
?>




</body>


</html