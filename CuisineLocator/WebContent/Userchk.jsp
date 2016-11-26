<%@page import="java.io.*"%>
<%@page import="java.util.*"%>
<%@page import="java.sql.*"%>

<html>
<title>User chk</title>
<body background="jsp_imgs/glass.jpg">
	<font color=WHITE>
		<h2>
			<font color=yellow>Search for your Cuisine</font>
		</h2>
		<form action="Userdb.jsp">
			<table>
				<tr>
					<td><font color=WHITE>Enter City</font></td>
					<td><input type=textbox name="ctnm"></td>
				</tr>
				<tr>
					<td><font color=WHITE>Enter Cuisine</font></td>
					<td><input type=textbox name="csnm"></td>
				</tr>
			</table>
			<input type="submit" value="Search">
		</form>

		<form action="Userpw.jsp">
			<input type="submit" value="Change Password">
		</form>

		<form action="User.jsp">
			<input type="submit" value="Logout">
		</form> <marquee behavior="alternate">
			<h1>
				<font color="orchid">CUISINE LOCATOR</font>
			</h1>
		</marquee>

		<h3>
			<a href="index.jsp"><font color="BLUE">HOME PAGE</font></a>
		</h3>

	</font>
</body>
</html>

