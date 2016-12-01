<html>
<body>
<?php

$numPeople = $_POST["numPeople"];
$peopleRelationship = $_POST["peopleRelationship"];
$dayPhone = $_POST["dayPhone"];
$dayMessage = $_POST["dayMessage"];
$nightPhone = $_POST["nightPhone"];
$DOB = $_POST["DOB"];
$occupation = $_POST["occupation"];
$religion = $_POST["religion"];
$ethnicity = $_POST["ethnicity"];
$lLanguage = $_POST["lLanguage"];
$handicapMeds = $_POST["handicapMeds"];
$schooling = $_POST["schooling"];
$drugs = $_POST["drugs"];
$drugsExplan = isset($_POST["drugsExplan"]);
$childSeperationTime = $_POST["childSeperationTime"];
$parentSeperationTime = $_POST["parentSeperationTime"];
$relationship = $_POST["relationship"];
$parentTogether = $_POST["parentTogether"];
$cps = $_POST["cps"];
$pastCPS = isset($_POST["pastCPS"]);
$mandated = $_POST["mandated"];
$whoMandated = isset($_POST["whoMandated"]);
$whyMandated = isset($_POST["whyMandated"]);
$whyTake = $_POST["whyTake"];
$safetyNeeds = $_POST["safetyNeeds"];
$behaviors = $_POST["behaviors"];
$otherClasses = $_POST["otherClasses"];
$classDuration = $_POST["classDuration"];
$abuse = $_POST["abuse"];
$abuseForm = $_POST["abuseForm"];
$abuseTherapy = $_POST["abuseTherapy"];
$childhoodAbuse = $_POST["childhoodAbuse"];
$efName = $_POST["efName"];
$elName = $_POST["elName"];
$eRelationship = $_POST["eRelationship"];
$emergencyContactPhone = $_POST["emergencyContactPhone"];
$importantLearning = $_POST["importantLearning"];
$domesticViolence = $_POST["domesticViolence"];
$domesticViolenceTalk = isset($_POST["domesticViolenceTalk"]);
$domesticViolenceOriginFamily = $_POST["domesticViolenceOriginFamily"];
$domesticViolenceNuclearFamily = $_POST["domesticViolenceNuclearFamily"];
$ordersOfProtection = $_POST["ordersOfProtection"];
$ordersOfProtectionWhyWho = isset($_POST["ordersOfProtectionWhyWho"]);
$arrested = $_POST["arrested"];
$convicted = $_POST["convicted"];
$convictedExplan = isset($_POST["convictedExplan"]);
$record = $_POST["record"];
$recordExplan = isset($_POST["recordExplan"]);
$probation = $_POST["probation"];
$probationExplan = isset($_POST["probationExplan"]);
$familyClasses = $_POST["familyClasses"];
$familyClassesName = isset($_POST["familyClassesName"]);

echo $numPeople, PHP_EOL; 
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





$sql = "INSERT INTO Participant_Intake(P_Num, Age, Num_People_in_Home, Relation_to_Household, Daytime_Phone, Daytime_Msg, Evening_Phone,
 Date_of_Birth, Occupation, Religion, Ethnicity, Languages, Handicapping_cond, Last_Year_of_School, Drug_Alcohol_Issue, Drug_if_Yes_Comment,
  Length_Sep_From_Child, Length_Sep_From_Oth_Parent, Status_Relation_Oth_Parent, Parent_Together_Status, Involved_W_CPS, If_Yes_Prev_Involved_W_CPS,
   Mandated, If_Mandated_By_Who, If_Mandated_Why, If_Not_Mandated_Why, Safety_To_Participate_Needs, Behaviors_to_Stop_Part, Other_Parenting_Classes,
    Other_Parenting_Long_Ago, Victim_of_Abuse, If_Yes_Form_of_Abuse, Therapy, Issues_Related_to_Abuse, Emergency_Contact_F_Name,
     Emergency_Contact_L_Name, Emergency_Contact_Relation, Emergency_Contact_Number, What_Like_Learn, Domestic_Violence, Discussed_W_Someone,
      History_of_Violence, Nuclear_Family_Violence, Orders_of_Protection, If_Orders_of_Prot_Explain, Arrested_for_Crime, Convicted_for_Crime,
       If_Convicted_Explain, Prison_or_Jail_Record, If_Prison_or_Jail_when_what, Parole_or_Probation, If_Parole_Probation_Why,
        Other_Members_in_Parenting, If_Oth_Members_in_Parent)
echo $ethnicity, PHP_EOL;
	VALUES(4,25,$numPeople,$peopleRelationship,'$dayPhone','$dayMessage','$nightPhone','$DOB','$occupation', '$religion','$','$lLanguage','$handicapMeds','$schooling', '$drugs','$drugsExplan','$childSeperationTime','$parentSeperationTime','$relationship','$parentTogether', '$cps' , '$pastCPS','$mandated','$whoMandated','$whyMandated' , '$whyTake','$safetyNeeds', '$behaviors','$otherClasses','$classDuration','$abuse','$abuseForm','$abuseTherapy','$childhoodAbuse','$efName','$elName','$eRelationship','$emergencyContactPhone','$importantLearning','$domesticViolence','$domesticViolenceTalk','$domesticViolenceOriginFamily','$domesticViolenceNuclearFamily','$ordersOfProtection','$ordersOfProtectionWhyWho','$arrested','$convicted','$convictedExplan','$record','$recordExplan','$probation','$probationExplan','$familyClasses','$familyClassesName');"; 

#echo $sql;
 ?>

</body>
</html>