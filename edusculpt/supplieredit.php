<!-- To edit supplier details by admin -->

<html>
<?php
@ob_start ();
session_start ();

include 'config.php';

//check if admin logged in and if not then redirect to admin login page
if (isset ( $_SESSION ['log'] )) {
	
	//database connection
	$con = @mysql_connect ( $host, $dbuname, $dbpass );
	if (! $con) {
		die ( 'could not connect: ' . mysql_error () );
	}
	mysql_select_db ( $dbname, $con );
	
	?>
	
<head>
<!-- Used to display title & icon on browser tab -->
<title>Supplier edit page</title>
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<!-- Used to display title & icon on browser tab -->

<style type="text/css">
/*Style to display all the tables*/
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
function addcateg(){
	//validates category selected and entered
	
	var sel= document.forms["vendform"]["category"].value;
	var seltd=document.forms["vendform"]["selected_cat"].value;
	
	if(seltd.indexOf(sel)>=0){
		alert('Category already selected!');
	}
	else{
		if(seltd==null || seltd==""){
			document.forms["vendform"]["selected_cat"].value=sel;
		}
		else{
			document.forms["vendform"]["selected_cat"].value=seltd+","+sel;
		}
	}
}

</script>
</head>
<body>

<?php
	if (isset ( $_GET ['rej1'] )) {
		$names1 = $_GET ['rej1'];
		$_SESSION ['compname'] = $names1;
		
		//retrieve all the details of the particular supplier whose details needs to be edited
		$sql = mysql_query ( "SELECT * FROM company as c,v_registrant as v where c.c_name=v.c_name and v.c_name='$names1'" );
		while ( $rows = mysql_fetch_array ( $sql ) ) {
			
			?>
		<a href="layoutit/index.php"
		style="position: absolute; top: 3%; right: 10%;">HOME</a>
	<br>
	
	<!-- Form that provides fields to edit Supplier details -->
	<form name="vendform" action="supplieredit.php?value=edit"
		method="post">
		<table class="gridtable">

			<tr>
				<td><label>Company</label></td>
				<td><input type="text" name="comp" id="comp" size="30"
					value="<?php echo $rows['c_name'];?>" disabled="disabled"></td>
			</tr>

			<tr>
				<td><label>Category</label></td>
				<td><select name="category" style="max-width: 100px">
						<option value="choose">Choose</option>
					<?php
			
			$con = mysql_connect ( $host, $dbuname, $dbpass );
			if (! $con) {
				die ( 'could not connect: ' . mysql_error () );
			}
			mysql_select_db ( $dbname, $con );
			// display all the categories entered by the edusculpt admins
			$cat = mysql_query ( "SELECT * FROM category" );
			while ( $row = mysql_fetch_array ( $cat ) ) {
				?>
					<option value='<?php echo $row['categ']?>'><?php echo $row['categ']?></option>
					<?php
			}
			?>
				</select>&nbsp;<img src="images/plus1.png" alt="Next" width="20"
					title="Add category" onclick="addcateg()" height="20" />&nbsp;<textarea
						rows="3" cols="50" name="selected_cat"
						readonly="readonly"><?php echo $rows['category'];?></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td class="padd"><input type='text' name="cat_other" size="30"
					placeholder="Enter if other categories" /></td>

			</tr>
			<tr>
				<td><label class="lbl">Location/Region</label></td>
				<td><select name="Location/Region" style="width: 318px;"><?php
			$resul1 = mysql_query ( "SELECT * FROM region" );
			while ( $row = mysql_fetch_array ( $resul1 ) ) {
				if (strcmp ( $row ['region'], $rows ['location'] ) == 0) {
					?>
			<option value='<?php echo $row['region']?>' selected="selected"><?php echo $row['region']?></option>
			<?php
				} else {
					?>
			<option value='<?php echo $row['region']?>'><?php echo $row['region']?></option>
			<?php
				}
			}
			?>
			</select></td>
			</tr>
			<tr>
				<td><label>Experience</label></td>
				<td><input type="text" name="exp" id="exper" size="30"
					value="<?php echo $rows['experience'];?>"> <script></script></td>
			</tr>
			<tr>
				<td><label>Base/Service Region</label></td>
				<td><input type="text" name="service" id="service" size="30"
					value="<?php echo $rows['serviceregion'];?>"></td>
			</tr>
			<tr>
				<td><label>Number of customers</label></td>
				<td><input type="text" name="custnumb" id="custnumb" size="30"
					value="<?php echo $rows['custnumb'];?>"></td>
			</tr>
			<tr>
				<td><label>Unique feature</label></td>
				<td><input type="text" name="uniqfeat" id="uniqfeat" size="30"
					value="<?php echo $rows['uniqfeature'];?>"></td>
			</tr>
			<tr>
				<td><label>Organisation type</label></td>
				<td><input type="text" name="orgtype" id="orgtype" size="30"
					value="<?php echo $rows['orgtype'];?>"></td>
			</tr>
			<tr>
				<td><label>Company Certification</label></td>
				<td><input type="text" name="cert" id="cert" size="30"
					value="<?php echo $rows['compcert'];?>"></td>
			</tr>
			<tr>
				<td><label>Vendor Expectation</label></td>
				<td><input type="text" name="vexpect" id="vexpect" size="30"
					value="<?php echo $rows['vendorexpect'];?>"></td>
			</tr>
			<tr>
				<td><label>ES Remarks</label></td>
				<td><input type="text" name="remarks" id="remarks" size="30"
					value="<?php echo $rows['esremarks'];?>"></td>
			</tr>
			<tr>
				<td><label>Core Competancy</label></td>
				<td><input type="text" name="core" id="core" size="30"
					value="<?php echo $rows['corecomp'];?>"></td>
			</tr>
			<tr>
				<td><label>Preferred Brand</label></td>
				<td><input type="text" name="pbrand" id="pbrand" size="30"
					value="<?php echo $rows['prefbrand'];?>"></td>
			</tr>
			<tr>
				<td><label>Time to Deliver From PO</label></td>
				<td><input type="text" name="deliver" id="deliver" size="30"
					value="<?php echo $rows['timetodeliver'];?>"></td>
			</tr>
			<tr>
				<td><label>Warranty & Shelf life</label></td>
				<td><input type="text" name="warranty" id="warranty" size="30"
					value="<?php echo $rows['warranty'];?>"></td>
			</tr>
			<tr>
				<td><label>Support & AMC</label></td>
				<td><input type="text" name="supportamc" id="supportamc" size="30"
					value="<?php echo $rows['supportamc'];?>"></td>
			</tr>
			<tr>
				<td><label>Additional Info</label></td>
				<td><input type="text" name="addinfo" id="addinfo" size="30"
					value="<?php echo $rows['addinfo'];?>"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="edit" value="Edit" /></td>
			</tr>
		</table>
	</form>
		<?php
		}
	} 

	else if (isset ( $_GET ['value'] ) && $_GET ['value'] == 'edit') {
		$compname = $_SESSION ['compname'];
		if (isset ( $_POST ['category'] )) {
			
			$categ = $_POST ['category'];
			$categsel = $_POST ['selected_cat'];
			$catother = $_POST ['cat_other'];
			
			//categories selected from dropdown, 
			//categories already present in database
			//and other categories that are entered are 
			//merged to single String to store in database
			if ($categ == "choose" && ($catother == "null" || $catother == "")) {
				$categg = $categsel;
			}else if ($categ=="choose"){
				$categg = $categsel . "," . $catother;
				$categg = str_replace ( ",,", ",", $categg );
			}else if (strpos ( $categsel, $categ )) {
				$categg = $categsel . "," . $catother;
				$categg = str_replace ( ",,", ",", $categg );
				// $_SESSION ['category'] = $categg;
			} else {
				$categg = $categ . "," . $categsel . "," . $catother;
				$categg = str_replace ( ",,", ",", $categg );
				// $_SESSION ['category'] = $categg;
			}
		}
		
		//detailes submitted are stored in temporary variables
		$region = $_POST ["Location/Region"];
		$experience = $_POST ['exp'];
		$service = $_POST ['service'];
		$custnumb = $_POST ['custnumb'];
		$uniqfeat = $_POST ['uniqfeat'];
		$orgtype = $_POST ['orgtype'];
		$cert = $_POST ['cert'];
		$vexpect = $_POST ['vexpect'];
		$remarks = $_POST ['remarks'];
		$core = $_POST ['core'];
		$pbrand = $_POST ['pbrand'];
		$deliver = $_POST ['deliver'];
		$warranty = $_POST ['warranty'];
		$supportamc = $_POST ['supportamc'];
		$addinfo = $_POST ['addinfo'];
		
		//Edited details are updated in the database
		$q1 = mysql_query ( "update company set category='$categg',location='$region',experience='$experience',serviceregion='$service',custnumb='$custnumb',uniqfeature='$uniqfeat',orgtype='$orgtype',compcert='$cert',vendorexpect='$vexpect',esremarks='$remarks' where c_name='$compname'" );
		$q2 = mysql_query ( "update v_registrant set corecomp='$core',prefbrand='$pbrand',timetodeliver='$deliver',warranty='$warranty',supportamc='$supportamc',addinfo='$addinfo' where c_name='$compname'" );
		?>
	<script>window.location.href="edusculpt_database.php?value=comp";</script>
	<?php
	}
} else {
	//if not logged in,then redirect to admin login page
	echo "<script>alert('Please login!');window.location.href='admin_login.php'</script>";
}
?>
		</body>
</html>