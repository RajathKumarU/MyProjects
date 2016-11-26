<!DOCTYPE html>
<html>
<head>

<!-- Used to display title & icon on browser tab -->
<title>Home Page</title>
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<!-- Used to display title & icon on browser tab -->

<style type="text/css">
.one {
	/*Background Style for Education Institutions, Supplier and Take a tour*/
	width: 200px;
	height: 110px;
	background: #006633;
	position: absolute;
}
</style>
</head>
<body>
	<!-- Displays edusculpt logo -->
	<img src="images/edulogo.png" alt="edusculpt_logo"
		style="display: block; margin-left: auto; margin-right: auto; width: 280px; height: 130px;" />
	<div class="caption"
		style="text-align: center; font-size: small; font-family: cursive;">Fast
		and Secure decision making!</div>
	<h3 style='font: bold; font-style: normal; text-align: center;'>help us
		serve you better!</h3>

	<!-- Displays Contact information -->
	<div direction="left" scrollamount="0"
		style="background: #006633; font-weight: bold; font-size: large;">
		<p align="center">
			<font color="white">Contact us:1800-180-320</font>
		</p>
	</div>

	<h3 style='font: bold; font-style: normal; text-align: center;'>Select
		your role</h3>
	<h3 class="one" style="text-align: center; margin-left: 10%">
		<br>
		<br> <font color="white">Education Institution</font>
	</h3>
	<h3 class="one" style="text-align: center; margin-left: 42%;">
		<br>
		<br> <font color="white">Supplier</font>
	</h3>
	<h3 class="one" style="text-align: center; margin-left: 75%;">
		<br>
		<br> <font color="white">Take a tour</font>
	</h3>

	<h3 style="margin-left: 10%; margin-top: 15%; position: absolute;">
		Already registered?<a href="institution/inst_signin.php">Sign in</a>
	</h3>
	<!-- <h3 
		style="margin-left: 42%; margin-top: 15%; position: absolute; ">
 		Already registered?<a href="vendor/vend_signin.php">Sign in</a>
	 </h3> -->
	<h3 style="margin-left: 42%; margin-top: 15%; position: absolute;">
		Already registered?<a href="">Sign in</a>
	</h3>
	<h3 style="margin-left: 75%; margin-top: 15%; position: absolute;">
		Already registered?<a href="">Sign in</a>
	</h3>


	<h3 style="margin-left: 10%; margin-top: 20%; position: absolute;">
		New user?<a href="institution/new_inst_signup.php?form_value=back">Create
			an account</a>
	</h3>
	<!--<h3
		style="margin-left: 42%; margin-top: 20%; position: absolute;">
		New user?<a href="vendor/new_vend_signup.php?form_value=back">Create an account</a>
	</h3>-->
	<h3 style="margin-left: 42%; margin-top: 20%; position: absolute;">
		New user?<a href="">Create an account</a>
	</h3>
	<h3 style="margin-left: 75%; margin-top: 20%; position: absolute;">
		New user?<a href="">Create an account</a>
	</h3>
<?php
?>
</body>
</html>