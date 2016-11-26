<!-- This is used for all actions like feedback recall report and refer for myvendors -->

<html>
<head>
<?php
//These are to start session.
session_start ();
ob_start ();
?>
<title>
<?php
$action=$_GET['action'];
echo $action; //To set the title to the required action  
?>
</title>
<!-- To set icon in the browser tab -->
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />			
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" /> 
<!-- To set icon in the browser tab -->
<style type="text/css">
.padd {
	padding: 6px;
}

.txt1 {
	border: 3px solid gold;
	font-size: large;
	font-family: serif;
	width: 300px;
}

.lbl {
	font-size: large;
	font-family: sans-serif;
	font-weight: 500;
}

textarea {
	border: 3px solid gold;
	font-size: large;
	font-family: serif;
}

.compemailsv {
	width: 100px;
	height: 50px;
	background: gold;
	font-weight: bold;
}

.one {
	width: 450px;
	height: 30px;
	background: gold;
	text-align: center;
	margin-left: auto;
	margin-right: auto;
}

.txt {
	width: 80px;
	border: 3px solid gold;
	font-size: large;
	font-family: serif;
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
function submitrefer(){
	alert('Vendor Referred Successfully! \n\n Your credits can be tracked through \"Referral Status\"\n section in Credits and Referrals Tab');
}
// Confirmation for  Referrals
</script>
<script type="text/javascript">
function submitfeedback(){
	alert('Thanks for your valuable Feedback!');
	// Confirmation for  Feedback 
}
</script>
<script type="text/javascript">
function submitrecall(){
	alert('Vendor details mailed to you!\n\nVendor/ES will contact you shortly');		
	window.location.href('institution.php?fvalue=th&lvalue=rh');
	// Confirmation for  Recall
}</script>
<script type="text/javascript">
function submitreport(){
	alert('You are important to us! We will look into this on priority!\n \nLook forward to your support to resolve this!');
	window.location.href('institution.php?fvalue=th&lvalue=rh');
	// Confirmation for  Report
}</script>

<script type="text/javascript">
function disp_comments(){
	var sat=document.getElementById("comments");
	sat.setAttribute("class", "show");
	var sat1=document.getElementById("comments1");
	sat1.setAttribute("class", "show");
	//To display textarea only when "Other" radio button is selected
}
</script>
</head>

<body>
<?php  if(isset($_SESSION ['iusername'])){
//To check if the user has not signedin properly or session expires?>
<?php if ($_GET['action']=='Refer'){
//This is the Refer action section?>
<div style="position: absolute; right: 10%; top: 5%;">
		<a href="institution.php?fvalue=th&lvalue=mv"><img
			alt="Chick for Home Page" src="../images/cancel.png" height="40"
			width="40"></a>
	</div>
	<img src="../images/edulogo.png" alt="edusculpt_logo"
		style="display: block; margin-left: auto; margin-right: auto; width: 150px; height: 70px;" />
	<div class="caption"
		style="text-align: center; font-size: small; font-family: cursive;">Fast
		and Secure decision making!</div>
	<div direction="left" scrollamount="0"
		style="background: #006633; font-weight: bold; font-size: large;">
		<p align="center">
			<font color="white">Contact us:+91 95000 07290</font>
		</p>
	</div>
	<h2 class="one" align="centre">Refer Vendor to Institution</h2>
	<form id="referform" action="institution.php?fvalue=th&lvalue=mv"
		method="post" onsubmit="submitrefer();"><!-- Refer Form -->
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
				<td class="padd"><label class="lbl">Comments</label></td>
				<td class="padd"><textarea rows="3" cols="31"></textarea>
			
			
			<tr>
				<td align="right" class="padd"></td>
				<td align="right" class="padd"><input name="Submit" type="submit"
					class="compemailsv" id="round" value="Submit"></td>
			</tr>

		</table>
	</form>
<?php } if ($_GET['action']=='Feedback'){
//This is the Feedback action section?>
<div style="position: absolute; right: 10%; top: 5%;">
		<a href="institution.php?fvalue=th&lvalue=mv"><img
			alt="Chick for Home Page" src="../images/cancel.png" height="40"
			width="40"></a>
	</div>
	<img src="../images/edulogo.png" alt="edusculpt_logo"
		style="display: block; margin-left: auto; margin-right: auto; width: 120px; height: 50px;" />
	<div class="caption"
		style="text-align: center; font-size: small; font-family: cursive;">Fast
		and Secure decision making!</div>
	<div direction="left" scrollamount="0"
		style="background: #006633; font-weight: bold; font-size: large;">
		<p align="center">
			<font color="white">Contact us:+91 95000 07290</font>
		</p>
	</div>
	<h2 class="one" align="centre">Feedback for Vendor</h2>
	<form id="feedbackform" action="institution.php?fvalue=th&lvalue=mv"
		method="post" onsubmit="submitfeedback();"><!-- Feedback Form -->
		<table align="center">
			<tr>
				<td class="padd"><label class="lbl">Vendor Name</label></td>
				<td class="padd"><input type="text" name="vend_name" class="txt1"
					size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Vendor Details</label></td>
				<td class="padd"><input type="text" name="vend_details" class="txt1"
					size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Support</label></td>
				<td class="padd" align="center"><h3>&#9733&#9733&#9733&#9734&#9734</h3></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Quality</label></td>
				<td class="padd" align="center"><h3>&#9733&#9733&#9734&#9734&#9734</h3></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Behaviour</label></td>
				<td class="padd" align="center"><h3>&#9733&#9733&#9733&#9733&#9734</h3></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Ahere to Timelines</label></td>
				<td class="padd" align="center"><h3>&#9733&#9733&#9733&#9733&#9733</h3></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Would you Refer the Vendor to<br>Other
						Colleges?
				</label></td>
				<td class="padd" align="left"><input type="radio" name="refer"
					class="txt" value="Yes" onclick="">Yes <input type="radio"
					name="refer" class="txt" value="No">No</td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Comments</label></td>
				<td class="padd"><textarea rows="3" cols="31" name="comments"></textarea>
				</td>
			
			
			<tr>
				<td align="right" class="padd"></td>
				<td align="right" class="padd"><input name="Submit" type="submit"
					class="compemailsv" id="round" value="Submit"></td>
			</tr>

		</table>
	</form>
<?php } if ($_GET['action']=='Recall'){
//This is the Recall action section?>
<div style="position: absolute; right: 10%; top: 5%;">
		<a href="institution.php?fvalue=th&lvalue=mv"><img
			alt="Chick for Home Page" src="../images/cancel.png" height="40"
			width="40"></a>
	</div>
	<img src="../images/edulogo.png" alt="edusculpt_logo"
		style="display: block; margin-left: auto; margin-right: auto; width: 120px; height: 50px;" />
	<div class="caption"
		style="text-align: center; font-size: small; font-family: cursive;">Fast
		and Secure decision making!</div>
	<div direction="left" scrollamount="0"
		style="background: #006633; font-weight: bold; font-size: large;">
		<p align="center">
			<font color="white">Contact us:+91 95000 07290</font>
		</p>
	</div>
	<h2 class="one" align="centre">Recall Vendor</h2>
	<form id="referform" action="institution.php?fvalue=th&lvalue=mv"
		method="post" onsubmit="submitrecall();"><!-- Recall Form -->
		<table align="center">
			<tr>
				<td class="padd"><label class="lbl">Vendor Name</label></td>
				<td class="padd"><input type="text" name="vend_name" class="txt1"
					size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Vendor Category</label></td>
				<td class="padd"><input type="text" name="vend_cat" class="txt1"
					size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Vendor Description</label></td>
				<td class="padd"><input type="text" name="vend_desc" class="txt1"
					size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Purpose of Recall?</label></td>
				<td class="padd" align="left"><input type="radio" name="purpose"
					value="repeat"
					onclick="window.location.href='institution.php?fvalue=th&lvalue=rh';">
					&nbsp;&nbsp;Repeat Order</td>
			</tr>

			<tr>
				<td></td>
				<td class="padd" align="left"><input type="radio" name="purpose"
					value="new" onclick="window.location.href='institutionreq.php';">
					&nbsp;&nbsp;New Order</td>
			</tr>
			<tr>
				<td></td>
				<td class="padd" align="left"><input type="radio" name="purpose"
					value="new" onclick="disp_comments();"> &nbsp;&nbsp;Other</td>
			</tr>
			<!-- JS Function disp_comments() to display textarea only when other is selected -->
			<tr>
				<td id="comments" class="hidden"><label class="lbl">Comments</label></td>
				<td id="comments1" class="hidden"><textarea rows="3" cols="31"
						name="comments"></textarea></td>
			<tr>
				<td align="right" class="padd"></td>
				<td align="right" class="padd"><input name="Submit" type="submit"
					class="compemailsv" id="round" value="Submit"></td>
			</tr>
		</table>
	</form>
<?php } if ($_GET['action']=='Report'){
//This is the Report action section?>

<div style="position: absolute; right: 10%; top: 5%;">
		<a href="institution.php?fvalue=th&lvalue=mv"><img
			alt="Chick for Home Page" src="../images/cancel.png" height="40"
			width="40"></a>
	</div>
	<img src="../images/edulogo.png" alt="edusculpt_logo"
		style="display: block; margin-left: auto; margin-right: auto; width: 120px; height: 50px;" />
	<div class="caption"
		style="text-align: center; font-size: small; font-family: cursive;">Fast
		and Secure decision making!</div>
	<div direction="left" scrollamount="0"
		style="background: #006633; font-weight: bold; font-size: large;">
		<p align="center">
			<font color="white">Contact us:+91 95000 07290</font>
		</p>
	</div>
	<h2 class="one" align="centre">Report an Issue</h2>
	<form id="reportform" action="institution.php?fvalue=th&lvalue=mv"
		method="post" onsubmit="submitreport();"><!-- Report Form -->
		<table align="center">
			<tr>
				<td class="padd"><label class="lbl">Requirement Number</label></td>
				<td class="padd"><input type="text" name="req_num" class="txt1"
					size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Requirement Category</label></td>
				<td class="padd"><input type="text" name="req_categ" class="txt1"
					size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Requirement Decription</label></td>
				<td class="padd"><input type="text" name="req_desc" class="txt1"
					size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Vendor Name</label></td>
				<td class="padd"><input type="text" name="vend_name" class="txt1"
					size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Vendor Details</label></td>
				<td class="padd"><input type="text" name="vend_details" class="txt1"
					size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Date</label></td>
				<td class="padd"><input type="text" name="date" class="txt1"
					size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Issue Details</label></td>
				<td class="padd"><textarea rows="3" cols="31"></textarea></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Expected Solution if any</label></td>
				<td class="padd"><input type="text" name="exp_sol" class="txt1"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Attachments, if any:<br>
				</label></td>
				<td class="padd"><input type="file" name="choose_file[]"
					id="choose_file" class="" size="30" value="Choose File">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td align="right" class="padd"></td>
				<td align="right" class="padd"><input name="Submit" type="submit"
					class="compemailsv" id="round" value="Submit"></td>
			</tr>

		</table>
	</form>


<?php }?>
<?php } else {
	//If the user has not signedin properly or session expires
echo '<script>alert("Please Signin!");window.location.href="../homepage.php";</script>';
}?>
</body>
</html>