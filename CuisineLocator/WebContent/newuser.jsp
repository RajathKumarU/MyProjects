<%@page import="java.io.*"%>

<html>
<title>New User</title>
<body background="jsp_imgs/glass.jpg">
	<font color=WHITE>

		<form action="newuser.jsp" method="post">

			<table>
				<tr>
					<td><font color=WHITE>Name</font></td>
					<td><input type=textbox name="u1"></td>
				</tr>
				<tr>
					<td><font color=WHITE>Password</font></td>
					<td><input type=password name="u2"></td>
				</tr>
				<tr>
					<td><font color=WHITE>Confirm password</font></td>
					<td><input type=password name="u3"></td>
				</tr>
				<tr>
					<td><font color=WHITE>City</font></td>
					<td><input type=textbox name="u4"></td>
				</tr>
				<tr>
					<td><font color=WHITE>Email address</font></td>
					<td><input type=textbox name="u5"></td>
				</tr>
			</table>

			<input type="submit" value="Go">


			<%
				try {
					String name = request.getParameter("u1");
					String pass = request.getParameter("u2");
					String cpass = request.getParameter("u3");
					String cty = request.getParameter("u4");
					String email = request.getParameter("u5");
					if (name == null || pass == null || cpass == null
							|| cty == null || email == null) {
						out.println("<h2><BR><font color=red>Please enter all the above details...</font></h2>");
					} else {
						int e = email.indexOf("@");
						int f = email.indexOf(".");
						if (e == -1 || f == -1) {
							out.println("<h2><BR><font color=red>Please enter all the above details AND enter your correct email address</font></h2>");
						}

						else {
							String line;
							String fileName = "/jsp_pro/User.txt";
							//InputStream ins = application.getResourceAsStream(fileName);
							//BufferedReader br = new BufferedReader(new InputStreamReader(ins));
							BufferedReader br = new BufferedReader(new FileReader(
									application.getRealPath("/") + fileName));

							if (pass.equals(cpass)) {
								boolean t = true;

								out.println("<BR>");
								while ((line = br.readLine()) != null) {
									String cols[] = line.split(",");
									if (name.equals(cols[0])) {
										t = false;
										out.println("<h2><BR><font color=red>Username alredy exists!!! Please try another name</font></h2>");
									}
								}
								br.close();
								if (t) {
									out.println("<h2><BR><font color=yellow>Hello "
											+ name
											+ " Congrats u can Login anytime from the home page</font><BR></h2>");

									/*ServletContext context = this
											.getServletContext();
									String path = context.getRealPath(fileName);
									out.println("<h2><BR><font color=white>" + path
											+ "</font></h2>");
									File file = new File("User.txt");
									out.println("<h2><BR><font color=yellow>"
											+ file.getCanonicalPath() + "<BR>"
											+ file.getPath() + "</font></h2>");
									out.println("<h2><BR><font color=white>"
											+ application.getRealPath("/")
											+ "</font></h2>");*/
									PrintWriter p = new PrintWriter(
											new FileOutputStream(
													application.getRealPath("/")
															+ fileName, true));
									p.println(name + "," + pass + "," + cty + ","
											+ email);
									p.close();
								}
							} else {
								response.sendRedirect("newuser.jsp");
							}
						}
					}
				} catch (Exception e) {

				}
			%>
		</form>

		<hr> <marquee behavior="alternate">
			<h1>
				<font color="blue">CUISINE LOCATOR</font>
			</h1>
		</marquee>
		<h3>
			<a href="index.jsp"><font color="BLUE">HOME PAGE</font></a>
		</h3>

	</font>
</body>
</html>