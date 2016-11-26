<!--NOTE: This file is no longer used for signin and it is incorporated in the Main Homepage of Edusculpt  -->
<!DOCTYPE html>
<html>
<head>
<title>Registrant Login Page</title>
<!-- To set icon in the browser tab -->
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../images/favicon.ico"
	type="image/x-icon" />
<!-- To set icon in the browser tab -->
<style type="text/css">
.one1 {
	background-color: white;
	width: 600px;
	height: 200px;
	margin: 0 auto;
	margin-top: 10%;
	border: 9px solid navy;
	border-color: gold;
}

.one2 {
	font-size: x-large;
	font-style: bold;
	border: 1px solid grey;
	background-color: #006633;
}

input#round {
	width: 80px;
	height: 40px;
	background-color: #006633;
	border: 1px #006633;
	color: #fff;
	font-size: 20px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, .75);
	-moz-box-shadow: 0 0 10px rgba(0, 0, 0, .75);
	box-shadow: 2px 2px 8px rgba(0, 0, 0, .75);
}

.padd {
	padding: 6px;
}

.txt {
	border: 3px solid gold;
	font-size: large;
	font-family: serif;
}

input#round:hover {
	background: #003319;
	border: 1px #006633;
	-webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	-moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
}

.lbl {
	font-size: large;
	font-family: sans-serif;
	font-weight: 500;
}
</style>
<script type="text/javascript">
function inst_signin_validation(){
//To check if both the username and password is filled
	
	var usrname=document.forms["inssigninform"]["reguname"].value;
	var usrpass=document.forms["inssigninform"]["regpass"].value;
	if(usrname==null || usrname==""){
		alert("Name must be filled!");
		return false;
	}
	else if(usrpass==null || usrpass==""){
		alert("Password must be filled!");
		return false;
	}
	else{
		return true;
	}
}


function Redirect() {
	//Redirect the page to homepage upon logout
    window.location="../homepage.php";
 }
</script>
</head>
<body>
	<div class="one1">
		<div class="one2">
			<font color="white">Welcome to Edusculpt!!!</font>
		</div>
		<form name="inssigninform" action=""
			onsubmit="return inst_signin_validation()" method="post"><!-- Signin Form -->
			<table align="center">
				<tr>
					<td class="padd"><label class="lbl">Username</label></td>
					<td class="padd"><input type="text" name="reguname" class="txt"
						size="30"></td>
				</tr>
				<tr>
					<td class="padd"><label class="lbl">Password</label></td>
					<td class="padd"><input type="password" name="regpass" class="txt"
						size="30"></td>
				</tr>
				<tr>
					<td align="right" class="padd" colspan=2 class=""><input
						name="signin" type="submit" id="round" value="Sign in">&nbsp;&nbsp;&nbsp;&nbsp;
						<input type="button" name="cancel" onclick="Redirect();"
						id="round" value="Cancel"></td>
				</tr>
				<tr>
					<td align="right" colspan="2"><a href="">Forgot Password?</a></td>
				</tr>
			</table>
		</form>
	</div>
<?php
include '../config.php';
session_start ();

$status = false;
if (isset ( $_POST ['signin'] )) {
	// When signin button is clicked connect to database and validate username and password
	$con = mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	$usrname = $_POST ['reguname'];
	$pass = $_POST ['regpass'];
	$result = mysql_query ( "SELECT * FROM i_registrant AS r,Institution AS i WHERE i.i_name=r.i_name AND username='$usrname' AND password='$pass' AND accept_reject='1';" );
	
	while ( $row = mysql_fetch_array ( $result ) ) {
		// When the record matches with username and password change $status variable to true
		$status = true;
	}
	if ($status) {
		// If $status is true then entered username and password is correct and the page is directed to the page od that user
		$_SESSION ['iusername'] = $usrname;
		echo $_SESSION ['iusername'];
		header ( 'Location: institution.php?fvalue=fs' );
	} else {
		// If $status is false,then username or password is invalid
		echo "<script>alert('username or password is invalid!');</script>";
	}
}
?>
</body>