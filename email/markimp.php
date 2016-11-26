<!DOCTYPE html>
<html>
<head>
<title>Mark Important</title>
<link rel="stylesheet" type="text/css" href="Style2.css" />
</head>
<body class="bdy" background="images/cloud.jpg">
<?php
session_start ();
$var_name = $_SESSION ['varname'];
?>
	<h2>
		<font color="#ff8000">MARK IMPORTANT</font>
	</h2>
	<form action="#" method="post">
		<table class="tbl3">
			<thead>
				<tr>
					<th>Mark</th>
					<th>Num</th>
					<th>Date</th>
					<th>From</th>
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
$result = mysql_query ( "SELECT * FROM txt2 where `imp`=0" );
while ( $row = mysql_fetch_array ( $result ) ) {
	if ($row ['to'] == $var_name) {
		$dt = $row ['date'];
		$mesg = $row ['msg'];
		$frm = $row ['from'];
		$id = $row ['id'];
		
		echo "<tr>";
		echo '<td><input type="checkbox" name="mails[]" value=' . $id . '></td>';
		echo "<td>" . $i . "</td>";
		echo "<td>" . $dt . "</td>";
		echo "<td>" . $frm . "</td>";
		echo "<td>" . $mesg . "</td>";
		echo "</tr>";
		$i ++;
	}
}
?>
			<tr>
				<td><input type="submit" name="submit" value="Submit" /></td>
			</tr>
		</table>
	</form>
<?php
include "config.php";

$con = mysql_connect ( $db_host, $db_user, $db_pass );
mysql_select_db ( $db_dbase, $con );
$result = mysql_query ( "INSERT INTO txt1 VALUES ('$email','$pass')" );
if (isset ( $_POST ['submit'] )) {
	if (! empty ( $_POST ['mails'] )) {
		// Counting number of checked checkboxes.
		$checked_count = count ( $_POST ['mails'] );
		// Loop to store and display values of individual checked checkbox.
		foreach ( $_POST ['mails'] as $selected ) {
			$result = mysql_query ( "UPDATE txt2 SET `imp`=1 WHERE `id`=$selected" );
			if ($result) {
				echo '<script language="javascript">';
				echo 'alert("Mails are marked")';
				echo '</script>';
				// echo $selected;
				// header ( "Location: third.php" );
			} else {
				echo '<script language="javascript">';
				echo 'alert("Mails could not be marked database error")';
				echo '</script>';
			}
		}
	} else {
		echo "<b>Please Select Atleast One Option.</b>";
	}
}
?>


</body>
</html>
