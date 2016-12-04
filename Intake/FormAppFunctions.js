 /************************************************************************** General Form App Functions ****************************************************************************************/
function validateAlpha(id){ //validates that what is added is ONLY alphabetical 
    var textInput = document.getElementById(id).value;
    textInput = textInput.replace(/[^A-Za-z]/g, "");
    document.getElementById(id).value = textInput;
}
function isNumberKey(id){ // validates that what is added is ONLY a number
    var textInput = document.getElementById(id).value;
    textInput = textInput.replace(/[^0-9]/g, "");
	textInput = textInput.replace(" ", "");
    document.getElementById(id).value = textInput;
}

function isDate(id, event){ // validates that what is added is ONLY date (adds slashes for user)
	var textInput = document.getElementById(id).value;
	var key = event.which || event.keyCode;
	textInput = textInput.replace(/[^0-9/]/g, "")
	textInput = textInput.replace(" ", "");
	if(key != 8){
		if(textInput.length == 2 || textInput.length == 5){
			textInput = textInput + '/';
		}
	}
	document.getElementById(id).value = textInput;
}

function validateAlphaWithSpace(id){ //validates that what is added is ONLY alphabetical with whitespace
debugger;
    var textInput = document.getElementById(id).value;
    textInput = textInput.replace(/[^A-Za-z" "]/g, "");
    document.getElementById(id).value = textInput;
}

function capitalizeFirstLetter(id){ //Capitalizes the first letter of input fields for names
	var tempChar = "";
	var textInput = "";
	textInput = document.getElementById(id).value;
	tempChar = textInput.slice(0,1)
	tempChar.toUppercase();
	textInput = tempChar + textInput;
	return textInput;
}

function isDateOffFocus(id){ // makes sure bad data is not passed from a date field 
	var textInput = document.getElementById(id).value;
	var numOfSlashes = (textInput.split("/").length) - 1;
	var daysInMonth;
	var currentYear = new Date().getFullYear();
	if(textInput.length == 10){
		var month = parseInt(textInput.slice(0,2),10);
		var day = parseInt(textInput.slice(3,5), 10);
		var year = parseInt(textInput.slice(6,10), 10);
		
		switch(month) {
			case 1:
			daysInMonth = 31;
			break;
			case 2:
			daysInMonth = 29;
			break;
			case 3:
			daysInMonth = 31;
			break;
			case 4:
			daysInMonth = 30;
			break;
			case 5:
			daysInMonth = 31;
			break;
			case 6:
			daysInMonth = 30;
			break;
			case 7:
			daysInMonth = 31;
			break;
			case 8:
			daysInMonth = 31;
			break;
			case 9:
			daysInMonth = 30;
			break;
			case 10:
			daysInMonth = 31;
			break;
			case 11:
			daysInMonth = 30;
			break;
			case 12:
			daysInMonth = 31;
			break;
			default:
			daysInMonth = 0;
		} 
	}
		if(numOfSlashes != 2 || textInput.length != 10){ //check to make sure there are no extra slashes and length isnt too short
			alert("The format of the date is incorrect! \n Please use the following format: \n MM/DD/YYYY \n Example: April 23rd, 1985 would be 04/23/1985");
			document.getElementById(id).value = "";
		}
		else if( month <= 0 || month > 12 || day <= 0 ||  day > daysInMonth ||  year < 1900 || year > currentYear){ //check to see if there arent any odd numbers in the date field 
			alert("Invalid Date Entered");
			document.getElementById(id).value = "";

	}
}

function isPhoneNumber(id, event){ //validates that what is added is ONLY a phone number (adds dashes for user)
	var textInput = document.getElementById(id).value;
	var key = event.which || event.keyCode;
	textInput = textInput.replace(/[^0-9-]/g, "");
	textInput = textInput.replace(" ", "");
	if(key != 8){
		if(textInput.length == 3 || textInput.length == 7){
			textInput = textInput + '-';
		}
	}
	document.getElementById(id).value = textInput;
}

function isPhoneOffFocus(id){ // validates for correct phone number placement 
	var textInput = document.getElementById(id).value;
	var numOfDashes = textInput.split("-");
	if(textInput.length != 0 && textInput.length !=12){
		alert("The phone number you've entered is incorrect! \n Please enter a valid one with an area code.");
		document.getElementById(id).value = "";
	}
	else{
		if(numOfDashes.length != 3 && numOfDashes.length != 1){
			alert("The phone number you've entered is incorrect! \n Please enter a valid one with an area code.");
			document.getElementById(id).value = "";
		}
	}
	
}

function removeRow(x, tblID){ //removes a row
	var row = $(x).parent().parent().index();
	var table = document.getElementById(tblID);
	var currentRow =table.rows.length;
	
	if(currentRow == 2){ //if there is only one row then delete that row and add another based on the tbl 
		table.deleteRow(row);
		switch(tblID) {
			
			case "houseHoldTable":
			houseHoldTableEvent();
			break;
			
			case "OthAgenciesWorkingWith":
			OthAgenciesWorkingWithEvent();
			break;
			
			case "intakeTable":
			intakeTableEvent();
			break;
			
			case "languages":
			languagesEvent();
			break;
			
			default:
			console.log("something screwed up");
		}
	}
	else{ // just delete that row
		table.deleteRow(row);
	}
}

function isTime(id,event){ //helps format the time 
	var textInput = document.getElementById(id).value;
	var key = event.which || event.keyCode;
	textInput = textInput.replace(/[^0-9:]/g, "");
	textInput = textInput.replace(" ", "");
	if(key != 8){
		if(textInput.length == 2 ){
			textInput = textInput + ":";
		}
	}
	document.getElementById(id).value = textInput;
}

function isTimeOffFocus(id){
	var textInput = document.getElementById(id).value;
	var hours = parseInt(textInput.slice(0,2),10);
	var mins = parseInt(textInput.slice(3,5),10);
	var numOfColons = textInput.split(":");
	if((textInput.length == 5 || textInput.length == 0) && hours <= 12 && mins < 60 && numOfColons.length == 2 ){
		
	}
	else{
		alert("Invalid Time");
		document.getElementById(id).value = "";
	}
}

function isEmailOffFocus(id){ //checks for valid email
	var textInput = document.getElementById(id).value;
	if(textInput.length > 0){
		if(textInput.indexOf('@') >= 0 && textInput.indexOf('.') >= 0){
	
		}
		else{
			alert("Invalid Email");
			document.getElementById(id).value = "";
		}
	}
}
 /************************************************************************** Referral App Specific Functions ****************************************************************************************/

function enableRefAgencyOtherBox(){
	if (document.getElementById("RefAgencyName").value === "Other") {
        document.getElementById("RefAgencyNameOther").disabled='';
    } else {
        document.getElementById("RefAgencyNameOther").disabled='true';
    }
 }
 function houseHoldTableEvent(){
	 var table = document.getElementById("houseHoldTable");
	 var currentRow = table.rows.length;
	 var row = table.insertRow(currentRow);	 
	 var cell1 = row.insertCell(0);
	 var cell2 = row.insertCell(1);
	 var cell3 = row.insertCell(2);
	 var cell4 = row.insertCell(3);
	 var cell5 = row.insertCell(4);
	 var cell6 = row.insertCell(5);
	 var cell7 = row.insertCell(6);
	 var cell8 = row.insertCell(7);
	 
	 
	 cell1.innerHTML = '<input type="text" name= "hFName" maxlength="20" size="20" oninput="validateAlpha(\'hFName\');" id="hFName" class="form-control" style="margin:3px;">';
	 cell2.innerHTML = '<input type="text" name= "hSName" maxlength="20" size="20" oninput="validateAlpha(\'hSName\');" id="hSName" class="form-control" style="margin:3px;">';
	 cell3.innerHTML = '<input type="text" name= "hMName" maxlength="1" size="1" oninput="validateAlpha(\'hMName\');" id="fName" class="form-control" style="margin:3px;">';
	 cell4.innerHTML = '<input type="text" name= "hDOB" maxlength="10" size="10" id="hDOB'+ currentRow +'" class="form-control" onkeypress="isDate(\'hDOB'+ currentRow +'\',event);" onblur="isDateOffFocus(\'hDOB'+ currentRow +'\');" style="margin:3px;" placeholder="mm/dd/yyyy">';
	 cell5.innerHTML = '<select  style="margin:3px;" name="hGender" id="hGender" class="form-control">\
	 						<option value="">-- select one --</option>\
							<option value="male"> Male </option>\
							<option value="female">Female </option>\
						</select> ';
	 cell6.innerHTML = '<select style="margin:3px;" name="hRace" id="hRace" class="form-control">\
							<option value="none">-- select one --</option>\
							<option>Asian</option>\
							<option>Caucasian</option>\
							<option>Hispanaic</option>\
							<option>Indian</option>\
							<option>Middle Eastern</option>\
							<option>African American</option>\
							<option>Native American</option>\
							<option>Alaskan Native</option>\
							<option>Other Race</option>\
						</select>';
	cell7.innerHTML = '<select style="margin:3px;" name="hRelation" id="hRelation" class="form-control">\
							<option value="none">-- select one --</option>\
							<option>Brother</option>\
							<option>Sister</option>\
							<option>Daughter</option>\
							<option>Son</option>\
							<option>Spouse</option>\
							<option>Grand Parent</option>\
							<option>Niece</option>\
							<option>Nephew</option>\
							<option>Grand Child</option>\
							<option> Other </option>\
						</select>';
	cell8.innerHTML = '<input type="text" size="20" maxlength="75" id="hComment" class="form-control"><span class="glyphicon glyphicon-plus" onclick="houseHoldTableEvent();"></span><span class="glyphicon glyphicon-minus" onclick="removeRow(this,\'houseHoldTable\')"></span>';
 }
 
function OthAgenciesWorkingWithEvent(){
	var table = document.getElementById("OthAgenciesWorkingWith");
	var currentRow = table.rows.length;
	var row = table.insertRow(currentRow);	 
	var cell1 = row.insertCell(0);
	var cell2 = row.insertCell(1);
	var cell3 = row.insertCell(2);
	
	cell1.innerHTML = '<input type="text" name= "otherAgency" maxlength="20" size="20" oninput="validateAlpha(\'otherAgency\');" id="otherAgency" class="form-control" style="margin:3px;"> ';
	cell2.innerHTML = '<input type="text" name= "otherWorkingWith" maxlength="41" size="41" oninput="validateAlpha(\'otherWorkingWith\');" id="otherWorkingWith" class="form-control" style="margin:3px;"> ';
	cell3.innerHTML = '<select style="margin:3px;" name="OthRelation" id="OthRelation" class="form-control"> \
						<option value="none">-- select one --</option>\
						<option>Self </option> \
						<option>Brother</option>\
						<option>Sister</option>\
						<option>Daughter</option>\
						<option>Son</option>\
						<option>Spouse</option>\
						<option>Grand Parent</option>\
						<option>Niece</option>\
						<option>Nephew</option>\
						<option>Grand Child</option>\
						<option> Other </option>\
					   </select>\
					   <span class="glyphicon glyphicon-plus" onclick="OthAgenciesWorkingWithEvent();"></span><span class="glyphicon glyphicon-minus" onclick="removeRow(this,\'OthAgenciesWorkingWith\');"></span>';
	
	
	
 }
 
 
 /************************************************************************** Intake App Specific Functions ****************************************************************************************/
 
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

 function ifYes(id,id2){
	if (id.value == "Yes") {
        id2.disabled='';
    } else {
        id2.disabled='true';
    }
 }
 
  function ifNo(id,id2){
	if (id.value == "No") {
        id2.disabled='';
    } else {
        id2.disabled='true';
    }
 }
 
   function ifNone(id,id2){
	if (id.value > 0) {
        id2.disabled='';
    } else {
        id2.disabled='true';
    }
 }
 

 function intakeTableEvent(){
	 var table = document.getElementById("intakeTable");
	 var currentRow = table.rows.length;
	 var row = table.insertRow(currentRow);	 
	 var cell1 = row.insertCell(0);
	 var cell2 = row.insertCell(1);
	 var cell3 = row.insertCell(2);
	 var cell4 = row.insertCell(3);
	 var cell5 = row.insertCell(4);
	 var cell6 = row.insertCell(5);
	 var cell7 = row.insertCell(6);
	 var cell8 = row.insertCell(7);
	 
	 
	 cell1.innerHTML = '<input type="text" name= "iFName" maxlength="20" size="20" oninput="validateAlpha(\'iFName\');" id="iFName" class="form-control" style="margin:3px;">';
	 cell2.innerHTML = '<input type="text" name= "iSName" maxlength="20" size="20" oninput="validateAlpha(\'iSName\');" id="iSName" class="form-control" style="margin:3px;">';
	 cell3.innerHTML = '<input type="text" name= "iMName" maxlength="1" size="1" oninput="validateAlpha(\'iMName\');" id="iMName" class="form-control" style="margin:3px;">';
	 cell5.innerHTML = '<input type="text" name= "iDOB" maxlength="10" size="10" id="iDOB'+ currentRow +'" class="form-control" onkeypress="isDate(\'iDOB'+ currentRow +'\',event);" onblur="isDateOffFocus(\'iDOB'+ currentRow +'\');" style="margin:3px;" placeholder="mm/dd/yyyy">';
	 cell4.innerHTML = '<select  style="margin:3px;" name="iGender" id="iGender" class="form-control">\
	 						<option value="">-- select one --</option>\
							<option value="male"> Male </option>\
							<option value="female">Female </option>\
						</select> ';
	 cell6.innerHTML = '<select style="margin:3px;" name="iRace" id="iRace" class="form-control">\
							<option value="none">-- select one --</option>\
							<option>Asian</option>\
							<option>Caucasian</option>\
							<option>Hispanaic</option>\
							<option>Indian</option>\
							<option>Middle Eastern</option>\
							<option>African American</option>\
							<option>Native American</option>\
							<option>Alaskan Native</option>\
							<option>Other Race</option>\
						</select>';
	cell7.innerHTML = '<input type="text" size="20" maxlength="75" id="iWhere" class="form-control">';
	cell8.innerHTML = '<input type="text" size="20" maxlength="75" id="iComment" class="form-control"><span class="glyphicon glyphicon-plus" onclick="intakeTableEvent();"></span><span class="glyphicon glyphicon-minus" onclick="removeRow(this,\'intakeTable\')"></span>';
 }

  function languagesEvent(){
	 var table = document.getElementById("languages");
	 var currentRow = table.rows.length;
	 var row = table.insertRow(currentRow);	 
	 var cell1 = row.insertCell(0);

	 cell1.innerHTML = '<select style="margin:3px;" name="lLanguage" id="lLanguage" class="form-control">\
			 	<option value="">-- select one --</option>\
				<option value="Afrikanns">Afrikanns</option>\
				<option value="Albanian">Albanian</option>\
				<option value="Arabic">Arabic</option>\
				<option value="Armenian">Armenian</option>\
				<option value="Basque">Basque</option>\
				<option value="Bengali">Bengali</option>\
				<option value="Bulgarian">Bulgarian</option>\
				<option value="Catalan">Catalan</option>\
				<option value="Cambodian">Cambodian</option>\
				<option value="Chinese (Mandarin)">Chinese (Mandarin)</option>\
				<option value="Croation">Croation</option>\
				<option value="Czech">Czech</option>\
				<option value="Danish">Danish</option>\
				<option value="Dutch">Dutch</option>\
				<option value="English">English</option>\
				<option value="Estonian">Estonian</option>\
				<option value="Fiji">Fiji</option>\
				<option value="Finnish">Finnish</option>\
				<option value="French">French</option>\
				<option value="Georgian">Georgian</option>\
				<option value="German">German</option>\
				<option value="Greek">Greek</option>\
				<option value="Gujarati">Gujarati</option>\
				<option value="Hebrew">Hebrew</option>\
				<option value="Hindi">Hindi</option>\
				<option value="Hungarian">Hungarian</option>\
				<option value="Icelandic">Icelandic</option>\
				<option value="Indonesian">Indonesian</option>\
				<option value="Irish">Irish</option>\
				<option value="Italian">Italian</option>\
				<option value="Japanese">Japanese</option>\
				<option value="Javanese">Javanese</option>\
				<option value="Korean">Korean</option>\
				<option value="Latin">Latin</option>\
				<option value="Latvian">Latvian</option>\
				<option value="Lithuanian">Lithuanian</option>\
				<option value="Macedonian">Macedonian</option>\
				<option value="Malay">Malay</option>\
				<option value="Malayalam">Malayalam</option>\
				<option value="Maltese">Maltese</option>\
				<option value="Maori">Maori</option>\
				<option value="Marathi">Marathi</option>\
				<option value="Mongolian">Mongolian</option>\
				<option value="Nepali">Nepali</option>\
				<option value="Norwegian">Norwegian</option>\
				<option value="Persian">Persian</option>\
				<option value="Polish">Polish</option>\
				<option value="Portuguese">Portuguese</option>\
				<option value="Punjabi">Punjabi</option>\
				<option value="Quechua">Quechua</option>\
				<option value="Romanian">Romanian</option>\
				<option value="Russian">Russian</option>\
				<option value="Samoan">Samoan</option>\
				<option value="Serbian">Serbian</option>\
				<option value="Slovak">Slovak</option>\
				<option value="Slovenian">Slovenian</option>\
				<option value="Spanish">Spanish</option>\
				<option value="Swahili">Swahili</option>\
				<option value="Swedish ">Swedish </option>\
				<option value="Tamil">Tamil</option>\
				<option value="Tatar">Tatar</option>\
				<option value="Telugu">Telugu</option>\
				<option value="Thai">Thai</option>\
				<option value="Tibetan">Tibetan</option>\
				<option value="Tonga">Tonga</option>\
				<option value="Turkish">Turkish</option>\
				<option value="Ukranian">Ukranian</option>\
				<option value="Urdu">Urdu</option>\
				<option value="Uzbek">Uzbek</option>\
				<option value="Vietnamese">Vietnamese</option>\
				<option value="Welsh">Welsh</option>\
				<option value="Xhosa">Xhosa</option>\
			</select>\
			<span class="glyphicon glyphicon-plus" onclick="languagesEvent();"></span><span class="glyphicon glyphicon-minus" onclick="removeRow(this,\'languages\')"></span>';
 }