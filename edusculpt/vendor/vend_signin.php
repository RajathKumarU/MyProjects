<!DOCTYPE html>
<html>
<head>
<title>Vendor Login Page</title>
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
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
function vend_signin_validation(){
	//check if the username and password is not empty
	var usrname=document.forms["vendsigninform"]["reguname"].value;
	var usrpass=document.forms["vendsigninform"]["regpass"].value;
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
	//redirect to homepage on clicking logout
    window.location="../layoutit/index.php";
 }
</script>
</head>
<body>
	<div class="one1">
		<div class="one2">
			<font color="white">Welcome to Edusculpt!!!</font>
		</div>
		<form name="vendsigninform" action=""
			onsubmit="return vend_signin_validation()" method="post">
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
	$con = mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	$usrname = $_POST ['reguname'];
	$pass = $_POST ['regpass'];
	$result = mysql_query ( "SELECT * FROM v_registrant AS r,company AS c WHERE c.c_name=r.c_name AND username='$usrname' AND password='$pass' AND accept_reject='1';" );
	
	while ( $row = mysql_fetch_array ( $result ) ) {
		$status = true;
	}
	if ($status) {
		
		$_SESSION ['vusername'] = $usrname;
		echo $_SESSION ['vusername'];
		header ( 'Location: vendor.php?fvalue=mp&lvalue=ci' );
	} else {
		echo "<script>alert('username or password is invalid!');</script>";
	}
}
?>
</body>