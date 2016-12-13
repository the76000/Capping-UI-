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
		
		<title> CPCA Report Card </title>
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
      <a class="navbar-brand" href="#">Report Card Search</a>
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

<center><div class="error" id="errorID" style="display:none"></div></center>

<div class = "row search">

			
</div>	<!-- end of row search -->		

<hr> </hr>

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
$query = 'SELECT * FROM participants';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML


 $curr_query3 = 'SELECT curriculum_name FROM curriculum'; //get all curriculum in the system
 $curr_result3 = pg_query($curr_query3) or die('Query failed: ' . pg_last_error());


  
  
  
  

echo '<div class = "container">';

echo	'<div class="form-group ">';
echo			'<form onsubmit="return validateInput()" action="report-card-search.php" method="post">';
echo				  '<label for="sel1">Select A Curriculum:</label> <!-- this is for the 28 indivual classes, not for the course/groups. data mismatch -->';
echo				  '<select name="CURRICULUM" class="form-control" id="sel1">
						<option selected disabled class="hideoption">Select One</option>';
				  
				  
					while ($line = pg_fetch_array($curr_result3, null, PGSQL_ASSOC)) { 
						if($line['curriculum_name'] != "No Curriculum"){
							foreach ($line as $col_value) { //iterate through all the curriculum and display them
								echo "<option value= '$col_value'>";
								echo "$col_value";
							}
								echo "</option>";
						}
						
					}
							
							
					
					
					
echo				  '</select>';
echo				'<button class="btn btn-lg" type="submit" name="submit"> Submit </button>';
echo				'</div>';
echo				'</form>';


if ((isset($_POST['submit'])) == 1){ //if the submit button for curriculum is clicked
	$value_select = $_POST['CURRICULUM']; //get the curriculum picked by the user
	
	$_SESSION['curr_name'] = $value_select;




	$curr_picked = $value_select; //assign curriculum to curr_picked
  
 
 $curr_query = 'SELECT curriculum_name FROM curriculum';
 $curr_result = pg_query($curr_query) or die('Query failed: ' . pg_last_error());
 //$row = pg_fetch_array($result, null, PGSQL_ASSOC);
 

 
 $curr_query2 = "SELECT CID FROM curriculum where curriculum_name = '$curr_picked'"; //get the cid that equals the name of the curriculum picked
 $curr_result2 = pg_query($curr_query2) or die('Query failed: ' . pg_last_error());
 $curr2_row = pg_fetch_array($curr_result2, 0, PGSQL_ASSOC);
 
  $cidDB = $curr2_row['cid']; //the cid of the curriculum
  
  $_SESSION['report_card_curr'] = $cidDB ; //used in report-card to confrim curriculum
 
  $pvaluequery = "SELECT p.p_num FROM participants p 
  inner join curriculum c on c.cid = p.cid 
  inner join referrals r on r.p_num =p.p_num 
  where p.cid = '$cidDB' "; //gets all the pnums assigned to the curriculum picked
 $pvalueresult = pg_query($pvaluequery) or die('Query failed: ' . pg_last_error());
 $pvaluerow = pg_fetch_array($pvalueresult , 0, PGSQL_ASSOC);
 
 
 
 $part_query = "SELECT r.ref_f_name FROM referrals r 
 inner join participants p on p.p_num = r.p_num 
 inner join curriculum c on c.cid = p.cid 
 where c.cid = '$cidDB'"; //gets all the first names of those enrolles
 $part_result = pg_query($part_query) or die('Query failed: ' . pg_last_error());
 $part_row = pg_fetch_array($part_result, 0, PGSQL_ASSOC);
 
 //$part_query = 'SELECT r.ref_f_name FROM referrals r inner join participants p on p.p_num = r.p_num inner join curriculum c on c.cid = p.pid where c.cid = "$cidDB"';
 
 
 $part_query2 = "SELECT p.cid FROM participants p 
 inner join curriculum c on c.cid = p.cid 
 inner join referrals r on r.p_num =p.p_num 
 where p.cid = '$cidDB' "; //this is for testing
 $part_result2 = pg_query($part_query2) or die('Query failed: ' . pg_last_error());
 $part_row2 = pg_fetch_array($part_result2 , 0, PGSQL_ASSOC);
 
  $part_query3 = "SELECT r.ref_l_name FROM referrals r 
  inner join participants p on p.p_num = r.p_num 
  inner join curriculum c on c.cid = p.cid 
  where c.cid = '$cidDB'"; //gets the last name of those enrolled
 $part_result3 = pg_query($part_query3) or die('Query failed: ' . pg_last_error());
 $part_row3 = pg_fetch_array($part_result3, 0, PGSQL_ASSOC);

// $num_of_classes = pg_num_rows($c_a_results) - 1
 
 while (($line = pg_fetch_array($part_result, null, PGSQL_ASSOC)) and ($line2  = pg_fetch_array($part_result2, null, PGSQL_ASSOC)) and ($line3  = pg_fetch_array($part_result3, null, PGSQL_ASSOC)) and  ($line4  = pg_fetch_array($pvalueresult, null, PGSQL_ASSOC))                   ) {
					
					
echo 				'<table class = "table">';
						echo "<thead>";
						echo "<tr>";
						echo "<th> First Name </th>";
						echo "<th> Last Name </th>";
						echo "<th> CID </th>";
						
						

						foreach ($line as $fnamevalue ) { //display all of the arrays
						
							foreach ($line2 as $cidvalue){
								
								foreach ($line3 as $lnamevalue){
									foreach ($line4 as $pnumvalue){
							
							echo "<tr>";
							echo "<td>";
							echo "$fnamevalue";
							echo "</td>";
							echo "<td>";
							echo "$lnamevalue";
							echo "</td>";
							echo "<td>";
							echo "$cidvalue";
							echo "</td>";
							echo "<td>";
							echo "<form action = 'report-card.php' method='post'>";
							 
							#echo "<option name = 'participant_selected' value = '$pnumvalue'> Go to report card  </option>";
							echo "<label>";
							
							echo "</label>";
											
							echo 		"<button type = 'submit' name = 'participant_name' value = ' $pnumvalue  '>  Click Here To Go To Report Card </button>";

							echo "</form>";
							// send the pnum selected thru POST
							
							#$_SESSION['report_card_part'] = $_POST['participant_name'];
							
							echo "</td>";
							
							echo "</tr>";
									}
								}
							}
						}
							echo "</table>";
							}
							
							
 
 
 
}
  




?>

<!-- JS Functions  -->
<script src="intake/FormAppFunctions.js"></script>
<script type="text/javascript">
	function validateInput(){
		document.getElementById("errorID").value = ""
		document.getElementById("errorID").style.display = "none";
		
		if(document.getElementById("sel1").value == "Select One"){
			document.getElementById("errorID").innerHTML = "Please select a participant";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		
		//If we got here then everything is as it should be
		return true; 
		
	}
</script>	
		
  </body>
</html>