<!-- TO add new pool requirements  -->

<html>
<head>
<?php
//These are to start session.
session_start ();
@ob_start ();
$uname = $_SESSION ['iusername'];
$insname = $_SESSION ['insname'];
?>
<title>Pool Requirement Form</title>
<!-- To set icon in the browser tab -->
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
<!-- To set icon in the browser tab -->
<style type="text/css">
.one {
	width: 260px;
	height: 60px;
	background: gold;
	text-align: center;
	margin-left: auto;
	margin-right: auto;
}

.txt1 {
	border: 3px solid gold;
	font-size: large;
	font-family: serif;
	width: 300px;
}

textarea {
	border: 3px solid gold;
	font-size: large;
	font-family: serif;
}

.padd {
	padding: 6px;
}

.lbl {
	font-size: large;
	font-family: sans-serif;
	font-weight: 500;
}

.compemailsv {
	width: 150px;
	height: 60px;
	background: gold;
	font-weight: bold;
}

select {
	border: gold solid 3px;
	font-size: large;
	font-weight: bold;
	width: 280px;
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
            function pool_validate() {
                //To check if all the form feilds are filled and are valid.
            	var quan = document.forms["poolreq"]["quantity"].value;
            	var budg=document.forms["poolreq"]["price_range"].value;
            	var dod=document.forms["poolreq"]["date"].value;
            	var specs=document.forms["poolreq"]["specs"].value;

            	if(quan==null || quan=="" || isNaN(quan)){
                	alert('Enter valid quantity!');
                	return false;
                }
            	else if(budg==null || budg=="" || isNaN(budg)){
					alert('Enter valid budget!');
					return false;
                	}
            	else if(dod==null || dod==""){
					alert('Enter date of delivery!');
					return false;
                	}
            	else if(specs==null || specs==""){
                	alert('Enter specifications!');
					return false;
                	}
            	else{
					return true;
                	}
            }
</script>
</head>
<body>
<?php  if(isset($_SESSION ['iusername'])){
//To check if the user has not signedin properly or session expires?>
<?php include '../config.php';?>
<div style="position: absolute; right: 10%; top: 5%;">
		<a href="institutionpool.php"><img alt="Chick for Home Page"
			src="../images/cancel.png" height="40" width="40"></a>
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
	<h2 class="one" align="centre">Requirement Pool Gathering</h2>

	<form name="poolreq" action="institutionpoolform.php" method="post"
		enctype="multipart/form-data" onsubmit="return pool_validate()"><!-- New Pool Requirement Form -->
		<table style="position: absolute; top: 35%; left: 25%;">

			<tr>
				<td class="padd"><label class="lbl">Institution Name</label></td>
				<td class="padd"><input type="text" name="i_name" id="i_name"
					class="txt1" size="22" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Region</label></td>
				<td class="padd"><input type="text" name="reg" id="reg" class="txt1"
					size="30" disabled="disabled"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Category</label></td>
				<td class="padd"><select name="category" class="txt"
					style="max-width: 115px">
					<?php
	$con = mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	// Display all the categories entered by the edusculpt admins
	$cat = mysql_query ( "SELECT * FROM category" );
	$region = mysql_query ( "SELECT region from institution WHERE i_name='$insname'" );
	while ( $row = mysql_fetch_array ( $region ) ) {
		$reg = $row ['region'];
	}
	while ( $row = mysql_fetch_array ( $cat ) ) {
		?>
					<option value='<?php echo $row['categ']?>'><?php echo $row['categ']?></option>				
					<?php
	}
	?>
				</select>&nbsp&nbsp<input type="text" name="cat_other" class="txt"
					size="17" placeholder="Enter if other category"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Quantity</label></td>
				<td class="padd"><input type="text" name="quantity" id="quantity"
					class="txt1" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Price Range/ Budget</label></td>
				<td class="padd"><input type="text" name="price_range"
					id="price_range" class="txt1" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Date Of Delivery</label></td>
				<td class="padd"><input type="date" name="date" id="date" size="30"
					class="txt1"></td>
			</tr>
<!-- 			<tr> -->
<!-- 				<td class="padd"><label class="lbl">Priority Companies</label></td> -->
<!-- 				<td class="padd"><b>1. </b><select id="priority_1" name="priority_1"> -->
<!-- 						<option>HP</option> -->
<!-- 						<option>Lenovo</option> -->
<!-- 						<option>Dell</option> -->
<!-- 				</select></td> -->
<!-- 			</tr> -->
<!-- 			<tr> -->
<!-- 				<td class="padd"></td> -->
<!-- 				<td class="padd"><b>2. </b><select id="priority_2" name="priority_2"> -->
<!-- 						<option>HP</option> -->
<!-- 						<option selected="selected">Lenovo</option> -->
<!-- 						<option>Dell</option> -->
<!-- 				</select></td> -->
<!-- 			</tr> -->
<!-- 			<tr> -->
<!-- 				<td class="padd"></td> -->
<!-- 				<td class="padd"><b>3. </b><select id="priority_3" name="priority_3"> -->
<!-- 						<option>HP</option> -->
<!-- 						<option>Lenovo</option> -->
<!-- 						<option selected="selected">Dell</option> -->
<!-- 				</select></td> -->
<!-- 			</tr> -->
			<tr>
				<td class="padd"><label class="lbl">Specifications</label></td>
				<td class="padd"><input type="text" name="specs" id="specs"
					class="txt1" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Attachments, if any:<br> <font
						size="2"><b>Note</b>:This is only for better help. The <br>imformation
							will not be made public</font></label></td>
				<td class="padd"><input type="file" name="choose_file[]"
					multiple="multiple" id="choose_file" class="" size="30"
					value="Choose File">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Additional Comments</label></td>
				<td class="padd"><textarea rows="3" cols="30" name="comnt"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td align="right" class="padd"><input name="Submit" type="Submit"
					class="compemailsv" id="round" value="Submit"></td>
			</tr>
		</table>

		<script type="text/javascript">
		//To Pre-Fill Institution name and region in the form
				document.getElementById("i_name").value ='<?php echo $insname?>';
				document.getElementById("reg").value ='<?php echo $reg?>';
				</script>
	</form>
			<?php
	if (isset ( $_POST ['quantity'] )) {
		//To add the form details into SQL database.
		if ($_POST ['cat_other'] == null || $_POST ['cat_other'] == "") {
			$categ = $_POST ['category'];
		} else {
			$categ = $_POST ['cat_other'];
		}
		
		$quant = $_POST ['quantity'];
		$budget = $_POST ['price_range'];
		$dodel = $_POST ['date'];
// 		$pr1 = $_POST ['priority_1'];
// 		$pr2 = $_POST ['priority_2'];
// 		$pr3 = $_POST ['priority_3'];
		$spec = $_POST ['specs'];
		$comnt = $_POST ['comnt'];
		if ($comnt == null || $comnt == "") {
			$comnt = 'none';
		}
		
		for($i = 0; $i < count ( $_FILES ['choose_file'] ['name'] ); $i ++) {
			
			$target_dir = "../documents/institutions/" . $_SESSION ['iusername'] . "_";//Set the directory path.
			$target_files = $target_dir . basename ( $_FILES ["choose_file"] ["name"] [$i] ); 
			$FileType = pathinfo ( $target_files, PATHINFO_EXTENSION );//Set filetype. Pathinfo_Extension provides the uploaded filetype.
			$target_file = $target_dir . "instreqpoolatt_" . date ( 'd-m-Y' ) . '_' . $i . "." . $FileType;//used to set the name of the new files.
			
			move_uploaded_file ( $_FILES ['choose_file'] ['tmp_name'] [$i], $target_file );// Move the files to the required location and upload them in that directory
		}
		
		//Replace the single quotes with escape sequence to avoid SQL Query Errors
		$insname=str_replace("'","\'",$insname);
		$reg=str_replace("'","\'",$reg);
		$categ=str_replace("'","\'",$categ);
		$quant=str_replace("'","\'",$quant);
		$budget=str_replace("'","\'",$budget);
		$dodel=str_replace("'","\'",$dodel);
		$spec=str_replace("'","\'",$spec);
		$comnt=str_replace("'","\'",$comnt);
		
		$pool = mysql_query ( "INSERT INTO poolrequirement VALUES('$insname','$reg','$categ','$quant','$budget','$dodel','$spec','$comnt','0','Any')" );
		if (! $pool) {
			echo "ERROR";
		} else {
			?>		
					<script type="text/javascript">
					//Connfirmation for Requirement submission 
					alert('Submitted successfully!\nCheck pool requirements for further updates');
					window.location.href="institutionpool.php";
					
					</script>
				<?php
			
			mysql_close ( $con );
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