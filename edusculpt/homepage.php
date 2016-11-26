<!-- Homepage of http://www.edusculpt.com -->

<?php
include 'config.php';
ob_start ();
session_start ();

//Database connection
$con = mysql_connect ( $host, $dbuname, $dbpass );
if (! $con) {
	die ( 'could not connect: ' . mysql_error () );
}
mysql_select_db ( $dbname, $con );
?>
<!DOCTYPE html>
<html>
<head>

<!-- Used to display title & icon on browser tab -->
<title>Homepage</title>
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<!-- Used to display title & icon on browser tab -->

<link rel="stylesheet" type="text/css" href="Css_home/fancybox.css" />
<link rel="stylesheet" type="text/css" href="Css_home/social-icons.css"
	media="screen,projection" />
<link rel="stylesheet" type="text/css" href="Css_home/mainstyle.css"
	title="wsite-theme-css" />
<link href='Css_home/css.css' rel='stylesheet' type='text/css' />
<script type="text/javascript">
function inst_signin_validation(){
//check if both the username and password is filled
	
	var usrname=document.forms["inssigninform"]["reguname"].value;
	var usrpass=document.forms["inssigninform"]["regpass"].value;
	if(usrname==null || usrname==""){
		alert("Name must be filled!");
		return false;
	}	
	else if(usrpass==null || usrpass==""){
		alert("Password must be filled!");
		return false;
	}
	else{
		return true;
	}
}
function Redirect() {
	//redirect the page to homepage upon logout
    window.location="homepage.php";
 }
</script>
<script type="text/javascript">
function contact_validate() {
	//Validates the information provided in Contact us section	
	var name = document.forms["contact_form"]["name"].value;
	var email = document.forms["contact_form"]["email"].value;
	var mess = document.forms["contact_form"]["message"].value;

	//filter is used to validate mail format
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if (name == null || name == "") {
		alert("Can you please enter your name!");
		return false;
	} else if (email == null || email == "") {
		alert("Can you please enter your email!");
		return false;
	} else if (email == null || email == "" || !filter.test(email)) {
		alert("Please check ur email-ID!");
		return false;
	} else {
		return true;
	}
	
}
</script>
<script type="text/javascript">
//Used to Display and hide Back to Top button
window.onscroll = function() {myFunction()};

function myFunction() {
    if (window.scrollY > 550) {
        //Show Back to Top button after scrolling page to 550 pixels
        document.getElementById("imgtop").className = "img-topshow";
    } else {
    	//Hide Back to Top button after scrolling page to below 550 pixels
        document.getElementById("imgtop").className = "img-tophide";
    }
  
}
</script>
<style type='text/css'>
.img-topshow {
	/*Displays Back to Top button*/
	width: 60px;
	position: fixed;
	bottom: 1%;
	right: 0%;
	visibility: visible;
}

.img-tophide {
	/*Hides Back to Top button*/
	width: 60px;
	position: fixed;
	bottom: 1%;
	right: 0%;
	visibility: hidden;
}

.caption {
	/*Back to Top caption Hidden initially*/
	font-size: 11px;
	visibility: hidden;
	opacity: 0;
}

.img-topshow:hover .caption {
	/*Back to Top caption made visible on hovering*/
	visibility: visible;
	opacity: 1;
}

.login {
	/*Style for Institution Signin*/
	border: none;
	max-width: 200px;
}

.btn_send {
	/*Style for Send it button in enquiry form*/
	width: 60px;
	height: 30px;
	color: white;
	background-color: #007051;
	border-color: #006644;
}

.loginth {
	/*Style for displaying Institution Heading tab in signin form*/
	background-color: #007051;
	color: white;
	padding: 25px;
	border-radius: 10px;
	border: 3px solid #FCD116;
	border-radius: 10px;
}

.logintd {
	/*Style for displaying Institution table data tab in signin form*/
	background-color: #E0E0E0;
	padding: 20px;
	border-radius: 10px;
	border: 3px solid #FCD116;
}

#bold {
	font-weight: bold;
}

.txt {
	/*Style for textbox in institution signin form*/
	border: 2px solid #FCD116;
	font-size: large;
	font-family: serif;
}

input#round:hover {
	background: #003319;
	border: 1px #007051;
	-webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	-moz-box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
	box-shadow: 0px 0px 3px rgba(0, 0, 0, .75);
}

input#round {
	width: 150px;
	height: 30px;
	background-color: #007051;
	border: 1px #007051;
	color: #fff;
	font-size: 20px;
	-webkit-border-radius: 10px;
	-moz-border-radius: 10px;
	border-radius: 10px;
	-webkit-box-shadow: 0 0 10px rgba(0, 0, 0, .75);
	-moz-box-shadow: 0 0 10px rgba(0, 0, 0, .75);
	box-shadow: 2px 2px 8px rgba(0, 0, 0, .75);
}

.wsite-background {
	/*Style for background edusculpt image*/
	background-image: url("images/home.png") !important;
	background-repeat: no-repeat !important;
	background-position: 0% 100% !important;
	background-size: 73% 71.7% !important;
	background-color: transparent !important;
	background: inherit;
}

body.wsite-background {
	background-attachment: fixed !important;
}

.wsite-background.wsite-custom-background {
	/*Style for fixing background edusculpt image size*/
	background-size: 73% 71.7% !important
}

.padd {
	/*Style used for padding between elements of the form*/
	padding: 15px:
}
</style>
<script src='Css_home/jquery.min.js'></script>
<script type="text/javascript" src="Css_home/custom.js"></script>
<script type="text/javascript" src="Css_home/plugins.js"></script>
<script src="Css_home/main.js"></script>
</head>
<body class="landing-page  wsite-theme-light  wsite-page-index">
	<div id="banner-wrap" class="wsite-background wsite-custom-background">
		<div id="banner-cover">

			<div id="header-wrap">
				<div align="right"
					style="background-color: #007051; color: white; vertical-align: top; border-bottom: 2px solid #007051">

					<!-- Edusculpt contact details are displayed -->
					<img alt="Call:" src="images/call.png"><span
						style="position: relative; top: -8px;"> +91-95000 07290 </span>&nbsp;
					&nbsp; <img alt="Email:" src="images/mail.png"><span
						style="position: relative; top: -8px;">info@edusculpt.com </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				</div>
				
				<!-- Container containig edusculpt logo and menu options-->
				<div id="header" class="container">
					<label id="nav-trigger" class="hamburger" for="mobile-input"><span></span></label>
					
					<!-- Displays edusculpt logo -->
					<h1 id="logo">
						<span class="wsite-logo"> <a href="/"> <img id="logoimg"
								src="images/edulogo.png" width="270px" height="120px" />
						</a>

						</span>
					</h1>
					
					<!-- Menu items containing Home, About us, Customers and Testimonials & Contact us -->
					<div id="nav">
						<ul class="wsite-menu-default">
							<li id="active" class="wsite-menu-item-wrap"><a href="#"
								class="wsite-menu-item"><b>Home</b> </a></li>

							<li id="" class="wsite-menu-item-wrap"><a href="#about"
								class="wsite-menu-item"><b> About Us</b> </a></li>
							<li id="" class="wsite-menu-item-wrap"><a href="#testimonials"
								class="wsite-menu-item"> <b>Customers & Testimonials</b>
							</a></li>
							<li id="pg645431288400220243" class="wsite-menu-item-wrap"><a
								href="#contact" class="wsite-menu-item"> <b>Contact</b>
							</a></li>
							<li>&nbsp;</li>
						</ul>
					</div>
				</div>
				<!-- Menu items containing Home, About us, Customers and Testimonials & Contact us for mobiles -->
				<div id="mobile-nav" class="container">
					<input type="checkbox" id="mobile-input">
					<ul class="wsite-menu-default">
						<li id="active" class="wsite-menu-item-wrap"><a href="/"
							class="wsite-menu-item"> Home </a></li>
						<li id="" class="wsite-menu-item-wrap"><a href="#about"
							class="wsite-menu-item"> About Us </a></li>
						<li id="" class="wsite-menu-item-wrap"><a href="#testimonials"
							class="wsite-menu-item"> Customers & Testimonials </a></li>
						<li id="pg645431288400220243" class="wsite-menu-item-wrap"><a
							href="#contact" class="wsite-menu-item"> Contact </a></li>
					</ul>
				</div>
			</div>

			<div id="banner" class="container">
				<div id="banner-content">
					<br>
					<h2>
						<span class="wsite-text wsite-headline"> Edusculpt Education <br>Solutions
							Pvt. Ltd.
						</span>
					</h2>
					<br> <br>
					<p>
						<span class="wsite-text wsite-headline-paragraph"> Platform to
							deliver value to<br> education ecosystem
						</span>
					</p>
					<br> <br>
				</div>
				
				<!-- Form that provides Institution login -->
				<table class="login">
					<tr align="center">
						<th class="loginth"><font size="8px">Institution </font></th>
					</tr>
					<tr align="center">
						<form name="inssigninform" action="homepage.php"
							onsubmit="return inst_signin_validation()" method="post">
							<tr>
								<td class="logintd"><font size="4" color="#007051"><b>Username :
									</b></font><br> <br> <input type="text" name="reguname"
									class="txt" size="22"> <br> <br> <font size="4" color="#007051"><b>Password
											: </b></font><br> <br> <input type="password" name="regpass"
									class="txt" size="22"> <br> <br>
									<div align="center">
										<input name="signin" type="submit" id="round" value="Sign in"></td>
								</div>
							</tr>
						</form>
						</div>
<?php
$status = false;
if (isset ( $_POST ['signin'] )) {
	// when signin button is clicked connect to database and validate username and password
	
	$con = mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	
	$usrname = $_POST ['reguname'];
	$pass = $_POST ['regpass'];
	$result = mysql_query ( "SELECT * FROM i_registrant AS r,institution AS i WHERE i.i_name=r.i_name AND username='$usrname' AND password='$pass' AND accept_reject='1';" );
	while ( $row = mysql_fetch_array ( $result ) ) {
		// when the record matches with username and password change $status variable to true
		$status = true;
	}
	if ($status) {
		// if $status is true then entered username and password is correct and the page is directed to the page od that user
		$_SESSION ['iusername'] = $usrname;
		?>
		<script type="text/javascript">window.location.href="institution/institution.php?fvalue=fs"</script>
		<?php
		// header ( 'Location: institution/institution.php?fvalue=fs' );
	} else {
		// if $status is false,then username or password is invalid
		echo "<script>alert('Username or Password is invalid!');</script>";
	}
}
?>	
					<tr>
						<td class="logintd"><font size="3">New User? &nbsp;&nbsp; &nbsp;<span
								id="bold"><a
									href="institution/new_inst_signup.php?form_value=back">Create
										an Account</a></span></font></td>
					</tr>
					<tr></tr>
				</table>
			</div>
		</div>
	</div>
	
	<!-- Displays About us section -->
	<div id="about" class="container">
	<div class="wsite-spacer" style="height: 6px;"></div>
	<div id="main-wrap" style="clear: both">
		<div>
			<div id='wsite-content' class='wsite-elements wsite-not-footer'>
					<div class="wsite-spacer" style="height: 40px;"></div>
					<hr>
					<div class="wsite-spacer" style="height: 40px;"></div>
					<div>
						<br> <br>
						<div style="background: #FCD116; margin: auto;">
							<p class="wsite-content-title"
								style="text-align: left; vertical-align: middle;">
								<font size="6" color="#007051" face= "sans-serif"> <b>&nbsp;&nbsp;About Us</b>
								</font>
							</p>
						</div>
					</div>

					<div class="container" style="margin: 5%;">
						<div class="paragraph"
							style="text-align: left; text-align: justify;">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EduSculpt Education Solutions, with
							a management that has a rich experience in working with people
							across the hierarchy of educational institutions, will partner or
							work with institutions to recommend &amp; provide optimum, and
							cost effective solution based on their needs.<br />Currently we
							provide solutions and services in key domains, but the goal is to
							create a congenial ecosystem for educational institutions and
							solution/service providers to collaborate and identify their
							partners based on- budget, quality, delivery schedule, and other
							relevant parameters.<br />EduSculpt is also an outcome of the
							good wishes and appreciation received from senior academicians,
							institutions and other educational stakeholders for the
							commitment, customer service, and quality centric approach of its
							management. To reciprocate this trust reposed on it, EduSculpt
							will leave no stone unturned in ensuring highest standards of
							customer or partner satisfaction and work towards setting
							industry standards/benchmarks in every domain it operates
							(currently and in future).<br />This is just the beginning and we
							&nbsp;<strong>HAVE MILES TO GO BEFORE WE SLEEP!</strong>
						</div>
					</div>
				</div>
				
				<!-- Displays Customers & Testimonials Section -->
				<div id="testimonials"><br>
					<div class="wsite-spacer" style="height: 34px;"></div>
					<br>
					<div class="wsite-spacer" style="height: 25px;"></div>
					<hr><div class="wsite-spacer" style="height: 30px;"></div>
					
					<br> <br>
					<div class="wsite-spacer" style="height: 20px;"></div>
					<div class="container"
						style="background: #FCD116; margin: 0px; margin: auto;">
						<p class="wsite-content-title"
							style="text-align: left; vertical-align: middle;">
							<font size="6" color="#007051" face= "sans-serif"><b>&nbsp;&nbsp;Testimonials</b> </font>
						</p>
					</div>
				</div>

				<div class="container" style="margin: 5%;">
					<div class="paragraph"
						style="text-align: left; text-align: justify;">
						<p>
							The team at EduSculpt is extremely dedicated and passionate. They
							take great pain to ensure customers and partners succeed.<br> <br>
							<em><strong style="color: #007051">CEO, Tonguestun</strong></em>
						</p>
						<br>
						<p>
							It is great to work with the young and energetic team at
							EduSculpt. They are very responsive and always willing to extend
							maximum support. Their strength is in understanding the customer
							requirement and providing custom solution.<br> <br> <em><strong
								style="color: #007051">Mr. Karthik, IT Head, Selvam Group of
									Institutions</strong></em>
						</p>
						<br>
						<p>
							I am sure EduSculpt will scale great heights as they have all the
							key ingredients for success- polite &amp; courteous, hardworking,
							passionate, and above all respect for individuals.<br> <br> <em><strong
								style="color: #007051">Principal, Gokula Krishna College of
									Engineering</strong></em>
						</p>
						

					</div><div id="contact">
				</div>
			</div>
			
			<!-- Displays Contact us section -->
			<div class="wsite-spacer" style="height: 10px;"></div>
			<hr>
				<div class="wsite-spacer" style="height: 16px;"></div>
				<div class="wsite-spacer" style="height: 40px;"></div>
				<div class="wsite-spacer" style="height: 40px;"></div>

				<div style="background: #FCD116; margin: auto;">
					<p class="wsite-content-title"
						style="text-align: left; vertical-align: middle;">
						<font size="6" color="#007051" face= "sans-serif"><b>&nbsp;&nbsp;Contact</b></font>
					</p>
				</div>
			</div>
			<div style="display: table; margin: 5%;">
				<div style="display: table-cell; width: 25%">
					<b><font color="#007051" size="4">Edusculpt Education Solutions
							Pvt. Ltd.</font></b><br> <font color="#007051" size="3"> <br>
						23/F West Vanniar Street,<br> <br> West K.K. Nagar <br> <br>Chennai-600078
						<br> <br>Tel: +91 95000 07290 <br> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;+91
						99400 39918 <br> <br>E-Mail: info@edusculpt.com
					</font>
				</div>
				
				<!-- Form that collects queries from users -->
				<div style="display: table-cell; width: 35%; margin-left: 40%">
					<font color="#007051"><h3>For Enquiry</h3> <br> <br>
						<p>Fill in the form below and we will be in touch soon!</p></font>
					<form action="" name="contact_form" method="post"
						onsubmit="return contact_validate()">
						<table>
							<tr>
								<td style="padding-top: 15px; padding-bottom: 15px;"><input
									type="text" name="name" id="name" class="txt" size="30"
									placeholder="Your Name"></td>
							</tr>
							<tr>
								<td style="padding-top: 15px; padding-bottom: 15px;"><input
									type="text" name="email" id="email" class="txt" size="30"
									placeholder="Email"></td>
							</tr>
							<tr>
								<td style="padding-top: 15px; padding-bottom: 8px;"><textarea
										name="message" id="message" class="txt" rows="3" cols="32"
										placeholder="Message"></textarea></td>
							</tr>
							<tr>
								<td style="padding-top: 5px; padding-bottom: 5px;"><input
									type="submit" name="submit" id="submit" value="Send It!"
									class="btn_send"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<hr>
			
			<!-- Back to top button -->
			<div class="img-tophide" id="imgtop">
				<a href="#"><img alt="Back to Top" src="images/up.png" height="50px"
					width="50px"></a>
				<div class="caption">Back to Top</div>
			</div>

			
			<div class="wsite-spacer" style="height: 10px;"></div>
			<div class="paragraph" style="text-align: center;">
				<font color="#007051">Privacy Policy&nbsp;-&nbsp;Terms and
					Conditions - Feedback</font>
			</div>

			<div style="text-align: center;">
				<div style="height: 10px; overflow: hidden"></div>
				<span class="wsite-social wsite-social-default"><a
					class='first-child wsite-social-item wsite-social-facebook'
					href='https://www.facebook.com/edusculpt' target='_blank'><span
						class='wsite-social-item-inner'></span></a><a
					class='wsite-social-item wsite-social-linkedin'
					href='https://www.linkedin.com/company/edusculpt-education-solutions'
					target='_blank'><span class='wsite-social-item-inner'></span></a><a
					class='wsite-social-item wsite-social-twitter'
					href='https://twitter.com/Edusculpt' target='_blank'><span
						class='wsite-social-item-inner'></span></a><a
					class='last-child wsite-social-item wsite-social-plus'
					href='https://plus.google.com/u/0/100830132811211302484/about'
					target='_blank'><span class='wsite-social-item-inner'></span></a></span>
				<div style="height: 20px; overflow: hidden"></div>
			</div>
		</div>
	</div>
	</div>
	</div>
	<script>

	(function(jQuery) {
		try {
			if (jQuery) {
				jQuery('div.blog-social div.fb-like').attr('class', 'blog-social-item blog-fb-like');
				var $commentFrame = jQuery('#commentArea iframe');
				if ($commentFrame.length > 0) {
					var frameHeight = jQuery($commentFrame[0].contentWindow.document).height() + 50;
					$commentFrame.css('min-height', frameHeight + 'px');
				}
				if (jQuery('.product-button').length > 0){
					jQuery(document).ready(function(){
						jQuery('.product-button').parent().each(function(index, product){
							if(jQuery(product).attr('target') == 'paypal'){
								if (!jQuery(product).find('> [name="bn"]').length){
									jQuery('<input>').attr({
										type: 'hidden',
										name: 'bn',
										value: 'DragAndDropBuil_SP_EC'
									}).appendTo(product);
								}
							}
						});
					});
				}
			}
			else {
				// Prototype
				$$('div.blog-social div.fb-like').each(function(div) {
					div.className = 'blog-social-item blog-fb-like';
				});
				$$('#commentArea iframe').each(function(iframe) {
					iframe.style.minHeight = '410px';
				});
			}
		}
		catch(ex) {}
	})(window._W && _W.jQuery);

</script>
	
	<?php
	if (isset ( $_POST ['name'] )) {
		//Enter enquery details in to database
		
		$name = $_POST ['name'];
		$email = $_POST ['email'];
		$mess = $_POST ['message'];
		
		$sql = mysql_query ( "Insert into enquiry (name,email,message) values ('$name','$email','$mess')" );
		
		if (! sql) {
			?>
				<script type="text/javascript">alert("An error occured while sending your details!\nPlease send again.");window.location="homepage.php";</script>
			<?php
		} else {
			?>
				<script type="text/javascript">alert("Thank you for your enquiry,\n\nWe\'ll be in contact soon.\n\n");window.location="homepage.php";</script>
			<?php
		}
	}
	
	?>
	
</body>
</html>