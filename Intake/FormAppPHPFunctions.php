 <?php
function databaser(){

$conn_string = ""host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin"";
$dbconn = pg_connect($conn_string);


$sql = 'Select p_num from referrals';

$result = pg_query($dbconn, $sql);

if (!$result) {
  echo "An error occurred.\n";
  exit;
}

while ($row = pg_fetch_row($result)) {
  echo "p_num: $row[0]";
  echo "<br />\n";
}
 


}


function referralDupCheck(){ 

}

function intakeDupCheck(){

}

function intakeInsertRecord(){

}

function intakeUpdateRecord(){

}

function referralInsertRecord(){

}

function referralUpdatweRecord(){

}

?>