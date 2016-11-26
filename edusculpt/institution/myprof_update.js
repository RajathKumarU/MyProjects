function inst_validate() {
	//Validates instituion details edited in myprofile
	
	var web_link = document.getElementById("website_link").value;
	var strength = document.getElementById("inst_strength").value;
	var p_name = document.getElementById("principal_name").value;
	var p_mob = document.getElementById("principal_mobile").value;
	var p_email = document.getElementById("principal_email").value;

	// Filter variable is used exclusively for email validation
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	// re variable is used for validating numbers
	var re = /[0-9]/;

	if (web_link == null || web_link == "") {
		alert("weblink must be filled!");
		return false;
	} else if (strength == null || strength == "" || (isNaN(strength))) {
		alert("Enter valid institution strength!");
		return false;
	} else if (p_name == null || p_name == "") {
		alert("principal name must be entered!");
		return false;
	} else if (p_mob == null || p_mob == "" || (isNaN(p_mob))) {
		alert("Enter valid principal number!");
		return false;
	} else if (p_email == null || p_email == "" || !filter.test(p_email)) {
		alert("Enter valid principal email id!");
		return false;
	} else {
		return true;
	}
}

function reg_validate() {
	//Validates Registrant edited details in myprofile
	
	var rname = document.getElementById("reg_name").value;
	var rmob = document.getElementById("reg_mobile").value;
	var remail = document.getElementById("reg_email").value;
	var rdesignation = document.getElementById("reg_designation").value;
	var idnum = document.getElementById("reg_id_no").value;
	var ownname = document.getElementById("own_name").value;
	var ownmob = document.getElementById("own_mobile").value;
	var ownemail = document.getElementById("own_email").value;

	// Filter variable is used exclusively for email validation
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	// re variable is used for validating numbers
	var re = /[0-9]/;

	if (rname == null || rname == "") {
		alert("registrant name must be filled!");
		return false;
	} else if (rmob == null || rmob == "" || (isNaN(rmob))) {
		alert("registrant mobile must be filled!");
		return false;
	} else if (remail == null || remail == "" || !filter.test(remail)) {
		alert("enter valid email for registrant!");
		return false;
	} else if (rdesignation == null || rdesignation == "") {
		alert("designation must be filled!");
		return false;
	} else if (idnum == null || idnum == "") {
		alert("ID number must be filled!")
		return false;
	} else if (ownname == null || ownname == "") {
		alert("owner name must be filled!");
		return false;
	} else if (ownmob == null || ownmob == "" || (isNaN(ownmob))) {
		alert("enter valid mobile number!");
		return false;
	} else if (ownemail == null || ownemail == "" || !filter.test(ownemail)) {
		alert("enter valid email for owner!");
		return false;
	} else {
		return true;
	}
}