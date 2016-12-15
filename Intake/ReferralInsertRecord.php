<html>
<body>

<?php 
//variables for the querry from the ReferalApp

$conn_string = "host=localhost port=5432 dbname=parentempowerment user=postgres password=CPCA2016";

if(empty($_POST["fName"]) || empty($_POST["lName"]) ||  empty($_POST["DOB"])){
	echo 'Please make sure you fill out your first name, last name, and date of birth correctly. Please hit the browser\'s back button to conintue.';
}
else{

$Ref_F_Name	= strtolower($_POST["fName"]);
$Ref_L_Name = strtolower($_POST["lName"]);
$Ref_MI_Name = strtolower($_POST["mName"]);

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

if($_POST["RefAgencyName"] == "other"){
$Referring_Agency = $_POST["RefAgencyNameOther"];
}
else{
$Referring_Agency = $_POST["RefAgencyName"];
}

if(empty($_POST["refDate"])){
	$Ref_Date = "NULL";
}
else{
$Ref_Date = '\'' . date("Y-m-d", strtotime( $_POST["refDate"])) . '\'';
}

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

if(empty($_POST["dateOfContact"])){
	$Date_of_fst_Contact = "NULL";
}
else{
	$Date_of_fst_Contact = '\'' .date("Y-m-d", strtotime( $_POST["dateOfContact"])). '\'';
}

$Means_of_Contact = $_POST["meansOfContact"];

if(empty($_POST["dateOfInitMeeting"])){
	$Date_of_Int_Meeting = "NULL";
}
else{
	$Date_of_Int_Meeting = '\'' . date("Y-m-d", strtotime( $_POST["dateOfInitMeeting"])) . '\'';
}

if(empty($_POST["timeOfInitMeeting"])){
	$Time_of_Int_Meeting = '12:00' .$_POST["timeOfInitMeeting2"];
}
else{
$Time_of_Int_Meeting = ''.$_POST["timeOfInitMeeting"].'  '.$_POST["timeOfInitMeeting2"].'';
}

$Location = $_POST["locationOfInitMeeting"];
$Staff_Person = $_POST["staffPerson"];
$Comments = $_POST["Comments"];
$DOB = date("Y-m-d", strtotime($_POST["DOB"]));


// These Variables are for the Ref House Hold Info

$H_F_NAME = strtolower(isset($_POST["hFName"]));
$H_L_NAME = strtolower(isset($_POST["hSName"]));
$H_MI_NAME = strtolower(isset($_POST["hMName"]));
$H_DOB = $_POST["hDOB"];
$H_Sex = $_POST["hGender"];
$H_Race = $_POST["hRace"];
$H_Comment = $_POST["hComment"];
$H_Relation = $_POST["hRelation"];



// These Variables are for the other agencies involved 

$Agency_Name = $_POST["otherAgency"];;
$Working_With = $_POST["otherWorkingWith"];
$Relation = $_POST["OthRelation"];

// Variables for Reference variables to ref_ind_conditions

$Condition_Key = isset($_POST["chkBoxOptions"]);



//calculations for the age
$AGE = (date('Y') - date('Y',strtotime($DOB)));

//database insert statement for the referrals table 

$dbconn = pg_connect($conn_string);

$sql = 'INSERT INTO Referrals (Ref_F_Name, Ref_L_Name, Ref_MI_Name, Ref_Street, Ref_City, Ref_State, Ref_Zip, Ref_Home_Phone, Ref_Cell_Phone, Reasons_For_Referral, Referring_Agency, Ref_Date, Contact_Person_F_Name, Contact_Person_L_Name, Contact_Person_Number, Contact_Person_Email, Additional_Info_Specific_Needs,  Date_of_fst_Contact, Means_of_Contact, Date_of_Int_Meeting, Time_of_Int_Meeting, Location, Staff_Person, Comments, DOB, AGE)
	VALUES (\''.$Ref_F_Name.'\', \''.$Ref_L_Name.'\', \''.$Ref_MI_Name.'\',\''.$Ref_Street.'\' ,\''.$Ref_City.'\',\''.$Ref_State.'\',\''.$Ref_Zip.'\',\''.$Ref_Home_Phone.'\',\''.$Ref_Cell_Phone.'\', \''.$Reason_For_Referral.'\', \''.$Referring_Agency.'\', '.$Ref_Date.', \''.$Contact_Person_F_Name.'\', \''.$Contact_Person_L_Name.'\', \''.$Contact_Person_Number.'\', \''.$Contact_Person_Email.'\', \''.$Additional_Info_Specific_Needs.'\', '.$Date_of_fst_Contact.', \''.$Means_of_Contact.'\', '.$Date_of_Int_Meeting.', \''.$Time_of_Int_Meeting.'\', \''.$Location.'\', \''.$Staff_Person.'\', \''.$Comments.'\', \''.$DOB.'\', '.$AGE.');';

$result = pg_query($dbconn, $sql);

//.echo $sql;


// get the P Num of the referral just inserted 
$sql1 = 'Select p_num from referrals where ref_f_Name = \'' .$Ref_F_Name. '\' and ref_l_Name = \'' .$Ref_L_Name. '\' and AGE = '.$AGE.' ';
$result1 = pg_query($dbconn, $sql1);

if (!$result) {
  echo "An error occurred.\n";
  exit;
}

$P_Num = pg_fetch_row($result1, 0)[0];
$CID = '1';
$Sex = '';
$Race = '';
$Number_Of_Children = '0';
$Status = '';


// Insert a record into the participant table
$sql5 = 'INSERT INTO Participants (P_Num, CID, Sex, Race, Number_Of_Children, Status)
			VALUES (\''.$P_Num.'\', \''.$CID.'\',\''.$Sex.'\',\''.$Race.'\','.$Number_Of_Children.',\''.$Status.'\');'; 

$result5 = pg_query($dbconn, $sql5);


//Insert the household Values into a table 
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


//Insert Other Agencies involed querry
$OthAgenciesCount = count($Agency_Name);
if($OthAgenciesCount==1 && empty($Agency_Name[0])){
	
}
else{
	$sql3= 'INSERT INTO Other_Agencies(P_Num, Agency_Name, Working_With, Relation)
		VALUES';
	for($b = 0; $b < $OthAgenciesCount; $b++){
		if(empty($Agency_Name[$b])){
			
		}
		else{
			if($b != ($OthAgenciesCount -1) ){
				$sql3 = $sql3 . '('.$P_Num.', \''.$Agency_Name[$b].'\' , \''.$Working_With[$b].'\',\''.$Relation[$b].'\'  ),';
			}
			else{
				$sql3 = $sql3 . '('.$P_Num.', \''.$Agency_Name[$b].'\' , \''.$Working_With[$b].'\',\''.$Relation[$b].'\'  );';
			}
		}
	}
	
	echo $sql3;
	$result3 = pg_query($dbconn, $sql3);
}


//Insert check box conditions options 
if(empty($Condition_Key)){
	
}
else{
	$ConditionTotal = count($Condition_Key);
	echo $ConditionTotal;
	
	$sql4 = 'INSERT INTO Ref_Indiv_Condition (P_Num, Condition_Key) VALUES';
	
	for($c = 0; $c < $ConditionTotal; $c++){
		if($c != ($ConditionTotal -1)){
		$sql4 = $sql4 . '('.$P_Num.','.$Condition_Key[$c].'),';
		}
		else{
		$sql4 = $sql4 . '('.$P_Num.','.$Condition_Key[$c].');';
		}
	}
	
	$result4 = pg_query($dbconn, $sql4);
}



echo 'All info added Successfully under PID ' . $P_Num;
}

?>
</body>
</html>