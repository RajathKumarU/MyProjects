
<html>
<title>Owner chk</title>
<h2>
	<font color=yellow>Welcome <%=session.getAttribute("oname")%></font>
</h2>
<body background="jsp_imgs/glass.jpg">

	<form action="Ownerdb.jsp">

		<table>
			<tr>
				<td><font color=WHITE>Enter Cuisine</font></td>
				<td><input type=textbox name="c1"></td>
			</tr>
			<input type="radio" name="cat" value="veg">
			<font color=WHITE>VEG</font>
			<BR>
			<input type="radio" name="cat" value="non-veg">
			<font color=WHITE>NON-VEG</font>
			<BR>
			<input type="radio" name="cat" value="chinese">
			<font color=WHITE>CHINESE</font>
			<BR>
			<input type="radio" name="cat" value="italian">
			<font color=WHITE>ITALIAN<font><BR>
		</table>

		<input type="submit" value="Add Cuisine">
	</form>

	<form action="Owner.jsp">
		<input type="submit" value="Logout">
	</form>

	<form action="Ownerchng.jsp">
		<input type="submit" value="Change Password">
	</form>

	<marquee behavior="alternate">
		<h1>
			<font color="INDIGO">CUISINE LOCATOR</font>
		</h1>
	</marquee>

	<h3>
		<a href="index.jsp"><font color="blue">HOME PAGE</font></a>
	</h3>
</body>
</html>

