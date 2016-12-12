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

	<title> CPCA Admin Tools </title>
</head>

<!-- NEEDS PHP -->

<body>

	<!-- Top left Logo -->
	<center><div class="error" id="errorID" style="display:none"></div></center>
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
				<a class="navbar-brand" href="#">Add a Participant</a>
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
<!-- So I hear you hired a new employee. Congratz! Well this is where the magic happens, and by magic I mean HTML. Cause this is the language I know.... -->	

<div class = "container">
<h3><center>Add A Participant</center></h3>
<h4><center>(Participant must have filled out and submitted an intake and referral form)</center></h4>
<div class="jumbotron login_panel">
<div class= "login_wrapper">



<?php
	
session_start();
	
	if (!isset($_SESSION["username"]) ){
		header('Location: index.php');
	}
  
  
	// Connecting, selecting database
	$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());
	
	
	$refquery = "
	SELECT * FROM referrals";
	$refresult = pg_query($refquery) or die('Query failed: ' . pg_last_error());
	
	
	$curquery = "
	SELECT * FROM curriculum";
	$curresult = pg_query($curquery) or die('Query failed: ' . pg_last_error());
?>





 <!-- this launches another php file --->
  <form class="form-horizontal" action="post-participant-add.php" method="post" onsubmit="return validateInput()">
  
  <div class="form-group">
    <label for="inputFirstName3" class="col-sm-4 control-label">Participant</label>
    <div class="col-sm-8">


      <select class="form-control" name="pnumSelect" id="pnumSelect">

							'<option selected disabled class="hideoption">Select One</option>
<?php
//$nameline = pg_fetch_array($classesnameresult, null, PGSQL_ASSOC);
		//this is the best way to display multiple columns from a query that selects more than one column
				while ($participant_line = pg_fetch_assoc($refresult ) ){
				
							
							$participant_col_value_var = $participant_line['p_num'];
							
							$participant_col_value_var2 = $participant_line['ref_f_name'];
							
							$participant_col_value_var3 = $participant_line['ref_l_name'];
							
							$participant_col_value_var4 = $participant_line['dob'];
						
							
							
echo						"<option value='$participant_col_value_var'>   $participant_col_value_var2   $participant_col_value_var3 $participant_col_value_var4</option>"; 
							
								
						
						
						
						

				}
?>
							
						</select>









    </div>
  </div>
  
    <div class="form-group">
    <label for="Curriculum3" class="col-sm-4 control-label">Curriculum</label>
    <div class="col-sm-8">

      <select class="form-control" name="cidSelect" id="cidSelect">

							<option selected disabled class="hideoption">Select One</option>
<?php
//$nameline = pg_fetch_array($classesnameresult, null, PGSQL_ASSOC);
		//this is the best way to display multiple columns from a query that selects more than one column
				while ($cur_line = pg_fetch_assoc($curresult ) ){
					if($cur_line['curriculum_name'] != "No Curriculum"){
							
							$cur_col_value_var = $cur_line['cid'];
							
							$cur_col_value_var2 = $cur_line['curriculum_name'];
							
						
						
							
							
echo						"<option value='$cur_col_value_var'>   $cur_col_value_var2  </option>"; 
							
								
						
						
						
						
					}
				}
?>
							
						</select>




    </div>
  </div>
  
  <div class="form-group">
   <label for="sex3" class="col-sm-4 control-label">Gender </label>
    <div class="col-sm-8">


      <select class="form-control" name="sexSelect" id="sexSelect">

							<option selected disabled class="hideoption">Select One</option>


              <option value="M">   Male </option>
              <option value="F">   Female </option>
              <option value=" ">   Undisclosed </option>

						</select>  



    </div>
  </div>

  <div class="form-group">
   <label for="raceID3" class="col-sm-4 control-label">Ethnicity </label>
    <div class="col-sm-8">
     <input type="race" class="form-control" id="raceID3" placeholder="Ethnicity" name = "race">
    </div>
  </div>

  <div class="form-group">
   <label for="childnumID3" class="col-sm-4 control-label">Number of Children </label>
    <div class="col-sm-8">
     <input type="childnum" class="form-control" id="childnumID3" placeholder="Number of Childern (in digits)" name = "childnum">
    </div>
  </div>

  
  <div class="form-group">
    <label for="status3" class="col-sm-4 control-label">Status</label>
    <div class="col-sm-8">
      <input type="status3" class="form-control" id="statusID3" placeholder="Status (well)" name = "status">
    </div>
  </div>
  
  
  <!-- leave this commented out unless a password check feature is actually implemented
  '<div class="form-group">';
    '<label for="inputPassword3" class="col-sm-4 control-label">Re-enter Password</label>';
    '<div class="col-sm-8">';
      '<input type="password" class="form-control" id="inputPassword3" placeholder="Password" name = "password">';
    '</div>';
  '</div>';

-->
  
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
	  <!-- needs apache/php link to database -->
	  <!-- Need to add an alert that says "The information added is correct?" y/n prompt  nah fuck that -->
    </div>
  </div>
  
 </form> <!-- end of login form -->
 </div> <!-- end of login wrapper -->
 </div> <!-- end of jumbotron login -->
 
<script src="intake/FormAppFunctions.js"></script>

<script type="text/javascript">
	function validateInput(){
		document.getElementById("errorID").value = ""
		document.getElementById("errorID").style.display = "none";
		
		if(document.getElementById("pnumSelect").value == "Select One"){
			document.getElementById("errorID").innerHTML = "Please select a participant";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		if(document.getElementById("cidSelect").value == "Select One"){
			document.getElementById("errorID").innerHTML = "Please select a curriculum";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		if(document.getElementById("sexSelect").value == "Select One"){
			document.getElementById("errorID").innerHTML = "Please select a sex";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		if(document.getElementById("raceID3").value == ""){
			document.getElementById("errorID").innerHTML = "Please enter a race";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		if(document.getElementById("childnumID3").value == ""){
			document.getElementById("errorID").innerHTML = "Please enter number of children";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		if(document.getElementById("statusID3").value == ""){
			document.getElementById("errorID").innerHTML = "Please enter status";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		
		//If we got here then everything is as it should be
		return true; 
		
	}
</script>
</div>
</body>
</html>