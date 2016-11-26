<%@page import="java.sql.*"%>

<html>
<title>User DB</title>
<body background="jsp_imgs/glass.jpg">
	<font color=WHITE> <%
 	try {
 		int id = -1;
 		Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
 		String ctmm = request.getParameter("ctnm");
 		String csmm = request.getParameter("csnm");
 		Connection con = DriverManager
 				.getConnection("jdbc:odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};DBQ="
 						+ application.getRealPath("/") + "/jsp.accdb");
 		Statement s = con.createStatement();
 		String sql = String
 				.format("select * from admin where city='%s' and cuisine like '%%%s%%' ",
 						ctmm, csmm);
 		ResultSet buff = s.executeQuery(sql);
 		boolean f = false;
 		String path = application.getRealPath("/");
 %>
		<h2>Cuisne Details</h2>
		<table border=5>
			<tr>
				<td><font color=GREEN>Owner Name</font></td>
				<td><font color=GREEN>City</font></td>
				<td><font color=GREEN>Cuisine</font></td>
				<td><font color=GREEN>Hotel</font></td>
				<td><font color=GREEN>Category</font></td>
				<td><font color=GREEN>click here</font></td>
			</tr>
			<%
				int c = 0;
					while (buff.next()) {
						c++;
						String nm = buff.getString("oname");
						String cty = buff.getString("city");
						String csn = buff.getString("cuisine");
						String htl = buff.getString("hotel");
						String ctg = buff.getString("category");
						id = buff.getInt("ID");
			%>
			<form action="Userview.jsp">
				<tr>
					<td><font color=WHITE><%=nm%></font></td>
					<td><font color=WHITE><%=cty%></font></td>
					<td><font color=WHITE><%=csn%></font></td>
					<td><font color=WHITE><%=htl%></font></td>
					<td><font color=WHITE><%=ctg%></font></td>
					<td><a href="Userview.jsp?value=<%=id%>"><font color=blue>view
								details</font></a></td>
				</tr>

				<tr>
					<%
						if (ctg.equals("veg") && f == false) {
					%>
					<img src="jsp_imgs/veg.jpg" alt="veg" width="450" height="250">
					<%
						f = true;
								} else if (ctg.equals("non-veg") && f == false) {
					%>
					<img src="jsp_imgs/nonveg.jpg" alt="non veg" width="450"
						height="250">

					<%
						f = true;
								} else if (ctg.equals("italian") && f == false) {
					%>
					<img src="jsp_imgs/italian.jpg" alt="italian" width="450"
						height="250">

					<%
						f = true;
								} else if (ctg.equals("chinese") && f == false) {
					%>
					<img src="jsp_imgs/chinese.jpg" alt="chinese" width="450"
						height="250">

					<%
						f = true;
								}

							}
					%>
				</tr>
		</table> <%
 	if (c == 0) {
 			out.println("<h3><font color=WHITE>oops!! No such City or Cuisine Registered in our Website</font></h3>");
 		}
 %> <%
 	s.close();
 		con.close();
 	} catch (Exception e) {
 	}
 %>
		</form>
		<form action="User.jsp">
			<input type="submit" value="Logout">
		</form> <marquee behavior="scroll" direction="left">
			<h1>
				<font color="skyblue">CUISINE LOCATOR</font>
			</h1>
		</marquee>

		<h3>
			<a href="index.jsp"><font color="BLUE">HOME PAGE</font></a>
		</h3>

	</font>
</body>
</html>

