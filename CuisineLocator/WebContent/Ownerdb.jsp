<%@page import="java.sql.*"%>
<%@page import="java.io.*"%>

<html>
<title>OwnerDB</title>
<body background="jsp_imgs/glass.jpg">
	<font color=WHITE> <%
 	try {
 		Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
 		Connection con = DriverManager
 				.getConnection("jdbc:odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};DBQ="
 						+ application.getRealPath("/") + "/jsp.accdb");
 		Statement s = con.createStatement();
 		String csn = request.getParameter("c1");
 		String ctg = request.getParameter("cat");
 		String o_name = (String) session.getAttribute("oname");
 		String line = "";

 		String fileName = "/jsp_pro/Ownerinfo.txt";
 		//InputStream ins = application.getResourceAsStream(fileName);
 		//BufferedReader br = new BufferedReader(new InputStreamReader(ins));
 		BufferedReader br = new BufferedReader(new FileReader(
 				application.getRealPath("/") + fileName));

 		while ((line = br.readLine()) != null) {
 			String col[] = line.split(",");
 			if (col[0].equals(o_name)) {
 				String sql = String
 						.format("insert into owner (oname,city,cuisine,hotel,category) values ('%s','%s','%s','%s','%s')",
 								o_name, col[2], csn, col[3], ctg);
 				s.executeUpdate(sql);
 				s.close();
 				con.close();
 			}
 		}
 		s.close();
 		con.close();
 	} catch (Exception e) {

 	}
 %>
		<h2>
			<font color=WHITE>CUISINE ADDED SUCCESSFULLY</font>
		</h2> <br> <a href="Ownerchk.jsp">Back</a> <marquee
			behavior="alternate">
			<h1>
				<font color="MediumAquaMarine">CUISINE LOCATOR</font>
			</h1>
		</marquee>

		<h3>
			<a href="index.jsp"><font color="BLUE">HOME PAGE</font></a>
		</h3>

	</font>
</body>
</html>


