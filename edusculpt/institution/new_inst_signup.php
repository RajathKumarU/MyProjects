<!-- When new institution has to be signed up -->
<!DOCTYPE html>
<html>
<?php
include '../config.php';//used for database connection
//This to start session.
session_start ();
$randomnr = rand ( 1000, 9999 );
$_SESSION ['randomnr2'] = $randomnr;
$con = mysql_connect ( $host, $dbuname, $dbpass );
if (! $con) {
	die ( 'could not connect: ' . mysql_error () );
}
mysql_select_db ( $dbname, $con );

?>
<head>
<title>Institution/Registrant signup</title>
<!-- To set icon in the browser tab -->
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../images/favicon.ico"
	type="image/x-icon" />
<!-- To set icon in the browser tab -->
<style type="text/css">
.one {
	width: 300px;
	height: 30px;
	background: gold;
	text-align: center;
	margin-left: 40%;
}

.txt {
	border: 3px solid gold;
	font-size: large;
	font-family: serif;
}

.lbl {
	font-size: large;
	font-family: sans-serif;
	font-weight: 500;
}

.padd {
	padding: 6px;
}

.btn {
	background: none;
	border: none;
}

input#round {
	width: 104px;
	height: 70px;
	background-color: #006633;
	border: 1px solid #006633;
	color: #fff;
	font-size: 1.6em;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, .75);
	-moz-box-shadow: 0 0 10px rgba(0, 0, 0, .75);
	box-shadow: 2px 2px 8px rgba(0, 0, 0, .75);
}

input#round:hover {
	background: #003319;
	border: 1px solid #006633;
	-webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	-moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
}
</style>
<script type="text/javascript" src="inst_validate.js"></script>
</head>
<body>
	<img src="../images/edulogo.png" alt="edusculpt_logo"
		style="display: block; margin-left: auto; margin-right: auto; width: 150px; height: 70px;" />
	<div class="caption"
		style="text-align: center; font-size: small; font-family: cursive;">Fast
		and Secure decision making!</div>
	<br>

	<div direction="left" scrollamount="0"
		style="background: #006633; font-weight: bold; font-size: large;">
		<p align="center">
			<font color="white">Contact us:+91 95000 07290</font>
		</p>
	</div>
	<div style="position: absolute; top: 160px; left: 1000px;">
		<a href="../homepage.php"><img alt="Chick for Home Page"
			src="../images/home_icon.png" height="40" width="40">
			<div class="caption" style="font-size: x-small;">Home Page</div></a>
	</div>
	
<?php

if ($_GET ['form_value'] == 'back') {
	
	// Code for institution registration form
	//Initiate all session variables to null. Required for coming back to institution registrant from regisrant registration.
	$_SESSION ['regname'] = null;
	$_SESSION ['regmob'] = null;
	$_SESSION ['regemail'] = null;
	$_SESSION ['regdesig'] = null;
	$_SESSION ['regidno'] = null;
	$_SESSION ['regownname'] = null;
	$_SESSION ['regownmob'] = null;
	$_SESSION ['regownemail'] = null;
	//Fetch all the required regions from the database as entered by the admin
	$resul1 = mysql_query ( "SELECT * FROM region" );
	?>
	<h2 class="one" align="centre"
		style="font-size: x-large; font-family: sans-serif; font-weight: 500;">Institution
		Registration</h2>
	<br>
	
	<form name="instform" id="instform" action="?form_value=next"
		onsubmit="return inst_validation()" method="post"><!-- Institution Form -->
		<table style="position: relative; margin-left: 23.5%;">
			<tr>
				<td class="padd"><label class="lbl">Institution Name</label></td>
				<td class="padd"><input type="text" name="inst_name" class="txt"
					size="30" style="width: 300px; font-family: sans-serif;"
					onchange="return check()"></td>
					<!--The below div is used to display if institution already exists -->
				<td><div id="icheck" style="color: red;"><?php echo "";?></div></td>
				
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Region</label></td>
				<td class="padd"><select class="txt" name="region"
					style="width: 305px;"><?php
	while ( $row = mysql_fetch_array ( $resul1 ) ) {
		?><option value='<?php echo $row['region']?>'><?php echo $row['region']?></option>
			<?php
	}
	?>
			</select></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Address</label></td>
				<td class="padd"><input type="text" name="address" class="txt"
					size="30" style="width: 300px;"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Pincode</label></td>
				<td class="padd"><input type="text" name="pincode" class="txt"
					size="30" style="width: 300px;"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Website Link</label></td>
				<td class="padd"><input type="text" name="website_link" class="txt"
					size="30" style="width: 300px;"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Affiliated University</label></td>
				<td class="padd"><input type="text" name="affiliated_university"
					class="txt" size="30" style="width: 300px;"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Institution Strength</label></td>
				<td class="padd"><input type="text" name="inst_strength" class="txt"
					size="30" style="width: 300px;"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Principal Name</label></td>
				<td class="padd"><select name="principal_title" class="txt"
					style="width: 95px;">
						<option value="Mr." selected="selected">Mr.</option>
						<option value="Mrs.">Mrs.</option>
						<option value="Miss">Miss</option>
						<option value="Ms.">Ms.</option>
						<option value="Dr.">Dr.</option>
				</select><span> </span><input type="text" name="principal_name"
					class="txt" size="22" style="width: 200px;"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Principal Mobile Number</label></td>
				<td class="padd"><input type="text" name="principal_mobile"
					class="txt" size="30" style="width: 300px;"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Principal Email ID</label></td>
				<td class="padd"><input type="text" name="principal_email"
					class="txt" size="30" style="width: 300px;"></td>
			</tr>
			<tr>
				<td class="padd"></td>
				<td class="padd" align="right"><button type="submit" id="isubmit"
						onclick="" class="btn">
						<img src="../images/next_icon.png" alt="Next" width="50"
							height="50" />
					</button></td>
			</tr>
		</table>
	</form>
	<script type="text/javascript">
	function check() {

		//This function is implemented using ajax to check if institution already exists
		
		document.getElementById("isubmit").disabled=true;

		var insname = document.forms["instform"]["inst_name"].value;

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() { 		//Function to execute after the data from server is received
				if (xhttp.readyState == 4 && xhttp.status == 200) {
					var msg=document.getElementById("icheck");
					msg.innerHTML=xhttp.responseText;
					if(msg.innerHTML.replace(/[^A-Za-z0-9]/g, '') != "InstitutionNameAlreadyExists"){
						window.glob=0;
						document.getElementById("isubmit").disabled=false;
					}
					else{
						window.glob=1;
					}
				}
			};
			xhttp.open("GET", "checkifexists.php?inst=" + insname, true);
			xhttp.send();			
		
	}
	</script>
	<br>
	<?php
}
if ($_GET ['form_value'] == 'next') {
	// code for registrant registration
	?>
	<h2 class="one" align="centre"
		style="font-size: x-large; font-family: sans-serif; font-weight: 500;">Registrant
		Registration</h2>
	<br>
	<form name="instformcntd" action="?form_value=final"
		onsubmit="return inst_validation_cntd('<?php echo $_SESSION ['randomnr2']; ?>')"
		method="post"><!-- Registrant Form -->
		<table style="position: relative; margin-left: 23%;">
			<tr>
				<td class="padd"><label class="lbl">Registrant Name</label></td>
				<td class="padd"><select name="reg_title" class="txt">
						<option value="Mr." selected="selected">Mr.</option>
						<option value="Mrs.">Mrs.</option>
						<option value="Miss">Miss</option>
						<option value="Ms.">Ms.</option>
						<option value="Dr.">Dr.</option>
				</select><span> </span><input type="text" name="reg_name"
					id="reg_name" value="<?php echo $_SESSION['regname'];?>"
					class="txt" size="22"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Mobile Number</label></td>
				<td class="padd"><input type="text" name="reg_mobile"
					id="reg_mobile" class="txt"
					value="<?php echo $_SESSION['regmob'];?>" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Email ID</label></td>
				<td class="padd"><input type="text" name="reg_email" id="reg_email"
					class="txt" value="<?php echo $_SESSION['regemail'];?>" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Designation</label></td>
				<td class="padd"><input type="text" name="reg_designation"
					id="reg_designation" value="<?php echo $_SESSION['regdesig'];?>"
					class="txt" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">ID Card Number</label></td>
				<td class="padd"><input type="text" name="reg_id_no" id="reg_id_no"
					class="txt" value="<?php echo $_SESSION['regidno'];?>" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Owner / Authority Name</label></td>
				<td class="padd"><input type="text" name="own_name" id="own_name"
					class="txt" value="<?php echo $_SESSION['regownname'];?>" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Owner Mobile Number</label></td>
				<td class="padd"><input type="text" name="own_mobile"
					id="own_mobile" class="txt"
					value="<?php echo $_SESSION['regownmob'];?>" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Owner Email ID</label></td>
				<td class="padd"><input type="text" name="own_email" id="own_email"
					class="txt" value="<?php echo $_SESSION['regownemail'];?>"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Choose Username</label></td>
				<td class="padd"><input type="text" name="reg_username" onchange="return ucheck()"
					id="reg_username" class="txt" size="30"></td>
					<td><div id="ucheck" style="font-family: sans-serif;color: red;"><?php echo "";?></div></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Choose Password</label></td>
				<td class="padd"><input type="password" name="reg_pass" class="txt"
					placeholder="Atleast 6 characters including numbers" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Confirm Password</label></td>
				<td class="padd"><input type="password" name="reg_conf_pass"
					class="txt" size="30"></td>
			</tr>

			<tr>
				<td class="padd"><label class="lbl">Validation code:</label></td>
				<td class="padd"><img src="../captcha.php" id='captchaimg'></td>

			</tr>
			<tr>
				<td class="padd"><label class="lbl">Enter the Validation code:</label>
				</td>
				<td class="padd"><input id="captcha_code" name="captcha_code"
					type="text"></td>

			</tr>

			<tr>
				<td class="padd" align="left"><button type="button"
						onclick="history.go(-1);" class="btn">
						<img src="../images/back_icon.png" alt="Back" width="50"
							height="50" />
					</button></td>
				<td align="right" class="padd"><input name="Signup" type="submit"
					id="round" value="Sign Up"></td>
			</tr>
		</table>

	</form>
	<script type="text/javascript">
	function ucheck() {

		//This function uses ajax to check if username already exists
		
		document.getElementById("round").disabled=true;
		
		var usrname = document.forms["instformcntd"]["reg_username"].value;

			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {			//Function to execute after the data from server is received
				if (xhttp.readyState == 4 && xhttp.status == 200) {
					var msg=document.getElementById("ucheck");
					msg.innerHTML=xhttp.responseText;
					if(msg.innerHTML.replace(/[^A-Za-z0-9]/g, '') != "UsernameAlreadyExists"){
						window.uglob=0;
						document.getElementById("round").disabled=false;
					}
					else{
						window.uglob=1;
					}
				}
			};
			xhttp.open("GET", "checkifexists.php?user=" + usrname, true);
			xhttp.send();			
		
	}
	</script>
	
	
	<?php
	// Store contents of first form to session variable so that it is visible while adding details to database
	// if(!isset($_SESSION['insname'])){
	$_SESSION ['insname'] = $_POST ["inst_name"];
	$_SESSION ['region'] = $_POST ["region"];
	$_SESSION ['address'] = $_POST ["address"];
	$_SESSION ['pin'] = $_POST ["pincode"];
	$_SESSION ['weblink'] = $_POST ["website_link"];
	$_SESSION ['affuni'] = $_POST ["affiliated_university"];
	$_SESSION ['strength'] = $_POST ["inst_strength"];
	$_SESSION ['pname'] = $_POST ["principal_title"] . $_POST ["principal_name"];
	$_SESSION ['pmob'] = $_POST ["principal_mobile"];
	$_SESSION ['pemail'] = $_POST ["principal_email"];
	// }
}



// Check if signup button is clicked and entered captcha is correct
if (isset ( $_POST ['Signup'] ) && ($_GET ['form_value'] == 'final')) {
	//Replace the single quotes with escape sequence to avoid SQL Query Errors
	
	$insname = $_SESSION ['insname'];
	$insname = str_replace ( "'", "\'", $insname );
	$region = $_SESSION ['region'];
	$region = str_replace ( "'", "\'", $region );
	$address = $_SESSION ['address'];
	$address = str_replace ( "'", "\'", $address );
	$pin = $_SESSION ['pin'];
	$pin = str_replace ( "'", "\'", $pin );
	$weblink = $_SESSION ['weblink'];
	$weblink = str_replace ( "'", "\'", $weblink );
	$affuni = $_SESSION ['affuni'];
	$affuni = str_replace ( "'", "\'", $affuni );
	$strength = $_SESSION ['strength'];
	$strength = str_replace ( "'", "\'", $strength );
	$pname = $_SESSION ['pname'];
	$pname = str_replace ( "'", "\'", $pname );
	$pmob = $_SESSION ['pmob'];
	$pmob = str_replace ( "'", "\'", $pmob );
	$pemail = $_SESSION ['pemail'];
	$pemail = str_replace ( "'", "\'", $pemail );
	
	$rname = $_POST ["reg_title"] . $_POST ["reg_name"];
	$rname = str_replace ( "'", "\'", $rname );
	$rmob = $_POST ["reg_mobile"];
	$rmob = str_replace ( "'", "\'", $rmob );
	$remail = $_POST ["reg_email"];
	$remail = str_replace ( "'", "\'", $remail );
	$rdesig = $_POST ["reg_designation"];
	$rdesig = str_replace ( "'", "\'", $rdesig );
	$regid = $_POST ["reg_id_no"];
	$regid = str_replace ( "'", "\'", $regid );
	$ownname = $_POST ["own_name"];
	$ownname = str_replace ( "'", "\'", $ownname );
	$ownmob = $_POST ["own_mobile"];
	$ownmob = str_replace ( "'", "\'", $ownmob );
	$ownemail = $_POST ["own_email"];
	$ownemail = str_replace ( "'", "\'", $ownemail );
	$uname = $_POST ["reg_username"];
	$uname = str_replace ( "'", "\'", $uname );
	$pass = $_POST ["reg_pass"];
	$pass = str_replace ( "'", "\'", $pass );
	
	// connect to database
	$con = mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	
	
	// insert institution details and registrant details to database
	$hash = md5 ( rand ( 0, 1000 ) );
	$insresult = mysql_query ( "INSERT INTO institution VALUES ('$insname','$region','$address','$pin','$weblink','$affuni','$strength','$pname','$pemail','$pmob','5','$hash','','')" );
	if ($insresult) {
		$regresult = mysql_query ( "INSERT INTO i_registrant VALUES ('$rname','$rmob','$remail','$rdesig','$regid','$ownname','$ownmob','$ownemail','$uname','$pass','$insname')" );
		
		if (! $regresult) {
			// $_SESSION['regname']=$rname;
			// $_SESSION['regmob']=$rmob;
			// $_SESSION['regemail']=$remail;
			// $_SESSION['regdesig']=$rdesig;
			// $_SESSION['regidno']=$regid;
			// $_SESSION['regownname']=$ownname;
			// $_SESSION['regownmob']=$ownmob;
			// $_SESSION['regownemail']=$ownemail;
			// echo "<script>alert('username already exists,try another name!');
			// window.location.href='new_inst_signup.php?form_value=next';
			// </script>";
			?>
			<script type="text/javascript">alert("Couldn't capture registrant details\n");</script>
			<?php
		} else {
			?>
				
				
				<?php
			// The below code is used to mail using local mail server(which godaddy provides)
			
			// $to = $remail;
			// $subject = "Signup | Verification";
			// $header = "Mail us: info@edusculpt.com";
			// $message = '
			
			// Thanks for signing up!
			// Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
			
			// ------------------------
			// Username: '.$uname.'
			// Password: '.$pass.'
			// ------------------------
			
			// Please click this link to activate your account:
			// http://www.edusculpt.com/institution/verify.php?name='.urlencode($uname).'&hash='.$hash.'
			
			// ';
			
			// $sentmail = mail ( $to, $subject, $message, $header );
			
			// if ($sentmail) {
			// echo "<script>alert('Confirmation link Has Been Sent To Your Email Address.');</script>";
			// } else {
			// echo "<script>alert('Cannot send Confirmation link to your e-mail address');</script>";
			// }
			// Account has been created and values have been added to database
			
				
				
			/*The below code is used to mail from info@edusculpt.com using PHPMailer API */	
			date_default_timezone_set ( 'asia/Kolkata' );
			
			require '../PHPMailer/PHPMailerAutoload.php';
			
			$mail = new PHPMailer ();
			
			// $mail->SMTPDebug = 3; // Enable verbose debug output
			
			// $mail->isSMTP (); // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
			$mail->SMTPAuth = true; // Enable SMTP authentication
			$mail->Username = 'info@edusculpt.com'; // SMTP username
			$mail->Password = 'Ramana123'; // SMTP password
			$mail->SMTPSecure = 'TLS'; // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587; // TCP port to connect to
			
			$mail->setFrom ( 'info@edusculpt.com' );
			$mail->addAddress ( $remail ); // Add a recipient
			$mail->addReplyTo ( 'info@edusculpt.com' );
			
			// $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
			// $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
			$mail->isHTML ( false ); // Set email format to HTML
			
			$mail->Subject = 'Signup | Verification';
			$mail->Body = '<br>
				<br>
				<br>Dear Sir/Madam,
				<br>As discussed, We want to help Institution save time and Money on every purchase.
				<br>
				<br>As a part of it we have created a  basic version of vendor request and search portal 
				<br>only for a few supportive and tech oriented customers like you.
				<br>
				<br>To make it simple for you, we have created a demo account for you to review and pass comments to us. 
				<br>Based on your convenience please click on activation link (to log into edusculpt.com with the mentioned username and password).
				<br>
				<br>------------------------------
				<br>Username: ' . $uname . '
				<br>Password: ' . $pass . '
				<br>------------------------------
				<br>
				<br>Please click this link or copy this link to your browser and visit the page to activate your account:
				<br><a href="http://www.edusculpt.com/institution/verify.php?name=' . urlencode ( $uname ) . '&hash=' . $hash . '">http://www.edusculpt.com/institution/verify.php?name=' . urlencode ( $uname ) . '&hash=' . $hash . '</a>
				<br>
				<br>
				<br>Trust it clarifies. Please call us in-case any questions or requirement.
				<br>
				<br>Hari: 09940039918,
				<br>
				<br>Sathya: 09500007290
				<br>
				<br>
				<br>';
				
			$mail->AltBody = '
				
				Dear Sir/Madam,
				As discussed, We want to help Institution save time and Money on every purchase.

				As a part of it we have created a  basic version of vendor request and search portal only for a few supportive and tech oriented customers like you.

				To make it simple for you, we have created a demo account for you to review and pass comments to us. Based on your convenience please click on 								activation link (to log into edusculpt.com with the mentioned username and password).
				
				------------------------------
				Username: ' . $uname . '
				Password: ' . $pass . '
				------------------------------
				
				Please click this link or copy this link to your browser and visit the page to activate your account:
				http://www.edusculpt.com/institution/verify.php?name=' . urlencode ( $uname ) . '&hash=' . $hash . '

				Trust it clarifies. Please call us in-case any questions or requirement.

				Hari: 09940039918,

				Sathya: 09500007290

				
				
				';
			
			if (! $mail->send ()) {
				echo "<script>alert('Cannot send Confirmation link to your e-mail address');</script>";
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				echo "<script>alert('Confirmation link Has Been Sent To Your Email Address.');</script>";
			}
			
			mysql_close ( $con );
			?>
				<script type="text/javascript">
					//alert('Account created succesfully please wait while we revert in 24 hours!');
					window.location.href="../homepage.php";
				</script>
				<?php
		}
	} else {
		?>
		<script type="text/javascript">
		alert("Error occured while storing Institution details!!\n");
		window.location.href="new_inst_signup.php?form_value=back";
		</script>
		<?php
	}
}
?></body>
</html>