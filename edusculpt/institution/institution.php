<!-- This is the page that is displayed after signing in and it includes all the menu buttons and their actions -->

<html>
<?php
//These are to start session.
session_start ();
ob_start ();
?>
<head>
<title>Find Suppliers</title>
<!-- To set icon in the browser tab -->
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../images/favicon.ico"
	type="image/x-icon" />
<!-- To set icon in the browser tab -->
<script type="text/javascript" src="myprof_update.js"></script>
<script type="text/javascript">
function finalise(name,categ) {
	//Used to finalize shortlisted vendor
	var confi=confirm('Are you sure you want to finalise vendor?');
	if(confi==true){
		window.location.href="institution.php?fvalue=sv&finalise="+name+"&categ="+categ;
	
		}
	return false;
}
</script>
<script type="text/javascript">
function eliminate(name,categ){
	//Used to eliminate shortlisted vendor
	var confi=confirm('Are you sure you want to eliminate vendor?');
	if(confi==true){
		window.location.href="institution.php?fvalue=sv&eliminate="+name+"&categ="+categ;
	
		}
	return false;
}
</script>
<script type="text/javascript">
function eliminatedchk(reason){
	//Function on eliminating a vendor from shortlisted vendors section. Recursive until a reason is entered
	if (reason=='') {
		reason=prompt("Please enter a reason for elimination.", "");
		eliminatedchk(reason);
	} else if(reason==null)
		{
		window.location.href="institution.php?fvalue=sv";
		
		}
	else{
		window.location.href="institution.php?fvalue=sv&reason="+reason;
		}
	//eliminatedchk(reason);
	}		
</script>
<script type="text/javascript">
function namepopup(){
	//Edit details confirmation from MyProfile Page
	$confirm=confirm('Are you sure you want to edit principal name?');
	if($confirm==true){
	document.getElementById("principal_name").value =null;
	document.getElementById("principal_name").readOnly=false;
	document.getElementById("principal_name").setAttribute("class", "txt1");
	}
}
</script>
<script type="text/javascript">
function mobilepopup(){
	//Edit details confirmation from MyProfile Page
	$confirm=confirm('Are you sure you want to edit principal mobile?');
	if($confirm==true){
	document.getElementById("principal_mobile").value =null;
	document.getElementById("principal_mobile").readOnly=false;
	document.getElementById("principal_mobile").setAttribute("class", "txt1");
	}
}
</script>
<script type="text/javascript">
function emailpopup(){
	//Edit details confirmation from MyProfile Page
	$confirm=confirm('Are you sure you want to edit principal email-ID?');
	if($confirm==true){
	document.getElementById("principal_email").value =null;
	document.getElementById("principal_email").readOnly=false;
	document.getElementById("principal_email").setAttribute("class", "txt1");
	}
	}
</script>
<script type="text/javascript">
function onamepopup(){
	//Edit details confirmation from MyProfile Page
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
	//Edit details confirmation from MyProfile Page
	$confirm=confirm('Are you sure you want to edit Owner mobile number?');
	if($confirm==true){
	document.getElementById("own_mobile").value =null;
	document.getElementById("own_mobile").readOnly=false;
	document.getElementById("own_mobile").setAttribute("class", "txt1");
	}
	}
</script>
<script type="text/javascript">
function acnt_validate(){
	//used for account settings validation
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
	//used for account settings in myprofile section
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
function oemailpopup(){
	//Edit details confirmation from MyProfile Page
	$confirm=confirm('Are you sure you want to edit Owner email-ID?');
	if($confirm==true){
	document.getElementById("own_email").value =null;
	document.getElementById("own_email").readOnly=false;
	document.getElementById("own_email").setAttribute("class", "txt1");
	}
	}
</script>
<script type="text/javascript">
function comps(){
	//Function for "compare" function in shortlisted vendors section.
	var chk_arr =  document.getElementsByName("compare[]");
	var chklength = chk_arr.length;  
	var val=new Array();
	var m=0;           
	for(k=0;k< chklength;k++)
	{
		 if(chk_arr[k].checked == true){
			  val[m]=chk_arr[k].value;
			 m++;
			
				    }
	    
	}
	var len=val.length;
	if(len<2){
		alert('Select more vendors to compare!');
		}
	else{
	var url="compare.php?len="+len+"&";
	
	for(j=0;j<len-1;j++){
		url=url+"ven"+j+"="+val[j]+"&";
		}
	url=url+"ven"+j+"="+val[j];
	window.location.href=url;
	}
}
</script>
<script type="text/javascript">
function email(){
	//Function for "Mail Details" function
	var email_arr=document.getElementsByName("email[]");
	var emaillength=email_arr.length;  
	var val=new Array(); 
	var m=0;
	for(k=0;k< emaillength;k++)
	{
		 if(email_arr[k].checked == true){
			 
			  val[m]=email_arr[k].value;
			  m++;
			
		}
	    
	}
	var len=val.length;
	
	if(len<1){
		alert('select atleast one vendor to email!');
		}
	else{
		var url="institution.php?fvalue=len&len="+len+"&";
		
		for(j=0;j<len-1;j++){
			url=url+"ven"+j+"="+val[j]+"&";
			}
		url=url+"ven"+j+"="+val[j];
		window.location.href=url;
		}
}
</script>
<style type="text/css">
.one {
	width: 300px;
	height: 60px;
	background: gold;
	text-align: center;
	margin-left: auto;
	margin-right: auto;
}

.padd {
	padding: 6px;
}

.pos {
	position: absolute;
	left: 10%;
	top: 35%;
}

select {
	border: gold solid 3px;
	font-size: large;
	font-weight: bold;
}

.txt {
	width: 100px;
	border: 3px solid gold;
	font-size: large;
	border: 3px solid gold;
}


/* White id is used to set the selected tab as white background */
#white {
	background: white;
	width: 150px;
	height: 70px;
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

.seach {
	font-size: 12px;
	font-weight: bolder;
	background: #a9a9a9;
	height: 30px;
	width: 100px;
	background: #999999;
	border-bottom: solid 7px #aaaaaa;
	border-right: solid 7px #888888;
	border-top: solid 7px #cccccc;
	border-left: solid 7px #eeeeee;
	border-style: ridge;
}

.seach:hover {
	background: #76787a;
}

.butt {
	width: 170px;
	height: 60px;
	background-color: gold;
}

.welcome {
	position: absolute;
	right: 5%;
	top: 3px;
	color: blue;
}

.padd_bot {
	padding-bottom: 20px;
}

.padd_leftelements {
	padding-top: 20px;
}

.svth {
	background-color: #063;
	border: 3px solid gold;
	padding: 6px;
	color: #fff;
	width: 50px;
}

.svtd {
	border: 3px solid gold;
	padding: 6px;
}

.sv {
	border-collapse: collapse;
	position: absolute;
	top: 52%;
	left: 11%;
}

.cr {
	border-collapse: collapse;
	position: absolute;
	top: 53%;
	left: 25%;
}

.rest {
	border-collapse: collapse;
	position: absolute;
	top: 63%;
	left: 25%;
}

.reqtables {
	border-collapse: collapse;
	position: absolute;
	top: 68%;
	left: 25%;
}

.lbl {
	font-size: large;
	font-family: sans-serif;
	font-weight: 500;
}

.tipssv {
	width: 100px;
	height: 50px;
	background: gold;
	font-weight: bold;
	position: absolute;
	right: 10%;
	top: 50%;
}

.reqsv {
	width: 100px;
	height: 50px;
	background: gold;
	font-weight: bold;
	position: absolute;
	right: 10%;
	top: 60%;
}

.chatsv {
	width: 100px;
	height: 50px;
	background: gold;
	font-weight: bold;
	position: absolute;
	right: 10%;
	top: 70%;
}

.reqsvrh {
	width: 100px;
	height: 50px;
	background: gold;
	font-weight: bold;
	position: absolute;
	right: 5%;
	top: 50%;
}

.chatsvrh {
	width: 100px;
	height: 50px;
	background: gold;
	font-weight: bold;
	position: absolute;
	right: 5%;
	top: 100%;
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

.txt1 {
	border: 3px solid gold;
	font-size: large;
	font-family: serif;
	width: 200px;
}

.backth {
	position: absolute;
	top: 20%;
	right: 10%;
}

.disable {
	border: 3px solid gold;
	font-size: large;
	font-family: serif;
	width: 200px;
	background-color: #ddd;
}
</style>
<link rel="stylesheet" type="text/css" href="round2.css"><!-- Used for all menu and sub menu styles -->
<script type="text/javascript">
function reload(){
	//Logout Confirmation
	document.getElementById('select').selectedIndex=0; 
	$confirm=confirm('Confirm logout?');
	if($confirm==true){
	     
	 window.location.href="institution.php?fvalue=logout";
	}
	}
</script>
<script type="text/javascript">
function selectfunc(){
	//Used for logout option display in "Welcome" section
	log=document.getElementById('logout1');
	if(log.style.visibility== "visible")
		log.style.visibility= "hidden";
	else if(log.style.visibility== "hidden")
		log.style.visibility= "visible";
}
</script>
<script type="text/javascript">
function redirect(status,status1){
	//Used for redirecting between different tabs in the institution portal
	if(status1==null){
		window.location.href="institution.php?fvalue="+status;
		}
	else {
	window.location.href="institution.php?fvalue="+status +"&lvalue="+status1;
	}
}
</script>
<script type="text/javascript">
function colorset(){
	//to change selected menu tab button background from green to white
	var url=window.location.href;
	var stat=url.split("=");
	var status=stat[1].split("&");
	if(status=='fs')
	{
		document.getElementById("homepageicon").style.visibility = "hidden";
	}
	document.getElementById('round'+status[0]).id='white';
	document.getElementById('round'+stat[2]).id='white';
}
</script>
<script type="text/javascript">
function forminstdisp() {
	//Used to display required form for referring in Credits and Referrals section
	document.getElementById('vendform').style.visibility='hidden';
	document.getElementById('instform').style.visibility='visible';
	document.getElementById('instform').style.position='absolute';
	document.getElementById('instform').style.top='60%';
	document.getElementById('instform').style.left='40%';
}</script>
<script type="text/javascript">
function formvenddisp() {
	//Used to display required form for referring in Credits and Referrals section
	document.getElementById('instform').style.visibility='hidden';
	document.getElementById('vendform').style.visibility='visible';
	document.getElementById('vendform').style.position='absolute';
	document.getElementById('vendform').style.top='60%';
	document.getElementById('vendform').style.left='40%';
}</script>
<script type="text/javascript">
function searchvalidate() {
	//Validation for find suppliers to atleast select the category
	var categ = document.forms["searched"]["category"].value;
	var regn = document.forms["searched"]["region"].value;
	if (categ == null || categ == "") {
		alert("Category must be selected!");
		return false;	
	} 
//	else if (regn == null || regn == "") {
// 		alert("Region must be selected!");
// 		return false;
// 	}
else {
		return true;
	}
}</script>
</head>

<body onload="colorset()" background="">


<?php  if(isset($_SESSION ['iusername'])){
//To check if the user has not signedin properly or session expires?>
	<img src="../images/edulogo.png" alt="edusculpt_logo"
		style="display: block; margin-left: auto; margin-right: auto; width: 150px; height: 70px;" />
	<div class="caption"
		style="text-align: center; font-size: small; font-family: cursive;">Fast
		and Secure decision making!</div>
	<div class="welcome" align="right">
		<!-- Welcome User Section --><div onclick="selectfunc();" id="select"
			style="border: 0px; color: blue; font-weight: normal; font-size: medium; font-family: serif; cursor: pointer;">Welcome <?php
	
	include '../config.php';//To Connect Database
	$con = mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	
	$usrname = $_SESSION ['iusername'];
	
	$result = mysql_query ( "SELECT * FROM i_registrant WHERE username='$usrname' ;" );
	if (! $result) {
		echo "ERROR";
	}
	while ( $row = mysql_fetch_array ( $result ) ) {
		$name = $row ["r_name"];
		$iname = $row ["i_name"];
		$emailid = $row ["r_email"];
		$imob = $row ["r_mob"];
	}
	$_SESSION ['irname'] = $name;
	$_SESSION ['imob'] = $imob;
	$_SESSION ['insname'] = $iname;
	$_SESSION ['emailid'] = $emailid;
	$_SESSION ['imob'] = $imob;
	$str = $name . " (" . $iname . ")";
	$len = strlen ( $str );
	if ($len > 50) {
		$str = $str = $name . "<br>(" . $iname . ")";
	}
	echo $str;//Display the Username
	?>&nbsp;&nbsp;&#x25BE;</div>
		<div id="logout1" onclick="reload();" align="left"
			style="border: blue 1px solid; cursor: pointer; padding-left: 5px; width: 83%; visibility: hidden;">
			Logout</div>
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

	<!-- Below table is used to display top menu buttons -->
	<table class="pos" id="tabs">
		<tr class="padd_bot">
			<td class="padd"><input type="button" name="fs"
				onclick="redirect('fs')" id="roundfs" value="Find &#10 Suppliers">&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
			<td class="padd"><input name="sv" onclick="redirect('sv')"
				type="button" id="roundsv" value="Shortlisted &#10 Vendors">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td class="padd"><input name="cr" onclick="redirect('cr','cre')"
				type="button" id="roundcr" value="Credits & &#10 Referrals">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td class="padd"><input name="th" onclick="redirect('th','rh')"
				type="button" id="roundth" value="Transaction &#10 History">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td class="padd"><input name="mp" onclick="redirect('mp','cd')"
				type="button" id="roundmp" value="My &#10 Profile "></td>
			<td class="padd" align="right"><div id="homepageicon"
					style="visibility: visible;">
					<a href="institution.php?fvalue=fs"><img alt="Click for Home Page"
						src="../images/home_icon.png" height="40" width="40">
						<div class="caption" style="font-size: x-small;">Home Page</div></a>
				</div></td>
		</tr>
		<?php
		
	//below code works if find suppliers menu is selected	
	if ($_GET ['fvalue'] == 'fs') {
		//Fetch all categories and regions from database that is entered by admin
		$resul1 = mysql_query ( "SELECT * FROM region" );
		$resul2 = mysql_query ( "SELECT * FROM category" );
		?>
			<form action="searchedvendor.php" name="searched" method="get" onsubmit="return searchvalidate()" ><!-- Find suppliers form -->
			<tr>
				<td colspan="2" align="center" style="padding-top: 40px;"><b
					style="font-size: 15pt; font-family: calibri;">Region</b></td>
				<td colspan="2" align="center" style="padding-top: 40px;"><b
					style="font-size: 15pt; font-family: calibri;">Category</b></td>
				<td></td>
				<td></td>
			</tr>
			<tr>
				<td class="padd_bot" colspan="6" align="left"><b
					style="font-size: 15pt; font-family: calibri;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select
						name="region" style="width: 280px;"><option value='Ariyalur' selected >Please Choose Your City</option>
					<?php
		while ( $row = mysql_fetch_array ( $resul1 ) ) {
			?>
				<option value='<?php echo $row['region']?>'><?php echo $row['region']?></option>
			<?php
		}
		?>
			
	</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b
						style="font-size: 15pt; font-family: calibri;"> <select
							name="category" style="width: 350px"><option value='' disabled selected hidden>Please Choose Category</option>
							<?php
		while ( $row = mysql_fetch_array ( $resul2 ) ) {
			?>			
				<option value='<?php echo $row['categ']?>'><?php echo $row['categ']?></option>				
			<?php
		}
		?>
				</select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span colspan="1"
							class="padd_bot" align="center" valign="bottom">&nbsp;&nbsp;&nbsp;&nbsp;<input
								class="seach" type="submit" value="Search"></span></b></b></td>
				<td class="padd_bot" colspan="1" align="center"
					style="visibility: hidden;"><b style="font-size: 15pt">Specific <br>Vendor
						Name
				</b><br> <br> <input type="text" placeholder="Optional"
					name="vendor_name" class="txt"
					style="visibility: hidden; width: 10px;"></td>
			</tr>
		</form>
		<tr>
			<td><br></td>
		</tr>
		<tr>
			<td class="padd_bot" colspan="2" align="center"><a
				href="institutionpool.php"><button class="butt" value="best_deals">
						<font size="large"><b>Best Deals-!!! Check <br>Requirement Pool
						</b></font>
					</button></a>
			
			<td class="padd_bot" colspan="1" align="center"><a
				href="institutionreq.php">
					<button class="butt" value="provide_req"
						onclick="location.href='institutionreq.php';">
						<font size="large"><b>Provide your <br>Requirements
						</b></font>
					</button>
			</a>
			
			<td class="padd_bot" colspan="2" align="center"><a href="tips.php"
				target="_blank">
					<button class="butt" value="tips_to_decide">
						<font size="large"><b>Tips to Decide!</b></font>
					</button>
			</a></td>
		</tr>
		<!-- 		<tr> -->

		<!-- 			<td colspan="7" align="right" class="padd_bot"><img -->
		<!-- 				alt="Chat Support" src="../images/chat_support.png"></td> -->
		<!-- 		</tr> -->


	</table>
	
			<?php
			//below code works if Shortlisted Vendors menu is selected
	} else if ($_GET ['fvalue'] == 'sv') {
		
		?>
			</table>
	<table class="sv" align="center">
		<tr align="center">
			<th class="svth">Date</th>
			<th class="svth">Category</th>
			<th class="svth">Vendor <br>Name
			</th>
			<th class="svth">Select to Compare</th>
			<th class="svth">Select&nbsp;to Email</th>
			<th class="svth">Eliminate <br> Vendor
			</th>
			<th class="svth">Track <br>Vendor
			</th>
			<th class="svth">Finalise <br>Vendor
			</th>
		</tr>
		<?php
		$usrname = $_SESSION ['iusername'];
		$svendor = mysql_query ( "SELECT * FROM shortlisted WHERE username='$usrname' " );//Fetch shorlisted vendors
		while ( $row = mysql_fetch_array ( $svendor ) ) {
			?>
		<tr>
			<td class="svtd" align="center"><?php echo $row["date"]?></td>
			<td class="svtd" align="center"><?php echo $row["category"]?></td>
			<td class="svtd" align="center"><?php echo $row["vendor"]?></td>
			<td class="svtd" align="center"><input type="checkbox"
				style="width: 20px; height: 20px; cursor: pointer;"
				checked="checked" name="compare[]" id="compare"
				value=<?php echo $row["vendor"]?>></td>
			<td class="svtd" align="center"><input type="checkbox"
				style="width: 20px; height: 20px; cursor: pointer;"
				checked="checked" name="email[]" id="email"
				value=<?php echo $row["vendor"]?>></td>
			<td class="svtd" align="center"><a href=""
				onclick="return eliminate('<?php echo $row["vendor"]?>','<?php echo $row["category"]?>')"><img
					alt="Eliminate" src="../images/cancel.png" width="20px"
					height="20px"></a></td>
			<td class="svtd" align="center"><a href="">Click Here</a></td>
			<td class="svtd"><button class="redeemcr"
					onclick="return finalise('<?php echo $row["vendor"]?>','<?php echo $row["category"]?>')">Finalise</button></td>
		</tr>
		<?php }?>
		<tr>
			<td colspan="4" align="right" class="padd_bot"><button
					class="compemailsv" onclick="comps()" disabled="disabled">Compare</button></td>

			<td colspan="3" align="left" class="padd_bot">
				<button class="compemailsv" onclick="email()">Email Details</button>
			</td>
		</tr>
	</table>

	<a href="tips.php" target="_blank"><button class="tipssv">Tips to
			Decide!</button></a>
	<button class="reqsv" onclick="location.href='institutionreq.php';">
		Provide Your <br> Requirements
	</button>
	<button class="chatsv">Chat Support</button>
	<?php
		//if eliminate button is clicked	
		if (isset ( $_GET ['eliminate'] )) {
			$vendname = $_GET ['eliminate'];
			$cat = $_GET ['categ'];
			$_SESSION ['$vname'] = $vendname;
			$_SESSION ['$cat'] = $cat;
			?>
			<script type="text/javascript">
			var vend='<?php echo $vendname;?>';
			var reason=prompt(vend+" has been dropped from your shortlist.\n Any reasons?","");
			reaso=eliminatedchk(reason);
			</script>
			
			<?php
		}
		
		
		if (isset ( $_GET ['reason'] )) {
			//Eliminating vendor reason to be added tto SQLDB
			$venname = $_SESSION ['$vname'];
			$usname = $_SESSION ['iusername'];
			$cat = $_SESSION ['$cat'];
			$del = mysql_query ( "DELETE FROM shortlisted WHERE vendor='$venname' AND username='$usname' AND category='$cat' " );
			
			$name = $_SESSION ['irname'];
			$iname = $_SESSION ['insname'];
			$imobi = $_SESSION ['imob'];
			$reason = $_GET ['reason'];
			/**Fetch current date and time*/
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
			/**Fetch current date and time*/
			$query = mysql_query ( "SELECT * FROM v_registrant WHERE edu_vname='$venname'" );
			while ( $row = mysql_fetch_array ( $query ) ) {
				$cname = $row ["c_name"];
			}
			
			$eliminate = mysql_query ( "INSERT INTO eliminate VALUES('$iname','$cname','$reason','$name','$imobi','$date','$time','$venname')" );
			?>
			<script type="text/javascript">
			window.location.href="institution.php?fvalue=sv";
			</script>
		<?php
		}
		
		//if finalized a vendor
		if (isset ( $_GET ['finalise'] )) {
			$v_name = $_GET ['finalise'];
			$catego = $_GET ['categ'];
			$userrname = $_SESSION ['iusername'];
			/**Fetch current date and time*/
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
			} else {
				$time = $hour . ':' . $min . ' AM';
			}
			$date = $day . '/' . $month . '/' . $year;
			/**Fetch current date and time*/
			$sent = 0;
			$sentdetails = mysql_query ( "SELECT * FROM email WHERE iusername='$userrname' AND edu_vname='$v_name'" );
			while ( $row = mysql_fetch_array ( $sentdetails ) ) {
				$sent = $row ["sent"];
			}
			if ($sent == 1) {			//Works only if vendors details have been mailed
				$finalise = mysql_query ( "INSERT INTO finalise VALUES('$v_name','$catego','$userrname','$date')" );
				$finnalise1 = mysql_query ( "DELETE FROM shortlisted WHERE username='$userrname' AND category='$catego'" );
			} else {
				echo "<script>alert('Please get the vendor Details by selecting Email details button  before finalising the vendor!')</script>";
			}
			?>
		<script type="text/javascript">
			window.location.href="institution.php?fvalue=sv";
			</script>
	<?php
		}
	} else if ($_GET ['fvalue'] == 'cr' && $_GET ['lvalue'] == 'cre') {
		//below code works if Credits and Refferals and Credits menu is selected
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
		//below code works if Credits and Refferals and refferals menu is selected
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
		<a href="institution.php?fvalue=cr&lvalue=cre"><img
			src="../images/back_icon.png" alt="Back" width="40" height="40" /><br>
			Back to Credits<br>& Referrals</a>
	</div>
	<div
		style="position: absolute; top: 53%; left: 35%; font-size: x-large; font-weight: bold;">
		Refer :
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
			type="radio" value="1" name="referral" onclick="forminstdisp()">Institution
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" value="2"
			name="referral" onclick="formvenddisp()"> Vendor
	</div>
	<form id="instform" action="" method="post" style="visibility: hidden;"><!-- Refer Institution Form -->
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
				<td align="right" class="padd"><input name="submit" type="submit"
					class="compemailsv" id="round" value="Submit"></td>
			</tr>

		</table>
	</form>
	<form id="vendform" action="" method="post" style="visibility: hidden;"><!-- Refer Vendor Form -->
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
				<td align="right" class="padd"><input name="submit" type="submit"
					class="compemailsv" id="round" value="Submit"></td>
			</tr>


		</table>
	</form>
	
	<?php
	} else if ($_GET ['fvalue'] == 'cr' && $_GET ['lvalue'] == 'rest') {
		//below code works if Credits and Refferals and Refferal status menu is selected
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
		<a href="institution.php?fvalue=cr&lvalue=cre"><img
			src="../images/back_icon.png" alt="Back" width="40" height="40" /><br>
			Back to Credits<br>& Referrals</a>
	</div>
	<div
		style="position: absolute; top: 53%; left: 29%; font-size: x-large; font-weight: bold;">
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
	} else if ($_GET ['fvalue'] == 'th' && $_GET ['lvalue'] == 'rh') {
		//below code works if Transaction History and Requirement History menu is selected
		?>
		<tr>
		<td class="padd_leftelements"><input name="rh"
			onclick="redirect('th','rh')" type="button" id="roundrh"
			value="Requirement &#10 History">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="or"
			onclick="redirect('th','or')" type="button" id="roundor"
			value="Open &#10 Requirements">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="onr"
			onclick="redirect('th','onr')" type="button" id="roundonr"
			value="On-Going &#10Projects">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="cp"
			onclick="redirect('th','cp')" type="button" id="roundcp"
			value="Completed &#10Projects">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="mv"
			onclick="redirect('th','mv')" type="button" id="roundmv"
			value="My &#10Vendors">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<div
		style="position: absolute; top: 53%; left: 39%; font-size: x-large; font-weight: bold;">
		Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From
		Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To
		Date</div>
	<div
		style="position: absolute; top: 58%; left: 39%; font-size: x-large; font-weight: bold;">
		<select><option>ERP</option>
			<option>Laptop</option></select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="date" name="date" id="date" size="30" class="txt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="date" name="date1" id="date1" size="30" class="txt">
	</div>

	<table class="reqtables">
		<tr>
			<th class="svth">Requirement<br>Number
			</th>
			<th class="svth">Requirement<br>Description
			</th>
			<th class="svth">Requirement<br>Date
			</th>
			<th class="svth">Category</th>
			<th class="svth">Budget<br>/Expenditure
			</th>
			<th class="svth">Vendor<br>Details
			</th>
			<th class="svth">Status</th>
			<th class="svth">Entire<br>Details
			</th>
		</tr>
		<tr>
			<td class="svtd">100RQ1</td>
			<td class="svtd">Automatic Coll</td>
			<td class="svtd">39/06/2015</td>
			<td class="svtd">ERP</td>
			<td class="svtd">10000000</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd">Closed</td>
			<td class="svtd"><a href="">Click Here</a></td>

		</tr>
		<tr>
			<td class="svtd">100RQ2</td>
			<td class="svtd">Automatic Coll</td>
			<td class="svtd">29/06/2015</td>
			<td class="svtd">ERP</td>
			<td class="svtd">10000</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd">Open</td>
			<td class="svtd"><a href="">Click Here</a></td>

		</tr>
	</table>
	<button class="reqsvrh" onclick="location.href='institutionreq.php';">
		Provide Your <br> Requirements
	</button>
	<button class="chatsvrh">Chat Support</button>
	<?php
	} else if ($_GET ['fvalue'] == 'th' && $_GET ['lvalue'] == 'or') {
		//below code works if Transaction History and Open Requirements menu is selected
		?>
		<tr>
		<td class="padd_leftelements"><input name="rh"
			onclick="redirect('th','rh')" type="button" id="roundrh"
			value="Requirement &#10 History">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="or"
			onclick="redirect('th','or')" type="button" id="roundor"
			value="Open &#10 Requirement">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="onr"
			onclick="redirect('th','onr')" type="button" id="roundonr"
			value="On-Going &#10Projects">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="cp"
			onclick="redirect('th','cp')" type="button" id="roundcp"
			value="Completed &#10Projects">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="mv"
			onclick="redirect('th','mv')" type="button" id="roundmv"
			value="My &#10Vendors">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<button class="reqsvrh" onclick="location.href='institutionreq.php';">
		Provide Your <br> Requirements
	</button>
	<button class="chatsvrh">Chat Support</button>
	<div
		style="position: absolute; right: 13%; top: 37%; font-size: x-small;">
		<a href="institution.php?fvalue=th&lvalue=rh"><img
			src="../images/back_icon.png" alt="Back" width="40" height="40" /><br>
			Back to Requirement<br>History</a>
	</div>
	<div
		style="position: absolute; top: 53%; left: 39%; font-size: x-large; font-weight: bold;">
		Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From
		Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To
		Date</div>
	<div
		style="position: absolute; top: 58%; left: 39%; font-size: x-large; font-weight: bold;">
		<select><option>ERP</option>
			<option>Laptop</option></select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="date" name="date" id="date" size="30" class="txt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="date" name="date1" id="date1" size="30" class="txt">
	</div>

	<table class="reqtables">
		<tr>
			<th class="svth">Requirement<br>Number
			</th>
			<th class="svth">Requirement<br>Description
			</th>
			<th class="svth">Requirement<br>Date
			</th>
			<th class="svth">Category</th>
			<th class="svth">Vendor<br>/Name
			</th>
			<th class="svth">Vendor<br>Details
			</th>
			<th class="svth">Current<br>Status
			</th>
			<th class="svth">Next Step<br>& Date
			</th>
			<th class="svth">Track<br>Status
			</th>
			<th class="svth">Finalise<br>Vendor
			</th>
			<th class="svth">Eliminate<br>Vendor
			</th>
		</tr>
		<tr>
			<td class="svtd">100RQ1</td>
			<td class="svtd">Automatic Coll</td>
			<td class="svtd">39/06/2015</td>
			<td class="svtd">ERP</td>
			<td class="svtd">Google</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd">Closed</td>
			<td class="svtd">Status Waiting</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd"><a href=""><img alt="Finalise"
					src="../images/tick.png" width="20px" height="20px"></a></td>
			<td class="svtd"><a href=""><img alt="Finalise"
					src="../images/cancel.png" width="20px" height="20px"></a></td>

		</tr>
		<tr>
			<td class="svtd">100RQ2</td>
			<td class="svtd">Automatic Coll</td>
			<td class="svtd">29/06/2015</td>
			<td class="svtd">ERP</td>
			<td class="svtd">Yahoo</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd">Open</td>
			<td class="svtd">Status Waiting</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd"><a href=""><img alt="Finalise"
					src="../images/tick.png" width="20px" height="20px"></a></td>
			<td class="svtd"><a href=""><img alt="Eliminate"
					src="../images/cancel.png" width="20px" height="20px"></a></td>

		</tr>
	</table>
	
	<?php
	} else if ($_GET ['fvalue'] == 'th' && $_GET ['lvalue'] == 'onr') {
		//below code works if Transaction History and On-going Projects menu is selected
		?>
		<tr>
		<td class="padd_leftelements"><input name="rh"
			onclick="redirect('th','rh')" type="button" id="roundrh"
			value="Requirement &#10 History">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="or"
			onclick="redirect('th','or')" type="button" id="roundor"
			value="Open &#10 Requirement">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="onr"
			onclick="redirect('th','onr')" type="button" id="roundonr"
			value="On-Going &#10Projects">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="cp"
			onclick="redirect('th','cp')" type="button" id="roundcp"
			value="Completed &#10Projects">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="mv"
			onclick="redirect('th','mv')" type="button" id="roundmv"
			value="My &#10Vendors">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<button class="reqsvrh" onclick="location.href='institutionreq.php';">
		Provide Your <br> Requirements
	</button>
	<button class="chatsvrh">Chat Support</button>
	<div
		style="position: absolute; right: 13%; top: 37%; font-size: x-small;">
		<a href="institution.php?fvalue=th&lvalue=rh"><img
			src="../images/back_icon.png" alt="Back" width="40" height="40" /><br>
			Back to Requirement<br>History</a>
	</div>
	<div
		style="position: absolute; top: 53%; left: 39%; font-size: x-large; font-weight: bold;">
		Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From
		Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To
		Date</div>
	<div
		style="position: absolute; top: 58%; left: 39%; font-size: x-large; font-weight: bold;">
		<select><option>ERP</option>
			<option>Laptop</option></select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="date" name="date" id="date" size="30" class="txt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="date" name="date1" id="date1" size="30" class="txt">
	</div>

	<table class="reqtables">
		<tr>
			<th class="svth">Requirement<br>Number
			</th>
			<th class="svth">Requirement<br>Description
			</th>
			<th class="svth">Category</th>
			<th class="svth">Vendor<br>/Name
			</th>
			<th class="svth">Vendor<br>Details
			</th>
			<th class="svth">Project<br>Start Date
			</th>
			<th class="svth">Next Payment<br>Date
			</th>
			<th class="svth">Payment<br>Schedule
			</th>
			<th class="svth">Report<br>Issue
			</th>
		</tr>
		<tr>
			<td class="svtd">100RQ1</td>
			<td class="svtd">Automatic Coll</td>
			<td class="svtd">ERP</td>
			<td class="svtd">Google</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd">39/06/2015</td>
			<td class="svtd"></td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd"><button class="redeemcr"
					onclick="window.location.href='actions.php?action=Report'">Report</button></td>

		</tr>
		<tr>
			<td class="svtd">100RQ2</td>
			<td class="svtd">Automatic Coll</td>
			<td class="svtd">ERP</td>
			<td class="svtd">Yahoo</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd">29/06/2015</td>
			<td class="svtd"></td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd"><button class="redeemcr"
					onclick="window.location.href='actions.php?action=Report'">Report</button></td>
		</tr>
	</table>
	<?php
	} else if ($_GET ['fvalue'] == 'th' && $_GET ['lvalue'] == 'cp') {
		//below code works if Transaction History and Completed Projects menu is selected
		?>
		<tr>
		<td class="padd_leftelements"><input name="rh"
			onclick="redirect('th','rh')" type="button" id="roundrh"
			value="Requirement &#10 History">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="or"
			onclick="redirect('th','or')" type="button" id="roundor"
			value="Open &#10 Requirement">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="onr"
			onclick="redirect('th','onr')" type="button" id="roundonr"
			value="On-Going &#10Projects">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="cp"
			onclick="redirect('th','cp')" type="button" id="roundcp"
			value="Completed &#10Projects">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="mv"
			onclick="redirect('th','mv')" type="button" id="roundmv"
			value="My &#10Vendors">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<button class="reqsvrh" onclick="location.href='institutionreq.php';">
		Provide Your <br> Requirements
	</button>
	<button class="chatsvrh">Chat Support</button>
	<div
		style="position: absolute; right: 13%; top: 37%; font-size: x-small;">
		<a href="institution.php?fvalue=th&lvalue=rh"><img
			src="../images/back_icon.png" alt="Back" width="40" height="40" /><br>
			Back to Requirement<br>History</a>
	</div>
	<div
		style="position: absolute; top: 53%; left: 39%; font-size: x-large; font-weight: bold;">
		Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From
		Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To
		Date</div>
	<div
		style="position: absolute; top: 58%; left: 39%; font-size: x-large; font-weight: bold;">
		<select><option>ERP</option>
			<option>Laptop</option></select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="date" name="date" id="date" size="30" class="txt">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input
			type="date" name="date1" id="date1" size="30" class="txt">
	</div>

	<table class="reqtables">
		<tr>
			<th class="svth">Requirement<br>Number
			</th>
			<th class="svth">Requirement<br>Description
			</th>
			<th class="svth">Category</th>
			<th class="svth">Vendor<br>/Name
			</th>
			<th class="svth">Project<br>Start Date &<br>End Date
			</th>
			<th class="svth">Project<br>Details
			</th>
			<th class="svth">Feedback</th>
			<th class="svth">Recall<br>Vendor
			</th>
			<th class="svth">Report<br>Issue
			</th>

		</tr>
		<tr>
			<td class="svtd">100RQ1</td>
			<td class="svtd">Automatic Coll</td>
			<td class="svtd">ERP</td>
			<td class="svtd">Google</td>
			<td class="svtd">39/06/2015</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd"><button class="redeemcr"
					onclick="window.location.href='actions.php?action=Feedback'">Feedback</button></td>
			<td class="svtd"><button class="redeemcr"
					onclick="window.location.href='actions.php?action=Recall'">Recall</button></td>
			<td class="svtd"><button class="redeemcr"
					onclick="window.location.href='actions.php?action=Report'">Report</button></td>

		</tr>
		<tr>
			<td class="svtd">100RQ2</td>
			<td class="svtd">Automatic Coll</td>
			<td class="svtd">ERP</td>
			<td class="svtd">Yahoo</td>
			<td class="svtd">29/06/2015</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd"><button class="redeemcr"
					onclick="window.location.href='actions.php?action=Feedback'">Feedback</button></td>
			<td class="svtd"><button class="redeemcr"
					onclick="window.location.href='actions.php?action=Recall'">Recall</button></td>
			<td class="svtd"><button class="redeemcr"
					onclick="window.location.href='actions.php?action=Report'">Report</button></td>
		</tr>
	</table>
	<?php
	} else if ($_GET ['fvalue'] == 'th' && $_GET ['lvalue'] == 'mv') {
		//below code works if Transaction History and My Vendors menu is selected
		?>
		<tr>
		<td class="padd_leftelements"><input name="rh"
			onclick="redirect('th','rh')" type="button" id="roundrh"
			value="Requirement &#10 History">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="or"
			onclick="redirect('th','or')" type="button" id="roundor"
			value="Open &#10 Requirement">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="onr"
			onclick="redirect('th','onr')" type="button" id="roundonr"
			value="On-Going &#10Projects">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="cp"
			onclick="redirect('th','cp')" type="button" id="roundcp"
			value="Completed &#10Projects">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="mv"
			onclick="redirect('th','mv')" type="button" id="roundmv"
			value="My &#10Vendors">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<button class="reqsvrh" onclick="location.href='institutionreq.php';">
		Provide Your <br> Requirements
	</button>
	<button class="chatsvrh">Chat Support</button>
	<div
		style="position: absolute; right: 13%; top: 37%; font-size: x-small;">
		<a href="institution.php?fvalue=th&lvalue=rh"><img
			src="../images/back_icon.png" alt="Back" width="40" height="40" /><br>
			Back to Requirement<br>History</a>
	</div>
	<div
		style="position: absolute; top: 53%; left: 39%; font-size: x-large; font-weight: bold;">
		Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</div>
	<div
		style="position: absolute; top: 58%; left: 39%; font-size: x-large; font-weight: bold;">
		<select><option>ERP</option>
			<option>Laptop</option></select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<select><option>Selected</option>
			<option>Eliminated</option></select>

	</div>

	<table class="reqtables">
		<tr>

			<th class="svth">Vendor<br>/Name
			</th>
			<th class="svth">Category</th>
			<th class="svth">Vendor<br>Details
			</th>
			<th class="svth">Vendor<br>Status
			</th>
			<th class="svth">Requirement<br>Details
			</th>
			<th class="svth">Refer<br>Vendor
			</th>
			<th class="svth">Feedback</th>
			<th class="svth">Recall<br>Vendor
			</th>
			<th class="svth">Report<br>Issue
			</th>

		</tr>
		<tr>
			<td class="svtd">A</td>
			<td class="svtd">ERP</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd">Selected</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd"><button class="redeemcr"
					onclick="window.location.href='actions.php?action=Refer'">Refer</button></td>
			<td class="svtd"><button class="redeemcr"
					onclick="window.location.href='actions.php?action=Feedback'">Feedback</button></td>
			<td class="svtd"><button class="redeemcr"
					onclick="window.location.href='actions.php?action=Recall'">Recall</button></td>
			<td class="svtd"><button class="redeemcr"
					onclick="window.location.href='actions.php?action=Report'">Report</button></td>

		</tr>
		<tr>
			<td class="svtd">B</td>
			<td class="svtd">ERP</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd">Eliminated</td>
			<td class="svtd"><a href="">Click Here</a></td>
			<td class="svtd"><button class="redeemcr"
					onclick="window.location.href='actions.php?action=Refer'">Refer</button></td>
			<td class="svtd"><button class="redeemcr"
					onclick="window.location.href='actions.php?action=Feedback'">Feedback</button></td>
			<td class="svtd"><button class="redeemcr"
					onclick="window.location.href='actions.php?action=Recall'">Recall</button></td>
			<td class="svtd"><button class="redeemcr"
					onclick="window.location.href='actions.php?action=Report'">Report</button></td>
		</tr>
	</table>
	<?php
	} else if ($_GET ['fvalue'] == 'mp' && $_GET ['lvalue'] == 'cd') {
		//below code works if My Profile and College Details menu is selected
		?>
			<tr>
		<td class="padd_leftelements"><input name="cd"
			onclick="redirect('mp','cd')" type="button" id="roundcd"
			value="College&#10Details">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="rd"
			onclick="redirect('mp','rd')" type="button" id="roundrd"
			value="Registrant&#10Details">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="rd"
			onclick="redirect('mp','acnt')" type="button" id="roundacnt"
			value="Account&#10Settings">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<form name="instform" action="institution.php?fvalue=mp&lvalue=cd"
		method="post" onsubmit="return inst_validate()"><!-- MyProfile College Details Pre-Filled Form -->
		<table style="position: absolute; top: 50%; left: 25%;">
			<tr>
				<td class="padd"><label class="lbl">Institution Name</label></td>
				<td class="padd"><input type="text" name="inst_name" id="inst_name"
					class="txt1" size="30" disabled></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Region</label></td>
				<td class="padd"><input type="text" name="region" id="region"
					class="txt1" size="30" disabled></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Address</label></td>
				<td class="padd"><input type="text" name="address" id="address"
					class="txt1" size="30" disabled></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Pincode</label></td>
				<td class="padd"><input type="text" name="pincode" id="pincode"
					class="txt1" size="30" disabled></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Website Link</label></td>
				<td class="padd"><input type="text" name="website_link"
					id="website_link" class="txt1" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Affiliated University</label></td>
				<td class="padd"><input type="text" name="affiliated_university"
					id="affiliated_university" class="txt1" size="30" disabled></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Institution Strength</label></td>
				<td class="padd"><input type="text" name="inst_strength"
					id="inst_strength" class="txt1" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Principal Name</label></td>
				<td class="padd"><input type="text" name="principal_name"
					id="principal_name" class="disable" size="22" readonly></td>&nbsp;&nbsp;
				<td><img src="../images/edit.png" onclick="namepopup();"
					title="Click here to edit principal name" alt="edit" width="20"
					height="20"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Principal Mobile Number</label></td>
				<td class="padd"><input type="text" name="principal_mobile"
					id="principal_mobile" class="disable" size="30" readonly></td>&nbsp;&nbsp;
				<td><img src="../images/edit.png" onclick="mobilepopup();"
					title="Click to edit principal mobile number" alt="edit" width="20"
					height="20"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Principal Email ID</label></td>
				<td class="padd"><input type="text" name="principal_email"
					id="principal_email" class="disable" size="30" readonly></td>&nbsp;&nbsp;
				<td><img src="../images/edit.png" onclick="emailpopup();"
					title="Click here to edit principal email-ID" alt="edit" width="20"
					height="20"></td>
			</tr>
			<tr>
			
			
			<tr>
				<td align="right" class="padd"><input name="Cancel" type="button"
					class="compemailsv" id="round" value="Cancel"></td>
				<td align="right" class="padd"><input name="Sumbit" type="submit"
					class="compemailsv" id="round" value="Submit"></td>
			</tr>
		</table>

	</form>
	<?php
		$con = mysql_connect ( $host, $dbuname, $dbpass );
		if (! $con) {
			die ( 'could not connect: ' . mysql_error () );
		}
		mysql_select_db ( $dbname, $con );
		//Fetch institution College Details
		$myprofile = mysql_query ( "SELECT * FROM institution AS i,i_registrant AS r WHERE r.username='$usrname' AND i.i_name=r.i_name ;" );
		while ( $row = mysql_fetch_array ( $myprofile ) ) {
			$inname = $row ['i_name'];
			$_SESSION ['rmobile'] = $row ["r_mob"];
			$_SESSION ['pmob'] = $row ["pr_mob"];
			
			?>
				
				<script type="text/javascript">
				/*Set all entries in the College My Profile form */
				document.getElementById("inst_name").value ='<?php echo $row['i_name']?>';
				document.getElementById("region").value ='<?php echo $row['region']?>';
				document.getElementById("address").value ='<?php echo $row['address']?>';
				document.getElementById("pincode").value ='<?php echo $row['pin_code']?>';
				document.getElementById("website_link").value ='<?php echo $row['web_link']?>';
				document.getElementById("affiliated_university").value ='<?php echo $row['affil_university']?>';
				document.getElementById("inst_strength").value ='<?php echo $row['strength']?>';
				document.getElementById("principal_name").value ='<?php echo $row['pr_name']?>';
				document.getElementById("principal_mobile").value ='<?php echo $row['pr_mob']?>';
				document.getElementById("principal_email").value ='<?php echo $row['pr_email']?>';
				/*Set all entries in the College My Profile form */
				
	
	</script>
				
					
				<?php
			$_SESSION ['oldpname'] = $row ['pr_name'];
			$_SESSION ['oldpmob'] = $row ['pr_mob'];
			$_SESSION ['oldpemail'] = $row ['pr_email'];
			$reg = $row ['region'];
		}
		if (isset ( $_POST ['inst_strength'] )) {
			//Code for changing college details
			$oldpname = $_SESSION ['oldpname'];
			$oldpmob = $_SESSION ['oldpmob'];
			$oldpemail = $_SESSION ['oldpemail'];
			
			$weblink = $_POST ['website_link'];
			$strength = $_POST ['inst_strength'];
			$pname = $_POST ['principal_name'];
			$pmob = $_POST ['principal_mobile'];
			$email = $_POST ['principal_email'];
			if ($oldpname != $pname) {
				$oldpname = $pname . "(modified)";
			}
			if ($oldpmob != $pmob) {
				$oldpmob = $pmob . "(modified)";
			}
			if ($oldpemail != $email) {
				$oldpemail = $email . "(modified)";
			}
			$pinfo = 1;
			if (($oldpname != $pname) || ($oldpmob != $pmob) || ($oldpemail != $email)) {
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
				} else {
					$time = $hour . ':' . $min . ' AM';
				}
				$date = $day . '/' . $month . '/' . $year;
				$regmobile = $_SESSION ['rmobile'];
				
				$pinfo = mysql_query ( "INSERT INTO principaledit values('$inname','$reg','$name','$oldpname','$oldpmob','$oldpemail','0','$date','$time','$regmobile') " );
			}
			$update = mysql_query ( "UPDATE institution SET web_link='$weblink',strength='$strength' WHERE i_name='$inname'" );
			
			if ($update && $pinfo) {
				?>	
				
							   <script type="text/javascript">
							   alert('Changes saved successfully!\nPlease wait some time for changes to reflect.');
							   window.location.href="institution.php?fvalue=mp&lvalue=cd";
							   </script>
			  <?php
			}
		}
	} else if ($_GET ['fvalue'] == 'mp' && $_GET ['lvalue'] == 'rd') {
		//below code works if My Profile and Registrant Details menu is selected
		
		?>	
	<tr>
		<td class="padd_leftelements"><input name="cd"
			onclick="redirect('mp','cd')" type="button" id="roundcd"
			value="College&#10Details">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="rd"
			onclick="redirect('mp','rd')" type="button" id="roundrd"
			value="Registrant&#10Details">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="acnt"
			onclick="redirect('mp','acnt')" type="button" id="roundacnt"
			value="Account&#10Settings">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<form name="instformcntd" action="" method="post"
		onsubmit="return reg_validate()"><!-- MyProfile Registrant Details Pre-Filled Form -->
		<table style="position: absolute; top: 50%; left: 25%;">

			<tr>
				<td class="padd"><label class="lbl">Registrant Name</label></td>
				<td class="padd"><input type="text" name="reg_name" id="reg_name"
					class="txt1" size="22"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Mobile Number</label></td>
				<td class="padd"><input type="text" name="reg_mobile"
					id="reg_mobile" class="txt1" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Email ID</label></td>
				<td class="padd"><input type="text" name="reg_email" id="reg_email"
					class="txt1" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Designation</label></td>
				<td class="padd"><input type="text" name="reg_designation"
					id="reg_designation" class="txt1" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">ID Card Number</label></td>
				<td class="padd"><input type="text" name="reg_id_no" id="reg_id_no"
					class="txt1" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Owner / Authority Name</label></td>
				<td class="padd"><input type="text" name="own_name" id="own_name"
					class="disable" size="30" readonly></td>&nbsp;&nbsp;
				<td><img src="../images/edit.png" onclick="onamepopup();"
					title="Click here to edit Owner name" alt="edit" width="20"
					height="20"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Owner Mobile Number</label></td>
				<td class="padd"><input type="text" name="own_mobile"
					id="own_mobile" class="disable" size="30" readonly></td>&nbsp;&nbsp;
				<td><img src="../images/edit.png" onclick="omobpopup();"
					title="Click here to edit Owner mobile number" alt="edit"
					width="20" height="20"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Owner Email ID</label></td>
				<td class="padd"><input type="text" name="own_email" id="own_email"
					class="disable" size="30" readonly></td>&nbsp;&nbsp;
				<td><img src="../images/edit.png" onclick="oemailpopup();"
					title="Click here to edit Owner email-ID" alt="edit" width="20"
					height="20"></td>
			</tr>
			<tr>
				<td class="padd" align="left"></td>
				<td align="right" class="padd"><input name="Save" type="submit"
					class="compemailsv" id="round" value="Save"></td>
			</tr>
		</table>
	</form>
	<?php
		$con = mysql_connect ( $host, $dbuname, $dbpass );
		if (! $con) {
			die ( 'could not connect: ' . mysql_error () );
		}
		mysql_select_db ( $dbname, $con );
		//Fetch all registrant details to fill myprofile form
		$myprofile = mysql_query ( "SELECT * FROM i_registrant WHERE username='$usrname' ;" );
		while ( $row = mysql_fetch_array ( $myprofile ) ) {
			?>
				<script type="text/javascript">
				/*Filling the form entries */
				document.getElementById("reg_name").value ='<?php echo $row['r_name']?>';
				document.getElementById("reg_mobile").value ='<?php echo $row['r_mob']?>';
				document.getElementById("reg_email").value ='<?php echo $row['r_email']?>';
				document.getElementById("reg_designation").value ='<?php echo $row['r_designation']?>';
				document.getElementById("reg_id_no").value ='<?php echo $row['r_id']?>';
				document.getElementById("own_name").value ='<?php echo $row['own_name']?>';
				document.getElementById("own_mobile").value ='<?php echo $row['own_mob']?>';
				document.getElementById("own_email").value ='<?php echo $row['own_email']?>';
				/*Filling the form entries */
				</script>
				
					
				<?php
			$_SESSION ['oldoname'] = $row ['own_name'];
			$_SESSION ['oldomob'] = $row ['own_mob'];
			$_SESSION ['oldoemail'] = $row ['own_email'];
			$rname = $row ['r_name'];
		}
		if (isset ( $_POST ['reg_name'] )) {
			//Code for changing registrant details
			$oldoname = $_SESSION ['oldoname'];
			$oldomob = $_SESSION ['oldomob'];
			$oldoemail = $_SESSION ['oldoemail'];
			$inname = $_SESSION ['insname'];
			
			$regname = $_POST ['reg_name'];
			$regmob = $_POST ['reg_mobile'];
			$regemail = $_POST ['reg_email'];
			$regdesig = $_POST ['reg_designation'];
			$regidno = $_POST ['reg_id_no'];
			$regownname = $_POST ['own_name'];
			$regownmob = $_POST ['own_mobile'];
			$regownemail = $_POST ['own_email'];
			if ($oldoname != $regownname) {
				$oldoname = $regownname . "(modified)";
			}
			if ($oldomob != $regownmob) {
				$oldomob = $regownmob . "(modified)";
			}
			if ($oldoemail != $regownemail) {
				$oldoemail = $regownemail . "(modified)";
			}
			$oinfo = 1;
			if (($oldoname != $regownname) || ($oldomob != $regownmob) || ($oldoemail != $regownemail)) {
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
				} else {
					$time = $hour . ':' . $min . ' AM';
				}
				$date = $day . '/' . $month . '/' . $year;
				$rgmobile = $_SESSION ['rmobile'];
				$princmob = $_SESSION ['pmob'];
				
				$oinfo = mysql_query ( "INSERT INTO owneredit values('$inname','$regname','$oldoname','$oldomob','$oldoemail','0','$usrname','$date','$time','$rgmobile','$princmob') " );
			}
			$update1 = mysql_query ( "UPDATE i_registrant SET r_name='$regname',r_mob='$regmob',r_email='$regemail',r_designation='$regdesig',r_id='$regidno' WHERE username='$usrname'" );
			if ($update1 && $oinfo) {
				?>
							   <script type="text/javascript">
							   alert('Changes saved successfully!\nAllow some time to reflect');
							   window.location.href="institution.php?fvalue=mp&lvalue=rd";
							   </script><?php
			}
		}
	} else if ($_GET ['fvalue'] == 'mp' && $_GET ['lvalue'] == 'acnt') {
		//below code works if My Profile and Account Settings menu is selected
		?>
						<tr>
		<td class="padd_leftelements"><input name="cd"
			onclick="redirect('mp','cd')" type="button" id="roundcd"
			value="College&#10Details">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="rd"
			onclick="redirect('mp','rd')" type="button" id="roundrd"
			value="Registrant&#10Details">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="acnt"
			onclick="redirect('mp','acnt')" type="button" id="roundacnt"
			value="Account&#10Settings">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<form name="acntsettings" action="institution.php?fvalue=mp&lvalue=nxt"
		method="post" onsubmit="return acnt_validate()">
		<table style="position: absolute; top: 50%; left: 25%;">
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
	
	if ($_GET ['fvalue'] == 'logout') {
		//end session and logout
		session_destroy ();
	?>
		<script type="text/javascript">window.location.href="../homepage.php"</script>
	<?php
	}
	?>
				<?php
	if ($_GET ['fvalue'] == 'len') {
		//Code to mail details of vendor to user and update the same in the SQLDB
		$userrname = $_SESSION ['iusername'];
		$emailid = $_SESSION ['emailid'];
		$irname = $_SESSION ['irname'];
		$len = $_GET ['len'];
		$imobile = $_SESSION ['imob'];
		$instname = $_SESSION ['insname'];
		$ven = null;
		$em = null;
		$rnm = null;
		$mb = null;
		$cmp = null;
		for($i = 0; $i < $len; $i ++) {
			
			$vendors [] = $_GET ["ven$i"];
			$getname = mysql_query ( "SELECT * FROM v_registrant WHERE edu_vname='$vendors[$i]'" );
			
			while ( $row = mysql_fetch_array ( $getname ) ) {
				$comp [] = $row ["c_name"];
			}
		}
		
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
		} else {
			$time = $hour . ':' . $min . ' AM';
		}
		$date = $day . '/' . $month . '/' . $year;
		
		for($j = 0; $j < $len; $j ++) {
			$ven = $vendors [$j] . "";
			$cmp = $comp [$j] . "";
			
			$insert = mysql_query ( "INSERT INTO email VALUES('$irname','$emailid','$cmp','$ven','$imobile','$date','$time','0','0','$instname','$userrname')" );
		}
		
		?>
					<?php if(isset($_GET['view'])){?>
					<script type="text/javascript">
					alert('Email will be sent in less than an hour!');
					history.go(-1);
					</script>
					<?php }else{?>
	<script>
	alert('Email will be sent in less than an hour!');
	window.location.href="institution.php?fvalue=sv";
	</script>
	<?php
		}
	} else if ($_GET ['fvalue'] == 'mp' && $_GET ['lvalue'] == "nxt") {
		//Account settings related 
		
		$uname = $_POST ['u_name'];
		$upass = $_POST ['u_pass'];
		$check = mysql_query ( "SELECT * FROM i_registrant WHERE username='$uname' AND password='$upass'" );
		$num_rows = mysql_num_rows ( $check );
		if ($num_rows > 0) {
			?>
		<tr>
		<td class="padd_leftelements"><input name="cd"
			onclick="redirect('mp','cd')" type="button" id="roundcd"
			value="College&#10Details">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="rd"
			onclick="redirect('mp','rd')" type="button" id="roundrd"
			value="Registrant&#10Details">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td class="padd_leftelements"><input name="acnt"
			onclick="redirect('mp','acnt')" type="button" id="white"
			value="Account&#10Settings">&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	</table>
	<form name="chngsettings"
		action="institution.php?fvalue=mp&lvalue=chngd" method="post"
		onsubmit="return chng_validate()">
		<table style="position: absolute; top: 50%; left: 25%;">
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
			</tr>
		</table>
	</form>
		<?php
		} else {
			echo "<script>alert('Username/Password is incorrect!');
		window.location.href=\"institution.php?fvalue=mp&lvalue=acnt\"</script>";
		}
	} else if ($_GET ['fvalue'] == 'mp' && $_GET ['lvalue'] == "chngd") {
		//Changing password
		$pass = $_POST ['u_newpass'];
		$username = $_SESSION ['iusername'];
		$passw = mysql_query ( "UPDATE i_registrant SET password='$pass' WHERE username='$username'" );
		if ($passw) {
			echo "<script>alert('password changed successfully! ');
		window.location.href=\"institution.php?fvalue=mp&lvalue=acnt\"</script>";
		}
	}
	?>
<?php
} else {
	//if not logged in then redirect to home page
	echo '<script>alert("Please Signin!");window.location.href="../homepage.php";</script>';
}
?>
</body>
</html>