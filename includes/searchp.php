<?php
	$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());
	
		
	
	
	
	$msg = '';
	
	$p_num = pg_escape_string($_POST['p_num']);
	
	
	
	
	$query = "Select * from participants where p_num = '$p_num'";
	
	$results = pg_query($query) or die('Query failed: ' . pg_last_error());
	
	$numrows = 'SELECT count(*) AS exact_count FROM employees'; #this will not scale well
	
	$row = pg_fetch_array($results, null, PGSQL_ASSOC);
								
	$p_numDB = $row['p_num'];
	
		// Check to see if the credentials are right
		if($p_num == $p_numDB){
			// Now let's check the permission level
			echo $p_num;
		}else{
			echo "<h1>Error: User not found.</h1>";
		}				
			
	?>