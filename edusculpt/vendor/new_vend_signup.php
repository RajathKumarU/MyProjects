<!DOCTYPE html>
<html>
<?php
include '../config.php';

session_start ();
$randomnr = rand ( 1000, 9999 );
$_SESSION ['randomnr2'] = $randomnr;

?>
<head>
<title>Vendor Signup</title>
<link rel="icon" href="../images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon" />
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

.btn {
	background: none;
	border: none;
}

.padd {
	padding: 6px;
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
<script type="text/javascript">
function addcateg(){
	var sel= document.forms["vendform"]["category"].value;
	var seltd=document.forms["vendform"]["selected_cat"].value;
	
	if(sel=="choose"){
		alert('Please select a category!');
		}
	else if(seltd.indexOf(sel)>=0){
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
<script type="text/javascript">
function addcateg(){
	var sel= document.forms["vendform"]["category"].value;
	var seltd=document.forms["vendform"]["selected_cat"].value;
	
	if(sel=="choose"){
		alert('Please select a category!');
		}
	else if(seltd.indexOf(sel)>=0){
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
<script type="text/javascript" src="vend_validate.js"></script>
</head>
<body>

	<img src="../images/edulogo.png" alt="edusculpt_logo"
		style="display: block; margin-left: auto; margin-right: auto; width: 120px; height: 50px;" />
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
	<div style="position: absolute; top: 150px; left: 1000px;">
		<a href="../layoutit/index.php"><img alt="Click for Home Page"
			src="../images/home_icon.png" height="40" width="40">
			<div class="caption" style="font-size: x-small;">Home Page</div></a>
	</div>
	<?php
	
	if ($_GET ['form_value'] == 'back') {
		
		
 		$_SESSION['reg1name']=null;
 		$_SESSION['reg1mob']=null;
 		$_SESSION['reg1email']=null;
 		$_SESSION['reg1desig']=null;
 		$_SESSION['reg1idno']=null;
 		$_SESSION['reg1doc']="Yes";
 		$_SESSION['ownname']=null;
 		$_SESSION['ownmob']=null;
 		$_SESSION['ownemail']=null;
		
		// company registration form
		?>
	<h2 class="one" align="centre"
		style="font-size: x-large; font-family: sans-serif; font-weight: 500;">Company
		Information</h2>
	<br>

	<form name="vendform" action="?form_value=check"
		onsubmit="return vend_validation()" method="post">
		<table align="center">
			<tr>
				<td class="padd"><label class="lbl">Company Name</label></td>
				<td class="padd"><input type="text" name="comp_name" class="txt"
					size="30"></td>
			</tr>
			
			<tr>
				<td class="padd"><label class="lbl">Category</label></td>
				<td class="padd" ><select 
					name="category" class="txt"  style="max-width: 100px">
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
					
					
				</select>&nbsp;<img src="../images/plus1.png" alt="Next" width="20" title="Add category" onclick="addcateg()"
							height="20" />&nbsp;<input type='text' name="selected_cat" class="txt" size="16"  
					 readonly="readonly"/></td>
			</tr>
			<tr>
			<td></td>
				<td class="padd"><input type='text' name="cat_other" class="txt"  size="30"
					 placeholder="Enter if other categories"/></td>
				
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Location/Region</label></td>
				<td class="padd"><select class="txt" name="Location/Region" style="width: 318px;"><?php
				$resul1 = mysql_query ( "SELECT * FROM region" );
	while ( $row = mysql_fetch_array ( $resul1 ) ) {
		?><option value='<?php echo $row['region']?>'><?php echo $row['region']?></option>
			<?php
	}
	?>
			</select></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Experience</label></td>
				<td class="padd"><input type="text" name="exper" class="txt"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Base/Service Region</label></td>
				<td class="padd"><input type="text" name="ser_region" class="txt"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">No. of customers</label></td>
				<td class="padd"><input type="text" name="cust_num" class="txt"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Unique Features</label></td>
				<td class="padd"><input type="text" name="uniq_feat" class="txt"
					size="30"></td>
			</tr>
				<tr>
				<td class="padd"><label class="lbl">Organisation Type</label></td>
				<td class="padd"><input type="text" name="org_type" class="txt" value="<?php echo $_SESSION['reg1mob'];?>"
					size="30"></td>
			</tr>
			
				<tr>
				<td class="padd"><label class="lbl">Company Certifications</label></td>
				<td class="padd"><input type="text" name="certificate" class="txt" value="<?php echo $_SESSION['reg1mob'];?>"
					size="30"></td>
			</tr>
				<tr>
				<td class="padd"><label class="lbl">Vendor Expectation from inst.</label></td>
				<td class="padd"><input type="text" name="vexpec" class="txt" value="<?php echo $_SESSION['reg1mob'];?>"
					size="30"></td>
			</tr>
				<tr>
				<td class="padd"><label class="lbl">ES Remarks</label></td>
				<td class="padd"><input type="text" name="esrem" class="txt" value="<?php echo $_SESSION['reg1mob'];?>"
					size="30"></td>
			</tr>
			
			<tr>
				<td class="padd"></td>
				<td class="padd" align="right"><button type="submit" onclick=""
						class="btn">
						<img src="../images/next_icon.png" alt="Next" width="50"
							height="50" />
					</button></td>
			</tr>
		</table>
	</form>
			<?php
	}
	if ($_GET ['form_value'] == 'check'){
		$num_rows=0;
		$_SESSION ['compname'] = $_POST ["comp_name"];
		
		$cnme=$_SESSION ['compname'];
		$con = mysql_connect ( $host, $dbuname, $dbpass );
		if (! $con) {
			die ( 'could not connect: ' . mysql_error () );
		}
		mysql_select_db ( $dbname, $con );
		$compa = mysql_query ( "SELECT * FROM company WHERE c_name='$cnme'" );
		if(mysql_num_rows($compa)>0){?>
			<script>
			alert("Company already exists!!");
			window.location.href="new_vend_signup.php?form_value=back";</script>
		<?php }
	else{
		if (isset($_POST['category'])){
				
			$categ=$_POST['category'];
			$categsel=$_POST['selected_cat'];
			$catother=$_POST['cat_other'];
			if(strpos($categsel,$categ)){
				$categg=$categsel.",".$catother;
				$categg=str_replace(",,",",",$categg);
				$_SESSION['category']=$categg;
			}
			else{
				$categg=$categ.",".$categsel.",".$catother;
				$categg=str_replace(",,",",",$categg);
				$_SESSION['category']=$categg;
			}
		
		}
		
		
		$_SESSION ['region'] = $_POST ["Location/Region"];
		$_SESSION ['experience'] = $_POST ["exper"];
		$_SESSION ['service_region'] = $_POST ["ser_region"];
		$_SESSION ['cust_numb'] = $_POST ["cust_num"];
		$_SESSION ['uniq_feature'] = $_POST ["uniq_feat"];
		$_SESSION ['orgtype'] = $_POST ["org_type"];
		$_SESSION ['compcertificate'] = $_POST ["certificate"];
		$_SESSION ['expectation']  = $_POST ["vexpec"];
		$_SESSION ['esremarks'] = $_POST ["esrem"];
		
		?><script>
			
			window.location.href="new_vend_signup.php?form_value=next";</script><?php 
		
	}
	}
	if ($_GET ['form_value'] == 'next') {
		
		?>

		
		
		
		
		
		
		
		<br>

	<h2 class="one" align="centre"
		style="font-size: x-large; font-family: sans-serif; font-weight: 500;">Product Information</h2>
	<br>
	<?php //$cap_val = $_SESSION ['randomnr2'];?>
	<form name="vendformcntd" action="?form_value=final"
		onsubmit="return vend_validation_cntd('<?php echo $_SESSION ['randomnr2']; ?>')"
		method="post">
		<table align="center">

				
			<tr>
				<td class="padd"><label class="lbl">Core Competancy</label></td>
				<td class="padd"><input type="text" name="corecomp" class="txt" value="<?php echo $_SESSION['reg1email'];?>"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Preferred Brands</label></td>
				<td class="padd"><input type="text" name="reg_designation" value="<?php echo $_SESSION['reg1desig'];?>"
					class="txt" size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Time to deliver from PO</label></td>
				<td class="padd"><input type="text" name="deliver_time" class="txt" value="<?php echo $_SESSION['reg1idno'];?>"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Warranty & Shelf Life</label></td>
				<td class="padd"><input type="text" name="warrenty" class="txt" value="<?php echo $_SESSION['ownname'];?>"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Support & AMC</label></td>
				<td class="padd"><input type="text" name="supp" class="txt" value="<?php echo $_SESSION['ownmob'];?>"
					size="30"></td>
			</tr>
			<tr>
				<td class="padd"><label class="lbl">Additional info</label></td>
				<td class="padd"><textarea name="add_info" class="txt" cols=40 rows=6></textarea></td>
			</tr>
			<tr>
				
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
	
	<?php
		//if(!isset($_SESSION['compname'])){
		
		//}
	}
	if (isset ( $_POST ['Signup'] ) && ($_GET ['form_value'] == 'final')) {
		
		$compname = $_SESSION ['compname'];
		$compname=str_replace("'","\'",$compname);
		$category = $_SESSION ['category'];
		$category=str_replace("'","\'",$category);
		$region = $_SESSION ['region'];
		$region=str_replace("'","\'",$region);
		$experience=$_SESSION ['experience'];
		$experience=str_replace("'","\'",$experience);
		$serviceregion=$_SESSION ['service_region'];
		$serviceregion=str_replace("'","\'",$serviceregion);
		$custnumb=$_SESSION ['cust_numb'];
		$custnumb=str_replace("'","\'",$custnumb);
		$uniqfeature=$_SESSION ['uniq_feature'];
		$uniqfeature=str_replace("'","\'",$uniqfeature);
		$orgtype=$_SESSION ['orgtype'];
		$orgtype=str_replace("'","\'",$orgtype);
		$compcertificate= $_SESSION ['compcertificate'];
		$compcertificate=str_replace("'","\'",$compcertificate);
		$expectation=$_SESSION ['expectation'];
		$expectation=str_replace("'","\'",$expectation);
		$esremarks=$_SESSION ['esremarks'];
		$esremarks=str_replace("'","\'",$esremarks);
		
		$corecomp=$_POST['corecomp'];
		$corecomp=str_replace("'","\'",$corecomp);
		$reg_designation=$_POST['reg_designation'];
		$reg_designation=str_replace("'","\'",$reg_designation);
		$deliver_time=$_POST['deliver_time'];
		$deliver_time=str_replace("'","\'",$deliver_time);
		$warrenty=$_POST['warrenty'];
		$warrenty=str_replace("'","\'",$warrenty);
		$supp=$_POST['supp'];
		$supp=str_replace("'","\'",$supp);
		$add_info=$_POST['add_info'];
		$add_info=str_replace("'","\'",$add_info);
		
		$con = mysql_connect ( $host, $dbuname, $dbpass );
		if (! $con) {
			die ( 'could not connect: ' . mysql_error () );
		}
		mysql_select_db ( $dbname, $con );
		$cnt = mysql_query ( "SELECT * FROM v_registrant" );
		$count = mysql_num_rows ( $cnt );
		$count = sprintf("%03d", $count);
		// echo $count;
		$insresult = mysql_query ( "INSERT INTO company VALUES ('$compname','$category','$region','$experience','$serviceregion','1','$custnumb','$uniqfeature','$orgtype','$compcertificate','$expectation','$esremarks')" );
		$regresult = mysql_query ( "INSERT INTO v_registrant VALUES ('$compname',\"vendorA1$count\",'$corecomp','$reg_designation','$deliver_time','$warrenty','$supp','$add_info','0','0','0','')" );
		//$ownresult = mysql_query ( "INSERT INTO comp_info_update VALUES ('$uname','$branch','$ownname','$ownmob','$ownemail','$service')" );
		
		// echo $category;
	  if (! $regresult) {
// 	  	$_SESSION['reg1name']=$rname;
// 	  	$_SESSION['reg1mob']=$rmob;
// 	  	$_SESSION['reg1email']=$remail;
// 	  	$_SESSION['reg1desig']=$rdesig;
// 	  	$_SESSION['reg1idno']=$regid;
// 	  	$_SESSION['reg1doc']=$documents;
	  	
// 	  	echo "<script>alert('username already exists,try another name!');
// 			window.location.href='new_vend_signup.php?form_value=next';
// 			</script>";
		} else {
			// Account has been created and values have been added to database
			
			mysql_close ( $con );
			?>
				<script type="text/javascript">
					alert('Account created succesfully!');
					window.location.href="new_vend_signup.php?form_value=back";
				</script>
			<?php
		}
	}
	?>


</body>
</html>