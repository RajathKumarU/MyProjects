<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
</head>
<body class="bdy" background="images/cloud.jpg">
<?php
session_start ();
$var_name = $_SESSION ['varname'];
echo "<h1><font color=\"#ff8000\">Welcome " . $var_name . "</font></h1>";
?>
	<h2>Click below</h2>
	<h3>
		<a href="compose.php" target="home"> Compose </a>
	</h3>
	<h3>
		<a href="inbox.php" target="home"> Inbox </a>
	</h3>
	<h3>
		<a href="sent.php" target="home"> Sent Mail </a>
	</h3>
	<h3>
		<a href="markimp.php" target="home"> Mark Important </a>
	</h3>
	<h3>
		<a href="showimp.php" target="home"> Show Important </a>
	</h3>
	<h3>
		<a href="marktrash.php" target="home"> Mark Trash </a>
	</h3>
	<h3>
		<a href="showtrash.php" target="home"> Show Trash </a>
	</h3>
	<br>
	<br>
	<input type="button" value="CLOSE FRAME" class="btn"
		onClick='window.parent.document.getElementById("fset").cols="*,0";'>
	<br>
	<br>
	<a href="second.php">SIGN OUT</a>
</body>
</html>
