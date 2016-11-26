<!-- Verifies the registrant when he clicks link sent to his/her mail -->

<html>
<head>
<title>Confirmation</title>
<!-- To set icon in the browser tab -->
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../images/favicon.ico"
	type="image/x-icon" />
<!-- To set icon in the browser tab -->
</head>
<body>
<?php
include '../config.php';
session_start ();
$con = mysql_connect ( $host, $dbuname, $dbpass );
if (! $con) {
	die ( 'could not connect: ' . mysql_error () );
}
mysql_select_db ( $dbname, $con );

if (isset ( $_GET ['name'] ) && isset ( $_GET ['hash'] )) {
	/**Storing date and time*/
	date_default_timezone_set ( 'asia/Kolkata' );
	
	$info = getdate ();
	$day = $info ['mday'];
	$month = $info ['mon'];
	$year = $info ['year'];
	$hour = $info ['hours'];
	$min = $info ['minutes'];
	$sec = $info ['seconds'];
	if ($hour > 12) {
		$hour -= 12;
		$time = $hour . ':' . $min . ' PM';
	} elseif ($hour == 12) {
		$time = $hour . ':' . $min . ' PM';
	} else {
		$time = $hour . ':' . $min . ' AM';
	}
	$date = $day . '/' . $month . '/' . $year;
	/**Storing date and time*/
	$name = urldecode ( $_GET ['name'] );
	$hashval = $_GET ['hash'];
	$query = mysql_query ( "SELECT * FROM institution as i,i_registrant as ir where ir.i_name=i.i_name and ir.username='$name' and i.random='$hashval'" );
	$count = mysql_num_rows ( $query );
	
	while ( $row = mysql_fetch_array ( $query ) ) {
		$insname = $row ['i_name'];
		$acc_rej = $row ['accept_reject'];
		//$username = $row ['username'];
		//$password = $row ['password'];
	}
	if ($count > 0) {
		if ($acc_rej == "5") {
			//Confirming the account
			$query1 = mysql_query ( "update institution set accept_reject='1', date='$date', time='$time' where i_name='$insname'" );
			if ($query1) {
// 				$_SESSION ['iusername'] = $username;
				?>
			<script type="text/javascript">
			alert('Confirmation Successfull.\n\nYou can login now using \nthe credentials sent to your mail.');
			window.location.href="../homepage.php";
			</script>
			<?php
			} else {
				echo "<script>alert('confirmation failed!');</script>";
			}
		} elseif ($acc_rej == "1") {
			?>
			<script type="text/javascript">alert('This account has already been confirmed.\n\nYou can login now.');
			window.location.href="../homepage.php";</script>
			<?php
		}
	} else {
		echo "<script>alert('confirmation failed!');</script>";
	}
} else {
		
	//If the user has not signedin properly or session expires
	?>
	<script type="text/javascript">window.location.href="../homepage.php";</script>
<?php
}
?>
</body>
</html>