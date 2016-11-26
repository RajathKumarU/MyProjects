<%@page import="java.io.*"%>
<%@page import="java.sql.*"%>

<html>
<title>New Owner</title>
<body background="jsp_imgs/glass.jpg">
	<font color=WHITE>

		<form action="newowner.jsp" method="post">

			<table>
				<tr>
					<td><font color=WHITE>Name</font></td>
					<td><input type=textbox name="t3"></td>
				</tr>
				<tr>
					<td><font color=WHITE>Phone number</font></td>
					<td><input type=textbox name="t8"></td>
				</tr>
				<tr>
					<td><font color=WHITE>Password</font></td>
					<td><input type=password name="t4"></td>
				</tr>
				<tr>
					<td><font color=WHITE>Confirm password</font></td>
					<td><input type=password name="t5"></td>
				</tr>
				<tr>
					<td><font color=WHITE>City</font></td>
					<td><input type=textbox name="t6"></td>
				</tr>
				<tr>
					<td><font color=WHITE>Restaurent/Hotel name</font></td>
					<td><input type=textbox name="t7"></td>
				</tr>
				<tr>
					<td><font color=WHITE>Restaurent/Hotel Address</font></td>
					<td><input type=textbox name="area1"></td>
				</tr>
			</table>

			<input type="submit" value="Go">

			<%
				try {
					String name = request.getParameter("t3");
					String phn = request.getParameter("t8");
					String pass = request.getParameter("t4");
					String cpass = request.getParameter("t5");
					String cty = request.getParameter("t6");
					String htl = request.getParameter("t7");
					String addrs = request.getParameter("area1");

					Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
					Connection con = DriverManager
							.getConnection("jdbc:odbc:Driver={Microsoft Access Driver (*.mdb, *.accdb)};DBQ="
									+ application.getRealPath("/") + "/jsp.accdb");
					Statement s = con.createStatement();
					String line;
					char a[] = new char[10];
					boolean t = true, flag = false;
					String fileName = "/jsp_pro/Ownerinfo.txt";
					//InputStream ins = application.getResourceAsStream(fileName);
					//BufferedReader br = new BufferedReader(new InputStreamReader(ins));
					BufferedReader br = new BufferedReader(new FileReader(
							application.getRealPath("/") + fileName));

					if (name.equals(null) || phn.equals(null) || pass.equals(null)
							|| cpass.equals(null) || cty.equals(null)
							|| htl.equals(null) || addrs.equals(null)) {
						t = false;
					}
					if ((name != null) && (phn != null) && (pass != null)
							&& (cpass != null) && (cty != null) && (htl != null)
							&& (addrs != null)) {
						flag = true;
					}
					for (int i = 0; i < phn.length(); i++) {
						a[i] = phn.charAt(i);
						int b = a[i];
						if (b < 58 && b > 47) {

						} else {
							t = false;
						}

					}

					if ((phn.length() != 10) || t == false) {
						out.println("<h2><BR><font color=red>please enter all the above details AND your correct phone number..</font></h2>");
					}
					if (pass.equals(cpass)) {
						out.println("<BR>");
						while ((line = br.readLine()) != null) {
							String cols[] = line.split(",");
							if (name.equals(cols[0])) {
								t = false;
								out.println("<h2><BR><font color=red>Username alredy exists!!,please try another name</font></h2>");
							}
						}
						br.close();
					}

					if (t == true && flag == true) {
						out.println("<h2><BR><font color=yellow>Hello "
								+ name
								+ " Congrats u can Login anytime from the home page</font></h2>");
						PrintWriter p = new PrintWriter(new FileOutputStream(
								application.getRealPath("/") + fileName, true));
						p.println(name + "," + pass + "," + cty + "," + htl + ","
								+ phn);
						String sql = String.format(
								"insert into add (name,address) values('%s','%s')",
								name, addrs);
						s.executeUpdate(sql);
						p.close();

					}
					s.close();
					con.close();

				} catch (Exception e) {

				}
			%>

		</form>
		<hr> 
		<marquee behavior="alternate">
			<h1>
				<font color="GRAY">CUISINE LOCATOR</font>
			</h1>
		</marquee>

		<h3>
			<a href="index.jsp"><font color="BLUE">HOME PAGE</font></a>
		</h3>

	</font>
</body>
</html>