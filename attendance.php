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

	<title>CPCA Submit Attendance </title>
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
				<a class="navbar-brand" href="#">Submit Attendance</a>
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

	<div class = "container">
		<div class = "jumbotron">

			<form class="navbar-form">
				<div class="input-group">
					<input type="text" class="form-control input-lg" placeholder="first name" name="f_name" id="attendance-f_name" oninput="validateAlpha('attendance-f_name');">
				</div class="input-group-btn ">
			
				<div class="input-group">
					<input type="text" class="form-control input-lg" placeholder="last name" name="l_name" id="attendance-l_name" oninput="validateAlpha('attendance-l_name');">
				</div class="input-group-btn ">

				<div class="row" id="attendanceRow">

					<div class="col-md-4 input-lg">
						<label>Select Class</label>
						<select class="form-control" >
						<option selected disabled class="hideoption">Select One</option>
							<option>1.   Women's In-House</option>
								<option>2.   Spanish Speaking Women's In-House</option>
								<option>3.   Men's DC Jail</option>
								<option>4.   Cornerstone</option>
								<option>5.   Men's In-House</option>
								<option>6.   Meadow Run</option>
						</select>
					</div>
					<div class="col-md-4 input-lg">
						<label>Select Group</label>
						<select class="form-control">
						<option selected disabled class="hideoption">Select One</option>
							<option>1.   Devloping Empathy</option>
								<option>2.   Getting your needs met</option>
								<option>3.   Recognizing & Understanding Feelings</option>
								<option>4.   Problem Solving</option>
								<option>5.   Crticism, Confrontation Fair Fighting</option>
								<option>6.   Handling Stress</option>
								<option>7.   Undestranding Anger </option>
								<option>8.   Effects of Drugs </option>
								<option>9.   Communication: Listening </option>
								<option>10.  Communication </option>
								<option>11.  Children's Brain Dev </option>
								<option>12.  Ages & Stages, Routine </option>
								<option>13.  Appropriate Expectations </option>
								<option>14.  A & S Young Children </option>
								<option>15.  Ages & Stages, Adolescent </option>
								<option>16.  Health & Nutrition </option>
								<option>17.  Improving Self-Worth </option>
								<option>18.  Developing Personal Power </option>
								<option>19.  Children's Safety </option>
								<option>20.  Child Abuse & Neglect I, II, & III </option>
								<option>21.  Managing Behavior </option>
								<option>22.  Relationships, Pers. Space </option>
								<option>23.  Understanding Discipline </option>
								<option>24.  Rewards/Punishment </option>
								<option>25.  Using Praise </option>
								<option>26.  Alt. to Physical Punishment</option>
								<option>27.  Guest Speaker</option>
						</select>  
					</div>
				</div>
				<div class="row">
					<div class="col-sm-5">
						<div id="checkbox1">
							<label>
								<input type="radio" value="" name="attendanceRadio">
								Attended
							</label>
						</div>
						<div id="checkbox2">
							<label>
								<input type="radio" value="" name="attendanceRadio">
								Arrived late
							</label>
						</div>
						<div id="checkbox3">
							<label>
								<input type="radio" value="" name="attendanceRadio">
								Left early
							</label>
						</div>
						
					<!--<div class="col-sm-3">-->
					<label style="text-align:left">
						Instructor Comments
						<textarea rows="10" cols="50"></textarea>						
					</label>
						<!-- this needs to become an input -->
					</div>
					<!--</div>-->
					
				</div>
				<button type="submit" class="btn btn-default ">Submit</button>    
			</form>

		</div>
	</div>




</body>
</html>
