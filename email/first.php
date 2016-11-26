<!DOCTYPE HTML>
<html>
<head>
<!-- Frontend Starts-->
<title>Create Account</title>
<link rel="stylesheet" type="text/css" href="Style3.css" />
<!-- Frontend ends-->

<!-- javascript for validation is included below -->
<script type="text/javascript" src="validate_signup.js"></script>
</head>
<body background="images/cloud.jpg">
<?php
$nameErr = $cpassErr = $emailErr = $genderErr = $passErr = "";
$name = $cpass = $email = $gender = $pass = "";

if ($_SERVER ["REQUEST_METHOD"] == "POST") {
	if (empty ( $_POST ["name"] )) {
		$nameErr = "Name is required";
	} else {
		$name = test_input ( $_POST ["name"] );
		if (! preg_match ( "/^[a-zA-Z ]*$/", $name )) {
			$nameErr = "Only letters and white space allowed";
		}
	}
	
	if (empty ( $_POST ["email"] )) {
		$emailErr = "Username is required";
	} else {
		$email = test_input ( $_POST ["email"] );
		if (! preg_match ( "/^[a-zA-Z0-9_]+$/", $email )) {
			$emailErr = "Invalid Username format";
		}
	}
	
	if (empty ( $_POST ["pass"] )) {
		$passErr = "password is required";
	} else {
		$pass = test_input ( $_POST ["pass"] );
	}
	if (empty ( $_POST ["cpass"] ) || (strcmp ( $_POST ["pass"], $_POST ["cpass"] ))) {
		$cpassErr = "password mismatch";
	} else {
		$cpass = test_input ( $_POST ["cpass"] );
	}
	if (empty ( $_POST ["gender"] )) {
		$genderErr = "Gender is required";
	} else {
		$gender = test_input ( $_POST ["gender"] );
	}
}
function test_input($data) {
	$data = trim ( $data );
	$data = stripslashes ( $data );
	$data = htmlspecialchars ( $data );
	return $data;
}
?>
	<div class="login-card">
		<h1>Create Account</h1>
		<br> <br>
		<form method="post"
			action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

			<input type="text" name="name" id="pname" class="txt"
				placeholder="Name *" onBlur=validate_name()
				value="<?php echo $name;?>"> <span class="error"><?php echo $nameErr;?></span>
			<input type="text" name="email" id="emailid" class="txt"
				placeholder="Username *" onBlur=validate_email()
				value="<?php echo $email;?>"> <span class="error"><?php echo $emailErr;?></span>
			<input type="password" name="pass" id="pass1" class="txt"
				placeholder="Password *" value="<?php echo $pass;?>"> <span
				class="error"><?php echo $passErr;?></span> <input type="password"
				name="cpass" id="pass2" placeholder="Confirm Password *" class="txt"
				onBlur=validate_password() value="<?php echo $cpass;?>"> <span
				class="error"><?php echo $cpassErr;?></span> <br>Gender *<input
				type="radio" name="gender" id="gender"
				<?php if (isset($gender) && $gender=="female") echo "checked";?>
				value="female">Female <input type="radio" name="gender" id="gender"
				<?php if (isset($gender) && $gender=="male") echo "checked";?>
				value="male">Male <br>
			<span class="error"><?php echo $genderErr;?></span> <br>
			<br> <input type="submit" name="submit" value="Submit"
				class="login login-submit"><br>

		</form>
		<div class="login-help">
			<a href="second.php">Sign in here</a>
		</div>
	</div>
	<br>
	<br>
<?php
include "config.php";

if ($name != "" && $pass != "" && $cpass != "" && $gender != "") {
	$con = mysql_connect ( $db_host, $db_user, $db_pass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $db_dbase, $con );
	$result = mysql_query ( "INSERT INTO txt1 VALUES ('$email','$pass')" );
	echo '<script language="javascript">';
	// CHANGES MADE HERE
	if ($result) {
		echo 'alert("Account created successfully! pls login to message ")';
	} else {
		echo 'alert("An account with the same username already exists, change username")';
	}
	// CHANGES END HERE
	echo '</script>';
	mysql_close ( $con );
	// header("Location: http://localhost:8080/project1/second.php");
}
?>


</body>
</html>
