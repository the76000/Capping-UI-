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
	 cell4.innerHTML = '<input type="date" name= "hDOB" maxlength="8" size="8" id="hDOB" class="form-control" oninput="isNumberKey(\'hDOB\');" style="margin:3px;">';
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
	cell8.innerHTML = '<input type="text" size="20" maxlength="75" id="hComment" onBlur="houseHoldTableEvent();">';
	cell1.focus();
 }
 