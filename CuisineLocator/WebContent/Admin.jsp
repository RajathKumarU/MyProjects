<%@page import="javax.swing.JOptionPane"%>
<%@page import="java.io.*"%>

<html>
<title>Admin login</title>
<body background="jsp_imgs/glass.jpg">
	<font color=WHITE>

		<h1>Admin Login</h1>
		<hr>

		<form action="Admin.jsp" method="post">

			<table bgcolor=103070>
				<tr>
					<td><font color=WHITE>Name</font></td>
					<td><input type="textbox" name="a1"></td>
				</tr>
				<tr>
					<td><font color=WHITE>Password</font></td>
					<td><input type="password" name="a2"></td>
				</tr>
				<tr>
					<td><input type=submit value="Login"></td>
				</tr>
			</table>
			<%
				try {
					String aname = request.getParameter("a1");
					String apass = request.getParameter("a2");
					session.setAttribute("adname", aname);
					session.setAttribute("apass", apass);
					String line;
					boolean flag = false;

					String fileName = "/jsp_pro/Admin.txt";
					//InputStream ins = application.getResourceAsStream(fileName);
					//BufferedReader br = new BufferedReader(new InputStreamReader(ins));
					BufferedReader br = new BufferedReader(new FileReader(
							application.getRealPath("/") + fileName));

					while ((line = br.readLine()) != null) {
						String col[] = line.split(",");
						if (col[0].equals(aname)) {
							if (col[1].equals(apass)) {
								response.sendRedirect("Adminchk.jsp");
								flag = true;
							}

						}
					}
					if (flag == false && !(aname.equals(apass.equals(null)))) {
						out.println("<h2><BR><font color=red>Invalid name or password!!!</font></h2>");
					}
					br.close();
				} catch (Exception e) {
				}
			%>
		</form> <marquee behavior="alternate">
			<h1>
				<font color="GOLD">CUISINE LOCATOR</font>
			</h1>
		</marquee>

		<h3>
			<a href="index.jsp"><font color="BLUE">HOME PAGE</font></a>
		</h3>

	</font>
</body>
</html>