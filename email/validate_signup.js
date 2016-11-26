
function validate_name()
{
	
	var dom = document.getElementById("pname");
	var name = dom.value;
	
	if( !name.match(/^[a-zA-Z ]+$/)) 
	{
		alert( "Invalid Name" );
		dom.value = "";
//		dom.focus();
		return false;
	}
	return true;
}

function validate_email()
{
	
	var dom = document.getElementById("emailid");
	var name = dom.value;

	if( !name.match(/^[a-zA-Z0-9_]+$/)) 
	{
		alert( "Invalid Username" );
		dom.value = "";
//		dom.focus();
		return false;
	}
	return true;
}

function validate_password()
{
	
	var dom1 = document.getElementById("pass1");
	var dom2 = document.getElementById("pass2");
	var pass1 = dom1.value;
	var pass2 = dom2.value;
	
	if (pass1 == "")
		return false;
	if (pass1 != pass2)
		return false;
//	alert("alright");
	return true;
}

