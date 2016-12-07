<html>
<body>
<?php
if(empty($_POST["fName"]) || empty($_POST["lName"]) ||  empty($_POST["DOB"])){
	echo 'Please make sure you fill out your first name, last name, and date of birth correctly. Please hit the browser\'s back button to conintue.';
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

if(empty($_POST["numPeople"])){
$Num_People_in_Home = 0;
}
else{
$Num_People_in_Home	= $_POST["numPeople"];
}


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

$DOB = date("Y-m-d", strtotime($_POST["DOB"]));

$AGE = (date('Y') - date('Y',strtotime($DOB)));

$Occupation = $_POST["occupation"];
$Religion = $_POST["religion"];
$Ethnicity = $_POST["ethnicity"];
$Languages = implode(",",$_POST["lLanguage"]);

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

//variables for childrens intak table 
$Ch_F_Name = $_POST["iFName"];
$Ch_L_Name = $_POST["iSName"];
$Ch_Age = $_POST["iMName"];
$Ch_M_Initial = $_POST["iGender"];
$Ch_Sex = $_POST["iDOB"];
$Ch_Race = $_POST["iRace"];
$Ch_Address_Street = $_POST["iSName"];
$Ch_Address_City =
$Ch_Address_State =
$Ch_Address_Zipcode =
$Custody =




//builds connection to database
$conn_string = "host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin";
$dbconn = pg_connect($conn_string);

//querry to check and see if there is a p num for this person
$sql = 'Select p_num from referrals where ref_f_Name = \'' .$fName. '\' and ref_l_Name = \'' .$lName. '\' and AGE = '.$AGE.' ';
$result = pg_query($dbconn, $sql);

if (!$result) {
  echo "An error occurred.\n";
  exit;
}
if(empty($result)){
	
}
else{
$P_Num = pg_fetch_row($result, 0)[0];
}
//if no p num build a referral for this person
if(empty($P_NUM)){
	$sql1 = 'INSERT INTO Referrals (Ref_F_Name, Ref_L_Name, Ref_MI_Name, Ref_Street, Ref_City, Ref_State, Ref_Zip, Ref_Home_Phone, Ref_Cell_Phone, Reasons_For_Referral, Referring_Agency, Ref_Date, Contact_Person_F_Name, Contact_Person_L_Name, Contact_Person_Number, Contact_Person_Email, Additional_Info_Specific_Needs, Date_of_fst_Contact, Means_of_Contact, Date_of_Int_Meeting, Time_of_Int_Meeting, Location, Staff_Person, Comments, DOB, AGE) VALUES (\''.$fName.'\', \''.$lName.'\', \''.$mName.'\',\'\' ,\'\',\'\',\'00000\',\'0000000000\',\'0000000000\', \' \', \'\', NULL, \'\', \'\', \'0000000000\', \'\', \' \', NULL, \'\', NULL, \'12:00AM\', \'\', \'\', \' \', \''.$DOB.'\', '.$AGE.');';
	echo $sql1;
	$result1 = pg_query($dbconn, $sql1);
	
	$result = pg_query($dbconn, $sql);
	$P_Num = pg_fetch_row($result, 0)[0];
	}

// Build querry to insert Intake info
$sql2 = 'INSERT INTO Participant_Intake(P_Num, Age, Num_People_in_Home, Relation_to_Household, Daytime_Phone, Daytime_Msg, Evening_Phone,
 Date_of_Birth, Occupation, Religion, Ethnicity, Languages, Handicapping_cond, Last_Year_of_School, Drug_Alcohol_Issue, Drug_if_Yes_Comment,
  Length_Sep_From_Child, Length_Sep_From_Oth_Parent, Status_Relation_Oth_Parent, Parent_Together_Status, Involved_W_CPS, If_Yes_Prev_Involved_W_CPS,
   Mandated, If_Mandated_By_Who, If_Mandated_Why, If_Not_Mandated_Why, Safety_To_Participate_Needs, Behaviors_to_Stop_Part, Other_Parenting_Classes,
    Other_Parenting_Long_Ago, Victim_of_Abuse, If_Yes_Form_of_Abuse, Therapy, Issues_Related_to_Abuse, Emergency_Contact_F_Name,
     Emergency_Contact_L_Name, Emergency_Contact_Relation, Emergency_Contact_Number, What_Like_Learn, Domestic_Violence, Discussed_W_Someone,
      History_of_Violence, Nuclear_Family_Violence, Orders_of_Protection, If_Orders_of_Prot_Explain, Arrested_for_Crime, Convicted_for_Crime,
       If_Convicted_Explain, Prison_or_Jail_Record, If_Prison_or_Jail_when_what, Parole_or_Probation, If_Parole_Probation_Why,
        Other_Members_in_Parenting, If_Oth_Members_in_Parent)
	VALUES('.$P_Num.','.$AGE.','.$Num_People_in_Home.',\''.$Relation_to_Household.'\',\''.$Daytime_Phone.'\',\''.$Daytime_Msg.'\',\''.$Evening_Phone.'\',\''.$DOB.'\',\''.$Occupation.'\', \''.$Religion.'\',\''.$Ethnicity.'\',\''.$Languages.'\',\''.$Handicapping_cond.'\',\''.$Last_Year_of_School.'\', \''.$Drug_Alcohol_Issue.'\',\''.$Drug_if_Yes_Comment.'\',\''.$Length_Sep_From_Child.'\',\''.$Length_Sep_From_Oth_Parent.'\',\''.$Status_Relation_Oth_Parent.'\',\''.$Parent_Together_Status.'\',\''.$Involved_W_CPS.'\' , \''.$If_Yes_Prev_Involved_W_CPS.'\',\''.$Mandated.'\',\''.$If_Mandated_By_Who.'\',\''.$If_Mandated_Why.'\',\''.$If_Not_Mandated_Why.'\',\''.$Safety_To_Participate_Needs.'\',\''.$Behaviors_to_Stop_Part.'\',\''.$Other_Parenting_Classes.'\',\''.$Other_Parenting_Long_Ago.'\',\''.$Victim_of_Abuse.'\',\''.$If_Yes_Form_of_Abuse.'\',\''.$Therapy.'\',\''.$Issues_Related_to_Abuse.'\',\''.$Emergency_Contact_F_Name.'\',\''.$Emergency_Contact_L_Name.'\',\''.$Emergency_Contact_Relation.'\',\''.$Emergency_Contact_Number.'\',\''.$What_Like_Learn.'\',\''.$Domestic_Violence.'\',\''.$Discussed_W_Someone.'\',\''.$History_of_Violence.'\',\''.$Nuclear_Family_Violence.'\',\''.$Orders_of_Protection.'\',\''.$If_Orders_of_Prot_Explain.'\',\''.$Arrested_for_Crime.'\',\''.$Convicted_for_Crime.'\',\''.$If_Convicted_Explain.'\',\''.$Prison_or_Jail_Record.'\',\''.$If_Prison_or_Jail_when_what.'\',\''.$Parole_or_Probation.'\',\''.$If_Parole_Probation_Why.'\',\''.$Other_Members_in_Parenting.'\',\''.$If_Oth_Members_in_Parent.'\');';
echo $sql2;
$result2 = pg_query($dbconn, $sql2);


//Build querry to insert into intk_children table

if(empty($H_F_NAME)){
	
}
else{
$H_Count = count($H_F_NAME);
	
	if($H_Count == 1 && empty($H_F_NAME[0]) && empty($H_L_NAME[0]) && empty($H_DOB[0]) ){
		
	}
	else{



	$sql2 = 'INSERT INTO Ref_Household_Info (P_Num, H_F_Name, H_L_Name, H_Date, H_MI_Name, H_Sex, H_Race, H_Comment, H_Relation)
			VALUES';



	for($a = 0; $a< $H_Count; $a++ ){
		//check to see if any values were submitted empty
		if(empty($H_F_NAME[$a])){
			$H_F_NAME[$a] = 'NoInfoSub';
		}
		if(empty($H_L_NAME[$a])){
			$H_L_NAME[$a] = 'NoInfoSub';
		}
	
		if(empty($H_DOB[$a])){
			$H_DOB[$a] = '1111-11-11'; //designated to capture as much info as possible with out breaking the database
		}
		else{
			$H_DOB[$a] = date("Y-m-d", strtotime( $H_DOB[$a]));
		}
		
		//build sql
		if($a != ($H_Count -1) ){
		$sql2 = $sql2 . '('.$P_Num.', \''.$H_F_NAME[$a].'\', \''.$H_L_NAME[$a].'\' , \''.$H_DOB[$a].'\', \''.$H_MI_NAME[$a].'\', \''.$H_Sex[$a].'\', \''.$H_Race[$a].'\', \''.$H_Comment[$a].'\' , \''.$H_Relation[$a].'\'),';
		}
		else{
		$sql2 = $sql2 . '('.$P_Num.', \''.$H_F_NAME[$a].'\', \''.$H_L_NAME[$a].'\' , \''.$H_DOB[$a].'\', \''.$H_MI_NAME[$a].'\', \''.$H_Sex[$a].'\', \''.$H_Race[$a].'\', \''.$H_Comment[$a].'\' , \''.$H_Relation[$a].'\');';	
		}
	}
	
	$result2 = pg_query($dbconn, $sql2);
	
	}
}

}
 ?>

</body>
</html>