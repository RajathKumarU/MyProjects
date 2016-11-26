<!-- Displays edited details of myprofile -->

<!DOCTYPE br PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>

<!-- Used to display title & icon on browser tab -->
<title>Profile edited details</title>
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<!-- Used to display title & icon on browser tab -->

<style type="text/css">
/*Style for all the tables displayed*/
table.gridtable {
	font-family: verdana, arial, sans-serif;
	font-size: 11px;
	color: #333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}

table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}

table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>


 <?php
	include 'config.php';
	@ob_start ();
	session_start ();
	
	//Check if admin logged in and if not then redirect to login page
	if (isset ( $_SESSION ['log'] )) {
		
		//database connection
		$con = @mysql_connect ( $host, $dbuname, $dbpass );
		if (! $con) {
			die ( 'could not connect: ' . mysql_error () );
		}
		mysql_select_db ( $dbname, $con );
		?>

<script type="text/javascript">
function btonclickOwnAcc(prkey){
	//redirects to accept Institution Registrant Owner edited details
	var bool1=confirm("Are you sure you want to Accept?");
	if(bool1){
		window.location.href="profileedited.php?pk2="+prkey;
	}
	else{
		window.location.href="profileedited.php";
	}
}
</script>
<script type="text/javascript">
function btonclickOwnRej(prkey){
	//redirects to reject Institution Registrant Owner edited details
	var bool2=confirm("Are you sure you want to Reject?");
	if(bool2){
		window.location.href="profileedited.php?pk3="+prkey;
	}
	else{
		window.location.href="profileedited.php";
	}
}
</script>
<script type="text/javascript">
function btonclick_V_OwnAcc(prkey){
	//NOTE: this is not used as Supplier side is not being used

	//redirects to accept Supplier Owner edited details	
	var bool1=confirm("Are you sure you want to Accept?");
	if(bool1){
		window.location.href="profileedited.php?voacc="+prkey;
	}
	else{
		window.location.href="profileedited.php";
	}
}

</script>
<script type="text/javascript">
function btonclick_V_OwnRej(prkey){
	//redirects to reject Supplier Owner edited details
	var bool2=confirm("Are you sure you want to Reject?");
	if(bool2){
	window.location.href="profileedited.php?vorej="+prkey;

	}
	else{
		window.location.href="profileedited.php";
	}
}
</script>
<script type="text/javascript">
function btonclickPrAcc(prkey){
	//redirects to accept Institution Principal edited details
	var bool2=confirm("Are you sure you want to Accept?");
	if(bool2){
		window.location.href="profileedited.php?pk="+prkey;
	}
	else{
		window.location.href="profileedited.php";
	}
}
</script>
<script type="text/javascript">
function btonclickPrRej(prkey){
	//redirects to reject Institution Principal edited details
	var bool2=confirm("Are you sure you want to Reject?");
	if(bool2){
	window.location.href="profileedited.php?pk1="+prkey;

	}
	else{
		window.location.href="profileedited.php";
	}
}
</script>
</head>
<body>
	<br>
	<br>
	<br>
	<h3>Principal Edited Details</h3>
	
	<!-- Displays Principal Edited Details of Institution -->
	<table class="gridtable">
		<tr>
			<th>Institution Name</th>
			<th>Region</th>
			<th>Registrant</th>
			<th>Principal name</th>
			<th>Principal Phone number</th>
			<th>Principal email</th>
			<th>date of <br>modification
			</th>
			<th>time of<br> modification
			</th>
			<th>registrant <br>mobile number
			</th>
			<th>Accept</th>
			<th>Reject</th>
		</tr>
<?php
		$prinfo = mysql_query ( "SELECT * FROM principaledit" );
		while ( $row = mysql_fetch_array ( $prinfo ) ) {
			$primkey = $row ["primkey"];
			$_SESSION ['$oldpname'] = $row ["pname"];
			$_SESSION ['$oldpmob'] = $row ["pmobile"];
			$_SESSION ['$oldpemail'] = $row ["pemail"];
			echo "<tr><td>" . $row ["i_name"] . "</td><td>" . $row ["region"] . "</td><td>" . $row ["r_name"] . "</td><td>" . $row ["pname"] . "</td><td>" . $row ["pmobile"] . "</td><td>" . $row ["pemail"] . "</td><td>" . $row ["date"] . "</td><td>" . $row ["time"] . "</td><td>" . $row ["r_mob"] . "</td><td><button type=\"button\" name=\"accept\"
	onclick=\"btonclickPrAcc('$primkey')\">Accept</button></td>	<td><button type=\"button\" name=\"reject\"onclick=\"btonclickPrRej('$primkey')\">Reject!</button></td></tr>";
		}
		
		?>
	</table>
	</div><?php
		if (isset ( $_GET ['pk'] )) {
			//Modify database to accept the Principal edited details
			
			$pk = $_GET ['pk'];
			$opname = $_SESSION ['$oldpname'];
			$opmob = $_SESSION ['$oldpmob'];
			$opemail = $_SESSION ['$oldpemail'];
			$pieces = explode ( "(", $opname );
			$pieces1 = explode ( "(", $opmob );
			$pieces2 = explode ( "(", $opemail );
			
			$getinsname = mysql_query ( "SELECT i_name FROM principaledit WHERE primkey='$pk'" );
			while ( $row = mysql_fetch_array ( $getinsname ) ) {
				$instname = $row ["i_name"];
			}
			$input = mysql_query ( "UPDATE institution SET pr_name='$pieces[0]',pr_email='$pieces2[0]',pr_mob='$pieces1[0]' where i_name='$instname'" );
			$select1 = mysql_query ( "SELECT * FROM principaledit WHERE primkey='$pk'" );
			while ( $row = mysql_fetch_array ( $select1 ) ) {
				$p_i_name = $row ['i_name'];
				$p_r_name = $row ['region'];
				$p_ownname = $row ['r_name'];
				$p_ownmob = $row ['pname'];
				$p_ownemail = $row ['pmobile'];
				$p_primkey = $row ['pemail'];
				$p_username = $row ['primkey'];
				$p_date = $row ['date'];
				$p_time = $row ['time'];
				$p_r_mob = $row ['r_mob'];
				
				$insert = mysql_query ( "INSERT INTO principaledit_new VALUES ('$p_i_name','$p_r_name', '$p_ownname' ,'$p_ownmob', '$p_ownemail', '$p_primkey' ,'$p_username','$p_date','$p_time','$p_r_mob','Accepted'  )" );
			}
			
			$delete = mysql_query ( "DELETE FROM principaledit WHERE primkey='$pk'" );
			?>
<script type="text/javascript">window.location.href="profileedited.php"</script>
<?php 
		}
		
		if (isset ( $_GET ['pk1'] )) {
			//Modify database to reject the Principal edited details
			
			$pk1 = $_GET ['pk1'];
			
			$select1 = mysql_query ( "SELECT * FROM principaledit WHERE primkey='$pk1'" );
			while ( $row = mysql_fetch_array ( $select1 ) ) {
				$p_i_name = $row ['i_name'];
				$p_r_name = $row ['region'];
				$p_ownname = $row ['r_name'];
				$p_ownmob = $row ['pname'];
				$p_ownemail = $row ['pmobile'];
				$p_primkey = $row ['pemail'];
				$p_username = $row ['primkey'];
				$p_date = $row ['date'];
				$p_time = $row ['time'];
				$p_r_mob = $row ['r_mob'];
				
				$insert = mysql_query ( "INSERT INTO principaledit_new VALUES ('$p_i_name','$p_r_name', '$p_ownname' ,'$p_ownmob', '$p_ownemail', '$p_primkey' ,'$p_username','$p_date','$p_time','$p_r_mob','Rejected'  )" );
			}
			
			$delete = mysql_query ( "DELETE FROM principaledit WHERE primkey='$pk1'" );
						?>
<script type="text/javascript">window.location.href="profileedited.php"</script>
<?php 
	
		}
		?>
	<div>
		<br> <br> <br>
		
		<!-- Displays Principal Edited Details History -->
		<h3>Principal Edited Details History</h3>

		<table class="gridtable">
			<tr>
				<th>Institution Name</th>
				<th>Region</th>
				<th>Registrant</th>
				<th>Principal name</th>
				<th>Principal Phone number</th>
				<th>Principal email</th>
				<th>date of <br>modification
				</th>
				<th>time of<br> modification
				</th>
				<th>registrant <br>mobile number
				</th>
				<th>Status</th>
			</tr>
<?php
		$prinfo = mysql_query ( "SELECT * FROM principaledit_new" );
		while ( $row = mysql_fetch_array ( $prinfo ) ) {
			echo "<tr><td>" . $row ["i_name"] . "</td><td>" . $row ["region"] . "</td><td>" . $row ["r_name"] . "</td><td>" . $row ["pname"] . "</td><td>" . $row ["pmobile"] . "</td><td>" . $row ["pemail"] . "</td><td>" . $row ["date"] . "</td><td>" . $row ["time"] . "</td><td>" . $row ["r_mob"] . "</td><td>" . $row ["status"] . "</td></tr>";
		}
		
		?>
	</table>
		<br> <br> <br>
		<hr>
		<br> <br>
		<h3>Owner Edited Details</h3>

		<!-- Displays Owner Edited Details -->
		<table class="gridtable">
			<tr>
				<th>Institution Name</th>
				<th>Registrant</th>
				<th>Owner name</th>
				<th>Owner Phone number</th>
				<th>Owner email</th>
				<th>date of <br>modification
				</th>
				<th>time of<br> modification
				</th>
				<th>registrant <br>mobile number
				</th>
				<th>principal <br>mobile number
				</th>
				<th>Accept</th>
				<th>Reject</th>

			</tr>
			<?php
		$owninfo = mysql_query ( "SELECT * FROM owneredit" );
		while ( $row = mysql_fetch_array ( $owninfo ) ) {
			$primkey = $row ["primkey"];
			$_SESSION ['$oldoname'] = $row ["ownname"];
			$_SESSION ['$oldomob'] = $row ["ownmob"];
			$_SESSION ['$oldoemail'] = $row ["ownemail"];
			$_SESSION ['$uname'] = $row ['username'];
			echo "<tr><td>" . $row ["i_name"] . "</td><td>" . $row ["r_name"] . "</td><td>" . $row ["ownname"] . "</td><td>" . $row ["ownmob"] . "</td><td>" . $row ["ownemail"] . "</td><td>" . $row ["date"] . "</td><td>" . $row ["time"] . "</td><td>" . $row ["r_mob"] . "</td><td>" . $row ["p_mob"] . "</td><td><button type=\"button\" name=\"accept\"
		onclick=\"btonclickOwnAcc('$primkey')\">Accept</button></td>	<td><button type=\"button\" name=\"reject\"onclick=\"btonclickOwnRej('$primkey')\">Reject!</button></td></tr>";
		}
		
		?>
	</table>
	</div>
	<?php
		if (isset ( $_GET ['pk2'] )) {
			//Modify databases so that it accepts institution registrant owner edited details
			
			$pk2 = $_GET ['pk2'];
			$username = $_SESSION ['$uname'];
			$ownname = $_SESSION ['$oldoname'];
			$ownmob = $_SESSION ['$oldomob'];
			$ownemail = $_SESSION ['$oldoemail'];
			$pieces = explode ( "(", $ownname );
			$pieces1 = explode ( "(", $ownmob );
			$pieces2 = explode ( "(", $ownemail );
			
			$input = mysql_query ( "UPDATE i_registrant SET own_name='$pieces[0]',own_email='$pieces2[0]',own_mob='$pieces1[0]' where username='$username'" );
			$select = mysql_query ( "SELECT * FROM owneredit WHERE primkey='$pk2'" );
			while ( $row = mysql_fetch_array ( $select ) ) {
				$_i_name = $row ['i_name'];
				$_r_name = $row ['r_name'];
				$_ownname = $row ['ownname'];
				$_ownmob = $row ['ownmob'];
				$_ownemail = $row ['ownemail'];
				$_primkey = $row ['primkey'];
				$_username = $row ['username'];
				$_date = $row ['date'];
				$_time = $row ['time'];
				$_r_mob = $row ['r_mob'];
				$_p_mob = $row ['p_mob'];
				$insert = mysql_query ( "INSERT INTO owneredit_new VALUES ('$_i_name','$_r_name', '$_ownname' ,'$_ownmob', '$_ownemail', '$_primkey' ,'$_username','$_date','$_time','$_r_mob','$_p_mob','Accepted'  )" );
			}
			$delete = mysql_query ( "DELETE FROM owneredit WHERE primkey='$pk2'" );
						?>
<script type="text/javascript">window.location.href="profileedited.php"</script>
<?php 
	
		}
		if (isset ( $_GET ['pk3'] )) {
			//Modify databases so that it rejects institution registrant owner edited details
			
			$pk3 = $_GET ['pk3'];
			$select = mysql_query ( "SELECT * FROM owneredit WHERE primkey='$pk3'" );
			while ( $row = mysql_fetch_array ( $select ) ) {
				$_i_name = $row ['i_name'];
				$_r_name = $row ['r_name'];
				$_ownname = $row ['ownname'];
				$_ownmob = $row ['ownmob'];
				$_ownemail = $row ['ownemail'];
				$_primkey = $row ['primkey'];
				$_username = $row ['username'];
				$_date = $row ['date'];
				$_time = $row ['time'];
				$_r_mob = $row ['r_mob'];
				$_p_mob = $row ['p_mob'];
				$insert = mysql_query ( "INSERT INTO owneredit_new VALUES ('$_i_name','$_r_name', '$_ownname' ,'$_ownmob', '$_ownemail', '$_primkey' ,'$_username','$_date','$_time','$_r_mob','$_p_mob','Rejected'  )" );
			}
			$delete = mysql_query ( "DELETE FROM owneredit WHERE primkey='$pk3'" );
						?>
<script type="text/javascript">window.location.href="profileedited.php"</script>
<?php 
	
		}
		?>
		<br>
	<br>
	<br>
	<h3>Owner Edited Details History</h3>
	<!-- Displays Owner Edited Details History -->
	<table class="gridtable">
		<tr>
			<th>Institution Name</th>
			<th>Registrant</th>
			<th>Owner name</th>
			<th>Owner Phone number</th>
			<th>Owner email</th>
			<th>date of <br>modification
			</th>
			<th>time of<br> modification
			</th>
			<th>registrant <br>mobile number
			</th>
			<th>principal <br>mobile number
			</th>
			<th>Status</th>

		</tr>
			<?php
		$owninfo = mysql_query ( "SELECT * FROM owneredit_new" );
		while ( $row = mysql_fetch_array ( $owninfo ) ) {
			echo "<tr><td>" . $row ["i_name"] . "</td><td>" . $row ["r_name"] . "</td><td>" . $row ["ownname"] . "</td><td>" . $row ["ownmob"] . "</td><td>" . $row ["ownemail"] . "</td><td>" . $row ["date"] . "</td><td>" . $row ["time"] . "</td><td>" . $row ["r_mob"] . "</td><td>" . $row ["p_mob"] . "</td><td>" . $row ["status"] . "</td></tr>";
		}
		
		?>
	</table>
	<br>
	<br>
	<br>
	
	<!-- Displays Supplier Owner edited details and those can be accepted or rejected by admin -->
	<!-- 	<div> -->
	<!-- 		<br> <br> <br> -->
	<!-- 		<h3>Company Owner Edited Details</h3> -->
	<!-- 		<table class="gridtable"> -->
	<!-- 			<tr> -->
	<!-- 				<th>Company Name</th> -->
	<!-- 				<th>Company Phone</th> -->
	<!-- 				<th>Supplier Name</th> -->
	<!-- 				<th>Supplier name<br />(other) -->
	<!-- 				</th> -->
	<!-- 				<th>Username</th> -->
	<!-- 				<th>Supplier Mobile</th> -->
	<!-- 				<th>Date</th> -->
	<!-- 				<th>Time</th> -->
	<!-- 				<th>Owner Name</th> -->
	<!-- 				<th>Owner Phone number</th> -->
	<!-- 				<th>Owner email</th> -->
	<!-- 				<th>Accept</th> -->
	<!-- 				<th>Reject</th> -->
	<!-- 			</tr> -->
			<?php
		// $owninfo = mysql_query ( "SELECT * FROM v_owner_edit" );
		// while ( $row = mysql_fetch_array ( $owninfo ) ) {
		// $primkey = $row ["primkey"];
		// $_SESSION ['$old_oname'] = $row ["o_name"];
		// $_SESSION ['$old_omob'] = $row ["o_mob"];
		// $_SESSION ['$old_oemail'] = $row ["o_email"];
		// $_SESSION ['$uname'] = $row ['v_username'];
		// echo "<tr><td>" . $row ["comp_name"] . "</td><td>" . $row ["comp_phone"] . "</td><td>" . $row ["vend_name"] . "</td><td>" . $row ["edu_vend_name"] . "</td><td>" . $row ["v_username"] . "</td><td>" . $row ["v_mobile"] . "</td><td>" . $row ["date"] . "</td><td>" . $row ["time"] . "</td><td>" . $row ["o_name"] . "</td><td>" . $row ["o_mob"] . "</td><td>" . $row ["o_email"] . "</td><td><button type=\"button\" name=\"accept\"
		// onclick=\"btonclick_V_OwnAcc('$primkey')\">Accept</button></td> <td><button type=\"button\" name=\"reject\"onclick=\"btonclick_V_OwnRej('$primkey')\">Reject!</button></td></tr>";
		// }
		
		//		?>
	</table>
	</div>
	<?php
		// if (isset ( $_GET ['voacc'] )) {
		// $pk4 = $_GET ['voacc'];
		// $username = $_SESSION ['$uname'];
		// $ownname = $_SESSION ['$old_oname'];
		// $ownmob = $_SESSION ['$old_omob'];
		// $ownemail = $_SESSION ['$old_oemail'];
		// $pieces = explode ( "(", $ownname );
		// $pieces1 = explode ( "(", $ownmob );
		// $pieces2 = explode ( "(", $ownemail );
		
		// $input = mysql_query ( "UPDATE comp_info_update SET o_name='$pieces[0]',o_email='$pieces2[0]',o_mob='$pieces1[0]' where vend_name='$username'" );
		// $select2= mysql_query("SELECT * FROM v_owner_edit WHERE primkey='$pk4'");
		// while ( $row = mysql_fetch_array ( $select2 ) ){
		// $v_v_name=$row['vend_name'];
		// $v_c_name=$row['comp_name'];
		// $v_date=$row['date'];
		// $v_time=$row['time'];
		// $v_edu_vend_name=$row['edu_vend_name'];
		// $v_v_username=$row['v_username'];
		// $v_v_mobile=$row['v_mobile'];
		// $v_o_name=$row['o_name'];
		// $v_o_mob=$row['o_mob'];
		// $v_o_email=$row['o_email'];
		// $v_primkey=$row['primkey'];
		// $v_comp_phone=$row['comp_phone'];
		
		// $insert=mysql_query("INSERT INTO v_owner_edit_new VALUES ('$v_v_name','$v_c_name', '$v_date' ,'$v_time', '$v_edu_vend_name', '$v_v_username' ,'$v_v_mobile','$v_o_name','$v_o_mob','$v_o_email','$v_primkey','$v_comp_phone','Accepted' )" );
		// }
		
		// $delete = mysql_query ( "DELETE FROM v_owner_edit WHERE primkey='$pk4'" );
		// header ( 'Location:profileedited.php' );
		// }
		// if (isset ( $_GET ['vorej'] )) {
		// $pk5 = $_GET ['vorej'];
		// $select3= mysql_query("SELECT * FROM v_owner_edit WHERE primkey='$pk5'");
		// while ( $row = mysql_fetch_array ( $select3 ) ){
		// $v_v_name=$row['vend_name'];
		// $v_c_name=$row['comp_name'];
		// $v_date=$row['date'];
		// $v_time=$row['time'];
		// $v_edu_vend_name=$row['edu_vend_name'];
		// $v_v_username=$row['v_username'];
		// $v_v_mobile=$row['v_mobile'];
		// $v_o_name=$row['o_name'];
		// $v_o_mob=$row['o_mob'];
		// $v_o_email=$row['o_email'];
		// $v_primkey=$row['primkey'];
		// $v_comp_phone=$row['comp_phone'];
		
		// $insert=mysql_query("INSERT INTO v_owner_edit_new VALUES ('$v_v_name','$v_c_name', '$v_date' ,'$v_time', '$v_edu_vend_name', '$v_v_username' ,'$v_v_mobile','$v_o_name','$v_o_mob','$v_o_email','$v_primkey','$v_comp_phone','Rejected' )" );
		// }
		// $delete = mysql_query ( "DELETE FROM v_owner_edit WHERE primkey='$pk5'" );
		// header ( 'Location:profileedited.php' );
		// }
		//		?>
		
	<!-- redirects to admin homepage -->	
	<a href="layoutit/index.php"
		style="position: absolute; top: 3%; right: 10%;">HOME</a>
		<?php
	} else {
		//if this page is accessed without logging in, then redirect to admin login page
		echo "<script>alert('Please login!');window.location.href='admin_login.php'</script>";
	}
	?>
</body>
</html>