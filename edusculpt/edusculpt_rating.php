<!-- To display supplier details and provide rating for them -->

<!DOCTYPE html>
<head>
<!-- Used to display title & icon on browser tab -->
<title>Vendor rating</title>
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<!-- Used to display title & icon on browser tab -->


<?php
@ob_start ();
session_start ();

//Check if admin logged in else redirect to login page
if (isset ( $_SESSION ['log'] )) {
	?>

<style type="text/css">
/*Style for displayng tables*/
table.gridtable {
	font-family: verdana, arial, sans-serif;
	font-size: 11px;
	color: #333333;
	border-width: 1px;
	border-color: #666666;
	border-collapse: collapse;
}

table.gridtable th {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #dedede;
}

table.gridtable td {
	border-width: 1px;
	padding: 8px;
	border-style: solid;
	border-color: #666666;
	background-color: #ffffff;
}
</style>

<script type="text/javascript">
function btnqual(name){
	//If quality rating is submitted
	var quality=name+'qual';
	qualnum1=document.getElementById(quality).value;//retrieve value in textbox using its ID
	qualnum=parseFloat(qualnum1);

	//validates rating entered
	if(qualnum>=1 && qualnum<=5){
		var bool=confirm("Are you sure you want to Rate?");	
		if(bool){
			//Redirects to modify rating in database
			window.location.href="edusculpt_rating.php?usrname="+name+"&qual="+qualnum;
		}
	}
	else{
		alert('please enter valid rating!!');
	}
}
</script>
<script type="text/javascript">
function btnsup(name){
	//If support rating is submitted
	supnum1=document.getElementById(name+'sup').value;
	supnum=parseFloat(supnum1);

	//validates rating entered
	if(supnum>=1 && supnum<=5){
		var bool=confirm("Are you sure you want to Rate?");
		if(bool){
			//Redirects to modify rating in database
			window.location.href="edusculpt_rating.php?usrname="+name+"&sup="+supnum;
		}
	}
	else{
		alert('please enter valid rating!!');
	}
}
</script>
<script type="text/javascript">
function btnovr(name){
	//If overall rating is submitted
	ovrnum1=document.getElementById(name+'ovr').value;
	ovrnum=parseFloat(ovrnum1);

	//validates rating entered
	if(ovrnum>=1 && ovrnum<=5){
		var bool=confirm("Are you sure you want to Rate?");
		if(bool){
			//Redirects to modify rating in database
			ovrnum=document.getElementById(name+'ovr').value;
			window.location.href="edusculpt_rating.php?usrname="+name+"&ovr="+ovrnum;
		}
	}
	else{
		alert('please enter valid rating!!');	
	}
}
	
</script>
<script type="text/javascript">
function btnovrfd(name){
	//If overall feedback is submitted is submitted
	var bool=confirm("Are you sure you want to Rate?");
	if(bool){
		//Redirects to modify rating in database
		ovrfdnum=document.getElementById(name+'ovrfd').value;
		window.location.href="edusculpt_rating.php?usrname="+name+"&ovrfd="+ovrfdnum;
	}
}
</script>
</head>
<body>

	<!-- Displays Rated company list and provide fields to modify them -->
	<h3>Rated Company List</h3>
	<table class="gridtable">
		<tr>
			<th>Company name</th>
			<th>Duplicate name</th>
			<th>quality</th>
			<th>quality rating<br>[1-5]
			</th>
			<th>support</th>
			<th>support rating<br>[1-5]
			</th>
			<th>overall</th>
			<th>overall rating<br>[1-5]
			</th>
			<th>old overall feedback</th>
			<th>overall feedback</th>
		</tr>
<?php
	include 'config.php';
	
	//database connection
	$con = mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	
	//retrieve details of rated companies 
	$vendor = mysql_query ( "SELECT * FROM v_registrant as v,company as c where c.c_name=v.c_name and c.accept_reject=1 and v.quality>0 and v.support>0 and v.overall>0 and v.overallfeedback <> ''" );
	while ( $row = mysql_fetch_array ( $vendor ) ) {
		$usrname = $row ["c_name"];//company name is captured
		
		//Used to set ID of textboxes that is used for entering rating
		$qual = $usrname . 'qual';
		$sup = $usrname . 'sup';
		$ovr = $usrname . 'ovr';
		$ovrfd = $usrname . 'ovrfd';
		
		//Displays all informations required
		echo "<tr><td>" . $row ["c_name"] . "</td><td>" . $row ["edu_vname"] . "</td><td>" . $row ["quality"] . "</td><td><input type=\"text\" id='$qual' size=\"5\"
		<td><button type=\"button\" name=\"Rate\"onclick=\"btnqual('$usrname')\">Done</button></td>" . "</td><td>" . $row ["support"] . "</td><td><input type=\"text\" id='$sup' size=\"5\"
		<td><button type=\"button\" name=\"Rate\"onclick=\"btnsup('$usrname')\">Done</button></td>" . "</td><td>" . $row ["overall"] . "</td><td><input type=\"text\" id='$ovr' size=\"5\"
		<td><button type=\"button\" name=\"Rate\"onclick=\"btnovr('$usrname')\">Done</button></td>" . "</td><td>" . $row ["overallfeedback"] . "</td><td><input type=\"text\" id='$ovrfd' size=\"5\"
		<td><button type=\"button\" name=\"Rate\"onclick=\"btnovrfd('$usrname')\">Done</button></td></tr>";
	}
	if (isset ( $_GET ['usrname'] )) {
		$usr = $_GET ['usrname'];
		
		//if quality rating is to be modified
		if (isset ( $_GET ['qual'] )) {
			$quality = $_GET ['qual'];
			//update database and refresh the page
			$enter = mysql_query ( "UPDATE v_registrant SET quality='$quality' WHERE c_name='$usr'" );
			?>
			<script type="text/javascript">window.location.href="edusculpt_rating.php"</script>
			<?php 
		
		}
		
		//if support rating is to be modified
		if (isset ( $_GET ['sup'] )) {
			$support = $_GET ['sup'];
			
			//update database and refresh the page
			$enter = mysql_query ( "UPDATE v_registrant SET support='$support' WHERE c_name='$usr'" );
			?>
<script type="text/javascript">window.location.href="edusculpt_rating.php"</script>
<?php 
		}
		
		//if overall rating is to be modified
		if (isset ( $_GET ['ovr'] )) {
			$overall = $_GET ['ovr'];
			
			//update database and refresh the page
			$enter = mysql_query ( "UPDATE v_registrant SET overall='$overall' WHERE c_name='$usr'" );
			?>
<script type="text/javascript">window.location.href="edusculpt_rating.php"</script>
<?php 
		}
		
		//if overall feedback is to be modified
		if (isset ( $_GET ['ovrfd'] )) {
			$ovrfeed = $_GET ['ovrfd'];
			
			//update database and refresh the page
			$enter = mysql_query ( "UPDATE v_registrant SET overallfeedback='$ovrfeed' WHERE c_name='$usr'" );
			?>
<script type="text/javascript">window.location.href="edusculpt_rating.php"</script>
<?php 
		}
	}
	?>
	</table><br> <br> <br>
	
	<!-- Displays Unrated Compny detals and provide fields to rate them -->
	<h3>Unrated Company List</h3>
	<table class="gridtable">
		<tr>
			<th>Company name</th>
			<th>Duplicate name</th>
			<th>quality</th>
			<th>quality rating<br>[1-5]
			</th>
			<th>support</th>
			<th>support rating<br>[1-5]
			</th>
			<th>overall</th>
			<th>overall rating<br>[1-5]
			</th>
			<th>old overall feedback</th>
			<th>overall feedback</th>
		</tr>
	<?php 
	$vendor = mysql_query ( "SELECT * FROM v_registrant as v,company as c where c.c_name=v.c_name and c.accept_reject=1 and (v.quality=0 or v.support=0 or v.overall=0 or v.overallfeedback = '')" );
	while ( $row = mysql_fetch_array ( $vendor ) ) {
		$usrname = $row ["c_name"];
		
		//Used to set ID of textboxes that is used for entering rating
		$qual = $usrname . 'qual';
		$sup = $usrname . 'sup';
		$ovr = $usrname . 'ovr';
		$ovrfd = $usrname . 'ovrfd';
		
		//Displays all information necessary
		echo "<tr><td>" . $row ["c_name"] . "</td><td>" . $row ["edu_vname"] . "</td><td>" . $row ["quality"] . "</td><td><input type=\"text\" id='$qual' size=\"5\"
		<td><button type=\"button\" name=\"Rate\"onclick=\"btnqual('$usrname')\">Done</button></td>" . "</td><td>" . $row ["support"] . "</td><td><input type=\"text\" id='$sup' size=\"5\"
		<td><button type=\"button\" name=\"Rate\"onclick=\"btnsup('$usrname')\">Done</button></td>" . "</td><td>" . $row ["overall"] . "</td><td><input type=\"text\" id='$ovr' size=\"5\"
		<td><button type=\"button\" name=\"Rate\"onclick=\"btnovr('$usrname')\">Done</button></td>" . "</td><td>" . $row ["overallfeedback"] . "</td><td><input type=\"text\" id='$ovrfd' size=\"5\"
		<td><button type=\"button\" name=\"Rate\"onclick=\"btnovrfd('$usrname')\">Done</button></td></tr>";
	}
	
	
	if (isset ( $_GET ['usrname'] )) {
		$usr = $_GET ['usrname'];
		
		//if quality rating is to be modified
		if (isset ( $_GET ['qual'] )) {
			$quality = $_GET ['qual'];
			
			//update database and refresh the page
			$enter = mysql_query ( "UPDATE v_registrant SET quality='$quality' WHERE c_name='$usr'" );
			header ( 'Location: edusculpt_rating.php' );
		}
		
		//if support rating is to be modified
		if (isset ( $_GET ['sup'] )) {
			$support = $_GET ['sup'];
			
			//update database and refresh the page
			$enter = mysql_query ( "UPDATE v_registrant SET support='$support' WHERE c_name='$usr'" );
			header ( 'Location: edusculpt_rating.php' );
		}
		
		//if overall rating is to be modified
		if (isset ( $_GET ['ovr'] )) {
			$overall = $_GET ['ovr'];
			
			//update database and refresh the page
			$enter = mysql_query ( "UPDATE v_registrant SET overall='$overall' WHERE c_name='$usr'" );
			header ( 'Location: edusculpt_rating.php' );
		}
		
		//if overall feedback is to be modified
		if (isset ( $_GET ['ovrfd'] )) {
			$ovrfeed = $_GET ['ovrfd'];
			
			//update database and refresh the page
			$enter = mysql_query ( "UPDATE v_registrant SET overallfeedback='$ovrfeed' WHERE c_name='$usr'" );
			header ( 'Location: edusculpt_rating.php' );
		}
	}
	mysql_close ( $con );
} else {
	//if admin not logged in then redirect to admin login page
	echo "<script>alert('Please login!');window.location.href='admin_login.php'</script>";
}
?>

<!-- Redirects to admin homepage -->
<a href="layoutit/index.php"
			style="position: absolute; top: 3%; right: 10%;">HOME</a>

</body>
</html>