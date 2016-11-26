<%@page import="java.io.*"%>

<html>
<title>Owner login</title>
<body background="jsp_imgs/glass.jpg">
	<font color=WHITE>

		<h1>Hotel Manager Login</h1>
		<hr>

		<form action="Owner.jsp" method="post">
			<table bgcolor=103070>
				<tr>
					<td><font color=WHITE>Owner Name</font></td>
					<td><input type=textbox name="t1"></td>
				</tr>
				<tr>
					<td><font color=WHITE>Password</font></td>
					<td><input type=password name="t2"></td>
				</tr>
				<tr>
					<td><input type=submit value="Login"></td>
				</tr>
			</table>

			<%
				try {
					String uname = request.getParameter("t1");
					String pass = request.getParameter("t2");
					session.setAttribute("oname", uname);
					session.setAttribute("opass", pass);
					boolean flag = false;
					String line;

					String fileName = "/jsp_pro/Ownerinfo.txt";
					//InputStream ins = application.getResourceAsStream(fileName);
					//BufferedReader br = new BufferedReader(new InputStreamReader(ins));
					BufferedReader br = new BufferedReader(new FileReader(
							application.getRealPath("/") + fileName));

					while ((line = br.readLine()) != null) {
						String cols[] = line.split(",");
						if (cols[0].equals(uname)) {
							if (cols[1].equals(pass)) {
								response.sendRedirect("Ownerchk.jsp");
								flag = true;
							}

						}
					}
					if (flag == false && !(uname.equals(pass.equals(null)))) {
						out.println("<h2><BR><font color=red>Invalid name or password!!!</font></h2>");
					}

				} catch (Exception e) {
				}
			%>
		</form> <marquee behavior="alternate">
			<h1>
				<font color="FUCHSIA">CUISINE LOCATOR</font>
			</h1>
		</marquee>

		<h3>
			<a href="index.jsp"><font color="BLUE">HOME PAGE</font></a>
		</h3>

	</font>
</body>
</html>