<!DOCTYPE html>
<html>
<head>
<title>Sent Mail</title>
<link rel="stylesheet" type="text/css" href="Style2.css" />
</head>
<body class="bdy" background="images/cloud.jpg">
<?php
session_start ();
$var_name = $_SESSION ['varname'];
?>
	<h2>
		<font color="#ff8000">SENT MAIL</font>
	</h2>
	<table class="tbl3">
		<thead>
			<tr>
				<th></th>
				<th>Date</th>
				<th>To</th>
				<th>Message</th>
			</tr>
		</thead>
<?php
include "config.php";

$con = mysql_connect ( $db_host, $db_user, $db_pass );
if (! $con) {
	die ( 'could not connect: ' . mysql_error () );
}
$i = 1;
mysql_select_db ( $db_dbase, $con );
$result = mysql_query ( "SELECT * FROM txt2" );
while ( $row = mysql_fetch_array ( $result ) ) {
	if ($row ['from'] == $var_name) {
		$dt = $row ['date'];
		$mesg = $row ['msg'];
		$frm = $row ['to'];
		echo "<tr>";
		echo "<td>" . $i . "</td>";
		echo "<td>" . $dt . "</td>";
		echo "<td>" . $frm . "</td>";
		echo "<td>" . $mesg . "</td>";
		echo "</tr>";
		$i ++;
	}
}
?>
	</table>
</body>
</html>
