<!-- To display selected and rejected institution and company lists -->

<!DOCTYPE html>
<html>
<head>
<!-- Used to display title & icon on browser tab -->
<title>Edusculpt database</title>
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<!-- Used to display title & icon on browser tab -->

<style type="text/css">
/*Style for the tables used to display information*/
table.gridtable {
	font-family: verdana, arial, sans-serif;
	font-size: 11px;
	color: #333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
/*Style for table heading*/
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
/*Style for table data*/
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>


<?php
@ob_start ();
session_start ();
include 'config.php';

// database connection
if (isset ( $_SESSION ['log'] )) {
	$con = @mysql_connect ( $host, $dbuname, $dbpass );
	
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	?>
	
	
	
<script type="text/javascript">
function reject(name){
	//Redirect to reject accepted institution
	var insname=name;
	window.location.href="edusculpt_database.php?value=inst&rej="+insname;
}
function accept(uname){
	//Redirect to accept rejected institution
	var insname=uname;
	window.location.href="edusculpt_database.php?value=inst&accpt="+insname;
}

function accept1(uname){
	//Redirect to accept rejected company
	var cname=uname;
	window.location.href="edusculpt_database.php?value=comp&accpt1="+uname;
}
</script>
<script type="text/javascript">
function reject1(name){
	//Redirect to reject accepted company
	var cname=name;
	window.location.href="supplieredit.php?rej1="+cname;
}
</script>
</head>
<body>
<?php
	if (isset ( $_GET ['value'] ) && $_GET ['value'] == 'inst') {
		// Displays Selected institution list
		?>
	<div>
		<h3>Selected Institution List</h3>
		<table class="gridtable">
			<tr>
				<th>Name</th>
				<th>Region</th>
				<th>Address</th>
				<th>Pin Code</th>
				<th>Web Link</th>
				<th>Affiliated University</th>
				<th>Strength</th>
				<th>Principal Name</th>
				<th>Principal Email</th>
				<th>Principal Mobile</th>
				<th>Modify</th>
			</tr>
			<?php
		// accepted institutions are retrieved and displayed
		$result = mysql_query ( "SELECT * FROM institution where accept_reject=1;" );
		while ( $row = mysql_fetch_array ( $result ) ) {
			$name = $row ["i_name"];
			echo "<tr><td>" . $row ["i_name"] . "</td><td>" . $row ["region"] . "</td><td>" . $row ["address"] . "</td><td>" . $row ["pin_code"] . "</td><td>" . $row ["web_link"] . "</td><td>" . $row ["affil_university"] . "</td><td>" . $row ["strength"] . "</td><td>" . $row ["pr_name"] . "</td><td>" . $row ["pr_email"] . "</td><td>" . $row ["pr_mob"] . "</td>";
			?>
			<td><button type="button" name="Rate"
					onclick="reject('<?php echo urlencode($name);?>')">Reject</button></td>
			</tr>
		<?php
		}
		
		?>
			</table>
	</div>

	<!-- Displays rejected institution list -->
	<div>
		<h3>Rejected Institution List</h3>
		<table class="gridtable">
			<tr>
				<th>Name</th>
				<th>Region</th>
				<th>Address</th>
				<th>Pin Code</th>
				<th>Web Link</th>
				<th>Affiliated University</th>
				<th>Strength</th>
				<th>Principal Name</th>
				<th>Principal Email</th>
				<th>Principal Mobile</th>
				<th>Modify</th>

			</tr>
			<?php
		include 'config.php';
		$con = @mysql_connect ( $host, $dbuname, $dbpass );
		if (! $con) {
			die ( 'could not connect: ' . mysql_error () );
		}
		mysql_select_db ( $dbname, $con );
		
		// rejected institution list is retrieved from database and is displayed
		$result = mysql_query ( "SELECT * FROM institution where accept_reject=2;" );
		while ( $row = mysql_fetch_array ( $result ) ) {
			$name = $row ["i_name"];
			echo "<tr><td>" . $row ["i_name"] . "</td><td>" . $row ["region"] . "</td><td>" . $row ["address"] . "</td><td>" . $row ["pin_code"] . "</td><td>" . $row ["web_link"] . "</td><td>" . $row ["affil_university"] . "</td><td>" . $row ["strength"] . "</td><td>" . $row ["pr_name"] . "</td><td>" . $row ["pr_email"] . "</td><td>" . $row ["pr_mob"] . "</td>";
			?>
			<td><button type="button" name="Rate"
					onclick="accept('<?php echo urlencode($name);?>')">Accept</button></td>
			</tr>
		<?php
		}
		?>
			</table>
	</div>
	<?php
	}
	if (isset ( $_GET ['value'] ) && $_GET ['value'] == 'comp') {
		// NOTE: This functionality is hidden as company details are entered by admin itself
		
		?>
	<div>
		<!-- Displays selected company list -->
		<h3>Selected Company List</h3>
		<table class="gridtable">
			<tr>
				<th>Name</th>
				<th>Category</th>
				<th>Location</th>
				<th>Experience</th>
				<th>Base/Service<br> Region
				</th>
				<th>Number of<br>customers
				</th>
				<th>Unique feature</th>
				<th>Organisation type</th>
				<th>Company Certification</th>
				<th>Vendor expectation</th>
				<th>ES Remarks</th>
				<th>Core competancy</th>
				<th>preferred brand</th>
				<th>Time to Deliver<br>from PO
				</th>
				<th>Warranty & <br>Shelf life
				</th>
				<th>Support & AMC</th>
				<th>Additional info</th>
				<th>Modify</th>

			</tr>
			<?php
		$result1 = mysql_query ( "SELECT * FROM company as c,v_registrant as v where c.accept_reject=1 and c.c_name=v.c_name;" );
		// if ($result->num_rows > 0) {
		
		// output data of each row
		while ( $row = mysql_fetch_array ( $result1 ) ) {
			$name = $row ["c_name"];
			echo "<tr><td>" . $row ["c_name"] . "</td><td>" . $row ["category"] . "</td><td>" . $row ["location"] . "</td><td>" . $row ["experience"] . "</td><td>" . $row ["serviceregion"] . "</td><td>" . $row ["custnumb"] . "</td><td>" . $row ["uniqfeature"] . "</td><td>" . $row ["orgtype"] . "</td><td>" . $row ["compcert"] . "</td><td>" . $row ["vendorexpect"] . "</td><td>" . $row ["esremarks"] . "</td><td>" . $row ["corecomp"] . "</td><td>" . $row ["prefbrand"] . "</td><td>" . $row ["timetodeliver"] . "</td><td>" . $row ["warranty"] . "</td><td>" . $row ["supportamc"] . "</td><td>" . $row ["addinfo"] . "<td><button type=\"button\" name=\"Rate\"onclick=\"reject1('$name')\">Edit</button></td>" . "</td></tr>";
		}
		?>
	</table>
	</div>
	<!-- Dis[lays Rejected Company lists -->
	<!-- 	<div> -->
	<!-- 		<h3>Rejected Company List</h3> -->
	<!-- 		<table class="gridtable"> -->
	<!-- 			<tr> -->
	<!-- 				<th>Name</th> -->
	<!-- 				<th>Type</th> -->
	<!-- 				<th>Category</th> -->
	<!-- 				<th>Location</th> -->
	<!-- 				<th>Address</th> -->
	<!-- 				<th>Phone number</th> -->
	<!-- 				<th>Web Link</th> -->
	<!-- 				<th>Strength</th> -->
	<!-- 				<th>date_of_incorporation</th> -->
	<!-- 				<th>Modify</th> -->

	<!-- 			</tr> -->
			<?php
		// $result1 = mysql_query ( "SELECT * FROM company where accept_reject=2;" );
		// // if ($result->num_rows > 0) {
		
		// // output data of each row
		// while ( $row = mysql_fetch_array ( $result1 ) ) {
		// $name = $row ["c_name"];
		// echo "<tr><td>" . $row ["c_name"] . "</td><td>" . $row ["c_type"] . "</td><td>" . $row ["category"] . "</td><td>" . $row ["location"] . "</td><td>" . $row ["address"] . "</td><td>" . $row ["ph_no"] . "</td><td>" . $row ["web_link"] . "</td><td>" . $row ["c_strength"] . "</td><td>" . $row ["date_of_incorporation"] ."<td><button type=\"button\" name=\"Rate\"onclick=\"accept1('$name')\">Accept</button></td>". "</td></tr>";
		// }
		//		?>
<!-- 	</table> -->
	<!-- 	</div> -->
	<?php
	}
} else {
	// if this page is accessed without logging in, redirect to login page
	echo "<script>alert('Please login!');window.location.href='admin_login.php'</script>";
}
?>


<?php
if (isset ( $_GET ['rej'] ) && $_GET ['value'] == 'inst') {
	// Reject a particular institution by setting accept_reject = 2
	$names = urldecode ( $_GET ['rej'] );
	$reject = mysql_query ( "UPDATE institution set accept_reject=2 WHERE i_name='$names'" );
	?>
		<script>window.location.href="edusculpt_database.php?value=inst";</script>
		<?php
}
?>
		
	<?php
	if (isset ( $_GET ['accpt'] ) && $_GET ['value'] == 'inst') {
		// Accept a particular institution by setting accept_reject = 1
		$namess = urldecode ( $_GET ['accpt'] );
		$accept = mysql_query ( "UPDATE institution set accept_reject=1 WHERE i_name='$namess'" );
		?>
		<script>window.location.href="edusculpt_database.php?value=inst";</script>
		<?php
	}
	?>	
	
	<?php
	if (isset ( $_GET ['accpt1'] ) && $_GET ['value'] == 'comp') {
		// Accept a particular company by setting accept_reject = 1
		$names2 = urldecode ( $_GET ['accpt1'] );
		$accept1 = mysql_query ( "UPDATE company set accept_reject=1 WHERE c_name='$names2'" );
		?>
		<script>window.location.href="edusculpt_database.php?value=comp";</script>
		<?php
	}
	?>	
		
	<!-- Redirects to admin homepage -->
	<a href="layoutit/index.php"
		style="position: absolute; top: 3%; right: 10%;">HOME</a>

</body>
</html>