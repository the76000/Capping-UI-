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
      <a class="navbar-brand" href="#">Particpant Search</a>
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
	
	echo "p_num = " . $_SESSION["searchp"]; 
	
	
	$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());
	
	//for testing
	
	$l_name = $_SESSION["searchp"];
	
	$query = "Select * from referrals where ref_l_name = '$l_name'";
	
	$results = pg_query($query) or die('Query failed: ' . pg_last_error());
	
	$row = pg_fetch_array($results, null, PGSQL_ASSOC);
	
	$ref_p_num = $row['p_num'];
	
	
	$p_query = "Select * from participants where p_num = '$ref_p_num '";
	
	$p_results = pg_query($p_query) or die('Query failed: ' . pg_last_error());
	
	$p_row = pg_fetch_array($p_results, null, PGSQL_ASSOC);
	
	
	
	
	
	$p_numDB = $p_row['p_num'];
	
	$raceDB = $p_row['race'];
	
	$cidDB = $p_row['cid'];
	
	//echo " $p_numDB ";
	
	
	
	
 $c_a_query = "Select * from class_attendence where p_num = '$p_numDB'"; // query for all info related to searched participant

//$c_a_query = "Select * from class_attendence ";



$c_a_results = pg_query($c_a_query) or die('Query failed: ' . pg_last_error());
	
	$c_a_row = pg_fetch_array($c_a_results, null, PGSQL_ASSOC); // create array of result 
	
	$p_numDB = $c_a_row['p_num']; // set variable correct row and column of db
	
	echo "$p_numDB";
	
	$class_idDB = $c_a_row['class_id'];
	echo "$class_idDB";
	
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
	
	$cur_row = pg_fetch_array($cur_results, null, PGSQL_ASSOC); // create array of result 
	
	
	

	
	
	
	
	$num_of_classes_not_attended= pg_num_rows($cur_results) - $num_of_classes_attended ;
	
  
  
  
  



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
echo			" $p_numDB ";
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
echo			'<p> Group </p>';
echo			'</div>';
			
echo			'<div class = "col-md-4">';
echo			'<p class="label label-info">';
echo             "$cidDB ";
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

 echo               "$num_of_classes_attended";
 
 echo             '</p>';
echo				'</div>';
				
echo				'<div class = "col-md-6">';
echo				'<p> <a href="classes-completed-more.php"> <!--- for demo purposes --> Click for more information </a> </p>';
echo				'</div>';
			
			
echo			'</div>';
			
echo			'<div class = "row search-results">';
echo				'<div class = "col-md-4">';
echo				'<p> Classes Missing/Not Completed </p>';
echo				'</div>';
				
				
echo				'<div class = "col-md-2">';
echo				'<p>';

 echo               "$num_of_classes_not_attended";
 echo              '</p>';
 
echo				'</div>';
				
echo				'<div class = "col-md-6">';
echo				'<p> <a href="missed-class-more.php"> <!--- for demo purposes --> Click for more information </a> </p>';
echo				'</div>';
			
				
			
			
echo			'</div>';
			
		
		
echo		'</div>';
		
		
echo		'</div>';
		
		
echo		'<div class = "col-md-4">';
		
echo		'<div class = "jumbotron">';
			
echo			'<p> User created on : 01/01/2016 </p>';
		
echo			'<p> Notes from instructors: </p>';
			
echo			'<p> <a href="#"> Gwen 02/01/2016 </a> </p>';
			
echo			'<p> <a href="#"> Click to see more </a> </p>';

echo			'<p> <a href="#"> Link to Participant Intake Form </a> </p>';

echo			'<p> <a href="#"> Link to Participant Referral Form </a> </p>';

echo			'<p> <a href="#"> Link to Participant Report Card </a></p>';
		
		
		
		
echo		'</div>';
		
		
echo		'</div>';


echo 	'</div>';
?>


  </body>
</html>
