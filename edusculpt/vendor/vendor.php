<html>
<?php
session_start ();
ob_start ();
?>
<head>
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
<title>vendor details</title>
<script type="text/javascript" src="calendar.js"></script>
<script type="text/javascript" src="myprof_update.js"></script>
<style type="text/css">
.welcome {
	position: absolute;
	right: 250px;
	top: 3px;
	color: blue;
}

.reqtables {
	border-collapse: collapse;
	position: absolute;
	top: 68%;
	left: 35%;
}

.redeemcr {
	width: 100px;
	height: 30px;
	background: gold;
	font-weight: bold;
}

.one {
	width: 300px;
	height: 60px;
	background: gold;
	text-align: center;
	margin-left: auto;
	margin-right: auto;
}

.pos {
	position: absolute;
	left: 20%;
	top: 35%;
}

#white {
	background: white;
	width: 130px;
	height: 60px;
	border: 3px solid #006633;
	color: #000;
	font-size: 15px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	-webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	-moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	font-weight: bolder;
	-moz-border-radius: 10px;
}

.padd_leftelements {
	padding-top: 20px;
}

.svth {
	background-color: #063;
	border: 3px solid gold;
	padding: 6px;
	color: #fff;
}

.svtd {
	border: 3px solid gold;
	padding: 6px;
}

.cr {
	border-collapse: collapse;
	position: absolute;
	top: 53%;
	left: 35%;
}

.lbl {
	font-size: large;
	font-family: sans-serif;
	font-weight: 500;
}

select {
	border: gold solid 3px;
	font-size: large;
	font-weight: bold;
}

.padd {
	padding: 10px;
}

.txt1 {
	border: 3px solid gold;
	font-size: large;
	font-family: serif;
	width: 300px;
}

.txt2 {
	border: 3px solid gold;
	font-size: large;
	font-family: serif;
	width: 150px;
}

.txt {
	border: 3px solid gold;
	font-size: large;
	font-family: serif;
	width: 300px;
}

.compemailsv {
	width: 100px;
	height: 50px;
	background: gold;
	font-weight: bold;
}

.redeemcr {
	width: 100px;
	height: 30px;
	background: gold;
	font-weight: bold;
}

.rest {
	border-collapse: collapse;
	position: absolute;
	top: 63%;
	left: 35%;
}

.disable {
	border: 3px solid gold;
	font-size: large;
	font-family: serif;
	width: 300px;
	background-color: #ddd;
}
</style>
<link rel="stylesheet" type="text/css" href="round4vend.css">
<script type="text/javascript">
function redirect(status,status1){
	
	if(status1==null){
		window.location.href="vendor.php?fvalue="+status;
		}
	else {
	window.location.href="vendor.php?fvalue="+status +"&lvalue="+status1;
	}
}
</script>
<script type="text/javascript">
function acnt_validate(){
	

	var uname = document.forms["acntsettings"]["u_name"].value; 
	var upass = document.forms["acntsettings"]["u_pass"].value;
	if (uname == null || uname == "") {
		alert("User Name must be filled!");
		return false;
	} else if (upass == null || upass == "") {
		alert("Password must be filled!");
		return false;
	} else{
		return true;
}
}
</script>
<script type="text/javascript">
function chng_validate(){
	var npass = document.forms["chngsettings"]["u_newpass"].value; 
	var ncpass = document.forms["chngsettings"]["u_confpass"].value;
	var re = /[0-9]/;
	if (npass == null || npass == "") {
		alert("New Password must be filled!");
		return false;
	} else if (ncpass == null || ncpass == "") {
		alert("Confirm Password must be filled!");
		return false;
	} else if (npass!=ncpass) {
		alert("Passwords dont match!");
		return false;
	}  else if (npass.length < 6) {
		alert("password must contain atleast 6 characters including numbers");
		return false;
	} else if (!re.test(npass)) {
		alert("password must contain atleast one number");
		return false;
	} else{
		return true;
}
}
</script>
<script type="text/javascript">
function colorset(){
	//init();
	var url=window.location.href;
	var stat=url.split("=");
	var status=stat[1].split("&");
	document.getElementById('round'+status[0]).id='white';
	document.getElementById('round'+stat[2]).id='white';
}
</script>
<script type="text/javascript">
function forminstdisp() {
	document.getElementById('vendform').style.visibility='hidden';
	document.getElementById('instform').style.visibility='visible';
	document.getElementById('instform').style.position='absolute';
	document.getElementById('instform').style.top='60%';
	document.getElementById('instform').style.left='40%';
}</script>
<script type="text/javascript">
function formvenddisp() {
	document.getElementById('instform').style.visibility='hidden';
	document.getElementById('vendform').style.visibility='visible';
	document.getElementById('vendform').style.position='absolute';
	document.getElementById('vendform').style.top='60%';
	document.getElementById('vendform').style.left='40%';
}</script>
<script type="text/javascript">
function reload(){
	
	document.getElementById('select').selectedIndex=0; 
	$confirm=confirm('Confirm logout?');
	if($confirm==true){
	     
	 window.location.href="vendor.php?fvalue=logout";
	}
	}
</script>
<script type="text/javascript">
function onamepopup(){
	$confirm=confirm('Are you sure you want to edit Owner name?');
	if($confirm==true){
	document.getElementById("own_name").value =null;
	document.getElementById("own_name").readOnly=false;
	document.getElementById("own_name").setAttribute("class", "txt1");
	}
	}
</script>
<script type="text/javascript">
function omobpopup(){
	$confirm=confirm('Are you sure you want to edit Owner mobile number?');
	if($confirm==true){
	document.getElementById("own_mob").value =null;
	document.getElementById("own_mob").readOnly=false;
	document.getElementById("own_mob").setAttribute("class", "txt1");
	}
	}
</script>
<script type="text/javascript">
function oemailpopup(){
	$confirm=confirm('Are you sure you want to edit Owner email-ID?');
	if($confirm==true){
	document.getElementById("own_email").value =null;
	document.getElementById("own_email").readOnly=false;
	document.getElementById("own_email").setAttribute("class", "txt1");
	}
	}
</script>
</head>
<body onload="colorset()">
<?php  if(isset($_SESSION ['vusername'])){?>
	<img src="../images/edulogo.png" alt="edusculpt_logo"
		style="display: block; margin-left: auto; margin-right: auto; width: 120px; height: 50px;" />
	<div class="caption"
		style="text-align: center; font-size: small; font-family: cursive;">Fast
		and Secure decision making!</div>
	<div class="welcome">

		Welcome<select onchange="javascript:reload()" id="select"
			style="border: 0px; color: blue; font-weight: normal; font-size: medium; font-family: serif; cursor: pointer;"><option
				value="" style="display: none;" selected> <?php
	include '../config.php';
	$con = mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	
	$usrname = $_SESSION ['vusername'];
	
	$result = mysql_query ( "SELECT * FROM v_registrant WHERE username='$usrname' ;" );
	if (! $result) {
		echo "ERROR";
	}
	while ( $row = mysql_fetch_array ( $result ) ) {
		$name = $row ["r_name"];
		$iname = $row ["c_name"];
	}
	$_SESSION ['irname'] = $name;
	$_SESSION ['insname'] = $iname;
	echo $name . "(" . $iname . "Company)!";
	?></option>
			<option>Logout</option></select>
	</div>

	<div direction="left" scrollamount="0"
		style="background: #006633; font-weight: bold; font-size: large;">
		<p align="center">
			<font color="white">Contact us:+91 95000 07290</font>
		</p>
	</div>
	<h3 class="one" align="centre">
		<i>Welcome to EduSculpt!!! <br> <font size="3">Earn while you spend!</i>
	</h3>

	<table class="pos" id="tabs">

		<tr class="padd_bot">
			<td class="padd"><input type="button" name="mp"
				onclick="redirect('mp','ci')" id="roundmp" value="My &#10 Profile">&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
			<td class="padd"><input name="ot" onclick="redirect('ot','oh')"
				type="button" id="roundot" value="Oppurtunity &#10 Tracker">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td class="padd"><input name="mb" onclick="redirect('mb','ib')"
				type="button" id="roundmb" value="Mailbox">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td class="padd"><input name="cr" onclick="redirect('cr','cre')"
				type="button" id="roundcr" value="Credits & &#10 Referrals">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td class="padd" align="right"><a
				href="vendor.php?fvalue=mp&lvalue=ci"><img alt="Chick for Home Page"
					src="../images/home_icon.png" height="40" width="40">
					<div class="caption" style="font-size: x-small;">Home Page</div></a>
			</td>
		</tr>
		<?php
	if ($_GET ['fvalue'] == 'mp' && $_GET ['lvalue'] == 'ci') {
		?>
		<tr>
			<td class="padd_leftelements"><input name="ci"
				onclick="redirect('mp','ci')" type="button" id="roundci"
				value="Company &#10 Info">&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr>
			<td class="padd_leftelements"><input name="pi"
				onclick="redirect('mp','pi')" type="button" id="roundpi"
				value="Product &#10 Info">&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr>
			<td class="padd_leftelements"><input name="test"
				onclick="redirect('mp','test')" type="button" id="roundtest"
				value="Testimonials">&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr>
			<td class="padd_leftelements"><input name="doc"
				onclick="redirect('mp','doc')" type="button" id="rounddoc"
				value="Documents &#10 Verify">&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>
		<tr>
			<td class="padd_leftelements"><input name="acnt"
				onclick="redirect('mp','acnt')" type="button" id="roundacnt"
				value="Account &#10 Settings">&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>
	</table>
	</table>
	<form name="comp_update_form" action="" method="post"
		enctype="multipart/form-data" onsubmit="return own_reg_validate()">
		<table class="cr">
			<tr>
				<td class="padd"><label class="lbl">Company Name</label></td>
				<td class="padd"><input type="text" name="comp_name" id="comp_name"
					class="txt" size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Category</label></td>
				<td class="padd"><input type="text" name="cat" id="cat" class="txt"
					size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Address</label></td>
				<td class="padd"><input type="text" name="address" id="address"
					class="txt" size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Region</label></td>
				<td class="padd"><input type="text" name="region" id="region"
					class="txt" size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Company Phone No.</label></td>
				<td class="padd"><input type="text" name="comp_ph_num"
					id="comp_ph_num" class="txt" size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Company Branches</label></td>
				<td class="padd"><input type="text" name="company_branches"
					id="company_branches" class="txt" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Owner Name</label></td>
				<td class="padd"><input type="text" name="own_name" id="own_name"
					class="disable" size="30" readonly="readonly"></td>
				<td><img src="../images/edit.png" onclick="onamepopup();"
					title="Click here to edit Owner name" alt="edit" width="20"
					height="20"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Owner Mob. No.</label></td>
				<td class="padd"><input type="text" name="own_mob" id="own_mob"
					class="disable" size="30" readonly="readonly"></td>
				<td><img src="../images/edit.png" onclick="omobpopup();"
					title="Click here to edit Owner mobile number" alt="edit"
					width="20" height="20"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Owner Email Id</label></td>
				<td class="padd"><input type="text" name="own_email" id="own_email"
					class="disable" size="30" readonly="readonly"></td>
				<td><img src="../images/edit.png" onclick="oemailpopup();"
					title="Click here to edit Owner email id" alt="edit" width="20"
					height="20"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Current Servicing<br>Regions
				</label></td>
				<td class="padd"><input type="text" name="cur_regions" class="txt"
					id="cur_regions" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Add a Logo</label></td>
				<td class="padd" align="center"><input type="file" name="logo[]"
					multiple="multiple" id="logo" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Registrant Name</label></td>
				<td class="padd"><input type="text" name="r_name" id="r_name"
					class="txt" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Registrant Mob. No.</label></td>
				<td class="padd"><input type="text" name="r_mobile" id="r_mobile"
					class="txt" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Registrant Email</label></td>
				<td class="padd"><input type="text" name="r_email" id="r_email"
					class="txt" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Registrant ID Card<br>Number
				</label></td>
				<td class="padd"><input type="text" name="r_id" id="r_id"
					class="txt" size="30"></td>
			</tr>
			<tr>
				<td align="right" class="padd"><input name="Cancel" type="button"
					class="compemailsv" id="round" value="Cancel"></td>
				<td align="right" class="padd"><input name="Submit" type="submit"
					class="compemailsv" id="round" value="Submit"></td>
			</tr>
		</table>
	</form>
	<?php
		$myprofile = mysql_query ( "SELECT * FROM company as c,v_registrant as r where c.c_name=r.c_name and r.username='$usrname'" );
		while ( $row = mysql_fetch_array ( $myprofile ) ) {
			$_SESSION ['v_mobile'] = $row ['mob_no'];
			$_SESSION ['comp_phone'] = $row ['ph_no'];
			$_SESSION ['edu_vend_name'] = $row ['edu_vname'];
			?>
			
				<script type="text/javascript">
				document.getElementById("comp_name").value ='<?php echo $row['c_name']?>';
				document.getElementById("cat").value ='<?php echo $row['category']?>';
				document.getElementById("address").value ='<?php echo $row['address']?>';
				document.getElementById("region").value ='<?php echo $row['location']?>';
				document.getElementById("comp_ph_num").value ='<?php echo $row['ph_no']?>';
				document.getElementById("r_name").value ='<?php echo $row['r_name']?>';
				document.getElementById("r_mobile").value ='<?php echo $row['mob_no']?>';
				document.getElementById("r_email").value ='<?php echo $row['email']?>';
				document.getElementById("r_id").value ='<?php echo $row['comp_id_no']?>';
				</script>
				
			<?php
		}
		
		$myprofile = mysql_query ( "SELECT * FROM comp_info_update where vend_name='$usrname'" );
		$count = mysql_num_rows ( $myprofile );
		
		if ($count) {
			
			while ( $row = mysql_fetch_array ( $myprofile ) ) {
				
				$_SESSION ['oldoname'] = $row ['o_name'];
				$_SESSION ['oldomob'] = $row ['o_mob'];
				$_SESSION ['oldoemail'] = $row ['o_email'];
				
				?>
				<script type="text/javascript">
				document.getElementById("company_branches").value ='<?php echo $row['c_branches']?>';
				document.getElementById("own_name").value ='<?php echo $row['o_name']?>';
				document.getElementById("own_mob").value ='<?php echo $row['o_mob']?>';
				document.getElementById("own_email").value ='<?php echo $row['o_email']?>';
				document.getElementById("cur_regions").value ='<?php echo $row['cur_region']?>';
				</script>
				<?php
			}
		} else {
			$_SESSION ['oldoname'] = "";
			$_SESSION ['oldomob'] = "";
			$_SESSION ['oldoemail'] = "";
		}
		
		if (isset ( $_POST ['company_branches'] )) {
			$oldoname = $_SESSION ['oldoname'];
			$oldomob = $_SESSION ['oldomob'];
			$oldoemail = $_SESSION ['oldoemail'];
			
			$comp_br = $_POST ['company_branches'];
			$o_name = $_POST ['own_name'];
			$o_mob = $_POST ['own_mob'];
			$o_email = $_POST ['own_email'];
			$cur_reg = $_POST ['cur_regions'];
			$r_name = $_POST ['r_name'];
			$r_mobile = $_POST ['r_mobile'];
			$r_email = $_POST ['r_email'];
			$r_id = $_POST ['r_id'];
			
			$v_name = $_SESSION ['irname'];
			$c_name = $_SESSION ['insname'];
			$v_mob = $_SESSION ['v_mobile'];
			$c_ph = $_SESSION ['comp_phone'];
			$e_v_name = $_SESSION ['edu_vend_name'];
			
			if ($oldoname != $o_name) {
				$oldoname = $o_name . "(modified)";
			}
			if ($oldomob != $o_mob) {
				$oldomob = $o_mob . "(modified)";
			}
			if ($oldoemail != $o_email) {
				$oldoemail = $o_email . "(modified)";
			}
			$pinfo = 1;
			if (($oldoname != $o_name) || ($oldomob != $o_mob) || ($oldoemail != $o_email)) {
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
				
				$pinfo = mysql_query ( "INSERT INTO v_owner_edit values('$v_name','$c_name','$date','$time','$e_v_name','$usrname','$r_mobile','$oldoname','$oldomob','$oldoemail',0,'$c_ph') " );
			}
			
			for($i = 0; $i < count ( $_FILES ['logo'] ['name'] ); $i ++) {
				
				$target_dir = "../documents/vendors/" . $_SESSION ['vusername'] . "_";
				$target_files = $target_dir . basename ( $_FILES ["logo"] ["name"] [$i] );
				$FileType = pathinfo ( $target_files, PATHINFO_EXTENSION );
				$target_file = $target_dir . "complogo_" . date ( 'd-m-Y' ) . '_' . $i . "." . $FileType;
				
				move_uploaded_file ( $_FILES ['logo'] ['tmp_name'] [$i], $target_file );
			}
			
			$query = mysql_query ( "UPDATE v_registrant SET r_name='$r_name',mob_no='$r_mobile',email='$r_email',comp_id_no='$r_id' where username='$usrname'" );
			
			if ($count == 0) {
				$update = mysql_query ( "INSERT INTO comp_info_update (vend_name,c_branches,cur_region) values('$usrname','$comp_br','$cur_reg')" );
			} elseif ($count == 1) {
				$update = mysql_query ( "UPDATE comp_info_update SET c_branches='$comp_br',cur_region='$cur_reg' where vend_name='$usrname'" );
			}
			
			if ($update && $pinfo && $query) {
				?>
							
					<script type="text/javascript">
							alert('Changes saved successfully!\nAllow some time to reflect');
							window.location.href="vendor.php?fvalue=mp&lvalue=ci";
					</script>
					<?php
			}
		}
		
		?>
<?php }if ($_GET ['fvalue'] == 'mp' && $_GET ['lvalue'] == 'pi') {?>
		<tr>
		<td class="padd_leftelements"><input name="ci"
			onclick="redirect('mp','ci')" type="button" id="roundci"
			value="Company &#10 Info">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="pi"
			onclick="redirect('mp','pi')" type="button" id="roundpi"
			value="Product &#10 Info">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="test"
			onclick="redirect('mp','test')" type="button" id="roundtest"
			value="Testimonials">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="doc"
			onclick="redirect('mp','doc')" type="button" id="rounddoc"
			value="Documents &#10 Verify">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="acnt"
			onclick="redirect('mp','acnt')" type="button" id="roundacnt"
			value="Account &#10 Settings">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	</table>
	<form name="prod_update_form" action="" method="post"
		enctype="multipart/form-data" onsubmit="return prod_info_validate()">
		<table class="cr">
			<tr>
				<td class="padd"><label class="lbl">Product Name</label></td>
				<td class="padd"><input type="text" name="prod_name" id="prod_name"
					class="txt" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Product Category</label></td>
				<td class="padd"><input type="text" name="prod_cat" id="prod_cat"
					class="txt" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Product Screenshots</label></td>
				<td class="padd" align="center"><input type="file" id="prod_ss[]"
					multiple="multiple" name="prod_ss" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Product Brochures</label></td>
				<td class="padd" align="center"><input type="file" name="prod_br[]"
					multiple="multiple" id="prod_br" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Product Description</label></td>
				<td class="padd"><input type="text" name="prod_desc" id="prod_desc"
					class="txt" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Product Features</label></td>
				<td class="padd"><input type="text" name="prod_features"
					id="prod_features" class="txt" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Product Customers</label></td>
				<td class="padd"><input type="text" name="prod_cust" id="prod_cust"
					class="txt" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Product Demo Link</label></td>
				<td class="padd"><input type="text" name="prod_link" id="prod_link"
					class="txt" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Product Payment<br>Cycle
				</label></td>
				<td class="padd"><input type="text" name="prod_cycle"
					id="prod_cycle" class="txt" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Product Unique<br>Features
				</label></td>
				<td class="padd"><input type="text" name="prod_feat" id="prod_feat"
					class="txt" size="30"></td>
			</tr>
			<tr>
				<td align="right" class="padd"><input name="Cancel" type="button"
					class="compemailsv" id="round" value="Cancel"></td>
				<td align="right" class="padd"><input name="Submit" type="submit"
					class="compemailsv" id="round" value="Submit"></td>
			</tr>
		</table>
	</form>
	<?php
		$myprofile = mysql_query ( "SELECT * FROM v_product_update where vend_name='$usrname'" );
		$count = mysql_num_rows ( $myprofile );
		
		if ($count) {
			while ( $row = mysql_fetch_array ( $myprofile ) ) {
				
				?>
			
				<script type="text/javascript">
				document.getElementById("prod_name").value ='<?php echo $row['p_name']?>';
				document.getElementById("prod_cat").value ='<?php echo $row['p_category']?>';
				document.getElementById("prod_desc").value ='<?php echo $row['p_desc']?>';
				document.getElementById("prod_features").value ='<?php echo $row['p_features']?>';
				document.getElementById("prod_cust").value ='<?php echo $row['p_cust']?>';
				document.getElementById("prod_link").value ='<?php echo $row['p_link']?>';
				document.getElementById("prod_cycle").value ='<?php echo $row['p_cycle']?>';
				document.getElementById("prod_feat").value ='<?php echo $row['p_uniq_feat']?>';
				</script>
				
			<?php
			}
		}
		if (isset ( $_POST ['prod_name'] )) {
			$p_name = $_POST ['prod_name'];
			$p_cat = $_POST ['prod_cat'];
			$p_desc = $_POST ['prod_desc'];
			$p_features = $_POST ['prod_features'];
			$p_cust = $_POST ['prod_cust'];
			$p_link = $_POST ['prod_link'];
			$p_cycle = $_POST ['prod_cycle'];
			$p_feat = $_POST ['prod_feat'];
			
			for($i = 0; $i < count ( $_FILES ['prod_ss'] ['name'] ); $i ++) {
				
				$target_dir = "../documents/vendors/" . $_SESSION ['vusername'] . "_";
				$target_files = $target_dir . basename ( $_FILES ["prod_ss"] ["name"] [$i] );
				$FileType = pathinfo ( $target_files, PATHINFO_EXTENSION );
				$target_file = $target_dir . "prodscreenshot_" . date ( 'd-m-Y' ) . '_' . $i . "." . $FileType;
				
				move_uploaded_file ( $_FILES ['prod_ss'] ['tmp_name'] [$i], $target_file );
			}
			
			for($i = 0; $i < count ( $_FILES ['prod_br'] ['name'] ); $i ++) {
				
				$target_dir = "../documents/vendors/" . $_SESSION ['vusername'] . "_";
				$target_files = $target_dir . basename ( $_FILES ["prod_br"] ["name"] [$i] );
				$FileType = pathinfo ( $target_files, PATHINFO_EXTENSION );
				$target_file = $target_dir . "prodbrochures_" . date ( 'd-m-Y' ) . '_' . $i . "." . $FileType;
				
				move_uploaded_file ( $_FILES ['prod_br'] ['tmp_name'] [$i], $target_file );
			}
			
			if ($count == 0) {
				$myprofile = mysql_query ( "insert into v_product_update (vend_name,p_name,p_category,p_desc,p_features,p_cust,p_link,p_cycle,p_uniq_feat) values('$usrname','$p_name','$p_cat','$p_desc','$p_features','$p_cust','$p_link','$p_cycle','$p_feat')" );
				?>
							<script type="text/javascript">
								alert('Changes saved successfully!\nAllow some time to reflect');
								window.location.href = "vendor.php?fvalue=mp&lvalue=pi";
							</script>
							<?php
			} elseif ($count == 1) {
				$myprofile = mysql_query ( "update v_product_update set p_name='$p_name',p_category='$p_cat',p_desc='$p_desc',p_features='$p_features',p_cust='$p_cust',p_link='$p_link',p_cycle='$p_cycle',p_uniq_feat='$p_feat' where vend_name='$usrname'" );
				?>
							<script type="text/javascript">
								alert('Changes saved successfully!\nAllow some time to reflect');
								window.location.href = "vendor.php?fvalue=mp&lvalue=pi";
							</script>
							<?php
			}
		}
		?>
<?php } 		if ($_GET ['fvalue'] == 'mp' && $_GET ['lvalue'] == 'test') {?>
		<tr>
		<td class="padd_leftelements"><input name="ci"
			onclick="redirect('mp','ci')" type="button" id="roundci"
			value="Company &#10 Info">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="pi"
			onclick="redirect('mp','pi')" type="button" id="roundpi"
			value="Product &#10 Info">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="test"
			onclick="redirect('mp','test')" type="button" id="roundtest"
			value="Testimonials">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="doc"
			onclick="redirect('mp','doc')" type="button" id="rounddoc"
			value="Documents &#10 Verify">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="acnt"
			onclick="redirect('mp','acnt')" type="button" id="roundacnt"
			value="Account &#10 Settings">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<form name="test_update_form" action="" method="post"
		enctype="multipart/form-data"
		onsubmit="return testimonials_validate()">
		<table class="cr">
			<tr>
				<td class="padd"><label class="lbl">Date & Time</label></td>
				<!-- 				<td class="padd"><input type="text" name="date_time" id="date_time" -->
				<!-- 					class="txt1" size="30"></td> -->
				<td class="padd"><input type="date" name="date" id="date"
					class="txt2" size="30"><input type="time" name="time" id="time"
					class="txt2" size="30"></td>

			</tr>
			<tr>
				<td class="padd"><label class="lbl">Institution Name</label></td>
				<td class="padd"><input type="text" name="inst_name" id="inst_name"
					class="txt1" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Testimonial File<br>Upload
				</label></td>
				<td class="padd"><input type="file" name="test_file[]"
					multiple="multiple" size="30"></td>
			</tr>
			<tr>
				<td align="right" class="padd"><input name="Cancel" type="button"
					class="compemailsv" id="round" value="Cancel"></td>
				<td align="right" class="padd"><input name="Submit" type="submit"
					class="compemailsv" id="round" value="Submit"></td>
			</tr>
		</table>
	</form>
	<?php
		$myprofile = mysql_query ( "SELECT * FROM v_test_update where vend_name='$usrname'" );
		$count = mysql_num_rows ( $myprofile );
		
		if ($count) {
			while ( $row = mysql_fetch_array ( $myprofile ) ) {
				
				?>
			
				<script type="text/javascript">
				document.getElementById("date").value ='<?php echo explode(" ", $row['date_time'])[0]?>';
				document.getElementById("time").value ='<?php echo explode(" ", $row['date_time'])[1]?>';
				document.getElementById("inst_name").value ='<?php echo $row['i_name']?>';
				</script>
				
			<?php
			}
		}
		if (isset ( $_POST ['date'] ) && $count == 0) {
			
			$timetocall = $_POST ['time'];
			$datetocall = $_POST ['date'];
			$dt = $datetocall . " " . $timetocall;
			$i_name = $_POST ['inst_name'];
			
			for($i = 0; $i < count ( $_FILES ['test_file'] ['name'] ); $i ++) {
				
				$target_dir = "../documents/vendors/" . $_SESSION ['vusername'] . "_";
				$target_files = $target_dir . basename ( $_FILES ["test_file"] ["name"] [$i] );
				$FileType = pathinfo ( $target_files, PATHINFO_EXTENSION );
				$target_file = $target_dir . "testimonial_" . date ( 'd-m-Y' ) . '_' . $i . "." . $FileType;
				
				move_uploaded_file ( $_FILES ['test_file'] ['tmp_name'] [$i], $target_file );
			}
			
			$myprofile = mysql_query ( "insert into v_test_update (vend_name,date_time,i_name) values('$usrname','$dt','$i_name')" );
			?>
				<script type="text/javascript">
					alert('Changes saved successfully!\nAllow some time to reflect');
					window.location.href = "vendor.php?fvalue=mp&lvalue=test";
				</script>
				<?php
		} elseif (isset ( $_POST ['date'] ) && $count == 1) {
			$timetocall = $_POST ['time'];
			$datetocall = $_POST ['date'];
			$dt = $datetocall . " " . $timetocall;
			$i_name = $_POST ['inst_name'];
			
			for($i = 0; $i < count ( $_FILES ['test_file'] ['name'] ); $i ++) {
				
				$target_dir = "../documents/vendors/" . $_SESSION ['vusername'] . "_";
				$target_files = $target_dir . basename ( $_FILES ["test_file"] ["name"] [$i] );
				$FileType = pathinfo ( $target_files, PATHINFO_EXTENSION );
				$target_file = $target_dir . "testimonial_" . date ( 'd-m-Y' ) . '_' . $i . "." . $FileType;
				
				move_uploaded_file ( $_FILES ['test_file'] ['tmp_name'] [$i], $target_file );
			}
			
			$myprofile = mysql_query ( "update v_test_update set date_time='$dt',i_name='$i_name' where vend_name='$usrname'" );
			
			?>
				<script type="text/javascript">
					alert('Changes saved successfully!\nAllow some time to reflect');
					window.location.href = "vendor.php?fvalue=mp&lvalue=test";
				</script>
				<?php
		}
	}
	if ($_GET ['fvalue'] == 'mp' && $_GET ['lvalue'] == 'doc') {
		?>
		<tr>
		<td class="padd_leftelements"><input name="ci"
			onclick="redirect('mp','ci')" type="button" id="roundci"
			value="Company &#10 Info">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="pi"
			onclick="redirect('mp','pi')" type="button" id="roundpi"
			value="Product &#10 Info">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="test"
			onclick="redirect('mp','test')" type="button" id="roundtest"
			value="Testimonials">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="doc"
			onclick="redirect('mp','doc')" type="button" id="rounddoc"
			value="Documents &#10 Verify">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="acnt"
			onclick="redirect('mp','acnt')" type="button" id="roundacnt"
			value="Account &#10 Settings">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<form name="documents_form" action="" method="post"
		enctype="multipart/form-data">
		<table class="cr">
			<tr>
				<td class="padd"><label class="lbl">Service Tax File <br>Upload
				</label></td>
				<td class="padd"><input type="file" name="serv_tax[]"
					multiple="multiple" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Sales Tax File <br>Upload
				</label></td>
				<td class="padd"><input type="file" name="sales_tax[]"
					multiple="multiple" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">MOA Document File<br>Upload
				</label></td>
				<td class="padd"><input type="file" name="moa_doc[]"
					multiple="multiple" size="30"></td>
			</tr>
			<tr>
				<td align="right" class="padd"><input name="Cancel" type="button"
					class="compemailsv" id="round" value="Cancel"></td>
				<td align="right" class="padd"><input name="Submit" type="submit"
					class="compemailsv" id="round" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php
		if (isset ( $_POST ['Submit'] )) {
			
			for($i = 0; $i < count ( $_FILES ['serv_tax'] ['name'] ); $i ++) {
				
				$target_dir = "../documents/vendors/" . $_SESSION ['vusername'] . "_";
				$target_files = $target_dir . basename ( $_FILES ["serv_tax"] ["name"] [$i] );
				$FileType = pathinfo ( $target_files, PATHINFO_EXTENSION );
				$target_file = $target_dir . "servicetax_" . date ( 'd-m-Y' ) . '_' . $i . "." . $FileType;
				
				move_uploaded_file ( $_FILES ['serv_tax'] ['tmp_name'] [$i], $target_file );
				
			}
			
			for($i = 0; $i < count ( $_FILES ['sales_tax'] ['name'] ); $i ++) {
				
				$target_dir = "../documents/vendors/" . $_SESSION ['vusername'] . "_";
				$target_files = $target_dir . basename ( $_FILES ["sales_tax"] ["name"] [$i] );
				$FileType = pathinfo ( $target_files, PATHINFO_EXTENSION );
				$target_file = $target_dir . "salestax_" . date ( 'd-m-Y' ) . '_' . $i . "." . $FileType;
				
				move_uploaded_file ( $_FILES ['sales_tax'] ['tmp_name'] [$i], $target_file );
				
			}
			
			for($i = 0; $i < count ( $_FILES ['moa_doc'] ['name'] ); $i ++) {
				
				$target_dir = "../documents/vendors/" . $_SESSION ['vusername'] . "_";
				$target_files = $target_dir . basename ( $_FILES ["moa_doc"] ["name"] [$i] );
				$FileType = pathinfo ( $target_files, PATHINFO_EXTENSION );
				$target_file = $target_dir . "moafile_" . date ( 'd-m-Y' ) . '_' . $i . "." . $FileType;
				
				move_uploaded_file ( $_FILES ['moa_doc'] ['tmp_name'] [$i], $target_file );
				
			}
			
			echo "<script>alert('Selected Files Uploaded successfully!');</script>";
		}
	}
	if ($_GET ['fvalue'] == 'mp' && $_GET ['lvalue'] == 'acnt') {
		?>
		<tr>
		<td class="padd_leftelements"><input name="ci"
			onclick="redirect('mp','ci')" type="button" id="roundci"
			value="Company &#10 Info">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="pi"
			onclick="redirect('mp','pi')" type="button" id="roundpi"
			value="Product &#10 Info">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="test"
			onclick="redirect('mp','test')" type="button" id="roundtest"
			value="Testimonials">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="doc"
			onclick="redirect('mp','doc')" type="button" id="rounddoc"
			value="Documents &#10 Verify">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="acnt"
			onclick="redirect('mp','acnt')" type="button" id="roundacnt"
			value="Account &#10 Settings">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<form name="acntsettings" action="vendor.php?fvalue=mp&lvalue=nxt"
		method="post" onsubmit="return acnt_validate()">
		<table style="position: absolute; top: 60%; left: 35%;">
			<tr>
				<td class="padd"><label class="lbl">Enter Username</label></td>
				<td class="padd"><input type="text" name="u_name" id="u_name"
					class="txt1" size="22"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Enter Password</label></td>
				<td class="padd"><input type="password" name="u_pass" id="u_pass"
					class="txt1" size="22"></td>
			</tr>
			<tr>
				<td class="padd"></td>
				<td class="padd" align="right"><button type="submit" onclick=""
						class="btn">
						<img src="../images/next_icon.png" alt="Next" width="50"
							height="50" />
					</button></td>
			</tr>
		</table>
	</form>
				
	
<?php
	}
	
	if ($_GET ['fvalue'] == 'ot' && $_GET ['lvalue'] == 'oh') {
		?>
		<tr>
		<td class="padd_leftelements"><input name="oh"
			onclick="redirect('ot','oh')" type="button" id="roundoh"
			value="Oppurtunities &#10 History">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="oo"
			onclick="redirect('ot','oo')" type="button" id="roundoo"
			value="Open &#10 Oppurtunity">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="onp"
			onclick="redirect('ot','onp')" type="button" id="roundonp"
			value="On-Going &#10 Oppurtunities">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<div
		style="position: absolute; top: 53%; left: 39%; font-size: x-large; font-weight: bold;">
		From
		Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		To Date</div>
	<div
		style="position: absolute; top: 58%; left: 39%; font-size: x-large; font-weight: bold;">
		<input type="date" name="date" id="date" size="30" class="txt2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="date" name="date1" id="date1" size="30" class="txt2">
	</div>

	<table class="reqtables">
		<tr>
			<th class="svth">Date &<br>Time
			</th>
			<th class="svth">Regions<br>Serviced
			</th>
			<th class="svth">No. of Successful<br>Deal Closures
			</th>
			<th class="svth">No. Non Converted<br>Deals
			</th>
			<th class="svth">Total Value<br>Gained
			</th>
		</tr>
		<tr>
			<td class="svtd">02/06/2015</td>
			<td class="svtd">Chennai</td>
			<td class="svtd">4</td>
			<td class="svtd">2</td>
			<td class="svtd">25</td>
		</tr>
	</table>
<?php } if ($_GET ['fvalue'] == 'ot' && $_GET ['lvalue'] == 'oo') {?>
		<tr>
		<td class="padd_leftelements"><input name="oh"
			onclick="redirect('ot','oh')" type="button" id="roundoh"
			value="Oppurtunities &#10 History">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="oo"
			onclick="redirect('ot','oo')" type="button" id="roundoo"
			value="Open &#10 Oppurtunity">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="onp"
			onclick="redirect('ot','onp')" type="button" id="roundonp"
			value="On-Going &#10 Oppurtunities">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<div
		style="position: absolute; top: 53%; left: 39%; font-size: x-large; font-weight: bold;">
		From
		Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		To Date</div>
	<div
		style="position: absolute; top: 58%; left: 39%; font-size: x-large; font-weight: bold;">
		<input type="date" name="date" id="date" size="30" class="txt2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="date" name="date1" id="date1" size="30" class="txt2">
	</div>

	<table class="reqtables">
		<tr>
			<th class="svth">Oppurtunity<br>Number
			</th>
			<th class="svth">Date</th>
			<th class="svth">Oppurtunity<br>Description
			</th>
			<th class="svth">Region</th>
			<th class="svth">Accept</th>
			<th class="svth">Reject</th>
			<th class="svth">Track<br>Oppurtunity
			</th>
		</tr>
		<tr>
			<td class="svtd">101ERP1</td>
			<td class="svtd">02/06/2015</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd">Chennai</td>
			<td class="svtd"><button class="redeemcr" onclick="">Accept</button></td>
			<td class="svtd"><button class="redeemcr" onclick="">Reject</button></td>
			<td class="svtd"><a href="">Click Here</a></td>
		</tr>
		<tr>
			<td class="svtd">101ERP3</td>
			<td class="svtd">02/06/2015</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd">Erode</td>
			<td class="svtd"><button class="redeemcr" onclick="">Accept</button></td>
			<td class="svtd"><button class="redeemcr" onclick="">Reject</button></td>
			<td class="svtd"><a href="">Click Here</a></td>
		</tr>
		<tr>
			<td class="svtd">101ERP4</td>
			<td class="svtd">02/06/2015</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd">Erode</td>
			<td class="svtd"><button class="redeemcr" onclick="">Accept</button></td>
			<td class="svtd"><button class="redeemcr" onclick="">Reject</button></td>
			<td class="svtd"><a href="">Click Here</a></td>
		</tr>
	</table>
<?php } if ($_GET ['fvalue'] == 'ot' && $_GET ['lvalue'] == 'onp') {?>
		<tr>
		<td class="padd_leftelements"><input name="oh"
			onclick="redirect('ot','oh')" type="button" id="roundoh"
			value="Oppurtunities &#10 History">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="oo"
			onclick="redirect('ot','oo')" type="button" id="roundoo"
			value="Open &#10 Oppurtunity">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="onp"
			onclick="redirect('ot','onp')" type="button" id="roundonp"
			value="On-Going &#10 Oppurtunities">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<div
		style="position: absolute; top: 53%; left: 39%; font-size: x-large; font-weight: bold;">
		From
		Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		To Date</div>
	<div
		style="position: absolute; top: 58%; left: 39%; font-size: x-large; font-weight: bold;">
		<input type="date" name="date" id="date" size="30" class="txt2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="date" name="date1" id="date1" size="30" class="txt2">
	</div>

	<table class="reqtables">
		<tr>
			<th class="svth">Oppurtunity<br>Number
			</th>
			<th class="svth">Date</th>
			<th class="svth">College Name</th>
			<th class="svth">Oppurtunity<br>Description
			</th>
			<th class="svth">Current Status</th>
			<th class="svth">Next Steps</th>
			<th class="svth">Track<br>Oppurtunity
			</th>
		</tr>
		<tr>
			<td class="svtd">101ERP1</td>
			<td class="svtd">02/06/2015</td>
			<td class="svtd">ABCD Engineering<br>College
			</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd"></td>
			<td class="svtd"></td>
			<td class="svtd"><a href="">Click Here</a></td>
		</tr>
		<tr>
			<td class="svtd">101ERP1</td>
			<td class="svtd">02/06/2015</td>
			<td class="svtd">ABCD Engineering<br>College
			</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd"></td>
			<td class="svtd"></td>
			<td class="svtd"><a href="">Click Here</a></td>
		</tr>
		<tr>
			<td class="svtd">101ERP1</td>
			<td class="svtd">02/06/2015</td>
			<td class="svtd">ABCD Engineering<br>College
			</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd"></td>
			<td class="svtd"></td>
			<td class="svtd"><a href="">Click Here</a></td>
		</tr>
	</table>
<?php } if ($_GET ['fvalue'] == 'mb' && $_GET ['lvalue'] == 'ib') {?>
		<tr>
		<td class="padd_leftelements"><input name="ib"
			onclick="redirect('mb','ib')" type="button" id="roundib"
			value="Inbox">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="ob"
			onclick="redirect('mb','ob')" type="button" id="roundob"
			value="Outbox">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<img alt="Inbox" src="../images/inbox.png"
		style="position: absolute; top: 50%; left: 35%;">
<?php } if ($_GET ['fvalue'] == 'mb' && $_GET ['lvalue'] == 'ob') {?>
		<tr>
		<td class="padd_leftelements"><input name="ib"
			onclick="redirect('mb','ib')" type="button" id="roundib"
			value="Inbox">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="ob"
			onclick="redirect('mb','ob')" type="button" id="roundob"
			value="Outbox">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<img alt="Inbox" src="../images/inbox.png"
		style="position: absolute; top: 50%; left: 35%;">
<?php
	} else if ($_GET ['fvalue'] == 'cr' && $_GET ['lvalue'] == 'cre') {
		
		?>
			<tr>
		<td class="padd_leftelements"><input name="cre"
			onclick="redirect('cr','cre')" type="button" id="roundcre"
			value="Credits">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="re"
			onclick="redirect('cr','re')" type="button" id="roundre"
			value="Referrals">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="rest"
			onclick="redirect('cr','rest')" type="button" id="roundrest"
			value="Referral Status">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<table class="cr">
		<tr>
			<th class="svth">Date</th>
			<th class="svth">Total Credits<br>Earned
			</th>
			<th class="svth">Credits<br>Utilised
			</th>
			<th class="svth">Pending<br>Credits
			</th>
			<th class="svth">Redeem Pending<br>Credits
			</th>
		</tr>
		<tr>
			<td class="svtd">39/06/2015</td>
			<td class="svtd">1000</td>
			<td class="svtd">500</td>
			<td class="svtd">500</td>
			<td class="svtd"><button class="redeemcr"
					onclick="alert('Redemption Request sent. We will contact you shortly!')">Redeem</button></td>
		</tr>

	</table>
	<?php
	} else if ($_GET ['fvalue'] == 'cr' && $_GET ['lvalue'] == 're') {
		
		?>
			<tr>
		<td class="padd_leftelements"><input name="cre"
			onclick="redirect('cr','cre')" type="button" id="roundcre"
			value="Credits">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="re"
			onclick="redirect('cr','re')" type="button" id="roundre"
			value="Referrals">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="rest"
			onclick="redirect('cr','rest')" type="button" id="roundrest"
			value="Referral Status">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<div
		style="position: absolute; top: 53%; left: 35%; font-size: x-large; font-weight: bold;">
		Refer :
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
			type="radio" value="1" name="referral" onclick="forminstdisp()">Institution
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="2"
			name="referral" onclick="formvenddisp()"> Vendor
	</div>
	<div
		style="position: absolute; right: 15%; top: 37%; font-size: x-small;">
		<a href="vendor.php?fvalue=cr&lvalue=cre"><img
			src="../images/back_icon.png" alt="Back" width="40" height="40" /><br>
			Back to Credits<br>& Referrals</a>
	</div>
	<form id="instform" action="" method="post" style="visibility: hidden;">
		<table align="center">
			<tr>
				<td class="padd"><label class="lbl">Institution Name</label></td>
				<td class="padd"><input type="text" name="inst_name" class="txt1"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Region</label></td>
				<td class="padd"><input type="text" name="region" class="txt1"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Name of Key Person</label></td>
				<td class="padd"><input type="text" name="namekey" class="txt1"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Designation</label></td>
				<td class="padd"><input type="text" name="designation" class="txt1"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Mobile Number</label></td>
				<td class="padd"><input type="text" name="mobnum" class="txt1"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Email Id</label></td>
				<td class="padd"><input type="text" name="email" class="txt1"
					size="30"></td>
			</tr>
			<tr>
				<td align="right" class="padd"><input name="Cancel" type="button"
					class="compemailsv" id="round" value="Cancel"></td>
				<td align="right" class="padd"><input name="Submit" type="submit"
					class="compemailsv" id="round" value="Submit"></td>
			</tr>

		</table>
	</form>
	<form id="vendform" action="" method="post" style="visibility: hidden;">
		<table align="center">
			<tr>
				<td class="padd"><label class="lbl">Supplier Name</label></td>
				<td class="padd"><input type="text" name="supp_name" class="txt1"
					size="30"></td>
			</tr>

			<tr>
				<td class="padd"><label class="lbl">Category</label></td>
				<td class="padd"><input type="text" name="cat" class="txt1"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Name of Vendor</label></td>
				<td class="padd"><input type="text" name="vend_name" class="txt1"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Designation</label></td>
				<td class="padd"><input type="text" name="designation" class="txt1"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Phone Number</label></td>
				<td class="padd"><input type="text" name="Phone_Number" class="txt1"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Email Id</label></td>
				<td class="padd"><input type="text" name="email" class="txt1"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Website Link</label></td>
				<td class="padd"><input type="text" name="Website_Link" class="txt1"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Remarks about the Vendor</label></td>
				<td class="padd"><input type="text" name="company_strength"
					class="txt1" size="30"></td>
			</tr>
			<tr>
				<td align="right" class="padd"><input name="Cancel" type="button"
					class="compemailsv" id="round" value="Cancel"></td>
				<td align="right" class="padd"><input name="Submit" type="submit"
					class="compemailsv" id="round" value="Submit"></td>
			</tr>


		</table>
	</form>
	
	<?php
	} else if ($_GET ['fvalue'] == 'cr' && $_GET ['lvalue'] == 'rest') {
		
		?>
			<tr>
		<td class="padd_leftelements"><input name="cre"
			onclick="redirect('cr','cre')" type="button" id="roundcre"
			value="Credits">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="re"
			onclick="redirect('cr','re')" type="button" id="roundre"
			value="Referrals">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="rest"
			onclick="redirect('cr','rest')" type="button" id="roundrest"
			value="Referral Status">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<div
		style="position: absolute; right: 15%; top: 37%; font-size: x-small;">
		<a href="vendor.php?fvalue=cr&lvalue=cre"><img
			src="../images/back_icon.png" alt="Back" width="40" height="40" /><br>
			Back to Credits<br>& Referrals</a>
	</div>
	<div
		style="position: absolute; top: 53%; left: 39%; font-size: x-large; font-weight: bold;">
		Type : &nbsp;&nbsp;&nbsp;&nbsp;<select><option>Institution</option>
			<option>Vendor</option></select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		Status : &nbsp;&nbsp;&nbsp;&nbsp;<select><option>Open</option>
			<option>Closed</option></select>
	</div>
	<table class="rest">
		<tr>
			<th class="svth">Date</th>
			<th class="svth">Reference<br> No.
			</th>
			<th class="svth">Type</th>
			<th class="svth">Status</th>
			<th class="svth">Remarks</th>
			<th class="svth">Potential Points<br>(can be earned)
			</th>
			<th class="svth">Credit Points<br>Status
			</th>
		</tr>
		<tr>
			<td class="svtd">39/06/2015</td>
			<td class="svtd">100</td>
			<td class="svtd">Institution</td>
			<td class="svtd">Closed</td>
			<td class="svtd"></td>
			<td class="svtd">2000</td>
			<td class="svtd">Credited</td>
		</tr>
		<tr>
			<td class="svtd">20/06/2015</td>
			<td class="svtd">1020</td>
			<td class="svtd">Institution</td>
			<td class="svtd">Open</td>
			<td class="svtd">Pending first Usage</td>
			<td class="svtd">3000</td>
			<td class="svtd">Pending</td>
		</tr>

	</table>
	<?php
	}
	if ($_GET ['fvalue'] == 'logout') {
		session_destroy ();
		header ( 'Location: ../homepage.php' );
	} else if ($_GET ['fvalue'] == 'mp' && $_GET ['lvalue'] == "nxt") {
		$uname = $_POST ['u_name'];
		$upass = $_POST ['u_pass'];
		$check = mysql_query ( "SELECT * FROM v_registrant WHERE username='$uname' AND password='$upass'" );
		$num_rows = mysql_num_rows ( $check );
		if ($num_rows > 0) {
			?>
			<tr>
		<td class="padd_leftelements"><input name="ci"
			onclick="redirect('mp','ci')" type="button" id="roundci"
			value="Company &#10 Info">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="pi"
			onclick="redirect('mp','pi')" type="button" id="roundpi"
			value="Product &#10 Info">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="test"
			onclick="redirect('mp','test')" type="button" id="roundtest"
			value="Testimonials">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="doc"
			onclick="redirect('mp','doc')" type="button" id="rounddoc"
			value="Documents &#10 Verify">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="acnt"
			onclick="redirect('mp','acnt')" type="button" id="roundacnt"
			value="Account &#10 Settings">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<form name="chngsettings" action="vendor.php?fvalue=mp&lvalue=chngd"
		method="post" onsubmit="return chng_validate()">
		<table style="position: absolute; top: 60%; left: 35%;">
			<tr>
				<td class="padd"><label class="lbl">Enter New Password</label></td>
				<td class="padd"><input type="password" name="u_newpass"
					id="u_newpass" class="txt1" size="22"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Confirm New Password</label></td>
				<td class="padd"><input type="password" name="u_confpass"
					id="u_confpass" class="txt1" size="22"></td>
			</tr>
			<tr>
				<td class="padd"></td>
				<td align="right" class="padd"><input name="submit" type="submit"
					class="compemailsv" id="round" value="Done"></td>
				</button>
				</td>
			</tr>
		</table>
	</form>
				<?php
		} else {
			echo "<script>alert('Username/Password is incorrect!');
				window.location.href=\"vendor.php?fvalue=mp&lvalue=acnt\"</script>";
		}
	} else if ($_GET ['fvalue'] == 'mp' && $_GET ['lvalue'] == "chngd") {
		$pass = $_POST ['u_newpass'];
		$uvname = $_SESSION ['vusername'];
		$passw = mysql_query ( "UPDATE v_registrant SET password='$pass' WHERE username='$uvname'" );
		if ($passw) {
			echo "<script>alert('password changed successfully! ');
				window.location.href=\"vendor.php?fvalue=mp&lvalue=acnt\"</script>";
		}
	}
	
	?>
		<?php
} else {
	echo '<script>alert("Please Signin!");window.location.href="../homepage.php";</script>';
}
?>
</body>