 /************************************************************************** General Form App Functions ****************************************************************************************/
function validateAlpha(id){
    var textInput = document.getElementById(id).value;
    textInput = textInput.replace(/[^A-Za-z]/g, "");
    document.getElementById(id).value = textInput;
}
function isNumberKey(id){
    var textInput = document.getElementById(id).value;
    textInput = textInput.replace(/[^0-9]/g, "");
    document.getElementById(id).value = textInput;
}

function isDateOfBirth(id, event){
	var textInput = document.getElementById(id).value;
	var key = event.which || event.keyCode;
	textInput = textInput.replace(/[^0-9/]/g, "")
	if(key != 8){
		if(textInput.length == 2 || textInput.length == 5){
			textInput = textInput + '/';
		}
	}
	document.getElementById(id).value = textInput;
	
}

function isPhoneNumber(id, event){
	var textInput = document.getElementById(id).value;
	var key = event.which || event.keyCode;
	textInput = textInput.replace(/[^0-9-]/g, "")
	if(key != 8){
		if(textInput.length == 3 || textInput.length == 7){
			textInput = textInput + '-';
		}
	}
	document.getElementById(id).value = textInput;
}

function removeRow(x, tblID){
	var row = $(x).parent().parent().index();
	
	var table = document.getElementById(tblID);
	table.deleteRow(row);
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
	 cell4.innerHTML = '<input type="text" name= "hDOB" maxlength="10" size="10" id="hDOB'+ currentRow +'" class="form-control" onkeypress="isDateOfBirth(\'hDOB'+ currentRow +'\',event);" style="margin:3px;">';
	 cell5.innerHTML = '<select style="margin:3px;">\
							<option value="male"> Male </option>\
							<option value="female">Female </option>\
						</select> ';
	 cell6.innerHTML = '<select style="margin:3px;">\
							<option>Arctic</option>\
							<option>Caucasian</option>\
							<option>Indian</option>\
							<option>Middle Eastern</option>\
							<option>African American</option>\
							<option>Native American</option>\
							<option>Asian</option>\
							<option>Other Race</option>\
						</select>';
	cell7.innerHTML = '<select style="margin:3px;">\
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
	cell8.innerHTML = '<input type="text" size="20" maxlength="75" id="hComment"><span class="glyphicon glyphicon-plus" onclick="houseHoldTableEvent();"></span><span class="glyphicon glyphicon-minus" onclick="removeRow(this,\'houseHoldTable\')"></span>';
	cell1.focus();
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
function enableDrugExplan(){
	if (document.getElementById("drugs").value === "drugsYes") {
        document.getElementById("drugsExplan").disabled='';
    } else {
        document.getElementById("drugsExplan").disabled='true';
    }
 }