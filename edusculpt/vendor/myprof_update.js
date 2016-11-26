function own_reg_validate() {
	var c_branch = document.forms["comp_update_form"]["company_branches"].value;

	var o_name = document.forms["comp_update_form"]["own_name"].value;
	var o_mob = document.forms["comp_update_form"]["own_mob"].value;
	var o_email = document.forms["comp_update_form"]["own_email"].value;

	var cur_regions = document.forms["comp_update_form"]["cur_regions"].value;

	var r_name = document.forms["comp_update_form"]["r_name"].value;
	var r_mob = document.forms["comp_update_form"]["r_mobile"].value;
	var r_email = document.forms["comp_update_form"]["r_email"].value;
	var r_id = document.forms["comp_update_form"]["r_id"].value;

	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var re = /[0-9]/;

	if (c_branch == null || c_branch == "") {
		alert("Company Branches must be filled!");
		return false;
	} else if (o_name == null || o_name == "") {
		alert("Owner Name must be filled!");
		return false;
	} else if (o_mob == null || o_mob == "" || (isNaN(o_mob))) {
		alert("Enter valid Owner Mobile Number!");
		return false;
	} else if (o_email == null || o_email == "" || !filter.test(o_email)) {
		alert("Enter valid Owner Email!");
		return false;
	} else if (cur_regions == null || cur_regions == "") {
		alert("Current Servicing Regions must be entered!");
		return false;
	} else if (r_name == null || r_name == "") {
		alert("Registrant name must be entered!");
		return false;
	} else if (r_mob == null || r_mob == "" || (isNaN(r_mob))) {
		alert("Enter valid Registrant number!");
		return false;
	} else if (r_email == null || r_email == "" || !filter.test(r_email)) {
		alert("Enter valid Registrant email id!");
		return false;
	} else if (r_id == null || r_id == "") {
		alert("Registrant ID must be filled!");
		return false;
	} else {
		return true;
	}
}

function prod_info_validate() {

	var p_name = document.forms["prod_update_form"]["prod_name"].value;
	var p_cat = document.forms["prod_update_form"]["prod_cat"].value;
	var p_desc = document.forms["prod_update_form"]["prod_desc"].value;
	var p_features = document.forms["prod_update_form"]["prod_features"].value;
	var p_cust = document.forms["prod_update_form"]["prod_cust"].value;
	var p_link = document.forms["prod_update_form"]["prod_link"].value;
	var p_cycle = document.forms["prod_update_form"]["prod_cycle"].value;
	var p_feat = document.forms["prod_update_form"]["prod_feat"].value;

	if (p_name == null || p_name == "") {
		alert("product name must be filled!");
		return false;
	} else if (p_cat == null || p_cat == "") {
		alert("Product category must be filled!");
		return false;
	} else if (p_desc == null || p_desc == "") {
		alert("Product description must be filled!");
		return false;
	} else if (p_features == null || p_features == "") {
		alert("Product features must be filled!");
		return false;
	} else if (p_cust == null || p_cust == "") {
		alert("Product customers must be filled!")
		return false;
	} else if (p_link == null || p_link == "") {
		alert("Product demo link must be filled!");
		return false;
	} else if (p_cycle == null || p_cycle == "") {
		alert("Product payment cycle must be filled!");
		return false;
	} else if (p_feat == null || p_feat == "") {
		alert("Product unique features must be filled!");
		return false;
	} else {
		return true;
	}
}

function testimonials_validate() {

	var datetocall = document.forms["test_update_form"]["date"].value;
	var timetocall = document.forms["test_update_form"]["time"].value;
	var i_name = document.forms["test_update_form"]["inst_name"].value;

	if (datetocall == null || datetocall == "") {
		alert("Date must be entered!");
		return false;
	} else if (timetocall == null || timetocall == "") {
		alert("Time must be entered!");
		return false;
	} else if (i_name == null || i_name == "") {
		alert("Institution name must be filled!");
		return false;
	} else {
		return true;
	}

}
