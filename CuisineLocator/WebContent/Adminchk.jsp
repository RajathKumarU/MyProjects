<%@page import="java.sql.*"%>

<html>
<title>Admin chk</title>
<body background="jsp_imgs/glass.jpg">
	<font color=WHITE>

		<h2>Table of owners with cuisines</h2>
		<hr> <%
 	try {
 		Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
 		Connection con = DriverManager
 				.getConnection("jdbc:odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};DBQ="
 						+ application.getRealPath("/") + "/jsp.accdb");
 		Statement s = con.createStatement();
 		ResultSet buffer = s.executeQuery("select * from owner");
 %>
		<table border=5>
			<tr>
				<td><font color=GREEN>Owner Name</font></td>
				<td><font color=GREEN>City</font></td>
				<td><font color=GREEN>Cuisine</font></td>
				<td><font color=GREEN>Hotel</font></td>
				<td><font color=GREEN>Category</font></td>
			</tr>

			<%
				while (buffer.next()) {
						String nm = buffer.getString("oname");
						String cty = buffer.getString("city");
						String csn = buffer.getString("cuisine");
						String htl = buffer.getString("hotel");
						String ctg = buffer.getString("category");
						int id = buffer.getInt("ID");
			%>
			<form action="Adminchk.jsp">
				<tr>
					<td><font color=WHITE><%=nm%></font></td>
					<td><font color=WHITE><%=cty%></font></td>
					<td><font color=WHITE><%=csn%></font></td>
					<td><font color=WHITE><%=htl%></font></td>
					<td><font color=WHITE><%=ctg%></font></td>
					<td><input type="radio" name="accrej" value="accept"><font
						color=WHITE>Accept</font></td>
					<td><input type="radio" name="accrej" value="reject"><font
						color=WHITE>Reject</font></td>
					<td><input type="submit" value="Confirm"></td>
					<%
						String rdbtn = request.getParameter("accrej");
								if (rdbtn.equals("reject")) {
									String sl = String.format(
											"delete * from owner where ID=%d", id);
									s.executeUpdate(sl);
								} else {
									String sk = String
											.format("insert into admin (oname,city,cuisine,hotel,category) values ('%s','%s','%s','%s','%s')",
													nm, cty, csn, htl, ctg);
									s.executeUpdate(sk);
									sk = String.format("delete * from owner where ID=%d",
											id);
									s.executeUpdate(sk);
								}
					%>

				</tr>
			</form>

			<%
				}
					response.setIntHeader("Refresh", 5);

					buffer.close();
					s.close();
					con.close();
				} catch (Exception e) {
				}
			%>

			<form action="Adminchk.jsp">
				<input type="submit" value="next owner">
			</form>
			<form action="Adminpw.jsp">
				<input type="submit" value="Change Password">
			</form>

			<form action="Admin.jsp">
				<input type="submit" value="Logout">
			</form>

			<marquee behavior="scroll" direction="left">
				<h1>
					<font color="WHITE">CUISINE LOCATOR</font>
				</h1>
			</marquee>

			<h3>
				<a href="index.jsp"><font color="BLUE">HOME PAGE</font></a>
			</h3>

			</font>
</body>
</html>