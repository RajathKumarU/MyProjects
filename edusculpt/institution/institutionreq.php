<!-- To collect Institution requirements up on clicking Provide your requirements -->

<html>
<?php
//These are to start session.
session_start ();
ob_start ();
include '../config.php';
$inname = $_SESSION ['insname'];
$irname = $_SESSION ['irname'];
$username = $_SESSION ['iusername'];
?>
<head>
<title>Provide Your Requirement</title>
<!-- To set icon in the browser tab -->
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
<!-- To set icon in the browser tab -->
<style type="text/css">
select {
	border: gold solid 3px;
	font-size: large;
	font-weight: bold;
	width: 300px;
}

.padd {
	padding: 6px;
}

.one {
	width: 450px;
	height: 30px;
	background: gold;
	text-align: center;
	margin-left: auto;
	margin-right: auto;
}

.compemailsv {
	width: 130px;
	height: 50px;
	background: gold;
	font-weight: bold;
}

.txt {
	width: 80px;
	border: 3px solid gold;
	font-size: large;
	font-family: serif;
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

textarea {
	border: 3px solid gold;
	font-size: large;
	font-family: serif;
}

.padd_bot {
	padding-top: 40px;
	padding-bottom: 40px
}

.show {
	display: block;
	padding: 6px;
}

.hidden {
	display: none;
}
</style>
<script type="text/javascript">
function disp_satisfied(){
	//On selecting Existing vendors as "yes", the next question is loaded, or else it stays hidden.
	var sat=document.getElementById("satisfied");
	sat.setAttribute("class", "show");
	var sat1=document.getElementById("satisfied1");
	sat1.setAttribute("class", "show");
	
	
}
</script>
<script type="text/javascript">
function req_from_validation() {
	// This function checks if all the required details of the form is filled and are valid
	var rdesc = document.forms["poolreq"]["r_desc"].value;
	var date = document.forms["poolreq"]["date"].value;
	var date1 = document.forms["poolreq"]["date1"].value;
	var expec = document.forms["poolreq"]["expectation"].value;
	var budget = document.forms["poolreq"]["budget"].value;
	var probs = document.forms["poolreq"]["problems"].value;
	var categ = document.forms["poolreq"]["category"].value;
	var regn = document.forms["poolreq"]["region"].value;
	var time=document.forms["poolreq"]["timetocall"].value;
	if (rdesc == null || rdesc == "") {
		alert("Requirement Description must be filled!");
		return false;
	} else if (date == null || date == "") {
		alert("Date of Vendor Closure must be filled!");
		return false;
	} else if (date1 == null || date1 == "") {
		alert("Expected date of Project completion must be filled!");
		return false;
	} else if ((new Date(date1).getTime()) > (new Date(date).getTime())) {
	 	alert("Expected date of Project completion \nmust be after the Project Start date");
	 	return false; 
	} else if (expec == null || expec == "") {
		alert("Expectations from Vendor must be filled!");
		return false;
	} else if (budget == null || budget == "") {
		alert("Budget must be filled!");
		return false;
	} else if (probs == null || probs == "") {
		alert("Comments must be filled!");
		return false;
	} else if (time == null || time == "") {
		alert("Preffered time to call must be filled!");
		return false;
	} if (categ == null || categ == "") {
		alert("Category must be selected!");
		return false;
	} else if (regn == null || regn == "") {
		alert("Region must be selected!");
		return false;
	}else {
		return true;
	}
}</script>
</head>
<body>
<?php  if(isset($_SESSION ['iusername'])){
//To check if the user has not signedin properly or session expires?>
	<img src="../images/edulogo.png" alt="edusculpt_logo"
		style="display: block; margin-left: auto; margin-right: auto; width: 150px; height: 70px;" />
	<div class="caption"
		style="text-align: center; font-size: small; font-family: cursive;">Fast
		and Secure decision making!</div>

	<div style="position: absolute; right: 10%; top: 5%;">
		<a href="institution.php?fvalue=fs"><img alt="Chick for Home Page"
			src="../images/home_icon.png" height="40" width="40">
			<div class="caption" style="font-size: x-small;">Home Page</div></a>
	</div>

	<div direction="left" scrollamount="0"
		style="background: #006633; font-weight: bold; font-size: large;">
		<p align="center">
			<font color="white">Contact us:+91 95000 07290</font>
		</p>
	</div>
	<h2 class="one" align="centre">Tell us your Requirement in Detail</h2>
	<form name="poolreq" action="institutionreq.php" method="post"
		enctype="multipart/form-data" onsubmit="return req_from_validation()"> <!-- Requirements Form -->
		<table style="position: absolute; top: 35%; left: 25%;">

			<tr>
				<td class="padd"><label class="lbl">Requirement Category</label></td>
				<td class="padd"><select name="category" class="txt1"><option value='' disabled selected hidden>Please Choose Category</option>
					<?php
	$con = mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	// Display all the categories entered by the edusculpt admins
	$cat = mysql_query ( "SELECT * FROM category" );
	while ( $row = mysql_fetch_array ( $cat ) ) {
		?>
					<option value='<?php echo $row['categ']?>'><?php echo $row['categ']?></option>
						
					
					<?php
	}
	
	?>					
				</select></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Requirement Description</label></td>
				<td class="padd"><input type="text" name="r_desc" id="r_desc"
					class="txt1" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Region</label></td>
				<td class="padd"><select name="region" class="txt1"><option value='' disabled selected hidden>Please Choose Region</option>
					<?php
	$con = mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	// Display all the regions entered by the edusculpt admins
	$reg = mysql_query ( "SELECT * FROM region" );
	
	while ( $row = mysql_fetch_array ( $reg ) ) {
		?>
					<option value='<?php echo $row['region']?>'><?php echo $row['region']?></option>
					<?php
	}
	?>
				</select></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Expected Date of Vendor Closure</label></td>
				<td class="padd"><input type="date" name="date" id="date" size="30"
					class="txt1"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Expected Project Started Date</label></td>
				<td class="padd"><input type="date" name="date1" id="date1"
					size="30" class="txt1"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Key Expectation from Vendor</label></td>
				<td class="padd"><input type="text" name="expectation"
					id="expectation" class="txt1" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Price Range/ Budget</label></td>
				<td class="padd"><input type="text" name="budget" id="budget"
					class="txt1" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Do You Have Any Existing
						Vendors? </label></td>
				<td class="padd" align="left"><input type="radio"
					name="existing_vendors" class="txt" value="Yes"
					onclick="disp_satisfied();">Yes <input type="radio"
					name="existing_vendors" class="txt" value="No" checked="checked">No</td>
			</tr>

			<tr>
				<td id="satisfied" class="hidden"><label class="lbl">Are you
						satisfied with them? </label></td>
				<td id="satisfied1" class="hidden" align="left"><input type="radio"
					name="satisfied" class="txt" value="Yes" checked="checked">Yes <input
					type="radio" name="satisfied" class="txt" value="No">No</td>
			</tr>

			<tr>
				<td class="padd"><label class="lbl">Help us Serve You Better!<br>Tell
						us any problems faced so we<br>don't repeat any!
				</label></td>
				<td class="padd"><textarea rows="3" cols="30" name="problems"></textarea></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Attachments, if any:<br>
				</label></td>
				<td class="padd"><input type="file" name="choose_file[]"
					multiple="multiple" id="choose_file" class="" size="30"
					value="Choose File">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Preferred Time to Call you</label></td>
				<td class="padd"><input type="date" name="datetocall"
					id="datetocall" class="txt2" size="30"><input type="time"
					name="timetocall" id="timetocall" class="txt2" size="30"></td>
			</tr>
			<tr>
				<td class="padd_bot" align="right"><input name="Cancel"
					type="button" class="compemailsv"
					onclick="location.href='institution.php?fvalue=fs';" id="round"
					value="Cancel"></td>
				<td class="padd_bot" align="right"><input name="Submit"
					type="Submit" class="compemailsv" id="round" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php
	
	if (isset ( $_POST ['r_desc'] )) {
		//To store all the form details in SQLDB. 
		$categ = $_POST ['category'];
		$rdesc = $_POST ['r_desc'];
		$region = $_POST ['region'];
		$vdate = $_POST ['date'];
		$pdate = $_POST ['date1'];
		$expect = $_POST ['expectation'];
		$budg = $_POST ['budget'];
		$existingv = $_POST ['existing_vendors'];
		
		$problems = $_POST ['problems'];
		$timetocall = $_POST ['timetocall'];
		$datetocall = $_POST ['datetocall'];
		$timetocall = $datetocall . " " . $timetocall;
		if ($existingv == "Yes") {
			$satisfied = $_POST ['satisfied'];
		} else {
			$satisfied = "NA";
		}
		
		for($i = 0; $i < count ( $_FILES ['choose_file'] ['name'] ); $i ++) {
			
			$target_dir = "../documents/institutions/" . $_SESSION ['iusername'] . "_";//Set the directory path.
			$target_files = $target_dir . basename ( $_FILES ["choose_file"] ["name"] [$i] );
			$FileType = pathinfo ( $target_files, PATHINFO_EXTENSION );//Set filetype. Pathinfo_Extension provides the uploaded filetype.
			$target_file = $target_dir . "instreqatt_" . date ( 'd-m-Y' ) . '_' . $i . "." . $FileType;//used to set the name of the new files.
			
			move_uploaded_file ( $_FILES ['choose_file'] ['tmp_name'] [$i], $target_file );// Move the files to the required location and upload them in that directory
		}
		
		//Replace the single quotes with escape sequence to avoid SQL Query Errors
		$categ=str_replace("'","\'",$categ);
		$rdesc=str_replace("'","\'",$rdesc);
		$region=str_replace("'","\'",$region);
		$vdate=str_replace("'","\'",$vdate);
		$pdate=str_replace("'","\'",$pdate);
		$expect=str_replace("'","\'",$expect);
		$budg=str_replace("'","\'",$budg);
		$existingv=str_replace("'","\'",$existingv);
		$satisfied=str_replace("'","\'",$satisfied);
		$problems=str_replace("'","\'",$problems);
		$timetocall=str_replace("'","\'",$timetocall);
		$inname=str_replace("'","\'",$inname);
		$irname=str_replace("'","\'",$irname);
		$username=str_replace("'","\'",$username);
		
		$req = mysql_query ( "INSERT INTO requirement VALUES('$categ','$rdesc','$region','$vdate','$pdate','$expect','$budg','$existingv','$satisfied','$problems','0','$timetocall','0','$inname','$irname','$username','0')" );
		if ($req) {
			?>
	<script type="text/javascript">
	//Connfirmation for Requirement submission 
	alert('Requirement submitted successfully!');
	window.location.href="institution.php?fvalue=fs";
	</script>
		<?php
		}
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