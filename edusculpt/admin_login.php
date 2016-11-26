<!-- Login page for admin -->

<!DOCTYPE html>
<html>
<head>
<!-- Used to display title & icon on browser tab -->
<link rel="icon" href="images/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
<?php session_start();?>
<title>Admin Login</title>
<!-- Used to display title & icon on browser tab -->

<script type="text/javascript">
//validates the data entered while logging in
function validate()
{
	var uname = document.getElementById("username").value;
	var pass = document.getElementById("password").value;
		
    if(uname == "" || uname == null)
    {
        alert("Enter Username")
        return false;
    }
    else if(pass == "" || pass ==null)
    {
        alert("Enter Password" );
        return false;
    }
    else{
		return true;
    }
}
</script>
</head>
<body>
	<h3>Admin Login</h3>
	
	<!-- Form that collects login details -->
	<form method="post" id="form" action="" onsubmit="return validate()">
		<p>
			Login ID: <input type="text" name="username" id="username"
				placeholder="Username or Email">
		</p>
		<p>
			Password: <input type="password" name="password" id="password"
				placeholder="Password">
		</p>
		<input type="submit" value="Login">
	</form>
	<?php
	
	//if the admin submits the form check credentials, store in session and redirect to admin homepage
	if (isset ( $_POST ['username'] )) {
		if ($_POST ['username'] == 'admin' && $_POST ['password'] == 'admin') {
			$_SESSION ['log'] = "adminlogin";
			?> 
				<script type="text/javascript">window.location.href="layoutit/index.php"</script>
			<?php
		} else {
			//if username or password missmatches then redirect to same login page
			?>
			<script type="text/javascript">
				alert('Please Enter valid credentials!');
				window.location.href='admin_login.php';
			</script>
			<?php
		}
	}
	?>
</body>
</html>