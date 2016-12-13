<!Doctype html>
<head>
	<meta charset="utf-8"> 

	<!--- this is for bootstrap -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link rel='stylesheet' media='screen and (min-width: 701px) and (max-width: 900px)' href='css/mobile.css' />
	<link rel="stylesheet" href="CSS/style.css">

	<title>CPCA Enroll Participant</title>
	
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
				<a class="navbar-brand" href="#">Enroll Participant In Curriculum</a>
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
<div class = "container">
<div class="jumbotron login_panel">
<center><div class="error" id="errorID" style="display:none"></div></center>
<div class= "login_wrapper">
<!-- css div's for jumbotron work best --> 
<!-- I never wanted a problem with lining up a dropdown.... i'm sad -->
<!-- this launches another php file --->
  <form onsubmit="return validateInput()" class="form-horizontal" action="Assign-Curriculum.php" method="post">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
		<div class="form-group">
				 <?php
		
		session_start();
	
		if (!isset($_SESSION["username"]) ){
			header('Location: index.php');
			echo "hello";
		}
	  
	  
		// Connecting, selecting database
		$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
			or die('Could not connect: ' . pg_last_error());
		
		
		
		
		
			if( isset($_POST['curriculum_select']) ){
				$select_value = $_POST['curriculum_select'];
				
				$curquery = "SELECT cid FROM curriculum WHERE curriculum_name = '$select_value'";
				
				$cid_result = pg_query($curquery) or die('Query failed: ' . pg_last_error());
						$cidrow = pg_fetch_array($cid_result);
						
						$cid = $cidrow['cid'];
						
						$p_num = $_SESSION['pnumassign'] ;
				
			$query = "UPDATE participants SET cid = '$cid' WHERE p_num = '$p_num'";
			
			pg_query($query) or die('Query failed: ' . pg_last_error());
			
			echo "<h1>";
			echo "Assigned new curriculum ";
			
			echo "<a href='homepage.php'> Go To Homepage </a>";
			
			
		}
		else{
		
			
			$p_num = $_POST['participant_num_assign'];
			
			$_SESSION['pnumassign'] = $p_num;
			
			
			
			
			$refquery = "SELECT * FROM referrals WHERE p_num = '$p_num'";
			
			
			
			
			$p_num_result = pg_query($refquery) or die('Query failed: ' . pg_last_error());
			
			
			
		
			
			
		
	
			
			$p_num_row = pg_fetch_array($p_num_result );
			
			$_SESSION['fnameassign'] = $p_num_row['ref_f_name'];
			$_SESSION['lnameassign'] = $p_num_row['ref_l_name'];
			
			
			
	
		$fname = $_SESSION['fnameassign'];
		$lname = $_SESSION['lnameassign'];
	
				echo '<h1>';
				echo  $fname; 
				echo ' ';
				echo  $lname; 
				
		}?> 
				</h1>
			<label for="sel1">Select A Curriculum:</label> 
				<select class="form-control" id="sel1" name="curriculum_select">
				<option selected disabled class="hideoption">Select One</option>
					<?php
						

						// Performing SQL query
						$query = 'SELECT * FROM public.curriculum ORDER BY cid ASC ';
						
						$result = pg_query($query) or die('Query failed: ' . pg_last_error());
						
					while($row = pg_fetch_array($result)){
						echo "<option value='".$row['curriculum_name']."'>".$row['curriculum_name']."</option>";
					}
					
					?>
				</select>
		</div>
	</div>
  </div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="testName" class="btn btn-default">Submit</button>
	  <!-- needs apache/php link to database -->
	  <!-- needs to send user back to login once new password is created -->
	  <!-- style is messed up will fix tomorrow --> 
    </div>
  </div>
  </form>
 </div>
</div>

<script type="text/javascript">
	function validateInput(){
		document.getElementById("errorID").value = ""
		document.getElementById("errorID").style.display = "none";
		
		if(document.getElementById("sel1").value == "Select One"){
			document.getElementById("errorID").innerHTML = "Please select a curriculum";
			document.getElementById("errorID").style.display = "block";
			return false;
		}
		
		//If we got here then everything is as it should be
		return true; 
		
	}
</script>

</body>
</html>


