<%@page import="java.io.*"%>
<%@page import="java.sql.*"%>


<html>
<title>UserView</title>
<body background="jsp_imgs/glass.jpg">
	<font color=WHITE>

		<h1>
			<font color="GOLD">Here is the owner Details :</font>
		</h1> <%
 	String owname = "", addrs = "";
 	String n = "", h = "", p = "", addr = "";
 	String line = "";
 	BufferedReader br;
 	boolean flag = false;
 	String fileName = "/jsp_pro/Ownerinfo.txt";

 	try {
 		//InputStream ins = application.getResourceAsStream(fileName);
 		//br = new BufferedReader(new InputStreamReader(ins));
 		br = new BufferedReader(new FileReader(
 				application.getRealPath("/") + fileName));

 		int nid = Integer.parseInt(request.getParameter("value"));

 		Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
 		Connection con = DriverManager
 				.getConnection("jdbc:odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};DBQ="
 						+ application.getRealPath("/") + "/jsp.accdb");
 		Statement s = con.createStatement();

 		String s1 = String.format("select * from admin where ID=%d",
 				nid);
 		ResultSet buffer = s.executeQuery(s1);

 		while (buffer.next()) {
 			owname = buffer.getString("oname");
 		}

 		String s2 = String.format("select * from add where name='%s'",
 				owname);
 		ResultSet buff = s.executeQuery(s2);

 		while (buff.next()) {
 			addrs = buff.getString("address");
 		}

 		while ((line = br.readLine()) != null) {
 			String col[] = line.split(",");
 			if (col[0].equals(owname)) {
 				flag = true;
 				n = owname;
 				h = col[3];
 				p = col[4];
 			}
 		}
 		br.close();
 		s.close();
 		con.close();
 	} catch (Exception e) {
 		
 	}

 	if (flag == true) {
 %>
		<table border="border" bgcolor="303030" cellpadding="10">
			<tr>
				<th align="left"><font color=white size="5">Owner Name</font></th>
				<td><font color=Turquoise size="5"><%=owname%></font></td>
			</tr>
			<tr>
				<th align="left"><font color=white size="5">Phone no</font></th>
				<td><font color=Turquoise size="5"><%=p%></font></td>
			</tr>
			<tr>
				<th align="left"><font color=white size="5">Hotel Name</font></th>
				<td><font color=Turquoise size="5"><%=h%></font></td>
			</tr>
			<tr>
				<th align="left"><font color=white size="5">Address</font></th>
				<td><font color=Turquoise size="5"><%=addrs%></font></td>
			</tr>
		</table> <%
 	}

 	else {
 		out.println("<h3><font color=WHITE>oops!! No such owner registered in our website</font></h3>");
 	}
 %>
		<form action="User.jsp">
			<input type="submit" value="Logout">
		</form> <marquee behavior="alternate">
			<h1>
				<font color="ORANGE">CUISINE LOCATOR</font>
			</h1>
		</marquee> <a href="index.jsp"><h3>
				<font color="BLUE">HOME PAGE</font>
			</h3></a>
		<hr>

	</font>
</body>

</html>

