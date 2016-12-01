<!DOCTYPE HTML>
<html>
<!--
Developed By TeamZero under the Marist Computer Science Capping Course Program.
This Web Application was developed to replace the paper copy of the Intake form for the Parent Empowerment Program (PEP).
-->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<title> Parent Empowerment Referral Form </title> 

</head>
<body>
<!-- Php Functions -->
<?php require 'FormAppPHPFunctions.php';?>


<header id = "header"> <h1 style="font-weight:bold;"><img id = "titleImage" src="Images\CPCALogo.png"/> Parent Empowerment Referral Form </h1> </header>
<div class="container-fluid" id= "container">

<form class="form-inline">
<br>
<!-- About Applicant group -->
<h4 style="text-align:center;"> Participant Information </h4>
<br>

<label for="fName"> First Name: </label> 
<input type="text" name= "fName" maxlength="20" size="30" oninput="validateAlpha('fName');" id="fName" class="form-control"> 

<label for="mName"> Middle Initial: </label> 
<input type="text" name= "mName" maxlength="1" size="1" oninput="validateAlpha('mName');" id="mName" class="form-control"> 

<label for="LName"> Last Name: </label> 
<input type="text" name= "lName" maxlength="20" size="30" oninput="validateAlpha('lName');" id="lName" class="form-control"> 

<br>
<br>

<label for="DOB"> Date of Birth: </label> 
<input type="text" name= "DOB" maxlength="10" size="30" id="DOB" class="form-control" onkeypress="isDate('DOB',event);" onblur="isDateOffFocus('DOB');" placeholder="mm/dd/yyyy">

<br>
<br>

<label for="RefReason" style="width:16%;"> Reason for Referral: </label>
<textarea id="RefReason" class="form-control" style="resize:none;width:100%;" maxlength="250"> </textarea>

<br>
<br>
<hr>
<!-- Address group -->
<h4> Participant Contact Information </h4>
<br>

<label for="street"> Street: </label> 
<input type="text" name= "street" maxlength="30" size="30" id="street" class="form-control">

<label for="city"> City: </label> 
<input type="text" name= "city" maxlength="30" size="30" oninput="validateAlpha('city');" id="city" class="form-control">

<br>
<br>

<label for="state"> State: </label> 
<select name="state" id="state" class="form-control" style="margin-right:9%;" >
	<option value="none">-- select one --</option>
	<option value="AL">Alabama</option>
	<option value="AK">Alaska</option>
	<option value="AZ">Arizona</option>
	<option value="AR">Arkansas</option>
	<option value="CA">California</option>
	<option value="CO">Colorado</option>
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="DC">District Of Columbia</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="HI">Hawaii</option>
	<option value="ID">Idaho</option>
	<option value="IL">Illinois</option>
	<option value="IN">Indiana</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="MT">Montana</option>
	<option value="NE">Nebraska</option>
	<option value="NV">Nevada</option>
	<option value="NH">New Hampshire</option>
	<option value="NJ">New Jersey</option>
	<option value="NM">New Mexico</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="ND">North Dakota</option>
	<option value="OH">Ohio</option>
	<option value="OK">Oklahoma</option>
	<option value="OR">Oregon</option>
	<option value="PA">Pennsylvania</option>
	<option value="RI">Rhode Island</option>
	<option value="SC">South Carolina</option>
	<option value="SD">South Dakota</option>
	<option value="TN">Tennessee</option>
	<option value="TX">Texas</option>
	<option value="UT">Utah</option>
	<option value="VT">Vermont</option>
	<option value="VA">Virginia</option>
	<option value="WA">Washington</option>
	<option value="WV">West Virginia</option>
	<option value="WI">Wisconsin</option>
	<option value="WY">Wyoming</option>
</select>

<label for="zip"> Zip: </label> 
<input type="text" name= "zip" maxlength="5" size="5" oninput="isNumberKey('zip');" id="zip" class="form-control">

<br>
<br>

<label for="HPhone"> Home Phone: </label>
<input type="text" name="HPhone" maxlength="12" size="30" id="HPhone" class="form-control" onkeypress="isPhoneNumber('HPhone',event);" onblur="isPhoneOffFocus('HPhone');" placeholder="999-999-9999">

<label for="CPhone"> Cell Phone: </label>
<input type="text" name= "CPhone" maxlength="12" size="30" id="CPhone" class="form-control" onkeypress="isPhoneNumber('CPhone',event);" onblur="isPhoneOffFocus('CPhone');" placeholder="999-999-9999">

<br>
<br>
<hr>
<!-- Referring Agency group -->
<h4 style="text-align:center;"> Referring Party Information </h4>

<br>
<br>

<label for="RefAgencyName"> Referring Party </label>
<select name="RefAgencyName" id="RefAgencyName" class="form-control" style="margin-right:4%; width:265px;" onChange="enableRefAgencyOtherBox();">
	<option value="none"> 						-- select one --				</option>
	<option value="cps"> 						CPS 							</option>	
	<option value="dutchessCountySheriff">		Dutchess County Sheriff			</option>
	<option value="family">						Family 							</option>	
	<option value="friend">						Friend							</option>
	<option value="self">						Self							</option>
	<option value="lawyer">						Lawyer							</option>
	<option value="police">						Local Police					</option>
	<option value="statePolice">				State Police					</option>
	<option value="localCourt">					Local Court 					</option>
	<option value="stateCourt">					State Court						</option>
	<option value="otherCourt">					Other Court						</option>
</select>

<label for="RefAgencyNameOther" style="width:10%;"> If other, name here: </label>
<input type="text" name="RefAgencyNameOther" id="RefAgencyNameOther" class="form-control" size="30" maxlength="30" oninput="validateAlpha('RefAgencyNameOther');" disabled>

<br>
<br>

<label for="refDate"> Date Referred </label>
<input type="text" name= "refDate" id="refDate" maxlength="10" size="30" id="DOB" class="form-control" onkeypress="isDate('refDate',event);" onblur="isDateOffFocus('refDate');" placeholder="mm/dd/yyyy">

<br>
<br>

<label for="refContactPersonFName" style="width:13%;"> Contact Person First Name: </label>
<input type="text" name= "refContactPersonFName" id= "refContactPersonFName" maxlength="20" size="30" class="form-control" oninput=" validateAlpha('refContactPersonFName');">

<label for="refContactPersonLName" style="width:13%;"> Contact Person Last Name: </label>
<input type="text" name= "refContactPersonLName" id= "refContactPersonLName" maxlength="20" size="30" class="form-control" oninput=" validateAlpha('refContactPersonLName');">
 
<br>
<br>
 
<label for="refContactPersonPhone"> Contact Phone: </label>
<input type="text" name= "refContactPersonPhone" maxlength="12" size="30" id="refContactPersonPhone" class="form-control" onkeypress="isPhoneNumber('refContactPersonPhone',event);" onblur="isPhoneOffFocus('refContactPersonPhone');" placeholder="999-999-9999">

<label for="refContactPersonEmail"> Contact Email: </label>
<input type="text" name= "refContactPersonEmail" maxlength="30" size="30" id="refContactPersonEmail" class="form-control" onblur="isEmailOffFocus('refContactPersonEmail');">

<br>
<br>
<hr>
<!-- Other Household and participant information -->
<h4 style="text-align:center;"> Household and Participant Information </h4>
<br>
<br>
<label for="HouseHoldInfoTable" style="width:32%"> Referred Individual's Family/Household Information: </label>

<table width="100%" id="houseHoldTable">
	<tr>
		<th> First Name </th>
		<th> Last Name </th>
		<th> Middle Intial</th>
		<th> DOB </th>
		<th> Sex </th>
		<th> Race </th>
		<th> Relation </th>
		<th> Comment </th>
	</tr>
	<tr>
		<td> <input type="text" name= "hFName" maxlength="20" size="20" oninput="validateAlpha('hFName');" id="hFName" class="form-control" style="margin:3px;"> </td>
		<td> <input type="text" name= "hSName" maxlength="20" size="20" oninput="validateAlpha('hSName');" id="hSName" class="form-control" style="margin:3px;"> </td>
		<td> <input type="text" name= "hMName" maxlength="1" size="1" oninput="validateAlpha('hMName');" id="fName" class="form-control" style="margin:3px;"> </td>
		<td> <input type="text" name= "hDOB" maxlength="10" size="10" id="hDOB" class="form-control" onkeypress="isDate('hDOB',event);" onblur="isDateOffFocus('hDOB');" style="margin:3px;" placeholder="mm/dd/yyyy"> </td>
		<td> 
			<select style="margin:3px;" name="hGender" id="hGender" class="form-control"> 
				<option value="none">-- select one --</option>
				<option value="male"> Male </option>
				<option value="female">Female </option>
			</select> 
		</td>
		<td> 
			<select style="margin:3px;" name="hRace" id="hRace" class="form-control">
				<option value="none">-- select one --</option>
				<option>Asian</option>
				<option>Caucasian</option>
				<option>Hispanaic</option>
				<option>Indian</option>
				<option>Middle Eastern</option>
				<option>African American</option>
				<option>Native American</option>
				<option>Alaskan Native</option>
				<option>Other Race</option>
			</select>
		</td>
		<td> 
			<select style="margin:3px;" name="hRelation" id="hRelation" class="form-control">
				<option value="none">-- select one --</option>
				<option>Brother</option>
				<option>Sister</option>
				<option>Daughter</option>
				<option>Son</option>
				<option>Spouse</option>
				<option>Grand Parent</option>
				<option>Niece</option>
				<option>Nephew</option>
				<option>Grand Child</option>
				<option> Other </option>
			</select>
		</td>
		<td><input type="text" size="20" maxlength="75" id="hComment" class="form-control"><span class="glyphicon glyphicon-plus" onclick="houseHoldTableEvent();"></span><span class="glyphicon glyphicon-minus" onclick="removeRow(this,'houseHoldTable');"></span></td>
	</tr>	
</table>

<br>
<br>

<label for="addInfoSpecNeeds" style="width:25%;"> Additional Information and/or specific needs: </label>
<textarea id="addInfoSpecNeeds" class="form-control" style="resize:none;width:100%;" maxlength="250"> </textarea>

<br>
<br>

<label for="HouseHoldInfoTable" style="width:32%"> Other Agencies Involved: </label>
<table width="100%" id="OthAgenciesWorkingWith">
	<tr>
		<th> Agency Name </th>
		<th> Working With </th>
		<th> Relationship </th>
	</tr>
	<tr>
		<td> <input type="text" name= "otherAgency" maxlength="20" size="20" oninput="validateAlpha('otherAgency');" id="otherAgency" class="form-control" style="margin:3px;"> </td>
		<td> <input type="text" name= "otherWorkingWith" maxlength="41" size="41" oninput="validateAlpha('otherWorkingWith');" id="otherWorkingWith" class="form-control" style="margin:3px;"> </td>
		<td> 
			<select style="margin:3px;" name="OthRelation" id="OthRelation" class="form-control">
				<option value="none">-- select one --</option>
				<option>Self </option>
				<option>Brother</option>
				<option>Sister</option>
				<option>Daughter</option>
				<option>Son</option>
				<option>Spouse</option>
				<option>Grand Parent</option>
				<option>Niece</option>
				<option>Nephew</option>
				<option>Grand Child</option>
				<option> Other </option>
			</select>
			<span class="glyphicon glyphicon-plus" onclick="OthAgenciesWorkingWithEvent();"></span><span class="glyphicon glyphicon-minus" onclick="removeRow(this,'OthAgenciesWorkingWith');"></span>
		</td>
	</tr>	
</table>

<br>
<br>
<hr>
<!--- For Office Use Only -->
<h4 style="text-align:center;"> For Office Use Only </h4>
<br>
<br>

<label for="dateOfContact" style= "width:16%"> Date of 1st Contact: </label> 
<input type="text" name= "dateOfContact" maxlength="10" size="30" id="dateOfContact" class="form-control" onkeypress="isDate('dateOfContact',event);" onblur="isDateOffFocus('dateOfContact');" placeholder="mm/dd/yyyy">

<label for="meansOfContact" style="width:16%"> Means of Contact: </label> 
<input type="text" name= "meansOfContact" maxlength="75" size="30" oninput="validateAlpha('meansOfContact');" id="meansOfContact" class="form-control"> 

<br>
<br>

<label for="dateOfInitMeeting" style= "width:16%"> Date of Initial Meeting: </label> 
<input type="text" name= "dateOfInitMeeting" maxlength="10" size="30" id="dateOfInitMeeting" class="form-control" onkeypress="isDate('dateOfInitMeeting',event);" onblur="isDateOffFocus('dateOfInitMeeting');" placeholder="mm/dd/yyyy">

<label for="timeOfInitMeeting"> Time: </label> 
<input type="text" name= "timeOfInitMeeting" size="10" maxlength="5" onkeypress="isTime('timeOfInitMeeting',event);" id="timeOfInitMeeting" class="form-control" placeholder="hh:mm" onblur="isTimeOffFocus('timeOfInitMeeting');"> 

<select name="timeOFInitMeeting2" id="timeOFInitMeeting2" class="form-control" style="margin-left:-40px; margin-right:40px;">
	<option value="none">-- select one --</option>
	<option value="AM"> AM </option>
	<option value="PM"> PM </option>
</select>

<label for="locationOfInitMeeting"> Location: </label> 
<input type="text" name= "locationOfInitMeeting" maxlength="30" size="30" oninput="validateAlpha('locationOfInitMeeting');" id="locationOfInitMeeting" class="form-control"> 

<br>
<br>

<label for="staffPerson"> Staff Person: </label> 
<input type="text" name= "staffPerson" maxlength="60" size="50" oninput="validateAlpha('staffPerson');" id="staffPerson" class="form-control"> 

<br>
<br>

<label for="Comments" style="width:16%;"> Comments: </label>
<textarea id="Comments" class="form-control" style="resize:none;width:100%;" maxlength="250"> </textarea>

<br>
<br>
<button class="btn btn-success btn-lg" style="text-align:center;"> Submit </button>
</form>


</div>

<hr/>
<footer id="footer">
<?php
databaser();
?>
<br>
<br>
<p> important info here </p>


</footer> 

<!-- Links to JS Files, CSS page, and additional Libraries.... --> 

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Style Sheet -->
<link rel="stylesheet" href="FormAppStyleSheet.css">

<!-- JS Functions  -->
<script src="FormAppFunctions.js"></script>



</body>

</html>