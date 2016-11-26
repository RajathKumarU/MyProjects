<html>
<head>
<title>Compose Mail</title>
<link rel="stylesheet" type="text/css" href="Style1.css" />
</head>
<body class="bdy" background="images/cloud.jpg">
	<h4>
		<font color="#ff8000">COMPOSE MAIL</font>
	</h4>
	<form action="fourth.php" method="post">
		<table class="tbl2">
			<tr>
				<td>TO</td>
				<td><input type="text" name="to" class="txt2"></td>
			</tr>
			<tr>
				<td valign="top">MESSAGE</td>
				<td><textarea id="comment" name="comment" rows="15" cols="70"></textarea></td>
			</tr>
			<tr>
				<td></td>
				<td align="left"><input type="submit" value="send" class="btn"></td>
			</tr>
		</table>
	</form>
</body>
</html>