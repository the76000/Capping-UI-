<?php
	$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());
	
		
	
	
	
	$msg = '';
	
	$email = pg_escape_string($_POST['email']);
	
	$password = pg_escape_string($_POST['password']);
	
	
	$query = "Select * from employees where email = '$email'";
	
	$results = pg_query($query) or die('Query failed: ' . pg_last_error());
	
	$numrows = 'SELECT count(*) AS exact_count FROM employees'; #this will not scale well
	
	$row = pg_fetch_array($results, null, PGSQL_ASSOC);
								
	$emailDB = $row['email'];
	$passwordDB = $row['password'];
	$userStatus = $row['permission_lvl'];
		// Check to see if the credentials are right
		if($email == $emailDB && $password == $passwordDB){
			// Now let's check the permission level
			header('Location: https://localhost:8888/homepage.html');
		}else{
			echo "<h1>Error: User not found.</h1>";
		}				
			
	?>

		