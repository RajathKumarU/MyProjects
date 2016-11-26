<!-- used to view complete details of suppliers before mailing and shortlisting -->

<html>
<?php
//These are to start session.
session_start ();
ob_start ();
?>
<head>
<title>Supplier Details</title>
<!-- To set icon in the browser tab -->
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
<!-- To set icon in the browser tab -->
<style type="text/css">
select {
	border: gold solid 3px;
	font-size: large;
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

.butt {
	width: 100px;
	height: 40px;
	background-color: gold;
}

.welcome {
	position: absolute;
	right: 5%;
	top: 3px;
	color: blue;
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

.pos {
	position: absolute;
	left: 10%;
	top: 43%;
}

.padd_bot {
	padding-top: 40px;
}

.gitdl {
	border: 3px solid gold;
	font-size: 12pt;
	padding: 10px;
	border-bottom: none;
	border-right: none;
	width: 50%;
}

.gitdr {
	border: 3px solid gold;
	font-size: 12pt;
	padding: 10px;
	border-bottom: none;
	width: 50%;
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

input#roundgi {
	width: 150px;
	height: 60px;
	background-color: #006633;
	border: 1px #006633;
	color: #fff;
	font-size: 15px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, .75);
	-moz-box-shadow: 0 0 10px rgba(0, 0, 0, .75);
	box-shadow: 2px 2px 8px rgba(0, 0, 0, .75);
	font-weight: bolder;
}
input#roundes {
	width: 150px;
	height: 60px;
	background-color: #006633;
	border: 1px #006633;
	color: #fff;
	font-size: 15px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, .75);
	-moz-box-shadow: 0 0 10px rgba(0, 0, 0, .75);
	box-shadow: 2px 2px 8px rgba(0, 0, 0, .75);
	font-weight: bolder;
}
input#roundpi {
	width: 150px;
	height: 60px;
	background-color: #006633;
	border: 1px #006633;
	color: #fff;
	font-size: 15px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, .75);
	-moz-box-shadow: 0 0 10px rgba(0, 0, 0, .75);
	box-shadow: 2px 2px 8px rgba(0, 0, 0, .75);
	font-weight: bolder;
}

#white {
	background: white;
	width: 150px;
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

input#roundgi:hover {
	background: #003319;
	border: 1px #006633;
	-webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	-moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	font-weight: bolder;
}

input#roundpi:hover {
	background: #003319;
	border: 1px #006633;
	-webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	-moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	font-weight: bolder;
}
input#roundes:hover {
	background: #003319;
	border: 1px #006633;
	-webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	-moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	font-weight: bolder;
}
</style>
<script type="text/javascript">
function shortlisted(vname,categ,reg,specv){
	//To shortlist a vendor
	window.location.href="searchedvendor.php?shortlist="+vname+"&categ="+categ+"&reg="+reg+"&specv="+specv; 
	alert(vname+' shortlisted successfully!');
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
function redirect(fval,vendor,categ,region){
	//To change displayed details between General and Product Information
	window.location.href="view_details.php?fvalue="+fval+"&vendor="+vendor+"&categ="+categ+"&region="+region;
}
</script>
<script type="text/javascript">
function reload(){
	// Used for logout
	document.getElementById('select').selectedIndex=0; 
	$confirm=confirm('Confirm logout?');
	if($confirm==true){
	 window.location.href="institution.php?fvalue=logout";
	}
	}
</script>
<script type="text/javascript">
function colorset(){
	//Used to set the selected field as a white button
	var url=window.location.href;
	var stat=url.split("=");
	var status=stat[1].split("&");
	document.getElementById('round'+status[0]).id='white';
}
</script>
<script type="text/javascript">
function email(ven){
	//To email details about a vendor(On clicking mail details)
	window.location.href="institution.php?fvalue=len&len=1&ven0="+ven+"&view=1";
}
</script>
</head>
<body onload="colorset()">
<?php
$url = $_SERVER ['REQUEST_URI'];
/**Used for URL Dencoding*/
$stat = explode ( "=", $url );
$status = explode ( "&", $stat [2] );
$statu = explode ( "&", $stat [3] );
$res = str_replace ( "+", " ", $statu [0] );
$res = str_replace ( "%28", "(", $res );
$res = str_replace ( "%26", "&", $res );
$res = str_replace ( "%2F", "/", $res );
$res = str_replace ( "%2C", ",", $res );
$res = str_replace ( "%29", ")", $res );
$res = str_replace ( "%20", " ", $res );
/**Used for URL Decoding*/
$category = $res;

$regn = explode ( "=", $url );
$region = $regn [4];

?>
<?php  if(isset($_SESSION ['iusername'])){
//To check if the user has not signedin properly or session expires?>
	<img src="../images/edulogo.png" alt="edusculpt_logo"
		style="display: block; margin-left: auto; margin-right: auto; width: 150px; height: 70px;" />
	<div class="caption"
		style="text-align: center; font-size: small; font-family: cursive;">Fast
		and Secure decision making!</div>
	<div class="welcome" align="right">
	<!-- Welcome User Section -->
		<div onclick="selectfunc();" id="select"
			style="border: 0px; color: blue; font-weight: normal; font-size: medium; font-family: serif; cursor: pointer;">Welcome<?php
	include '../config.php';//Used for DB connection
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
	}
	$_SESSION ['irname'] = $name;
	$_SESSION ['insname'] = $iname;
	$v_name = $_GET ['vendor'];
	$str = $name . " (" . $iname . ")";
	$len = strlen ( $str );
	if ($len > 50) {
		$str = $str = $name . "<br>(" . $iname . ")";
	}
	echo $str;	//Display Name of Registrant
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

	<a href="tips.php" target="_blank"><button class="tipssv">Tips to Decide!</button></a>
	<button class="reqsv" onclick="location.href='institutionreq.php';">
		Provide Your <br> Requirements
	</button>
	<button class="chatsv">Chat Support</button>

	<div id="homepageicon"
		style="visibility: visible; position: absolute; top: 25%; right: 10%;">
		<a href="institution.php?fvalue=fs"><img alt="Click for Home Page"
			src="../images/home_icon.png" height="40" width="40">
			<div class="caption" style="font-size: x-small;">Home Page</div></a>
	</div>
	<div id="homepageicon"
		style="visibility: visible; position: absolute; top: 25%; right: 15%;">
		<a href="<?php echo $_SESSION ['url'];?>"><img alt="Click to go back"
			src="../images/back_icon.png" height="40" width="40">
			<div class="caption" style="font-size: x-small;">Go Back</div></a>
	</div>
	<div
		style="display: table; background: #006633; font-weight: bold; font-size: 30px; width: 800px; height: 40px; margin-left: 10%;">
		<div align="center"
			style="display: table-cell; border: 3px solid gold;width: 50%;">
			<font color="white"><?php echo $v_name."  ";?>
		</div>

		<div
			style="display: table-cell; border: 3px solid gold; border-left: none;"
			align="center">
			
			&nbsp;&nbsp;&nbsp;&nbsp;
			<?php
			
// //Used to display Supplier rating
// 	$esrate = "";
// 	$novendor = mysql_query ( "SELECT * FROM v_registrant WHERE edu_vname='$v_name'" );
// 	while ( $row = mysql_fetch_array ( $novendor ) ) {
// 		$esrate = $row ["overall"];
// 	}
// 	$starNumber = $esrate;
// 	for($x = 1; $x <= $starNumber; $x ++) {
// 		echo '<img src="../images/fullstar.png"  width="23"
// 							height="23" />';
// 	}
// 	if (strpos ( $starNumber, '.' )) {
// 		echo '<img src="../images/halfstar.png"  width="23"
// 							height="23" />';
// 		$x ++;
// 	}
// 	while ( $x <= 5 ) {
// 		echo '<img src="../images/emptystar.png"  width="23"
// 							height="23" />';
// 		$x ++;
// 	}
	?></font>
		</div>
	</div>
	<table class="pos" id="tabs">
		<tr class="padd_bot">
			<td class="padd"><input type="button" name="gi"
				onclick="redirect('gi','<?php echo $v_name;?>','<?php echo $category?>','<?php echo $region?>')"
				id="roundgi" value="General &#10 Information">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td class="padd"><input name="pi"
				onclick="redirect('pi','<?php echo $v_name;?>','<?php echo $category?>','<?php echo $region?>')"
				type="button" id="roundpi" value="Product &#10 Information">&nbsp;&nbsp;&nbsp;&nbsp;</td>
<!-- 			<td class="padd"><input type="button" name="es" id="roundes" -->
<!-- 				value="ES &#10 Remarks">&nbsp;&nbsp;&nbsp;&nbsp;</td> -->
		</tr>
	</table>
	
	
	<?php
	if ($_GET ['fvalue'] == 'gi') {
		
		$sql = mysql_query ( "Select * from company as c, v_registrant as v where c.c_name=v.c_name and v.edu_vname='$v_name'" );
		//Fetch General Information of the Vendor
		while ( $row = mysql_fetch_array ( $sql ) ) {
			$orgtype = $row ['orgtype'];
			$experience = $row ['experience'];
			$serviceregion = $row ['serviceregion'];
			$compcert = $row ['compcert'];
			$custnumb = $row ['custnumb'];
			$vendorexpect = $row ['vendorexpect'];
			$esremarks = $row ['esremarks'];
			?>
		
		<table cellspacing="0px"
		style="position: absolute; left: 10%; top: 56%;border-collapse:collapse; max-width: 800px; min-width: 800px;">
		<tr>
			<td class="gitdl">Type of Organisation : <?php echo $orgtype;?></td>
			<td class="gitdr">Experience : <?php echo $experience;?></td>
		</tr>
		<tr>
			<td class="gitdl">Base & Service Region : <?php echo $serviceregion;?></td>
			<td class="gitdr">Company Certifications : <?php echo $compcert?></td>
		</tr>
		<tr>
			<td class="gitdl">NO. of Customers : <?php echo $custnumb?></td>
			<td class="gitdr">Vendor expectations from Institution : <?php echo $vendorexpect;?></td>
		</tr>
		<tr>
			<td class="gitdr" colspan="2" style="border-bottom: 3px solid gold;">ES
				Remarks : <?php echo $esremarks;?></td>
		</tr>
			<td colspan="2" align="center"
				style="padding: 20px; border-top: 3px solid gold">
				<button class="butt" value="my_vendors"
					onclick="shortlisted('<?php echo $v_name?>','<?php echo $category?>','<?php echo $region?>','')">
					<font size="large"><b>Shortlist </b></font>
				</button> &nbsp;&nbsp;&nbsp;&nbsp;
				<button class="butt" onclick="email('<?php echo $v_name?>')">
					<font size="large"><b>Mail Details </b></font>
				</button>
			</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
	</table>
	<br>
	<br>
	<br>
	
		<?php
		}
	} elseif ($_GET ['fvalue'] == 'pi') {
		
		$sql = mysql_query ( "Select * from company as c, v_registrant as v where c.c_name=v.c_name and v.edu_vname='$v_name'" );
		//Fetch product information of the vendor
		while ( $row = mysql_fetch_array ( $sql ) ) {
			$corecomp = $row ['corecomp'];
			$prefbrand = $row ['prefbrand'];
			$timetodeliver = $row ['timetodeliver'];
			$warranty = $row ['warranty'];
			$supportamc = $row ['supportamc'];
			$addinfo = $row ['addinfo'];
			
			?>
				
		<table cellspacing="0px"
		style="position: absolute; left: 10%; top: 56%; max-width: 800px; min-width: 800px;">
		<tr>
			<td class="gitdl">Core Competancy : <?php echo $corecomp?></td>
			<td class="gitdr">Preffered brands : <?php echo $prefbrand?></td>
		</tr>
		<tr>
			<td class="gitdl">Time to deliver from PO : <?php echo $timetodeliver?></td>
			<td class="gitdr">Warranty & Shelf life : <?php echo $warranty?></td>
		</tr>
		<tr>
			<td class="gitdl">Support & AMC : <?php echo $supportamc?></td>
			<td class="gitdr">Additional Information : <?php echo $addinfo?></td>
		</tr>
		<tr>
			<td colspan="2" align="center"
				style="padding: 20px; border-top: 3px solid gold;border-collapse:collapse;">
				<button class="butt" value="my_vendors"
					onclick="shortlisted('<?php echo $v_name?>','<?php echo $category?>','<?php echo $region?>','')">
					<font size="large"><b>Shortlist </b></font>
				</button> &nbsp;&nbsp;&nbsp;&nbsp;
				<button class="butt" onclick="email('<?php echo $v_name?>')">
					<font size="large"><b>Mail Details </b></font>
				</button>
			</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
	</table>
	<br>
	<br>
	<br>		
				<?php
		}
	}
} else {
	//If the user has not signedin properly or session expires
	echo '<script>alert("Please Signin!");window.location.href="../homepage.php";</script>';
}
?>
</body>
</html>