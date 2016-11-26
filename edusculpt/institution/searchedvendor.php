<!-- To display details of suppliers when searched from "Find Suppliers"  -->

<html>
<head>
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
html {
	overflow: -moz-scrollbars-vertical;
	overflow-y: scroll;
}

.welcome {
	position: absolute;
	right: 5%;
	top: 3px;
	color: blue;
}

select {
	border: gold solid 3px;
	font-size: large;
	font-weight: bold;
}

.seach {
	font-size: 12px;
	font-weight: bold;
	padding: 5px 5px 5px 5px;
	background: #999999;
	width: 110px;
	border-bottom: solid 7px #aaaaaa;
	border-right: solid 7px #888888;
	border-top: solid 7px #cccccc;
	border-left: solid 7px #eeeeee;
	border-style: ridge;
}

.seach:hover {
	background: #76787a;
}

input#round {
	width: 120px;
	height: 50px;
	background-color: #006633;
	border-left: 3px solid gold;
	border-right: 3px solid #006633;
	border-top: 3px solid #006633;
	border-bottom: 3px solid #006633;
	color: #fff;
	font-size: 15px;
	/* 	-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, .75); */
	/* 	-moz-box-shadow: 0 0 10px rgba(0, 0, 0, .75); */
	/* 	box-shadow: 2px 2px 8px rgba(0, 0, 0, .75); */
	font-weight: bolder;
	color: #fff;
	color: #fff;
}

input#round1 {
	width: 100px;
	height: 50px;
	background-color: #006633;
	border: 1px #006633;
	color: #fff;
	font-size: 15px;
	font-weight: bolder;
	position: absolute;
	top: 42%;
	right: 22%;
}

.tipssv {
	width: 100px;
	height: 50px;
	background: gold;
	font-weight: bold;
	position: absolute;
	right: 10%;
	top: 36%;
}

.reqsv {
	width: 100px;
	height: 50px;
	background: gold;
	font-weight: bold;
	position: absolute;
	right: 10%;
	top: 49%;
}

.chatsv {
	width: 100px;
	height: 50px;
	background: gold;
	font-weight: bold;
	position: absolute;
	right: 10%;
	top: 64%;
}

.compemailsv {
	width: 100px;
	height: 50px;
	background: gold;
	font-weight: bold;
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

.sv {
	border-collapse: collapse;
	position: relative;
	top: 10px;
	left: 12%;
	max-width: 793px;
}

.padd_bot {
	padding-top: 10px;
	padding-bottom: 50px;
}

.butt {
	width: 100px;
	height: 40px;
	background-color: gold;
}

input#round:hover {
	background: #003319;
	border-left: 3px solid gold;
	border-right: 3px solid #003319;
	border-top: 3px solid #003319;
	border-bottom: 3px solid #003319;
	-webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	-moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	font-weight: bolder;
}
</style>
<script type="text/javascript">
function reload(){
	//Used for logging out
	document.getElementById('select').selectedIndex=0; 
	$confirm=confirm('Confirm logout?');
	if($confirm==true){
	     
	 window.location.href="searchedvendor.php?fvalue=logout";
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
function shortlisted(vname,categ,reg,specvendor){
	//Used to add a vendor to shortlist section
	window.location.href="searchedvendor.php?shortlist="+vname+"&categ="+categ+"&reg="+reg+"&specv="+specvendor;
	alert(vname+' shortlisted successfully!');
}
</script>
<script type="text/javascript">
function shortlisted(vname,categ,reg,specvendor){
	//Used to add a vendor to shortlist section
	window.location.href="searchedvendor.php?shortlist="+vname+"&categ="+categ+"&reg="+reg+"&specv="+specvendor;
	alert(vname+' shortlisted successfully!');
}
</script>
<script type="text/javascript">
function comp(){
	//Compare section. (Disabled now).
	alert('Feature will be enabled soon- Thanks.');
// 	var chk_arr =  document.getElementsByName("compare[]");
// 	var chklength = chk_arr.length;  
// 	var val=new Array();  
// 	var m=0;         
// 	for(k=0;k< chklength;k++)
// 	{
// 		 if(chk_arr[k].checked == true){
// 			  val[m]=chk_arr[k].value;
// 			 m++;
			
// 		}
	    
// 	}
// 	var len=val.length;
// 	if(len<2){
// 		alert('Select more vendors to compare!');
// 		}
// 	else{
// 	var url="compare.php?len="+len+"&";
	
// 	for(j=0;j<len-1;j++){
// 		url=url+"ven"+j+"="+val[j]+"&";
// 		}
// 	url=url+"ven"+j+"="+val[j];
// 	window.location.href=url;
// 	}
}
</script>
</head>
<body onload='categset();'>
<?php  if(isset($_SESSION ['iusername'])){
//To check if the user has not signedin properly or session expires?>

	<img src="../images/edulogo.png" alt="edusculpt_logo"
		style="display: block; margin-left: auto; margin-right: auto; width: 150px; height: 70px;" />
	<div class="caption"
		style="text-align: center; font-size: small; font-family: cursive;">Fast
		and Secure decision making!</div>
	<div style="background: #006633; font-weight: bold; font-size: large;">
		<p align="center">
			<font color="white">Contact us:+91 95000 07290</font>
		</p>
	</div>
	<div>
		<div style="font-size: large; width: 10%; margin: auto;">
			<b>Here You Go! </b>
		</div>
		<br>
		<div style="font-size: large; width: 85%; margin-left: 7.5%;">
			<form action="searchedvendor.php" name="searched" method="get">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b
					style="font-size: 15pt">Region:</b>&nbsp;&nbsp;<select
					name="region" id="region" style="width: 225px">
					
					<?php
	
	$_SESSION ['url'] = str_replace ( "/edusculpt/institution/", "", $_SERVER ['REQUEST_URI'] );
	include '../config.php';
	$con = mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	//Fetch all the categories and regions for select tag in the database as entered by the admin.
	$resul1 = mysql_query ( "SELECT * FROM region" );
	$resul2 = mysql_query ( "SELECT * FROM category" );
	while ( $row = mysql_fetch_array ( $resul1 ) ) {
		?>
			<option value='<?php echo $row['region']?>'><?php echo $row['region']?></option>
		<?php
	}
	?>		 </select>&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size: 15pt">Category:</b>&nbsp;<select
					name="category" id="category" style="width: 225px"><?php
	while ( $row = mysql_fetch_array ( $resul2 ) ) {
		?>
		<option value='<?php echo $row['categ']?>'><?php echo $row['categ']?></option>
		
<?php
	}
	?>
	</select> <input type="text" size="1" name="vendor_name"
					style="visibility: hidden;"><input class="seach" type="submit"
					value="Search">
			</form>
		</div>
		<div
			style="position: absolute; right: 13%; top: 21%; font-size: x-small;">
			<a href="institution.php?fvalue=fs"><img
				src="../images/back_icon.png" alt="Back" width="50" height="50" /><br>Go
				back to<br> Find Suppliers</a>
		</div>
<!--		<div style="width: 85%; margin-left: 5%;"> -->
<!--			<b style="font-size: 15pt"> Additional Filters:</b>&nbsp;&nbsp; <select -->
<!--				style="width: 225px"><option>Module 1</option> -->
<!-- 				<option>Module 2</option> -->
<!-- 				<option>Module 3</option> -->
<!-- 				<option>Module 4</option></select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
<!--			<select style="width: 225px"><option>Below 10 Lacs</option> -->
<!-- 				<option>Below 20 Lacs</option> -->
<!-- 				<option>Below 30 Lacs</option> -->
<!-- 				<option>Below 40 Lacs</option></select> -->
<!-- 			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
<!-- 			<button class="seach">Refine Results</button> -->
<!-- 		</div> -->
		<br>
		<div
			style="background-color: #006633; color: #fff; height: 50px; width: 788px; margin-left: 12%; border: 3px solid gold;">
			&nbsp;&nbsp;&nbsp;&nbsp;Sort By:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No. of
			Customers &uarr;
			&darr;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Years of Experience &uarr; &darr;
			&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input
				type="button" id="round" value="Compare" onclick="comp()" >
		</div>



		<a href="tips.php" target="_blank"><button class="tipssv">Tips to Decide!</button></a>
		<button class="reqsv" value="provide_req"
			onclick="location.href='institutionreq.php';">
			Provide Your <br> Requirements
		</button>
		<button class="chatsv">Chat Support</button>
		
	</div>
	<div class="welcome" align="right">
		<!-- Welcome User Section --><div onclick="selectfunc();" id="select"
			style="border: 0px; color: blue; font-weight: normal; font-size: medium; font-family: serif; cursor: pointer;">Welcome<?php
	
	$rname = $_SESSION ['irname'];
	$insname = $_SESSION ['insname'];
	$str = $rname . " (" . $insname . ")";
	$len = strlen ( $str );
	if ($len > 50) {
		$str = $str = $rname . "<br>(" . $insname . ")";
	}
	echo $str;//Display Name of Registrant
	?>&nbsp;&nbsp;&#x25BE;</div>
		<div id="logout1" onclick="reload();" align="left"
			style="border: blue 1px solid; cursor: pointer; padding-left: 5px; width: 83%; visibility: hidden;">
			Logout</div>
	</div>
				<?php
	
	if (isset ( $_GET ['fvalue'] )) {
		if ($_GET ['fvalue'] == 'logout') {
			//For logout
			session_destroy ();?>
<script type="text/javascript">window.location.href="../homepage.php"</script>
<?php }
	}
	if (isset ( $_GET ['region'] )) {
		$region = $_GET ['region'];
		$category = $_GET ['category'];
		$specvendor = $_GET ['vendor_name'];
		//For Searching vendors for specific categories and region from searched vendor page itself.
		if ($specvendor == null || $specvendor == "") {
			if($region=='choose'){
				$novendor=mysql_query ( "SELECT * FROM company AS c,v_registrant AS v WHERE c.category like '%$category%' AND c.accept_reject=1  AND c.c_name=v.c_name" );
			}
			else{
			//$novendor = mysql_query ( "SELECT * FROM company AS c,v_registrant AS v WHERE c.category like '%$category%' AND c.location='$region' AND c.accept_reject=1  AND c.c_name=v.c_name" );
				$novendor=mysql_query ( "SELECT * FROM company AS c,v_registrant AS v WHERE c.category like '%$category%' AND c.accept_reject=1  AND c.c_name=v.c_name" );
			}
			while ( $row = mysql_fetch_array ( $novendor ) ) {
				
				$reg = $row ["location"];
				$vname = $row ["edu_vname"];
				$esrate = $row ["overall"];
				
				$y_of_exp = $row ['experience'];
				$serv_reg = $row ['serviceregion'];
				$no_of_cust = $row ['custnumb'];
				$uniq_feat = $row ['uniqfeature'];
				
				?>
					
					<table class="sv"><!-- Table to display different vendors. Each vendor consists of one table
					and a new table is created for each new vendor -->
		<tr>
			<th class="svth" width="300px"><?php echo $vname;?></th>
			<th class="svth" colspan="2" width="340px"><?php
				
// 				$starNumber = $esrate;
// 				for($x = 1; $x <= $starNumber; $x ++) {
// 					echo '<img src="../images/fullstar.png"  width="20"
// 							height="20" />';
// 				}
// 				if (strpos ( $starNumber, '.' )) {
// 					echo '<img src="../images/halfstar.png"  width="20"
// 							height="20" />';
// 					$x ++;
// 				}
// 				while ( $x <= 5 ) {
// 					echo '<img src="../images/emptystar.png"  width="20"
// 							height="20" />';
// 					$x ++;
// 				}
				?></th>
			<th class="svth" width="105px"><input type="checkbox"
				style="width: 20px; height: 20px; cursor: pointer;"
				checked="checked" name="compare[]" value="<?php echo $vname?>"></th>
		</tr>
		<tr>
			<td class="svtd">Years of Experience : <?php echo $y_of_exp;?></td>
			<td class="svtd" colspan="3">Service Region : <?php echo $serv_reg?></td>

		</tr>
		<tr>
			<td class="svtd">Number of Customers : <?php echo $no_of_cust;?></td>
			<td class="svtd" colspan="3">Unique Features : <?php echo $uniq_feat;?></td>

		</tr>
		<tr>
			<td></td>
			<td class="padd_bot">
				<button class="butt" value="my_vendors"
					onclick="shortlisted('<?php echo $vname?>','<?php echo $category?>','<?php echo $region?>','<?php echo $specvendor?>')">
					<font size="large"><b>Shortlist </b></font>
				</button>
			</td>
			<td class="padd_bot"><a
				href="view_details.php?fvalue=gi&vendor=<?php echo $vname?>&categ=<?php echo $category?>&region=<?php echo $region?>"><button
						class="butt" value="my_vendors">
						<font size="large"><b>View Details </b></font>
					</button></a></td>
			<td></td>
		</tr>
	</table>
	
					<?php
			}
		} else {
			//This section is if a user searches a specific vendor name directly
			if($region=='choose'){
				$vendor = mysql_query ( "SELECT * FROM company AS c,v_registrant AS v WHERE c.category like '%$category%' AND c.c_name='$specvendor' AND c.accept_reject=1 AND c.c_name=v.c_name" );
			}
			else{
			
				$vendor = mysql_query ( "SELECT * FROM company AS c,v_registrant AS v WHERE c.category like '%$category%' AND c.c_name='$specvendor' AND c.accept_reject=1 AND c.c_name=v.c_name" );
			//$vendor = mysql_query ( "SELECT * FROM company AS c,v_registrant AS v WHERE c.category like '%$category%' AND c.location='$region' AND c.c_name='$specvendor' AND c.accept_reject=1 AND c.c_name=v.c_name" );
			}
			while ( $row = mysql_fetch_array ( $vendor ) ) {
				$reg = $row ["location"];
				$vname = $row ["edu_vname"];
				$esrate = $row ["overall"];
				
				?>
		<table class="sv">			<!-- Table to display different vendors. Each vendor consists of one table
					and a new table is created for each new vendor. Note: This is for specific vendor search section -->
		
		<tr>
			<th class="svth" width="300px"><?php echo $vname;?></th>
			<th class="svth" colspan="2" width="340px"><?php
				
// 				$starNumber = $esrate;
// 				for($x = 1; $x <= $starNumber; $x ++) {
// 					echo '<img src="../images/fullstar.png"  width="20"
// 							height="20" />';
// 				}
// 				if (strpos ( $starNumber, '.' )) {
// 					echo '<img src="../images/halfstar.png"  width="20"
// 							height="20" />';
// 					$x ++;
// 				}
// 				while ( $x <= 5 ) {
// 					echo '<img src="../images/emptystar.png"  width="20"
// 							height="20" />';
// 					$x ++;
// 				}
				?></th>
			<th class="svth" width="105px"><input type="checkbox"
				name="compare[]" style="width: 20px; height: 20px; cursor: pointer;"
				value="<?php echo $vname?>"></th>
		</tr>
		<tr>
			<td class="svtd">Years of Experience : 10</td>
			<td class="svtd" colspan="3">Service Region : <?php echo $reg?></td>

		</tr>
		<tr>
			<td class="svtd">Number of Customers : 10000</td>
			<td class="svtd" colspan="3">Unique Features : Super Quality Bro,
				Full Cheap</td>

		</tr>
		<tr>
			<td></td>
			<td class="padd_bot">
				<button class="butt" value="my_vendors"
					onclick="shortlisted('<?php echo $vname?>','<?php echo $category?>','<?php echo $region?>','<?php echo $specvendor?>')">
					<font size="large"><b>Shortlist </b></font>
				</button>
			</td>
			<td class="padd_bot"><a
				href="view_details.php?fvalue=gi&vendor=<?php echo $vname?>&categ=<?php echo $category?>&region=<?php echo $region?>"><button
						class="butt" value="my_vendors">
						<font size="large"><b>View Details </b></font>
					</button></a></td>
			<td></td>
		</tr>
	</table>
					<?php
			}
		}
		
		?>
	
<?php
	}
	$specv = "";
	if (isset ( $_GET ['shortlist'] )) {
		//Used when a vendor is shortlisted
		$category = $_GET ['categ'];
		$region = $_GET ['reg'];
		$vname = $_GET ['shortlist'];
		$specv = $_GET ['specv'];
		/**Storing date and time when vendor is shortlisted in the database*/
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
		/**Storing date and time when vendor is shortlisted in the database*/
		$uname = $_SESSION ['iusername'];
		
		$insert = mysql_query ( "INSERT INTO shortlisted VALUES('$date','$category','$vname','0','0','$uname')" );
		?>
					<script type="text/javascript">
					specv='<?php echo $specv ?>';			
					
				   if(specv==null ||specv==""){
					   //Confirmation after shortlist is done and asking user whether more vendors need to be shortlisted.
					   var conf=confirm('Do you want to evaluate more Vendors?');
					if(conf==true){
						window.location.href="searchedvendor.php?region=<?php echo $region?>&category=<?php echo $category?>&vendor_name=";
						}
					else{
						window.location.href="institution.php?fvalue=sv";
						}
				   }
				   else{
					   var conf=confirm('Do you want to evaluate more Vendors?');
					   if(conf==true){
							window.location.href="searchedvendor.php?region=<?php echo $region?>&category=<?php echo $category?>&vendor_name=<?php echo $specv?>";
							}
						else{
							window.location.href="institution.php?fvalue=sv";
							}
					   }
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
<script type="text/javascript">
function categset(){
	//Function to set the category and region in the searched vendor page select tags
	var url=window.location.href;
	var stat=url.split("=");
	var status=stat[1].split("&");
	var statu=stat[2].split("&");
	var res = statu[0].split("+").join(" ");
	/*Replace url encoded references by the special characters for region*/
	res=res.split("%28").join("(");
	res=res.split("%26").join("&");
	res=res.split("%2F").join("/");
	res=res.split("%2C").join(",");
	res=res.split("%29").join(")");
	res=res.split("%20").join(" ");
	/*Replace url encoded references by the special characters for region*/
	var res1 = status[0].split("+").join(" ");
	/*Replace url encoded references by the special characters for category*/
	res1=res1.split("%28").join("(");
	res1=res1.split("%26").join("&");
	res1=res1.split("%2F").join("/");
	res1=res1.split("%2C").join(",");
	res1=res1.split("%29").join(")");
	res1=res1.split("%20").join(" ");
	/*Replace url encoded references by the special characters for category*/
	document.getElementById('region').value=res1;
	document.getElementById('category').value=res;
}
</script>
</body>
</html>