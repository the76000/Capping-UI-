 <?php
function chkBoxBuilder(){

$conn_string = "host=localhost port=5432 dbname=parentempowerment user=postgres password=CPCA2016";
$dbconn = pg_connect($conn_string);

$sql = 'Select * from Reference_Conditions';

$result = pg_query($dbconn, $sql);

$chkBoxString = ""; //start the string

if (!$result) {
  echo "An error occurred.\n";
  exit;
}

while ($row = pg_fetch_row($result)) { //builds the string from availible Reference_Conditions
  $chkBoxString = $chkBoxString . "<input type=\"checkbox\" class=\" form-control\" name=\"chkBoxOptions[]\" value=\"".$row[0]."\"> <label style=\"width:25%\">".$row[1]."</label> <br>";
}
 
echo $chkBoxString ; //posts string

}

?>