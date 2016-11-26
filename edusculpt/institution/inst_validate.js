function inst_validation() {
	// This function checks if all the required details of institution signup form is filled
	
	if(window.glob==1){
		//Return if user already exists
		return false;
	}

	var insname = document.forms["instform"]["inst_name"].value;
	var regn = document.forms["instform"]["region"].value;
	var addr = document.forms["instform"]["address"].value;
	var pin = document.forms["instform"]["pincode"].value;
	var weblink = document.forms["instform"]["website_link"].value;
	var univ = document.forms["instform"]["affiliated_university"].value;
	var strength = document.forms["instform"]["inst_strength"].value;
	var prname = document.forms["instform"]["principal_name"].value;
	var prmobile = document.forms["instform"]["principal_mobile"].value;
	var premail = document.forms["instform"]["principal_email"].value;
	var msg = document.getElementById("icheck").innerHTML;
	
	// Filter variable is used exclusively for email validation
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	// re variable is used for validating numbers
	var re = /[0-9]/;
	
	if (insname == null || insname == "") {
		alert("Institution Name must be filled!");
		window.glob=1;
		return false;
	} else if (regn == null || regn == "") {
		alert("Region must be filled!");
		return false;
	} else if (addr == null || addr == "") {
		alert("Address must be filled!");
		return false;
	} else if (pin == null || pin == "" || (isNaN(pin))) {
		alert("Enter valid pincode!");
		return false;
	} else if (weblink == null || weblink == "") {
		alert("Website link must be filled!");
		return false;
	} else if (univ == null || univ == "") {
		alert("Affiliated university must be filled!");
		return false;
	} else if (strength == null || strength == "" || (isNaN(strength))) {
		alert("Enter valid institution strength!");
		return false;
	} else if (prname == null || prname == "") {
		alert("principal name must be entered!");
		return false;
	} else if (prmobile == null || prmobile == "" || (isNaN(prmobile))) {
		alert("Enter valid principal number!");
		return false;
	} else if (premail == null || premail == "" || !filter.test(premail)) {
		alert("Enter valid principal email id!");
		return false;
	} else if(msg.replace(/[^A-Za-z0-9]/g, '') == "InstitutionNameAlreadyExists"){
		alert("\""+insname+"\" already exists!!!");
		return false;
	} else {
		return true;
	}
}

function inst_validation_cntd(cap_val) {

	// This function checks if all the required details of registrant signup form is filled
	
	if(window.uglob==1){
		//Return if user already exists
		return false;
	}
	
	var rname = document.forms["instformcntd"]["reg_name"].value;
	var rmob = document.forms["instformcntd"]["reg_mobile"].value;
	var remail = document.forms["instformcntd"]["reg_email"].value;
	var rdesignation = document.forms["instformcntd"]["reg_designation"].value;
	var idnum = document.forms["instformcntd"]["reg_id_no"].value;
	var ownname = document.forms["instformcntd"]["own_name"].value;
	var ownmob = document.forms["instformcntd"]["own_mobile"].value;
	var ownemail = document.forms["instformcntd"]["own_email"].value;
	var uname = document.forms["instformcntd"]["reg_username"].value;
	var pass = document.forms["instformcntd"]["reg_pass"].value;
	var cpass = document.forms["instformcntd"]["reg_conf_pass"].value;
	var cap_code = document.forms["instformcntd"]["captcha_code"].value;
	var msg = document.getElementById("ucheck").innerHTML;
	
	// Filter variable is used exclusively for email validation
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	// re variable is used for validating numbers
	var re = /[0-9]/;

	if (rname == null || rname == "") {
		alert("Registrant name must be filled!");
		return false;
	} else if (rmob == null || rmob == "" || (isNaN(rmob))) {
		alert("Enter valid registrant mobile no!");
		return false;
	} else if (remail == null || remail == "" || !filter.test(remail)) {
		alert("Enter valid registrant email!");
		return false;
	} else if (rdesignation == null || rdesignation == "") {
		alert("Designation must be filled!");
		return false;
	} else if (idnum == null || idnum == "") {
		alert("ID number must be filled!")
		return false;
	} else if (ownname == null || ownname == "") {
		alert("Owner name must be filled!");
		return false;
	} else if (ownmob == null || ownmob == "" || (isNaN(ownmob))) {
		alert("Enter valid owner mobile number!");
		return false;
	} else if (ownemail == null || ownemail == "" || !filter.test(ownemail)) {
		alert("Enter valid owner email-ID!");
		return false;
	} else if (uname == null || uname == "") {
		alert("username must be filled!");
		return false;
	} else if (pass == null || pass == "") {
		alert("password must be filled!");
		return false;
	} else if (pass.length < 6) {
		alert("password must contain atleast 6 characters");
		return false;
	} else if (!re.test(pass)) {
		alert("password must contain atleast one number");
		return false;
	} else if (cpass == null || cpass == "") {
		alert("confirm password must be filled");
		return false;
	} else if (cpass != pass) {
		alert("passwords don't match!");
		return false;
	} else if (cap_code == null || cap_code == "" || (isNaN(cap_code))) {
		alert("Enter valid Captcha code!");
		return false;
	} else if (cap_code != cap_val) {
		alert("Captcha code Incorrect!");
		return false;
	} else if(msg.replace(/[^A-Za-z0-9]/g, '') == "UsernameAlreadyExists"){
		alert("\""+uname+"\" already exists!!!");
		return false;
	} else {
		return true;
	}

}
