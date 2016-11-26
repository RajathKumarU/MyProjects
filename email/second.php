<html>
<head>
<!-- Frontend Starts-->
<title>Login Page</title>
<link rel="stylesheet" type="text/css" href="Style3.css" />
<!-- Frontend ends-->
<!-- javascript for validation is included below -->
<script type="text/javascript" src="validate_signup.js"></script>
</head>
<body background="images/cloud.jpg">
<?php
include "config.php";

$name = $pass = "";
$nameErr = $passErr = "";
?>
	<div class="login-card">
		<h1>Sign in</h1>
		<br> <br>
		<form method="post"
			action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

			<input type="text" name="name" id="username" class="txt"
				placeholder="Username *" onBlur=validate_email()
				value="<?php echo $name;?>"> <span class="error"><?php echo $nameErr;?></span>
			<input type="password" name="pass" class="txt"
				placeholder="Password *" value="<?php echo $pass;?>"><span
				class="error"><?php echo $passErr;?></span> <input type="submit"
				value="Login" class="login login-submit">
		</form>
		<div class="login-help">
			<a href="first.php">Create Account</a>
		</div>
	</div>
	<br>
	<br>
</body>
</html>
<?php
$con = mysql_connect ( $db_host, $db_user, $db_pass );
if (! $con) {
	die ( 'could not connect: ' . mysql_error () );
}

mysql_select_db ( $db_dbase, $con );
$name = $_POST ["name"];
$pass = $_POST ["pass"];

$result = mysql_query ( "SELECT * FROM txt1 WHERE name='$name' AND pass='$pass'" );

$flag = 0;
while ( $row = mysql_fetch_array ( $result ) and $_SERVER ["REQUEST_METHOD"] == "POST" ) {
	$flag = 1;
	session_start ();
	$_SESSION ['varname'] = $row ['name'];
	header ( "Location: third.php" );
}
if ($_SERVER ["REQUEST_METHOD"] == "POST" and $flag == 0) {
	echo '<script language="javascript">';
	echo 'alert("invalid credentials")';
	echo '</script>';
}
?>

