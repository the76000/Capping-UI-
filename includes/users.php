<?php
	//connection to postgres database
	$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());
	
		
	
	
	
	$msg = '';
	
	$email = pg_escape_string($_POST['email']); //user email typed in from index.php
	
	$password = pg_escape_string($_POST['password']); //password typed in from index.php
	
	
	$query = "Select * from employees where email = '$email'"; //get all rows from employees where email matches the email entered
	
	$results = pg_query($query) or die('Query failed: ' . pg_last_error()); //query the database, return query failed if not matches
	
	$numrows = 'SELECT count(*) AS exact_count FROM employees'; #this will not scale well
	
	$row = pg_fetch_array($results, null, PGSQL_ASSOC);//create an array of the results
								
	$emailDB = $row['email']; // get the email from the results of query
	$passwordDB = $row['password']; //get the password from the resutls of query
	$userStatus = $row['permission_lvl'];
		// Check to see if the credentials are right
		if($email == $emailDB && $password == $passwordDB){ //if the email entered equals the email from the query, take the user to the homepage
			// Now let's check the permission level
			header('Location: /homepage.php');
			session_start();
			$_SESSION["username"] = $email; //create a session user to check on all other pages if the user has logged in.
		}else{
			echo "<h1>Error: User not found.</h1>";
			
			echo "<a href='/index.php'> click here to go back </a> ";
		}				
			
	?>

		