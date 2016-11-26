<?php
//Used for checking if username or institution name already exists in database


//These are to start session.
session_start ();
ob_start ();
include '../config.php';
?>

<?php

if (isset ( $_GET ['inst'] )) {
	
	//Used to check if the institution name exists in database
	
	$inst_name = $_GET ['inst'];
	
	$con = mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	
	$query = mysql_query ( "SELECT i_name FROM institution WHERE i_name='$inst_name' ;" );
	
	if (mysql_num_rows ( $query ) != 0) {
		echo "Institution Name Already Exists";
	} else {
		echo "";
	}
} elseif (isset ( $_GET ['user'] )) {
	
	//Used to check if the username exists in database
	
	$user_name = $_GET ['user'];
	
	$con = mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	
	$query = mysql_query ( "SELECT username FROM i_registrant WHERE username='$user_name' ;" );
	
	if (mysql_num_rows ( $query ) != 0) {
		echo "Username Already Exists";
	} else {
		echo "";
	}
}
?>
