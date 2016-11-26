<!-- Admin home page with all the required tabs -->

<!DOCTYPE html>
<html lang="en">
<head>
  <?php
		@ob_start ();
		session_start ();
		
		// check if admin logged in by using session value stored while admin login
		if (isset ( $_SESSION ['log'] )) {
			include '../config.php'; // contains database connection details
			                         
			// database connection
			$con = @mysql_connect ( $host, $dbuname, $dbpass );
			if (! $con) {
				die ( 'could not connect: ' . mysql_error () );
			}
			mysql_select_db ( $dbname, $con );
			?>
			
<!-- Used to display title & icon on browser tab -->
<title>Edusculpt Page</title>
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../images/favicon.ico"
	type="image/x-icon" />
<!-- Used to display title & icon on browser tab -->

<!-- Styles for the tabs -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- Styles for the tabs -->


<script type="text/javascript">
	// This function is called up on clicking most of the tabs 
	// and is used to redirect by appending value in url so that 
	// the required page is displayed
    function func(name){        
    	window.location.href="../edusculpt_admin.php?value="+name;
    }
</script>
</head>
<body>
	<h1 align="center">Welcome Admin!</h1>
	<br>
	<br>
	<br>
	<br>
	<div class="container-fluid">

		<!-- Empty row to give some spacing -->
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
		</div>

		<!-- used to create row containing 3 columns -->
		<div class="row">

			<!-- Tab that redirects to edusculpt_dtabase page that displays Selected / Rejected Institutions -->
			<div class="col-md-4">
				<a href="../edusculpt_database.php?value=inst"><button type="button"
						class="btn btn-lg btn-info">Selected / Rejected Institutions</button></a>
			 <?php
			// $inst = mysql_query ( "SELECT * FROM institution WHERE accept_reject='0'" );
			// $instcnt = mysql_num_rows ( $inst );
			?>
<!-- 			<button type="button" class="btn btn-info btn-lg"
					onclick="func('il')">
					Institution Signup <font color="gold">-->
					<?php //if($instcnt!=0){echo " (".$instcnt.")";}?>
<!--				</font>
 				</button> -->
			</div>

			<!-- Tab that redirects to edusculpt_rating page that displays rate Suppliers -->
			<div class="col-md-4">

				<a href="../edusculpt_rating.php"><button type="button"
						class="btn btn-lg btn-info">Rate Suppliers</button></a>
			</div>
			<!-- 			<div class="col-md-4"> -->
		<?php
			// $comp = mysql_query ( "SELECT * FROM company WHERE accept_reject='0'" );
			// $compcnt = mysql_num_rows ( $comp );
			//			?>
<!-- 			<button type="button" class="btn btn-lg btn-info" onclick="func('cl')">
					Supplier Signup <font color="gold"><?php //if($compcnt!=0){echo " (".$compcnt.")";}?></font>
<!-- 				</button> -->
			<!-- 			</div> -->


			<!-- Tab that redirects to edusculpt_admin page that displays Email pending details -->
			<div class="col-md-4">
		<?php
			$email = mysql_query ( "SELECT * FROM email WHERE sent='0'" );
			$emailcnt = mysql_num_rows ( $email );
			?>
			<button type="button" class="btn btn-lg btn-info"
					onclick="func('ep')">
					Email Pending <font color="gold"><?php if($emailcnt!=0){echo " (".$emailcnt.")";}?></font>
				</button>
			</div>
		</div>
		<br> <br> <br>

		<!-- Empty row to give spacing -->
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
		</div>

		<!-- new row containing 3 tabs -->
		<div class="row">

			<!-- Tab that redirects to edusculpt_admin page that displays Institution Requirements -->
			<div class="col-md-4">
			<?php
			$instreq = mysql_query ( "SELECT * FROM requirement WHERE ongoing='0'" );
			$instreqcnt = mysql_num_rows ( $instreq ); // get count of newly added requirements to display on the tab
			?>
				<button type="button" class="btn btn-lg btn-info"
					onclick="func('ir')">
					Institution Requirements <font color="gold"><?php if($instreqcnt!=0){echo " (".$instreqcnt.")";}?></font>
				</button>
			</div>

			<!-- Tab that redirects to edusculpt_admin page that displays Supplier Elimination details -->
			<div class="col-md-4">
				<button type="button" class="btn btn-lg btn-info"
					onclick="func('ve')">Supplier Elimination</button>
			</div>

			<!-- Tab that redirects to edusculpt_admin page that displays Email sent details -->
			<div class="col-md-4">
				<button type="button" class="btn btn-lg btn-info"
					onclick="func('es')">Email Sent</button>
			</div>
		</div>
		<br> <br> <br>

		<!-- Empty row to give spacing -->
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
		</div>

		<!-- new tab that contains 3 tabs -->
		<div class="row">
			<!-- Tab that redirects to edusculpt_admin page that displays Category/Region details -->
			<div class="col-md-4">
				<button type="button" class="btn btn-lg btn-info"
					onclick="func('cr')">Category / Region</button>
			</div>

			<!-- Tab that redirects to profileedited page that displays all Profile edited details -->
			<div class="col-md-4">
				<a href="../profileedited.php"><button type="button"
						class="btn btn-lg btn-info">Profile Edited Details</button></a>
			</div>

			<!-- Tab that redirects to edusculpt_database page that provides editing suppliers details -->
			<div class="col-md-4">
				<a href="../edusculpt_database.php?value=comp"><button type="button"
						class="btn btn-lg btn-info" onclick="func('srs')">Edit Suppliers</button></a>
			</div>
		</div>
		<br> <br>
		<hr>
		<br>
		<br>

		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4"></div>
		</div>


		<div class="row">

			<!-- Tab that redirects to edusculpt_admin page that displays Institution Pool Requirements details -->
			<div class="col-md-4">
				<button type="button" class="btn btn-lg btn-info"
					onclick="func('pool')">Institution Pool Requirements</button>
			</div>

			<!-- Tab that redirects to Supplier sign up page -->
			<div class="col-md-4">

				<a href="../vendor/new_vend_signup.php?form_value=back"><button
						type="button" class="btn btn-lg btn-info">Supplier Sign Up</button></a>

			</div>

			<!-- Tab that redirects to Supplier sign in page -->
			<div class="col-md-4">
				<a href="../vendor/vend_signin.php"><button type="button"
						class="btn btn-lg btn-info">Supplier Sign In</button></a>

			</div>
		</div>
		<br> <br> <br>


		<!-- new row that contain a tab -->
		<div class="row">
			<!-- 			<div class="col-md-4"> -->

			<!-- 				<a href="../edusculpt_admin.php?value=pdetails"><button -->
			<!-- 						type="button" class="btn btn-lg btn-info">Supplier Product info</button></a> -->
			<!-- 			</div> -->

			<!-- Tab that redirects to edusculpt_admin page that displays Institution Registration details -->
			<div class="col-md-4">
				<a href="../edusculpt_admin.php?value=irdetails"><button
						type="button" class="btn btn-lg btn-info">Institution Registration
						Details</button></a>
			</div>
		</div>
		<br> <br> <br>
	</div>

	<br>
	<br>
	<br>

	<!-- redirect to same page by setting value logout to 1 up on clicking logout -->
	<a href="index.php?logout=1"
		style="position: absolute; top: 5%; right: 10%; font-size: 20px;"><b>LOGOUT</b></a>
	<!-- redirect to same page by setting value logout to 1 up on clicking logout -->


	<!-- Required javascript files for displaying tabs -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Required javascript files for displaying tabs -->
	
		<?php
		} else {
			// If the page is accessed without login...then it is redirected to admin login page.
			echo "<script>alert('Please login!');window.location.href='../admin_login.php'</script>";
		}
		
		if (isset ( $_GET ['logout'] )) {
			// check if logout is set to 1
			if ($_GET ['logout'] == '1') {
				session_destroy (); // clear all values stored in session and logs out
				echo "<script>window.location.href='../admin_login.php';</script>";
			}
		}
		?>
		
</body>
</html>