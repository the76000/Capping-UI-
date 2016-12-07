<html>
<body>
<?php
if(empty($_POST["fName"]) || empty($_POST["lName"]) ||  empty($_POST["DOB"])){
	echo 'Please make sure you fill out your first name, last name, and date of birth correctly';
}
else{
$fName = $_POST["fName"];
$mName = $_POST["mName"];
$lName = $_POST["lName"];

$Street = $_POST["street"];
$City = $_POST["city"];
$State = $_POST["state"];

if(empty($_POST['zip'])){
$Zip = '00000';
}
else{
$Zip = $_POST["zip"];
}

$Num_People_in_Home = $_POST["numPeople"];
$Relation_to_Household = isset($_POST["peopleRelationship"]);

if(empty($_POST["dayPhone"])){
	$Daytime_Phone = '0000000000';
}
else{
	$Daytime_Phone = str_replace("-","", $_POST["dayPhone"]);
}

if ($_POST["dayMessage"] = 'Yes'){
	$Daytime_Msg = 'true';
}
else {
	$Daytime_Msg = 'false';
}


if(empty($_POST["nightPhone"])){
	$Evening_Phone = '0000000000';
}
else{
	$Evening_Phone = str_replace("-","", $_POST["nightPhone"]);
}

$Evening_Msg = $_POST["nightMessage"];

$DOB = $_POST["DOB"];

$birthDate = explode("/", $DOB);
  $AGE = (date("dm", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("dm")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));
$DOB2 = date("Y-m-d", strtotime($DOB)); //we do this because weird things happen when you use the code above before you do this

$Occupation = $_POST["occupation"];
$Religion = $_POST["religion"];
$Ethnicity = $_POST["ethnicity"];
$Languages = $_POST["lLanguage"];

$Handicapping_cond = $_POST["handicapMeds"];
$Last_Year_of_School = $_POST["schooling"];
if ($_POST["drugs"] == 'Yes'){
	$Drug_Alcohol_Issue = 'true';
}
else {
	$Drug_Alcohol_Issue = 'false';
}
#$Drug_Alcohol_Issue = $_POST["drugs"];
$Drug_if_Yes_Comment = isset($_POST["drugsExplan"]);

$Length_Sep_From_Child = $_POST["childSeperationTime"];
$Length_Sep_From_Oth_Parent = $_POST["parentSeperationTime"];
$Status_Relation_Oth_Parent = $_POST["relationship"];
$Parent_Together_Status = $_POST["parentTogether"];

if($_POST["cps"] == "Yes"){
	$Involved_W_CPS = 'true';
}
else{
	$Involved_W_CPS = 'false';
}
if(isset($_POST["pastCPS"]) == "Yes"){
	$If_Yes_Prev_Involved_W_CPS = 'true';
}
else{
	$If_Yes_Prev_Involved_W_CPS = 'false';
}

if($_POST["mandated"] == "Yes"){
	$Mandated = 'true';
}
else{
	$Mandated = 'false';
}
$If_Mandated_By_Who = isset($_POST["whoMandated"]);
$If_Mandated_Why = isset($_POST["whyMandated"]);
$If_Not_Mandated_Why = isset($_POST["whyTake"]);

$Safety_To_Participate_Needs = $_POST["safetyNeeds"];
$Behaviors_to_Stop_Part = $_POST["behaviors"];

if($_POST["otherClasses"] == "Yes"){
	$Other_Parenting_Classes = 'true';
}
else {
	$Other_Parenting_Classes = 'false';
}
$Other_Parenting_Long_Ago = isset($_POST["classDuration"]);

if($_POST["abuse"] == "Yes"){
	$Victim_of_Abuse = 'true';
}
else{
	$Victim_of_Abuse = 'false';
}

$If_Yes_Form_of_Abuse = isset($_POST["abuseForm"]);

if(isset($_POST["abuseTherapy"]) == "Yes"){
	$Therapy = 'true';
}
else{
	$Therapy = 'false';
}
$Issues_Related_to_Abuse = $_POST["childhoodAbuse"];

$Emergency_Contact_F_Name = $_POST["efName"];
$Emergency_Contact_L_Name = $_POST["elName"];
$Emergency_Contact_Relation = $_POST["eRelationship"];
if(empty($_POST["emergencyContactPhone"])){
	$Emergency_Contact_Number = '0000000000';
}
else{
	$Emergency_Contact_Number = str_replace("-","", $_POST["emergencyContactPhone"]);
}

$What_Like_Learn= $_POST["importantLearning"];

if($_POST["domesticViolence"] == "Yes"){
	$Domestic_Violence = 'true';
}
else{
	$Domestic_Violence = 'false';
}

if(isset($_POST["domesticViolenceTalk"]) == "Yes"){
	$Discussed_W_Someone = 'true';
}
else{
	$Discussed_W_Someone = 'false';
}
if ($_POST["domesticViolenceOriginFamily"] == "Yes") {
	$History_of_Violence = 'true';
}
else{
	$History_of_Violence = 'false';
}
if($_POST["domesticViolenceNuclearFamily"] == "Yes"){
	$Nuclear_Family_Violence = 'true';
}
else{
	$Nuclear_Family_Violence = 'false';
}

if($_POST["ordersOfProtection"] == "Yes"){
	$Orders_of_Protection = 'true';
}
else{
	$Orders_of_Protection = 'false';
}

$If_Orders_of_Prot_Explain = isset($_POST["ordersOfProtectionWhyWho"]);
if($_POST["arrested"] == "Yes"){
	$Arrested_for_Crime = 'true';
}
else{
	$Arrested_for_Crime = 'false';
}

if($_POST["convicted"] == "Yes"){
	$Convicted_for_Crime = 'true';
}
else{
	$Convicted_for_Crime = 'false';
}

$If_Convicted_Explain = isset($_POST["convictedExplan"]);

if($_POST["record"] == "Yes"){
	$Prison_or_Jail_Record = 'true';
}
else{
	$Prison_or_Jail_Record = 'false';
}

$If_Prison_or_Jail_when_what = isset($_POST["recordExplan"]);

if($_POST["probation"] == "Yes"){
	$Parole_or_Probation = 'true';
}
else{
	$Parole_or_Probation = 'false';
}

$If_Parole_Probation_Why = isset($_POST["probationExplan"]);

if($_POST["familyClasses"] == "Yes"){
	$Other_Members_in_Parenting = 'true';
}
else{
	$Other_Members_in_Parenting = 'false';
}

$If_Oth_Members_in_Parent = isset($_POST["familyClassesName"]);

/*echo $numPeople, PHP_EOL; 
echo $peopleRelationship, PHP_EOL;
echo $dayPhone, PHP_EOL;
echo $dayMessage, PHP_EOL;
echo $nightPhone, PHP_EOL;
echo $DOB, PHP_EOL;
echo $occupation, PHP_EOL;
echo $religion, PHP_EOL;
echo $ethnicity, PHP_EOL;
echo $lLanguage, PHP_EOL;
echo $schooling, PHP_EOL;
echo $drugs, PHP_EOL;
echo $drugsExplan, PHP_EOL;
echo $childSeperationTime, PHP_EOL;
echo $parentSeperationTime, PHP_EOL;
echo $relationship, PHP_EOL;
echo $parentTogether, PHP_EOL;
echo $cps, PHP_EOL;
echo $pastCPS, PHP_EOL;
echo $mandated, PHP_EOL;
echo $whoMandated, PHP_EOL;
echo $whyMandated, PHP_EOL;
echo $safetyNeeds, PHP_EOL;
echo $behaviors, PHP_EOL;
echo $otherClasses, PHP_EOL;
echo $classDuration, PHP_EOL;
echo $abuse, PHP_EOL;
echo $abuseForm, PHP_EOL;
echo $abuseTherapy, PHP_EOL;
echo $childhoodAbuse, PHP_EOL;
echo $efName, PHP_EOL;
echo $elName, PHP_EOL;
echo $eRelationship, PHP_EOL;
echo $emergencyContactPhone, PHP_EOL;
echo $importantLearning, PHP_EOL;
echo $domesticViolence, PHP_EOL;
echo $domesticViolenceTalk, PHP_EOL;
echo $domesticViolenceOriginFamily, PHP_EOL;
echo $domesticViolenceNuclearFamily, PHP_EOL;
echo $ordersOfProtection, PHP_EOL;
echo $ordersOfProtectionWhyWho, PHP_EOL;
echo $arrested, PHP_EOL;
echo $convicted, PHP_EOL;
echo $convictedExplan, PHP_EOL;
echo $record, PHP_EOL;
echo $recordExplan, PHP_EOL;
echo $probation, PHP_EOL;
echo $probationExplan, PHP_EOL;
echo $familyClasses, PHP_EOL;
echo $familyClassesName, PHP_EOL;

*/
$conn_string = "host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin";
$dbconn = pg_connect($conn_string);

$sql = 'Select referrals.p_num from referrals where referrals.ref_f_Name = \'' .$fName. '\' and referrals.ref_l_Name = \'' .$lName. '\' and AGE = '.$AGE.' ';
echo $sql;
$result = pg_query($dbconn, $sql);

if (!$result) {
  echo "An error occurred.\n";
  exit;
}

$P_Num = pg_fetch_row($result, 0)[0];


$sql2 = 'INSERT INTO Participant_Intake(P_Num, Age, Num_People_in_Home, Relation_to_Household, Daytime_Phone, Daytime_Msg, Evening_Phone,
 Date_of_Birth, Occupation, Religion, Ethnicity, Languages, Handicapping_cond, Last_Year_of_School, Drug_Alcohol_Issue, Drug_if_Yes_Comment,
  Length_Sep_From_Child, Length_Sep_From_Oth_Parent, Status_Relation_Oth_Parent, Parent_Together_Status, Involved_W_CPS, If_Yes_Prev_Involved_W_CPS,
   Mandated, If_Mandated_By_Who, If_Mandated_Why, If_Not_Mandated_Why, Safety_To_Participate_Needs, Behaviors_to_Stop_Part, Other_Parenting_Classes,
    Other_Parenting_Long_Ago, Victim_of_Abuse, If_Yes_Form_of_Abuse, Therapy, Issues_Related_to_Abuse, Emergency_Contact_F_Name,
     Emergency_Contact_L_Name, Emergency_Contact_Relation, Emergency_Contact_Number, What_Like_Learn, Domestic_Violence, Discussed_W_Someone,
      History_of_Violence, Nuclear_Family_Violence, Orders_of_Protection, If_Orders_of_Prot_Explain, Arrested_for_Crime, Convicted_for_Crime,
       If_Convicted_Explain, Prison_or_Jail_Record, If_Prison_or_Jail_when_what, Parole_or_Probation, If_Parole_Probation_Why,
        Other_Members_in_Parenting, If_Oth_Members_in_Parent)
	VALUES('.$P_Num.','.$AGE.','.$Num_People_in_Home.',\''.$Relation_to_Household.'\',\''.$Daytime_Phone.'\',\''.$Daytime_Msg.'\',\''.$Evening_Phone.'\',\''.$DOB2.'\',\''.$Occupation.'\', \''.$Religion.'\',\''.$Ethnicity.'\',\''.$Languages.'\',\''.$Handicapping_cond.'\',\''.$Last_Year_of_School.'\', \''.$Drug_Alcohol_Issue.'\',\''.$Drug_if_Yes_Comment.'\',\''.$Length_Sep_From_Child.'\',\''.$Length_Sep_From_Oth_Parent.'\',\''.$Status_Relation_Oth_Parent.'\',\''.$Parent_Together_Status.'\',\''.$Involved_W_CPS.'\' , \''.$If_Yes_Prev_Involved_W_CPS.'\',\''.$Mandated.'\',\''.$If_Mandated_By_Who.'\',\''.$If_Mandated_Why.'\',\''.$If_Not_Mandated_Why.'\',\''.$Safety_To_Participate_Needs.'\',\''.$Behaviors_to_Stop_Part.'\',\''.$Other_Parenting_Classes.'\',\''.$Other_Parenting_Long_Ago.'\',\''.$Victim_of_Abuse.'\',\''.$If_Yes_Form_of_Abuse.'\',\''.$Therapy.'\',\''.$Issues_Related_to_Abuse.'\',\''.$Emergency_Contact_F_Name.'\',\''.$Emergency_Contact_L_Name.'\',\''.$Emergency_Contact_Relation.'\',\''.$Emergency_Contact_Number.'\',\''.$What_Like_Learn.'\',\''.$Domestic_Violence.'\',\''.$Discussed_W_Someone.'\',\''.$History_of_Violence.'\',\''.$Nuclear_Family_Violence.'\',\''.$Orders_of_Protection.'\',\''.$If_Orders_of_Prot_Explain.'\',\''.$Arrested_for_Crime.'\',\''.$Convicted_for_Crime.'\',\''.$If_Convicted_Explain.'\',\''.$Prison_or_Jail_Record.'\',\''.$If_Prison_or_Jail_when_what.'\',\''.$Parole_or_Probation.'\',\''.$If_Parole_Probation_Why.'\',\''.$Other_Members_in_Parenting.'\',\''.$If_Oth_Members_in_Parent.'\');';

$result = pg_query($dbconn, $sql2);
echo $sql2;

}
 ?>

</body>
</html>