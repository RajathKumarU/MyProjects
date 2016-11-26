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
				//header ( "Location: third.php" );
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
