function vend_validation() {
	// this function checks if all the required details of company signup form
	// is filled
	
	var compname = document.forms["vendform"]["comp_name"].value;
	var comptype = document.forms["vendform"]["comp_type"].value;
	
	var cat1=document.forms["vendform"]["category"].value;
	var cat2=document.forms["vendform"]["selected_cat"].value;
	
	var cat3=document.forms["vendform"]["cat_other"].value;
	var locregn = document.forms["vendform"]["Location/Region"].value;
	var addr = document.forms["vendform"]["Address"].value;
	var pin = document.forms["vendform"]["pincode"].value;
	var phno = document.forms["vendform"]["Phone_Number"].value;
	var weblink = document.forms["vendform"]["Website_Link"].value;
	var cstrength = document.forms["vendform"]["company_strength"].value;
	var cbranch = document.forms["vendform"]["company_branches"].value;
	var cservice = document.forms["vendform"]["company_servicing_regions"].value;
	var date = document.forms["vendform"]["date"].value;
	
	var d = new Date();
	var d1=new Date(date);
	
	// filter variable is used exclusively for email validation
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	// re variable is used for validating numbers
	var re = /[0-9]/;
	
	if (compname == null || compname == "") {
		alert("Company Name must be filled!");
		return false;
	} else if (comptype == null || comptype == "") {
		alert("company type must be filled!");
		return false;
	}else if((cat1==null || cat1=="") && (cat2==null||cat2=="")){
		alert('Enter valid Category!');
		return false;
	}
	else if(cat1=="choose" && (cat2==null || cat2=="") && (cat3==null || cat3=="")){
		alert('Select category!');
		return false;
	}
	else if (locregn == null || locregn == "") {
		
		alert("Location/Region must be filled must be filled!");
		return false;
	} 
	
	
	
	else if (addr == null || addr == "") {
		alert("Address must be filled!");
		return false;
	} else if (pin == null || pin == "" || (isNaN(pin))) {
		alert("Enter Valid Pincode!");
		return false;
	} else if (phno == null || phno == "" || (isNaN(phno))) {
		alert("Enter valid phone number!");
		return false;
	} else if (weblink == null || weblink == "") {
		alert("Website link must be filled!");
		return false;
	} else if (cstrength == null || cstrength == "" || (isNaN(cstrength))) {
		alert("Enter valid company strength!");
		return false;
	} else if (cbranch == null || cbranch == "" ) {
		alert("Enter valid company branches!");
		return false;
	} else if (cservice == null || cservice == "" ) {
		alert("Enter valid company servicing regions!");
		return false;
	} else if (date == null || date == "" ) {
		alert("Enter valid date!");
		return false;
	} else if (d<d1 ) {
		alert("Date of Incorporation Must be on or Before Today!");
		return false;
	}

	else {

		return true;
	}
}
function vend_validation_cntd(cap_val) {
	// this function checks if all the required details of vendor signup form is
	// filled
	var regname = document.forms["vendformcntd"]["reg_name"].value;
	var regmob = document.forms["vendformcntd"]["reg_mobile"].value;

	var regemail = document.forms["vendformcntd"]["reg_email"].value;
	var regdesignation = document.forms["vendformcntd"]["reg_designation"].value;
	var regidnum = document.forms["vendformcntd"]["reg_id_no"].value;
	var ownname = document.forms["vendformcntd"]["own_name"].value;
	var ownmob = document.forms["vendformcntd"]["own_mob"].value;
	var ownemail = document.forms["vendformcntd"]["own_email"].value;
	var reguname = document.forms["vendformcntd"]["reg_username"].value;
	var regpass = document.forms["vendformcntd"]["reg_pass"].value;
	var regcpass = document.forms["vendformcntd"]["reg_conf_pass"].value;
	var cap_code = document.forms["vendformcntd"]["captcha_code"].value;

	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var re = /[0-9]/;
	if (regname == null || regname == "") {
		alert("Registrant name must be filled!");
		return false;
	} else if (regmob == null || regmob == "" || (isNaN(regmob))) {
		alert("Enter valid registrant mobile number!");
		return false;
	} else if (regemail == null || regemail == "" || !filter.test(regemail)) {
		alert("Enter valid registrant email-ID!");
		return false;
	} else if (regdesignation == null || regdesignation == "") {
		alert("Designation must be filled!");
		return false;
	} else if (regidnum == null || regidnum == "") {
		alert("ID number must be filled!")
		return false;
	} else if (ownname == null || ownname == "") {
		alert("Owner name must be filled!");
		return false;
	} else if (ownmob == null || ownmob == "" || (isNaN(ownmob))) {
		alert("Enter valid owner mobile number!");
		return false;
	} else if (ownemail == null || ownemail == "" || !filter.test(regemail)) {
		alert("Enter valid owner email-ID!");
		return false;
	} else if (reguname == null || reguname == "") {
		alert("username must be filled!");
		return false;
	} else if (regpass == null || regpass == "") {
		alert("password must be filled!");
		return false;
	} else if (regpass.length < 6) {
		alert("password must contain atleast 6 characters");
		return false;
	} else if (!re.test(regpass)) {
		alert("password must contain atleast one number");
		return false;
	} else if (regcpass == null || regcpass == "") {
		alert("confirm password must be filled");
		return false;
	} else if (regcpass != regpass) {
		alert("passwords don't match!");
		return false;
	} else if (cap_code == null || cap_code == "" || (isNaN(cap_code))) {
		alert("Enter valid Captcha code!");
		return false;
	}  else if (cap_code != cap_val) {
		alert("Captcha code Incorrect!");
		return false;
	} else {
		return true;
	}

}