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
		
		<title> CPCA search </title>
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
      <a class="navbar-brand" href="#">Participant Search</a>
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
	
	//echo "p_num = " $_post['participant_num']; 
	
	
	 # Connect to Postgres server and the database
    require( 'includes/connect.php' ) ;
	
	//for testing
	
	//$l_name = $_SESSION['l_name'];
	
	//$f_name = $_SESSION['f_name'];
	
	$p_num =$_POST['participant_num'];
	
	$_SESSION['searchp_num'] = $p_num; //for report card
	

	
	$query = "Select r.*, p.* from referrals r inner join participants p  on p.p_num = r.p_num  where r.p_num = '$p_num' ";
	
	$results = pg_query($query) or die('Query failed: ' . pg_last_error());
	
	$row = pg_fetch_array($results, 0, PGSQL_ASSOC);
	
	$ref_p_num = $row['p_num'];
	
	
	
	
	
	
	$p_numDB = $row['p_num'];
	
	$raceDB = $row['race'];
	
	$l_nameDB = $row['ref_l_name'];
	

	
	$f_nameDB = $row['ref_f_name'];
	
	$dobDB = $row['dob'];
	
	
	
	
	
	$cidDB = $row['cid'];
	
	
	$cellnum = $row['ref_cell_phone'];
	
	$homenum = $row['ref_home_phone'];
	
	
	$currnamequery = "
	SELECT curriculum_name 
	FROM curriculum
	WHERE cid = '$cidDB'";
	
	$currnameresults = pg_query($currnamequery) or die('Query failed: ' . pg_last_error());
	
	$currnamerow = pg_fetch_array($currnameresults, 0, PGSQL_ASSOC);
	
	$currname = $currnamerow['curriculum_name'];
	
	
	
	
	
	$_SESSION['report_card_curr'] = $cidDB; //for report card
	
	//echo " $p_numDB ";
	
	
	
	
	
	
 $c_a_query = "Select * from class_attendence where p_num = '$p_numDB'"; // query for all info related to searched participant

//$c_a_query = "Select * from class_attendence ";



$c_a_results = pg_query($c_a_query) or die('Query failed: ' . pg_last_error());
	
	$c_a_row = pg_fetch_array($c_a_results, 0, PGSQL_ASSOC); // create array of result 
	
	$p_numDB = $c_a_row['p_num']; // set variable correct row and column of db
	
	
	
	$class_idDB = $c_a_row['class_id'];
	
	
	$participant_commentDB = $c_a_row['participant_comment'];
	
	if  (pg_num_rows($c_a_results) == 0){
		$num_of_classes_attended = pg_num_rows($c_a_results) ;
	}
	
	else{
		$num_of_classes_attended = pg_num_rows($c_a_results) - 1; //bug? idk
	}
	
	
	
	
	$cur_query = "Select classes_total from curriculum where cid  = '$cidDB'"; // query curriculum table for number of classes

//$c_a_query = "Select * from class_attendence ";



$cur_results = pg_query($cur_query) or die('Query failed: ' . pg_last_error());
	
	$cur_row = pg_fetch_array($cur_results, 0, PGSQL_ASSOC); // create array of result 
	
	
	

	
	
	
	
	$num_of_classes_not_attended= pg_num_rows($cur_results) - $num_of_classes_attended ;
	
	
	
	
	
	// class attendence numbers
	
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
Class_Subjects,
Employees

WHERE

Referrals.P_Num = '$p_numDB'
And Referrals.P_Num = Participants.P_Num
AND Participants.P_Num = Class_Attendence.P_Num
AND Class_Attendence.Class_ID = Classes_Scheduled.Class_ID
AND Classes_Scheduled.C_Subject = Curriculum_Subjects.C_Subject
AND Classes_Scheduled.EID = Employees.EID
AND Curriculum_Subjects.C_Subject = Class_Subjects.C_Subject";
//AND Employees.eid =  $eidfromreport


$classesattendedresult = pg_query($classesattendedquery) or die('Query failed: ' . pg_last_error());
$classesattendedrow = pg_fetch_array($classesattendedresult, 0, PGSQL_ASSOC);


$newnumclassatten = pg_num_rows($classesattendedresult);


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
									Class_Subjects,
									Employees

									WHERE
									Referrals.P_Num = '$p_numDB'
									And Referrals.P_Num = Participants.P_Num
									AND Participants.P_Num = Class_Attendence.P_Num
									AND Class_Attendence.Class_ID = Classes_Scheduled.Class_ID
									AND Classes_Scheduled.C_Subject = Curriculum_Subjects.C_Subject
									AND Classes_Scheduled.EID = Employees.EID
									AND Curriculum_Subjects.C_Subject = Class_Subjects.C_Subject)							
									

ORDER BY Classes_Scheduled.Class_ID";




$classesnotattendedresult = pg_query($classesnotattendedquery) or die('Query failed: ' . pg_last_error());
$classesnotattendedrow = pg_fetch_array($classesnotattendedresult, 0, PGSQL_ASSOC);


$newnumclassnotatten = pg_num_rows($classesnotattendedresult);
  
  
  
  



echo	'<div class="container">';
echo		'<!--- ALL OF THIS INFORMATION IS PLACEHOLDER THIS ALL NEEDS TO COME FROM THE DATABASE!!!! -->';
		
echo		'<div class = "col-md-8">';
		
echo		'<div class = "jumbotron">';
echo			'<div class = "row search-results">';
			
echo			'<div class = "col-md-4">';
echo			'<p> Participant </p>';
echo			'</div>';
			
echo			'<div class = "col-md-4">';
echo			'<p class="label label-info">';
echo			" $f_nameDB $l_nameDB ";
echo 				'</p>'; 
echo			'</div>';
echo			'</div>';
			
echo			'<div class = "row search-results">';
			
echo			'<div class = "col-md-4">';
echo			'<p> Race </p>';
echo			'</div>';
			
echo			'<div class = "col-md-4">';
echo			'<p class="label label-info">';
echo            " $raceDB ";
echo            '</p> ';
echo			'</div>';
echo			'</div>';
			
			
echo			'<div class = "row search-results">';
			
echo			'<div class = "col-md-4">';
echo			'<p> Curriculum </p>';
echo			'</div>';
			
echo			'<div class = "col-md-4">';
echo			'<p class="label label-info">';
echo             "$currname ";
echo            '</p>'; 
echo			'</div>';
echo			'</div>';


echo			'<div class = "row search-results">';
echo			'<div class = "col-md-4">';
echo			'<p> Date of Birth </p>';
echo			'</div>';

			
echo			'<div class = "col-md-4">';
echo			'<p class="label label-info">';
echo             "$dobDB";
echo            '</p>'; 
echo			'</div>';
echo			'</div>';
			
			
echo			'<hr> </hr>';
			
			
			
echo			'<div class = "row search-results">';
echo				'<div class = "col-md-4">';
echo				'<p> Classes Completed </p>';
echo				'</div>';
			
echo				'<div class = "col-md-2">';
echo				'<p>';

 echo               "$newnumclassatten ";
 
 echo             '</p>';
echo				'</div>';
				

			
			
echo			'</div>';
			
echo			'<div class = "row search-results">';
echo				'<div class = "col-md-4">';
echo				'<p> Classes Missing/Not Completed </p>';
echo				'</div>';
				
				
echo				'<div class = "col-md-2">';
echo				'<p>';

 echo               "$newnumclassnotatten";
 echo              '</p>';
 
echo				'</div>';
				

				
			
			
echo			'</div>';
			
		
		
echo		'</div>';
		
		
echo		'</div>';
		
		
echo		'<div class = "col-md-4">';
		
echo		'<div class = "jumbotron">';


echo			'<div class = "row search-results">';
echo			'<div class = "col-md-4">';
echo			'<p> Cell Phone # </p>';


			

echo			'<p class="label label-info">';
echo             "$cellnum";
echo            '</p>'; 
echo			'</div>';
echo			'</div>';


echo			'<div class = "row search-results">';
echo			'<div class = "col-md-4">';
echo			'<p> Home Phone # </p>';


			

echo			'<p class="label label-info">';
echo             "$homenum";
echo            '</p>'; 
echo			'</div>';
echo			'</div>';
			
			
echo			'<hr> </hr>';
			




echo            "<form action = 'IntakeAppFilled.php'  method ='post'>";

echo            "<p> Link to Intake Packet (under construction) </p>";


echo 		"<button type = 'submit' name = 'participant_num_intake' value = ' $p_num   '>  Click Here For Intake Packet   </button>";

echo            "</form>";


/*

ideas for linking to report card, make the link a form to send the cid and pnum thru post to report card
 $participantnumber = $_POST['participant_name'];
 
 $_SESSION['report-card-pnum'] = $participantnumber ;
 
 

 $cidSession = $_SESSION['report_card_curr'] ;
 
 
		echo "<form action = 'participant-search-results.php' method='post'>";
		echo "$f_name";
		//echo "$dob_col_value";
		echo "<input type = 'submit' name = 'participant_num'  value = ' $p_col_value  '/>";
		//echo  "<a href='participant-search-results.php?add=clicked'>$f_col_value   $l_col_value $p_col_value </a>";
		echo "</form>";

*/
echo            "<form action = 'report-card.php'  method ='post'>";

echo            "<p> Link to Participant Report Card click the number </p>";


echo 		"<button type = 'submit' name = 'participant_name' value = ' $p_num   '>  Click Here For Report card  </button>";

echo            "</form>";


echo            "<form action = 'Assign-Curriculum.php'  method ='post'>";

echo            "<p> Assign Curriculum </p>";


echo 		"<button type = 'submit' name = 'participant_num_assign' value = ' $p_num   '>  Click Here To Change/Assign Curriuclum  </button>";

echo            "</form>";

		
		
		
		
echo		'</div>';
		
		
echo		'</div>';


echo 	'</div>';
?>

<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>

  </body>
</html>
