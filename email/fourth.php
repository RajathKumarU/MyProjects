<html>
<head>
<!-- Frontend Starts-->
<title></title>
<link rel="stylesheet" type="text/css" href="Style1.css" />
<!-- Frontend ends-->
</head>
<body class="bdy" background="images/cloud.jpg">
<?php
include "config.php";

$found = false;
$tname = $_POST ["to"];
$con = mysql_connect ( $db_host, $db_user, $db_pass );
if (! $con) {
	die ( 'could not connect: ' . mysql_error () );
}

mysql_select_db ( $db_dbase, $con );
$result = mysql_query ( "SELECT * FROM txt1" );
while ( $row = mysql_fetch_array ( $result ) ) {
	if ($row ['name'] == $_POST ["to"]) {
		$found = true;
		session_start ();
		$_SESSION ['varname1'] = $row ['name'];
		echo "sent successfully!!";
	}
}
if ($found == false) {
	echo "oops!! no such recipient";
} else {
	$message = $_POST ['comment'];
	$from_name = $_SESSION ['varname'];
	$to_name = $_SESSION ['varname1'];
	$mydate = getdate ( date ( "U" ) );
	$tdate = date ( "d/m/y" );
	mysql_query ( "insert into txt2 (`from`, `msg`, `to`, `date`) values ('$from_name','$message','$to_name','$tdate') " );
}
?>
</body>
</html>
