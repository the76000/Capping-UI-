<html>
<body>

<?php 
//variables for the querry from the ReferalApp

if(empty($_POST["fName"]) || empty($_POST["lName"]) ||  empty($_POST["DOB"])){
	echo 'Please make sure you fill out your first name, last name, and date of birth correctly';
}
else{

$Ref_F_Name	= $_POST["fName"];
$Ref_L_Name = $_POST["lName"];
$Ref_MI_Name = $_POST["mName"];

$Ref_Street = $_POST["street"];
$Ref_City = $_POST["city"];
$Ref_State = $_POST["state"];
if(empty($_POST['zip'])){
$Ref_Zip = '00000';
}
else{
$Ref_Zip = $_POST["zip"];
}

if(empty($_POST["HPhone"])){
	$Ref_Home_Phone = '0000000000';
}
else{
	$Ref_Home_Phone = str_replace("-","", $_POST["HPhone"]);
}

if(empty($_POST["CPhone"])){
	$Ref_Cell_Phone = '0000000000';
}
else{
	$Ref_Cell_Phone = str_replace("-","", $_POST["CPhone"]);
}

$Reason_For_Referral = $_POST["RefReason"];
$Referring_Agency = $_POST["RefAgencyName"];
$Ref_Date = date("Y-m-d", strtotime( $_POST["refDate"]));
$Contact_Person_F_Name = $_POST["refContactPersonFName"];
$Contact_Person_L_Name = $_POST["refContactPersonLName"];

if(empty($_POST["refContactPersonPhone"])){
	$Contact_Person_Number = '0000000000';
}
else{
	$Contact_Person_Number = str_replace("-","", $_POST["refContactPersonPhone"]);
}

$Contact_Person_Email = $_POST["refContactPersonEmail"];

$Additional_Info_Specific_Needs = $_POST["addInfoSpecNeeds"];
$Date_of_fst_Contact = date("Y-m-d", strtotime( $_POST["dateOfContact"]));
$Means_of_Contact = $_POST["meansOfContact"];
$Date_of_Int_Meeting = date("Y-m-d", strtotime($_POST["dateOfInitMeeting"]));

if(empty($_POST["timeOfInitMeeting"])){
	$Time_of_Int_Meeting = '12:00' .$_POST["timeOfInitMeeting2"];
}
else{
$Time_of_Int_Meeting = ''.$_POST["timeOfInitMeeting"].'  '.$_POST["timeOfInitMeeting2"].'';
}

$Location = $_POST["locationOfInitMeeting"];
$Staff_Person = $_POST["staffPerson"];
$Comments = $_POST["Comments"];
$DOB = $_POST["DOB"];


// These Variables are for the Ref House Hold Info

$H_F_NAME = $_POST["hFName"];
$H_L_NAME = $_POST["hSName"];
$H_MI_NAME = $_POST["hMName"];
$H_DOB = $_POST["hDOB"];
$H_Sex = $_POST["hGender"];
$H_Race = $_POST["hRace"];
$H_Comment = $_POST["hComment"];
$H_Relation = $_POST["hRelation"];



// These Variables are for the other agencies involved 

$Agency_Name = $_POST["otherAgency"];;
$Working_With = $_POST["otherWorkingWith"];
$Relation = $_POST["OthRelation"];




//calculations for the age
$birthDate = explode("/", $DOB);
  $AGE = (date("dm", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("dm")
    ? ((date("Y") - $birthDate[2]) - 1)
    : (date("Y") - $birthDate[2]));

$DOB2 = date("Y-m-d", strtotime($DOB)); //we do this because weird things happen when you use the code above before you do this

//database insert statement for the referrals table 
$conn_string = "host=10.10.7.195 port=5432 dbname=cappingdb user=postgres password=admin";
$dbconn = pg_connect($conn_string);

$sql = 'INSERT INTO Referrals (Ref_F_Name, Ref_L_Name, Ref_MI_Name, Ref_Street, Ref_City, Ref_State, Ref_Zip, Ref_Home_Phone, Ref_Cell_Phone, Reasons_For_Referral, Referring_Agency, Ref_Date, Contact_Person_F_Name, Contact_Person_L_Name, Contact_Person_Number, Contact_Person_Email, Additional_Info_Specific_Needs,  Date_of_fst_Contact, Means_of_Contact, Date_of_Int_Meeting, Time_of_Int_Meeting, Location, Staff_Person, Comments, DOB, AGE)
	VALUES (\''.$Ref_F_Name.'\', \''.$Ref_L_Name.'\', \''.$Ref_MI_Name.'\',\''.$Ref_Street.'\' ,\''.$Ref_City.'\',\''.$Ref_State.'\',\''.$Ref_Zip.'\',\''.$Ref_Home_Phone.'\',\''.$Ref_Cell_Phone.'\', \''.$Reason_For_Referral.'\', \''.$Referring_Agency.'\', \''.$Ref_Date.'\', \''.$Contact_Person_F_Name.'\', \''.$Contact_Person_L_Name.'\', \''.$Contact_Person_Number.'\', \''.$Contact_Person_Email.'\', \''.$Additional_Info_Specific_Needs.'\', \''.$Date_of_fst_Contact.'\', \''.$Means_of_Contact.'\', \''.$Date_of_Int_Meeting.'\', \''.$Time_of_Int_Meeting.'\', \''.$Location.'\', \''.$Staff_Person.'\', \''.$Comments.'\', \''.$DOB2.'\', '.$AGE.');';

$result = pg_query($dbconn, $sql);


// get the P Num of the referral just inserted 
$sql1 = 'Select p_num from referrals where ref_f_Name = \'' .$Ref_F_Name. '\' and ref_l_Name = \'' .$Ref_L_Name. '\' and AGE = '.$AGE.' ';
$result1 = pg_query($dbconn, $sql1);

if (!$result) {
  echo "An error occurred.\n";
  exit;
}


$P_Num = pg_fetch_row($result1, 0)[0];

//Insert the household Values into a table 
/*if(empty($H_F_NAME)){
	
}
else{
$H_Count = count($H_F_NAME);


$sql2 = 'INSERT INTO Ref_Household_Info (P_Num, H_F_Name, H_L_Name, H_Date, H_MI_Name, H_Sex, H_Race, H_Comment, H_Relation)
		VALUES(';



for($i = 0; $i< $H_Count; $i++ ){
	$sql2 = $sql2 . 
}


	VALUES(4,'Casey', 'Anthony', '2013-10-09', 'L', 'F', 'Argonian', 'Bad Mom', 'Cousin');
}*/

echo 'info inserted as PID ' . $P_Num;
}

?>
</body>
</html>