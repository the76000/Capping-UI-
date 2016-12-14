<?php
// Connecting, selecting database
$dbconn = pg_connect("host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin")
    or die('Could not connect: ' . pg_last_error());

// Performing SQL query
$query = 'SELECT * FROM employees';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// Printing results in HTML





// Free resultset
pg_free_result($result);



// Closing connection
//pg_close($dbconn);
?>