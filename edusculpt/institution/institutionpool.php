<!-- Pool Requirements displayed -->

<html>
<?php
//These are to start session.
session_start ();
ob_start ();
?>
<head>
<title>Requirement Pool</title>
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

.butt {
	width: 140px;
	height: 30px;
	background-color: gold;
}

.welcome {
	position: absolute;
	right: 5%;
	top: 3px;
	color: blue;
}

.svth {
	background-color: #063;
	border: 3px solid gold;
	padding: 6px;
	color: #fff;
}

.one {
	width: 260px;
	height: 30px;
	background: gold;
	text-align: center;
	margin-left: auto;
	margin-right: auto;
}

.svtd {
	border: 3px solid gold;
	padding: 6px;
}

.sv {
	border-collapse: collapse;
	position: absolute;
	top: 50%;
	left: 10%;
}

.compemailsv {
	position: absolute;
	top: 35%;
	width: 150px;
	right: 10%;
	height: 60px;
	background: gold;
	font-weight: bold;
}

.txt {
	width: 175px;
	border: 3px solid gold;
	font-size: large;
	font-family: serif;
	border: 3px solid gold;
}
</style>
<script type="text/javascript">
function reload(){
	//Used on clicking logout
	document.getElementById('select').selectedIndex=0; 
	$confirm=confirm('Confirm logout?');
	if($confirm==true){
	     
	 window.location.href="institutionpool.php?fvalue=logout";
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
	function change_qty(pk) {
		//Used for adding to the existing pool requirements
		var qty = prompt("Enter new Quantity");
		if(qty>0 && !isNaN(qty)){
			var url = window.location.href;
			window.location.href=url+"&pk="+pk+"&qty="+qty;
		}else{
			alert("Please enter valid quantity value!");
			change_qty(pk);
		}
	}
</script>
<script type="text/javascript">
function categchoose(){
	//Used to change the category and region of the pool requirements displayed 
	var cat=document.getElementById('category').value;
	var reg=document.getElementById('region').value;
	if(cat!='choose' && reg!='choose'){
		window.location.href="institutionpool.php?cat="+cat+"&reg="+reg;
		}
	}
</script>
</head>
<body>
<?php  if(isset($_SESSION ['iusername'])){
//To check if the user has not signedin properly or session expires?>
	<img src="../images/edulogo.png" alt="edusculpt_logo"
		style="display: block; margin-left: auto; margin-right: auto; width: 150px; height: 70px;" />
	<div class="caption"
		style="text-align: center; font-size: small; font-family: cursive;">Fast
		and Secure decision making!</div>

	<div style="position: absolute; right: 10%; top: 20%;">
		<a href="institution.php?fvalue=fs"><img alt="Chick for Home Page"
			src="../images/home_icon.png" height="40" width="40">
			<div class="caption" style="font-size: x-small;">Home Page</div></a>
	</div>
	<div class="welcome" align="right">
	<!-- Welcome User Section -->
		<div onclick="selectfunc();" id="select"
			style="border: 0px; color: blue; font-weight: normal; font-size: medium; font-family: serif; cursor: pointer;">Welcome <?php
	
			
	include '../config.php';
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
	$str = $name . " (" . $iname . ")";
	$len = strlen ( $str );
	if ($len > 50) {
		$str = $str = $name . "<br>(" . $iname . ")";
	}
	echo $str;//Display Name of Registrant
	?>&nbsp;&nbsp;&#x25BE;</div>
		<div id="logout1" onclick="reload();" align="left"
			style="border: blue 1px solid; cursor: pointer; padding-left: 5px; width: 83%; visibility: hidden;">
			Logout</div>
	</div>
	<?php
	if (isset ( $_GET ['qty'] )) {
		$quant = $_GET ['qty'];
		$pk = $_GET ['pk'];
		$reg = mysql_query ( "UPDATE poolrequirement SET quantity=quantity+'$quant' WHERE pk='$pk';" );//Query to update the quantity of existing pool requiremnts
	}
	?>
	<div direction="left" scrollamount="0"
		style="background: #006633; font-weight: bold; font-size: large;">
		<p align="center">
			<font color="white">Contact us:+91 95000 07290</font>
		</p>
	</div>
	
	<h2 class="one" align="centre">Pool Requirements</h2>
	<div
		style="position: absolute; top: 30%; left: 10%; font-size: x-large; font-weight: bold;">
		Category&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Region</div>
	<div
		style="position: absolute; top: 38%; left: 10%; font-size: x-large; font-weight: bold;">
		<select name="category" id="category" class="txt"
			onchange="categchoose()" style="max-width: 115px">
			<option value="choose" selected="selected" style="display: none;">Choose</option>
		<?php
	$con = mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	// Display all the categories and regions entered by the edusculpt admins
	$cat = mysql_query ( "SELECT * FROM category" );
	$reg = mysql_query ( "SELECT * FROM region" );
	$region = mysql_query ( "SELECT region from institution WHERE i_name='$insname'" );
	while ( $row = mysql_fetch_array ( $region ) ) {
		$reg = $row ['region'];
	}
	while ( $row = mysql_fetch_array ( $cat ) ) {
		?>
					<option value='<?php echo $row['categ']?>'><?php echo $row['categ']?></option>				
					<?php
	}
	
	?></select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select
			name="region" class="txt" id="region" style="max-width: 115px"
			onchange="categchoose()">
			<option value="choose" selected="selected" style="display: none;">Choose</option><?php
	$con = mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	// Display all the categories and regions entered by the edusculpt admins
	$cat = mysql_query ( "SELECT * FROM category" );
	$reg = mysql_query ( "SELECT * FROM region" );
	$region = mysql_query ( "SELECT region from institution WHERE i_name='$insname'" );
	while ( $row = mysql_fetch_array ( $region ) ) {
		$reg = $row ['region'];
	}
	while ( $row = mysql_fetch_array ( $reg ) ) {
		?>
			<option value='<?php echo $row['region']?>'><?php echo $row['region']?></option>			
		<?php
	}
	
	?></select>

	</div>
	<table class="sv">
		<tr>
			<th class="svth">Category</th>
			<th class="svth">Region</th>

			<th class="svth">Preferred<br>Company
			</th>
			<th class="svth">Quantity</th>
			<th class="svth">Specifications</th>
			<th class="svth">Cut Off Date</th>
			<th class="svth">Estimated<br>Delivery Date
			</th>
			<th class="svth">Add to This<br>Requirement
			</th>
		</tr>
		<?php
	if (isset ( $_GET ['cat'] )) {
		$category = $_GET ['cat'];
		$regn = $_GET ['reg'];
		
		$poolreq = mysql_query ( "SELECT * FROM poolrequirement WHERE region='$regn' AND category='$category'" );
		while ( $row = mysql_fetch_array ( $poolreq ) ) {
			$_SESSION ['$spex'] = $row ['specs']; //Fetch the pool requirements of required Regions and category
			?><tr>
				<?php $pk = $row['pk'];?>
			<td class="svtd"><?php echo $row['category']?></td>
			<td class="svtd"><?php echo $row['region']?></td>
			<td class="svtd"><?php echo $row['priority1']?></td>
			<td class="svtd"><?php echo $row['quantity']?></td>
			<td class="svtd"><a
				href="institutionpool.php?cat=<?php echo $category?>&reg=<?php echo $regn?>&specx=1">Click
					Here</a></td>
			<td class="svtd"><?php echo $row['deliverydate']?></td>
			<td class="svtd">Within 3 weeks</td>
			<td class="svtd"><button class="butt"
					onclick="change_qty('<?php echo $pk ?>');">Add to This</button></td>
		</tr>
<?php }}?>
		
	</table>
	<a href="institutionpoolform.php"><button name="newpool" type="button"
			class="compemailsv" id="newpool" value="newpool">
			Add your new<br>pool Requirement
		</button></a>
	
<?php
	
	if (isset ( $_GET ['fvalue'] ) && $_GET ['fvalue'] == 'logout') {
		// session_destroy(); Used for logging out!
		mysql_close ( $con );?>
<script type="text/javascript">window.location.href="../homepage.php"</script>
<?php }
	
	if (isset ( $_GET ['specx'] )) {
		//Used for updating Specifications of the pool requirement
		$spex = $_SESSION ['$spex'];
		?><script type="text/javascript">alert('Specifications : \n\n<?php echo $spex?>');</script>
	<script type="text/javascript">
var urls=window.location.href;
urls=urls.replace("&specx=1","");
window.location.href=urls;
</script>
<?php
	}
	
	?>
<?php
} else {
	//If the user has not signedin properly or session expires
	echo '<script>alert("Please Signin!");window.location.href="../homepage.php";</script>';
}
?>
	
</body>
</html>