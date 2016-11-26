<!-- Displays categories and link to download Tips -->

<html>
<?php
//These are to start session.
session_start ();
ob_start ();
?>
<!-- To set icon in the browser tab -->
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
<!-- To set icon in the browser tab -->
<style type="text/css">
.gitdr {
    position:relative;
	border: 3px solid gold;
	font-size: 12pt;
	padding: 10px;
	width: 400px;
}
.gtdr {
    position:relative;
	border: 3px solid gold;
	font-size: 12pt;
	padding: 10px;
	width: 300px;
	
}

</style>
<head>
<title>Tips to Decide</title>
</head>
<body>
<?php  if(isset($_SESSION ['iusername'])){?>
<?php include '../config.php';
	$con = mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	//Fetch all the categories in the database as entered by the admin.
	$sql = mysql_query("select * from category");
	?>

		<table cellspacing="0px"
		style="border-collapse:collapse; max-width: 700px; min-width: 700px; margin: auto;margin-top: 5%;margin-bottom: 5%;">
		<tr style="background: #006633; font-weight: bold; font-size: 30px; width: 700px; height: 40px;">
		<th align="center"
			style=" border: 3px solid gold; color: white; width: 400px; height: 60px;">Category</th>
		<th align="center"
			style="border: 3px solid gold; color: white; width: 300px;">Description</th>
<!-- 		<th align="center" -->
<!-- 			style="border: 3px solid gold; color: white; width: 100px;">Detailed<br>Description</th> -->
		</tr>
		
		<?php while ( $row = mysql_fetch_array ( $sql ) ){?>
		
		<tr><td class="gitdr" align="center"><?php echo $row['categ']?></td><!-- <td class="gitdr" align="center"></td>--><td class="gtdr" align="center"><a href="tipstodecide/<?php echo $row['categ']?>.pdf">click here</a></td></tr><?php }?>
		
	</table>
</body>
<?php 
} else {
	//If the user has not signedin properly or session expires
	echo '<script>alert("Please Signin!");window.location.href="../homepage.php";</script>';
}
?>
</html>