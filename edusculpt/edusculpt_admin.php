<!-- Used to retrieve data from database and display when particular tab is clicked -->

<!DOCTYPE html>
<html>
<head>

<!-- Icon that is displayed on browser tab -->
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />

<!-- Style for all the tables used to display details -->
<style type="text/css">
table.gridtable {
	font-family: verdana, arial, sans-serif;
	font-size: 11px;
	color: #333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}
/*style for table headings*/
table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}
/*style for table data*/
table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>

<?php
include 'config.php';
@ob_start ();
session_start ();

// check if admin logged in else redirect to login page
if (isset ( $_SESSION ['log'] )) {
	// database connection
	$con = @mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con ); // select database
	?>
	
<!-- Title that is displayed on browser tab -->
<title>Edusculpt page</title>

<!-- Style for ordinary tables -->
<style type="text/css">
table, th, tr, td {
	border: 1px solid black;
	padding: 2px
}
</style>


<script type="text/javascript">
function btonclickIAcc(name){
	//NOTE: This is not used as the Instituiton is accepted through email
	//used to accept institution by admin	
	var bool1=confirm("Are you sure you want to Accept?");
	if(bool1){
		//if bool1 is set then redirect to accept institution
		window.location.href="edusculpt_admin.php?value=il&name="+name;
	}
	else{
		window.location.href="edusculpt_admin.php?value=il";
	}	
}
</script>
<script type="text/javascript">
function btonclickIRej(uname){
	//used to reject institution by admin
	var bool2=confirm("Are you sure you want to Reject?");
	if(bool2){
		//if bool2 is set then redirect to reject institution
		window.location.href="edusculpt_admin.php?value=il&uname="+uname;
	}
	else{
		window.location.href="edusculpt_admin.php?value=il";
	}
}</script>
<script type="text/javascript">
function addcateg(){
	//Used to add new category in to database
	var categ=document.getElementById('new_cat').value;
	if(categ==null || categ==""){
		alert('please enter category!');
	}
	else{
		//categ is used to redirect the page to add category
		window.location.href="edusculpt_admin.php?value=cr&categ="+categ;
	}
}

function addregion(){
	//Used to add new region in to database
	var regn=document.getElementById('new_reg').value;
	if(regn==null || regn==""){
		alert('please enter region!');
	}
	else{
		//regn is used to redirect the page to add region
		window.location.href="edusculpt_admin.php?value=cr&regn="+regn;
	}
}
</script>
<script type="text/javascript">
function removecateg(idval){
	//Used to remove category from database
	var remconf=confirm("Are you sure you want to remove category?");
	if(remconf){
		var edval=idval;
		var txt=document.getElementById(edval).value;
		if(txt==null || txt==""){
			alert('no category to remove!!');
		}
		else{
			//removecateg is used to redirect the page and remove category
			window.location.href="edusculpt_admin.php?value=cr&removecateg="+txt;
		}
	}
	else{
		window.location.href="edusculpt_admin.php?value=cr";
	}
}
function removeregion(idval){
	//Used to remove region from database
	var remconf=confirm("Are you sure you want to remove region?");
	if(remconf){
		var edval=idval;
		var txt=document.getElementById(edval).value;
		if(txt==null || txt==""){
			alert('no region to remove!!');
		}
		else{
			//removeregion is used to redirect the page and remove region
			window.location.href="edusculpt_admin.php?value=cr&removeregion="+txt;
		}
	}
	else{
		window.location.href="edusculpt_admin.php?value=cr";
	}
}

function editregion(idval,oldvalue){
	//used to redirect the page for modifying region to new region
	var edval=idval;
	var oldreg=oldvalue;
	var newreg=document.getElementById(edval).value;
	window.location.href="edusculpt_admin.php?value=cr&oldregion="+oldreg+"&newregion="+newreg;
}

function editcateg(idval,oldvalue){
	//used to redirect the page for modifying category to new category
	var edval=idval;
	var oldcateg=oldvalue;
	var newcateg=document.getElementById(edval).value;
	window.location.href="edusculpt_admin.php?value=cr&oldcateg="+oldcateg+"&newcateg="+newcateg;
}
function ongoing(pkey){
	//Used to redirect so that the Institution requirements is set to ongoing state
	var key=pkey;
	window.location.href="edusculpt_admin.php?value=ir&ongoing="+key;
}

function remreq(pkey){
	//Used to redirect so that the Institution requirements 
	//is removed after fulfilling reuirements during ongoing state
	
	var key=pkey;
	window.location.href="edusculpt_admin.php?value=ir&remreq="+key;
}


</script>
<script type="text/javascript">
function btonclickCAcc(name1){
	//NOTE: this function is not used now as the company details are directly entered by admin
	
	//Used to accept company by admin
	var bool1=confirm("Are you sure you want to Accept?");
	if(bool1){
		window.location.href="edusculpt_admin.php?value=cl&name1="+name1;
	}
	else{
		window.location.href="edusculpt_admin.php?value=cl";
	}
}
</script>
<script type="text/javascript">
function btonclickCRej(uname1){
	//NOTE: this function is not used now as the company details are directly entered by admin
	
	//Used to reject company by admin
	var bool2=confirm("Are you sure you want to Reject?");
	if(bool2){
		window.location.href="edusculpt_admin.php?value=cl&uname1="+uname1;
	}
	else{
		window.location.href="edusculpt_admin.php?value=cl";
	}
}
</script>

<script type="text/javascript">
function mail_sent(pk){
	//used to redirect using mailkey so that mailsent is marked in database
	window.location.href="edusculpt_admin.php?value=ep&mailkey="+pk;
}
</script>
</head>
<body>
<?php
	if (isset ( $_GET ['value'] )) {
		if ($_GET ['value'] == 'il') {
			//NOTE: this is not used after mailing function is enabled to accept institutions
			//TO display Institution details
			?>
<a href="layoutit/index.php"
		style="position: absolute; top: 3%; right: 10%;">HOME</a>
	<br>
	<div>
		<h3>Institution List</h3>
		<table class="gridtable">
			<tr>
				<th>Name</th>
				<th>Region</th>
				<th>Address</th>
				<th>Pin Code</th>
				<th>Web Link</th>
				<th>Affiliated University</th>
				<th>Strength</th>
				<th>Princippal Name</th>
				<th>Principal Email</th>
				<th>Principal Mobile</th>
				<th>Date</th>
				<th>Time</th>
				<th>Accept</th>
				<th>Reject</th>
			</tr>
			<?php
			
			if (isset ( $_GET ['name'] )) {
				//to accept institution
				$name = urldecode ( $_GET ['name'] );
				// echo "<script type=\"text/javascript\">confirm('Are you sure you want to Approve?')</script>";
				
				$result1 = mysql_query ( "UPDATE institution SET accept_reject=1 WHERE i_name='$name'" );
			} else if (isset ( $_GET ['uname'] )) {
				//to reject institution
				$uname = urldecode ( $_GET ['uname'] );
				// echo "<script type=\"text/javascript\">confirm('Are you sure you want to Reject?')</script>";
				$con = @mysql_connect ( $host, $dbuname, $dbpass );
				if (! $con) {
					die ( 'could not connect: ' . mysql_error () );
				}
				mysql_select_db ( $dbname, $con );
				$result1 = mysql_query ( "UPDATE institution SET accept_reject=2 WHERE i_name='$uname'" );
			}
			
			//database connection
			$con = @mysql_connect ( $host, $dbuname, $dbpass );
			if (! $con) {
				die ( 'could not connect: ' . mysql_error () );
			}
			mysql_select_db ( $dbname, $con );
			
			$result = mysql_query ( "SELECT * FROM institution WHERE accept_reject=0;" );
			// if ($result->num_rows > 0) {
			
			// output data of each row containing istitution details
			while ( $row = mysql_fetch_array ( $result ) ) {
				$name = $row ["i_name"];
				
				echo "<tr><td>" . $row ["i_name"] . "</td><td>" . $row ["region"] . "</td><td>" . $row ["address"] . "</td><td>" . $row ["pin_code"] . "</td><td>" . $row ["web_link"] . "</td><td>" . $row ["affil_university"] . "</td><td>" . $row ["strength"] . "</td><td>" . $row ["pr_name"] . "</td><td>" . $row ["pr_email"] . "</td><td>" . $row ["pr_mob"] . "</td><td>" . $row ["date"] . "</td><td>" . $row ["time"] . "</td>";
				?>
				<td><button type="button" name="accept"
					onclick="btonclickIAcc('<?php echo urlencode($name);?>')">Accept</button></td>
			<td><button type="button" name="reject"
					onclick="btonclickIRej('<?php echo urlencode($name);?>')">Reject!</button></td>
			</tr>
		</table>
	</div><?php
			}
		}
		?>
	<div>
	
	<!-- This company details is not displayed since they are added by admin -->
	<?php //  if($_GET['value']=='cl'){?>
<!-- 	<a href="layoutit/index.php" style="position: absolute; top: 3%; right: 10%;">HOME</a> <br> -->
		<!-- 		<h3>Company List</h3> -->
		<!-- 		<table class="gridtable"> -->
		<!-- 			<tr> -->
		<!-- 				<th>Name</th> -->
		<!-- 				<th>Type</th> -->
		<!-- 				<th>Category</th> -->
		<!-- 				<th>Address</th> -->
		<!-- 				<th>Location</th> -->
		<!-- 				<th>Phone number</th> -->
		<!-- 				<th>Web Link</th> -->
		<!-- 				<th>Strength</th> -->
		<!-- 				<th>date_of_incorporation</th> -->
		<!-- 				<th>Accept</th> -->
		<!-- 				<th>Reject</th> -->
		<!-- 			</tr> -->
		<?php
		// if (isset ( $_GET ['name1'] )) {
		// $name = $_GET ['name1'];
		// // echo "<script type=\"text/javascript\">confirm('Are you sure you want to Approve?')</script>";
		// $con = @mysql_connect ( $host, $dbuname, $dbpass );
		// if (! $con) {
		// die ( 'could not connect: ' . mysql_error () );
		// }
		// mysql_select_db ( $dbname, $con );
		// $result1 = mysql_query ( "UPDATE company SET accept_reject=1 WHERE c_name='$name'" );
		// } else if (isset ( $_GET ['uname1'] )) {
		// $uname = $_GET ['uname1'];
		// // echo "<script type=\"text/javascript\">confirm('Are you sure you want to Reject?')</script>";
		// $con = @mysql_connect ( $host, $dbuname, $dbpass );
		// if (! $con) {
		// die ( 'could not connect: ' . mysql_error () );
		// }
		// mysql_select_db ( $dbname, $con );
		// $result1 = mysql_query ( "UPDATE company SET accept_reject=2 WHERE c_name='$uname'" );
		// }
		// $result1 = mysql_query ( "SELECT * FROM company WHERE accept_reject=0;" );
		// // if ($result->num_rows > 0) {
		
		// // output data of each row
		// while ( $row = mysql_fetch_array ( $result1 ) ) {
		// $name = $row ["c_name"];
		// echo "<tr><td>" . $row ["c_name"] . "</td><td>" . $row ["c_type"] . "</td><td>" . $row ["category"] . "</td><td>" . $row ["location"] . "</td><td>" . $row ["address"] . "</td><td>" . $row ["ph_no"] . "</td><td>" . $row ["web_link"] . "</td><td>" . $row ["c_strength"] . "</td><td>" . $row ["date_of_incorporation"] . "</td><td><button type=\"button\" name=\"accept\"
		// onclick=\"btonclickCAcc('$name')\">Accept</button></td> <td><button type=\"button\" name=\"reject\"onclick=\"btonclickCRej('$name')\">Reject!</button></td></tr>";
		// }
		//		?>
<!-- 		</table> -->
	</div><?php
		// }
		if ($_GET ['value'] == 'pool') {
			// Displays pool requirements details
			
			?>
			<a href="layoutit/index.php"
		style="position: absolute; top: 3%; right: 10%;">HOME</a>
	<br>
	<h3>Pool Requirement</h3>
	<table class="gridtable">
		<tr>
			<th>Institution <br>Name
			</th>
			<th>Region</th>
			<th>Category</th>
			<th>Quantity</th>
			<th>Budget</th>
			<th>Delivery Date</th>
			<th>Specifications</th>
			<th>Comments</th>
		</tr>
			<?php
			$result1 = mysql_query ( "SELECT * FROM poolrequirement" );
			
			//output all details from poolrequirement table to each row
			while ( $row = mysql_fetch_array ( $result1 ) ) {
				echo "<tr><td>" . $row ["i_name"] . "</td><td>" . $row ["region"] . "</td><td>" . $row ["category"] . "</td><td>" . $row ["quantity"] . "</td><td>" . $row ["budget"] . "</td><td>" . $row ["deliverydate"] . "</td>
				<td>" . $row ["specs"] . "</td><td>" . $row ["comments"] . "</td></tr>";
			}
			?>
	<?php
		
}
		if ($_GET ['value'] == 'ir') {
			// Displays Institution requirements
			?>
	<div>
			<a href="layoutit/index.php"
				style="position: absolute; top: 3%; right: 10%;">HOME</a> <br>
			<h3>New Institution Requirements</h3>
			<table class="gridtable">
				<tr>
					<th>Institution</th>
					<th>Registrant name</th>
					<th>Registrant Mobile Number</th>
					<th>Registrant Email Number</th>
					<th>category</th>
					<th>Description</th>
					<th>Region</th>
					<th>Expected date of <br>vendor closure
					</th>
					<th>Expected project<br>start date
					</th>
					<th>Key expectations</th>
					<th>budget</th>
					<th>Have any existing <br>vendors?
					</th>
					<th>satified with them?</th>
					<th>Tell us any<br>problems faced
					</th>
					<th>Preferred time to call</th>
					<th>Status</th>
				</tr>
			<?php
			$reqr = mysql_query ( "SELECT * FROM requirement WHERE ongoing='0'" );
			
			//Displays all institution requirements which are newly added
			while ( $row = mysql_fetch_array ( $reqr ) ) {
				$usrname = $row ["i_username"];
				$primkey = $row ["pk"];
				
				//contact details are fetched from i_registrant table
				$contact = mysql_query ( "SELECT * FROM i_registrant WHERE username='$usrname'" );
				while ( $row1 = mysql_fetch_array ( $contact ) ) {
					$phno = $row1 ["r_mob"];
					$e_mail = $row1 ["r_email"];
				}
				echo "<tr><td>" . $row ["i_name"] . "</td><td>" . $row ["r_name"] . "</td><td>" . $phno . "</td><td>" . $e_mail . "</td><td>" . $row ["category"] . "</td><td>" . $row ["description"] . "</td><td>" . $row ["region"] . "</td><td>" . $row ["dovendclose"] . "</td><td>" . $row ["doprojectstart"] . "</td><td>" . $row ["expectfromvendor"] . "</td><td>" . $row ["budget"] . "</td><td>" . $row ["existingvendor"] . "</td><td>" . $row ["satisfied"] . "</td><td>" . $row ["problems"] . "</td><td>" . $row ["timetocall"] . "</td><td><input type=\"button\" name=\"sent\" id=\"sent\" value=\"Add to Ongoing\" onclick=\"ongoing('$primkey')\"></td></tr>";
			}
			
			?>
	</table>
			
			<h3>Ongoing Institution Requirements</h3>
			<table class="gridtable">
				<tr>
					<th>Institution</th>
					<th>Registrant name</th>
					<th>Registrant Mobile Number</th>
					<th>Registrant Email Number</th>
					<th>category</th>
					<th>Description</th>
					<th>Region</th>
					<th>Expected date of <br>vendor closure
					</th>
					<th>Expected project<br>start date
					</th>
					<th>Key expectations</th>
					<th>budget</th>
					<th>Have any existing <br>vendors?
					</th>
					<th>satified with them?</th>
					<th>Tell us any<br>problems faced
					</th>
					<th>Preferred time to call</th>
					<th>Status</th>
				</tr>
			<?php
			$reqr = mysql_query ( "SELECT * FROM requirement WHERE ongoing='1'" );
			

			//Displays all institution requirements which are ongoing
			while ( $row = mysql_fetch_array ( $reqr ) ) {
				$usrname = $row ["i_username"];
				$primkey = $row ["pk"];

				//contact details are fetched from i_registrant table
				$contact = mysql_query ( "SELECT * FROM i_registrant WHERE username='$usrname'" );
				while ( $row1 = mysql_fetch_array ( $contact ) ) {
					$phno = $row1 ["r_mob"];
					$e_mail = $row1 ["r_email"];
				}
				echo "<tr><td>" . $row ["i_name"] . "</td><td>" . $row ["r_name"] . "</td><td>" . $phno . "</td><td>" . $e_mail . "</td><td>" . $row ["category"] . "</td><td>" . $row ["description"] . "</td><td>" . $row ["region"] . "</td><td>" . $row ["dovendclose"] . "</td><td>" . $row ["doprojectstart"] . "</td><td>" . $row ["expectfromvendor"] . "</td><td>" . $row ["budget"] . "</td><td>" . $row ["existingvendor"] . "</td><td>" . $row ["satisfied"] . "</td><td>" . $row ["problems"] . "</td><td>" . $row ["timetocall"] . "</td><td><input type=\"button\" name=\"sent\" id=\"sent\" value=\"Remove\" onclick=\"remreq('$primkey')\"></td></tr>";
			}
			
			?>
	</table>
		</div>
		</div><?php
		
}
		if ($_GET ["value"] == 've') {
			// Displays Shortlisted vendor elimination details
			?>
	<a href="layoutit/index.php"
			style="position: absolute; top: 3%; right: 10%;">HOME</a>
		<br>
		<div>
			<h3>Shortlisted vendor elimination details</h3>
			<table class="gridtable">
				<tr>
					<th>Institution name</th>
					<th>registrant name</th>
					<th>registrant<br>mobile number
					</th>
					<th>Company name</th>
					<th>duplicate <br>vendor name
					</th>
					<th>Reason for <br>elimination
					</th>
					<th>Date</th>
					<th>Time</th>
				</tr>
			<?php
			$elim = mysql_query ( "SELECT * FROM eliminate" );
			
			//Displays all details in eliminate table in the database
			while ( $row = mysql_fetch_array ( $elim ) ) {
				
				echo "<tr><td>" . $row ["iname"] . "</td><td>" . $row ["irname"] . "</td><td>" . $row ["rmob"] . "</td><td>" . $row ["cname"] . "</td><td>" . $row ["eduvname"] . "</td><td>" . $row ["reason"] . "</td><td>" . $row ["date"] . "</td><td>" . $row ["time"] . "</td></tr>";
			}
			
			?>
	</table>
		</div>
	<?php }?>
	
	<?php
		
if ($_GET ['value'] == 'ep') {
			// Displays Email Request Details
			?>
	<a href="layoutit/index.php"
			style="position: absolute; top: 3%; right: 10%;">HOME</a>
		<br>
		<h3>Email Request Details</h3>
		<table class="gridtable">
			<tr>
				<th>Institution Name</th>
				<th>Registrant Name</th>
				<th>Registrant Email-ID</th>
				<th>Registrant<br>mobile number
				</th>
				<th>Company name</th>
				<th>Duplicate<br> vendor name
				</th>
				<th>Date</th>
				<th>Time</th>
				<th>Sent</th>

			</tr>
		<?php
			//Get and display all the mail details request from the institutions that are to be sent
			$email = mysql_query ( "SELECT * FROM email WHERE sent=0" );
			while ( $row = mysql_fetch_array ( $email ) ) {
				$pr_key = $row ["primkey"];
				
				echo "<tr><td>" . $row ["iname"] . "</td><td>" . $row ["i_rname"] . "</td><td>" . $row ["i_email_id"] . "</td><td>" . $row ["i_mobno"] . "</td><td>" . $row ["c_name"] . "</td><td>" . $row ["edu_vname"] . "</td><td>" . $row ["date"] . "</td><td>" . $row ["time"] . "</td><td><input type=\"button\" name=\"sent\" id=\"sent\" value=\"sent\" onclick=\"mail_sent('$pr_key')\"></td></tr>";
			}
			
			
			//if mail isalready sent then update database so that sent is set to 1 with date and time captured
			if (isset ( $_GET ['mailkey'] )) {
				$key = $_GET ['mailkey'];
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
				$email = mysql_query ( "UPDATE email SET sent=1,date='$date',time='$time' WHERE primkey='$key'" );
				?>
<script type="text/javascript">window.location.href="edusculpt_admin.php?value=ep"</script>
<?php
			}
		}
		?>
			
	</table>
	<?php
		
if ($_GET ['value'] == 'es') {
			// Displays Email Sent Details
			?>
	<a href="layoutit/index.php"
			style="position: absolute; top: 3%; right: 10%;">HOME</a>
		<br>
		<h3>Email Sent Details</h3>
		<table class="gridtable">
			<tr>
				<th>Institution Name</th>
				<th>Registrant Name</th>
				<th>Registrant Email-ID</th>
				<th>Registrant<br>mobile number
				</th>
				<th>Company name</th>
				<th>Duplicate<br> vendor name
				</th>
				<th>Date</th>
				<th>Time</th>

			</tr>
		<?php
		
			//Get and displays all the details of mail requests from institutions that are already sent
			$email = mysql_query ( "SELECT * FROM email WHERE sent=1" );
			while ( $row = mysql_fetch_array ( $email ) ) {
				echo "<tr><td>" . $row ["iname"] . "</td><td>" . $row ["i_rname"] . "</td><td>" . $row ["i_email_id"] . "</td><td>" . $row ["i_mobno"] . "</td><td>" . $row ["c_name"] . "</td><td>" . $row ["edu_vname"] . "</td><td>" . $row ["date"] . "</td><td>" . $row ["time"] . "</td></tr>";
			}
			?>
		</table>
		<br>
		<br>
			<?php
		}
		if ($_GET ['value'] == 'irdetails') {
			// Displays Institution Registration Details after verification from mail
			
			?>
	<a href="layoutit/index.php"
			style="position: absolute; top: 3%; right: 10%;">HOME</a>
		<br>
		<h3>Institution Registration Details</h3>
		<br>
		<br>
		<table class="gridtable">
			<tr>
				<th>Institution Name</th>
				<th>Region</th>
				<th>Registrant Name</th>
				<th>Registrant Email-ID</th>
				<th>Registrant<br>mobile number
				</th>
				<th>Registered date</th>
				<th>Registered time</th>
			</tr>
		<?php
			$email = mysql_query ( "SELECT * FROM institution i, i_registrant r WHERE i.i_name=r.i_name and i.accept_reject=1" );
			while ( $row = mysql_fetch_array ( $email ) ) {
				echo "<tr><td>" . $row ["i_name"] . "</td><td>" . $row ["region"] . "</td><td>" . $row ["r_name"] . "</td><td>" . $row ["r_email"] . "</td><td>" . $row ["r_mob"] . "</td><td>" . $row ["date"] . "</td><td>" . $row ["time"] . "</td></tr>";
			}
			?>
		</table>
		<br>
		<br>
		<?php
		}
		if (isset ( $_GET ['value'] ) && $_GET ['value'] == 'cr') {
			//Category and region are displayed
			//Addition,Modification and Removal of caegories and regions are also provided
			
			?>
			<div style="position: absolute; left: 10%; top: 10%;">
			Enter New category to database <input type="text" id="new_cat">
			
			<!-- Used to add new category -->
			<button type="submit" onclick="addcateg()">Add</button>
			<br> <br> <br>
			
			<!-- Displays all categories -->
			<table class="gridtable">
				<tr>
					<th colspan="3">Categories</th>
				</tr>
		<?php
			$categ_res = mysql_query ( "select categ from category" );
			$i = 0; // i is used to set id for each category
			while ( $row = mysql_fetch_array ( $categ_res ) ) {
				$editcateg = 'edit_categ' . $i;
				?>
				<script>var editid='<?php echo $editcateg;?>';</script>
				<tr>
					<!-- Textbox is used to display and modify categories -->
					<td><input type="text" id="<?php echo $editcateg?>"> <script>document.getElementById(editid).value='<?php echo $row['categ'];?>';</script></td>
					<!-- edit buttion to modify category -->
					<td><button type="submit"
							onclick="editcateg('<?php echo $editcateg?>','<?php echo $row['categ']?>')">Edit</button></td>
					<!-- remove button to remove category -->
					<td><button type="submit"
							onclick="removecateg('<?php echo $editcateg?>')">Remove</button></td>
				</tr>
		<?php
				$i ++;
			}
			?>
		</table>
		</div>
		
		<div style="position: absolute; right: 10%; top: 10%;">
			Enter New region to database <input type="text" id="new_reg">
			
			<!-- To add new Region to database -->
			<button type="submit" onclick="addregion()">Add</button>
			<br> <br> <br>
			<table class="gridtable">
				<tr>
					<th colspan="3">Regions</th>
				</tr>
		<?php
			$reg_res = mysql_query ( "select region from region" );
			$j = 0; // j is used to set id of all regions
			while ( $row = mysql_fetch_array ( $reg_res ) ) {
				$editreg = 'edit_reg' . $j;
				
				?>
				<script>var editidr='<?php echo $editreg;?>';</script>
				<tr>
					<!-- Textbox is used to display and modify regions -->
					<td><input type="text" id="<?php echo $editreg?>"> <script>document.getElementById(editidr).value='<?php echo $row['region'];?>';</script></td>
					<!-- edit button to modify region -->
					<td><button type="submit"
							onclick="editregion('<?php echo $editreg?>','<?php echo $row['region']?>')">Edit</button></td>
					<!-- remove button to delete region from database -->
					<td><button type="submit"
							onclick="removeregion('<?php echo $editreg?>')">Remove</button></td>
				</tr>
		<?php
				$j ++;
			}
			?>
		</table>
		</div>

		<a href="layoutit/index.php"
			style="position: absolute; top: 3%; right: 10%;">HOME</a>
		<?php
			if (isset ( $_GET ['value'] ) && $_GET ['value'] == 'cr' && isset ( $_GET ['removecateg'] )) {
				// To delete category
				
				$delcateg = $_GET ['removecateg'];
				$del = mysql_query ( "DELETE from category where categ='$delcateg'" );
				?>
		<script>
		window.location.href="edusculpt_admin.php?value=cr";
		</script>
		<?php
			}
			
			if (isset ( $_GET ['value'] ) && $_GET ['value'] == 'cr' && isset ( $_GET ['removeregion'] )) {
				// To delete region
				
				$delregion = $_GET ['removeregion'];
				$del = mysql_query ( "DELETE from region where region='$delregion'" );
				?>
		<script>
		window.location.href="edusculpt_admin.php?value=cr";
		</script>
		<?php
			}
		
			if (isset ( $_GET ['value'] ) && $_GET ['value'] == 'cr' && isset ( $_GET ['oldregion'] )) {
				// to update region
				
				$oldregion = $_GET ['oldregion'];
				$newregion = $_GET ['newregion'];
				$del = mysql_query ( "UPDATE region set region='$newregion' where region='$oldregion'" );
				?>
		<script>
		window.location.href="edusculpt_admin.php?value=cr";
		</script>
		<?php
			}
			
			if (isset ( $_GET ['value'] ) && $_GET ['value'] == 'cr' && isset ( $_GET ['oldcateg'] )) {
				// To update category
				
				$oldcateg = $_GET ['oldcateg'];
				$newcateg = $_GET ['newcateg'];
				$del = mysql_query ( "UPDATE category set categ='$newcateg' where categ='$oldcateg'" );
				?>
		<script>
		window.location.href="edusculpt_admin.php?value=cr";
		</script>
		<?php
			}
			
			if (isset ( $_GET ['categ'] )) {
				// to add a category
				
				$categ = $_GET ['categ'];
				
				$resul = mysql_query ( "INSERT into category VALUES('$categ')" );
				
				if ($resul) {
					echo "<script>alert('category updated successfully')</script>";
					echo "<script>window.location.href=\"edusculpt_admin.php?value=cr\"</script>";
				} else {
					echo "<script>alert('category already exists')</script>";
					echo "<script>window.location.href=\"edusculpt_admin.php?value=cr\"</script>";
				}
			} else if (isset ( $_GET ['regn'] )) {
				// to add region
				
				$regn = $_GET ['regn'];
				
				$resul = mysql_query ( "INSERT into region VALUES('$regn')" );
				if ($resul) {
					echo "<script>alert('region updated successfully')</script>";
					echo "<script>window.location.href=\"edusculpt_admin.php?value=cr\"</script>";
				} else {
					echo "<script>alert('region already exists')</script>";
					echo "<script>window.location.href=\"edusculpt_admin.php?value=cr\"</script>";
				}
			}
		}
		?>
		
		
	
		<!-- Product details of all customers are displayed but not used as of now -->
		<?php //if($_GET['value']=='pdetails'){?>
<!-- 		<a href="layoutit/index.php" style="position: absolute; top: 3%; right: 10%;">HOME</a>-->
		<!-- 		<br> -->
		<!-- 		<h3>Product Info</h3> -->
		<!-- 		<table class="gridtable"> -->
		<!-- 			<tr> -->
		<!-- 				<th>Supplier Name</th> -->
		<!-- 				<th>Supplier Email</th> -->
		<!-- 				<th>Suplier<br> phone number -->
		<!-- 				</th> -->

		<!-- 				<th>Company name</th> -->
		<!-- 				<th>Company<br>Phone number -->
		<!-- 				</th> -->
		<!-- 				<th>Product Name</th> -->
		<!-- 				<th>Product<br>Category -->
		<!-- 				</th> -->
		<!-- 				<th>Product<br> Description -->
		<!-- 				</th> -->
		<!-- 				<th>Product<br>features -->
		<!-- 				</th> -->
		<!-- 				<th>Product<br>customers -->
		<!-- 				</th> -->
		<!-- 				<th>Product<br>link -->
		<!-- 				</th> -->
		<!-- 				<th>Product<br>payment Cycle -->
		<!-- 				</th> -->
		<!-- 				<th>Product<br>unique features -->
		<!-- 				</th> -->

		<!-- 			</tr> -->
		<?php
		// $email = @mysql_query ( "SELECT * FROM v_product_update as p,company as c,v_registrant as v WHERE p.vend_name=v.username and v.c_name=c.c_name" );
		// while ( $row = mysql_fetch_array ( $email ) ) {
		// echo "<tr><td>" . $row ["r_name"] . "</td><td>" . $row ["email"] . "</td><td>" . $row ["mob_no"] . "</td><td>" . $row ["c_name"] . "</td><td>" . $row ["ph_no"] . "</td><td>" . $row ["p_name"] . "</td><td>" . $row ["p_category"] . "</td><td>" . $row ["p_desc"] . "</td><td>" . $row ["p_features"] . "</td><td>" . $row ["p_cust"] . "</td><td>" . $row ["p_link"] . "</td><td>" . $row ["p_cycle"] . "</td><td>" . $row ["p_uniq_feat"] . "</td></tr>";
		// }
		// }
		//		?>
			
<!-- 	</table> -->
		
		<?php
		
		if ($_GET ['value'] == 'ir' && isset ( $_GET ['ongoing'] )) {
			//sets institution requirements to ongoing state
			
			$keys = $_GET ['ongoing'];
			$ongoing = mysql_query ( "UPDATE requirement SET ongoing='1' where pk='$keys'" );
			?>
			<script>window.location.href="edusculpt_admin.php?value=ir";</script>
			<?php
		}
		?>
			
			<?php
		
		if ($_GET ['value'] == 'ir' && isset ( $_GET ['remreq'] )) {
			//sets institution requirement from ongoing state to finished(remove) state
			
			$keys = $_GET ['remreq'];
			$ongoing = mysql_query ( "UPDATE requirement SET ongoing='2' where pk='$keys'" );
			?>
			<script>window.location.href="edusculpt_admin.php?value=ir";</script>
			<?php
		}
		?>
		
	<?php
		//closes databse connection
		mysql_close ( $con );
	}
} else {
	//if not logged in then redirect to admin login page
	echo "<script>alert('Please login!');window.location.href='admin_login.php'</script>";
}
?>



</body>
</html>