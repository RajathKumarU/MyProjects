<%@page import="java.util.*"%>
<%@page import="java.io.*"%>

<html>
<title>User pass change</title>
<body background="jsp_imgs/glass.jpg">
	<font color=WHITE>

		<h2>
			<font color=WHITE>USER PASSWORD CHANGE PLATFORM</font>
		</h2>

		<form action="Userpw.jsp" method="post">

			<tr>
				<td><font color=WHITE>Current Password</font></td>
				<td><input type=password name="u2"></td>
			</tr>
			<BR>
			<tr>
				<td><font color=WHITE>New--- password</font></td>
				<td><input type=password name="u3"></td>
			</tr>
			<BR>
			<tr>
				<td><font color=WHITE>Confirm password</font></td>
				<td><input type=password name="u4"></td>
			</tr>
			<BR> <input type="submit" value="Change">

			<%
				try {
					String upass = request.getParameter("u2");
					String npass = request.getParameter("u3");
					String cpass = request.getParameter("u4");
					String uname = (String) session.getAttribute("usname");

					String line;

					if (npass.equals(cpass)
							&& upass.equals((String) session.getAttribute("upass"))) {
						LinkedList l = new LinkedList();

						String fileName = "/jsp_pro/User.txt";
						//InputStream ins = application.getResourceAsStream(fileName);
						//BufferedReader br = new BufferedReader(new InputStreamReader(ins));
						BufferedReader br = new BufferedReader(new FileReader(
								application.getRealPath("/") + fileName));

						while ((line = br.readLine()) != null) {
							l.add(line);
						}
						br.close();
						for (int i = 0; i < l.size(); i++) {
							String data = (String) l.get(i);
							if (data.startsWith(uname)) {
								String col[] = data.split(",");
								String ndt = col[0] + "," + npass + "," + col[2]
										+ "," + col[3];
								l.set(i, ndt);
							}

						}
						PrintWriter p = new PrintWriter(new FileOutputStream(
								application.getRealPath("/") + fileName));
						for (int i = 0; i < l.size(); i++) {
							p.println((String) l.get(i));
						}
						p.close();
						session.setAttribute("upass", npass);
			%>

			<br> <a href="Userchk.jsp">Password changed go back</a>

			<%
				} else {
			%>
			<br>
			<h3>
				<font color=WHITE>Please Enter Correct Password!!!</font>
			</h3>
			<%
				}
				} catch (Exception y) {
				}
			%>

		</form> <marquee behavior="alternate">
			<h1>
				<font color="crimson">CUISINE LOCATOR</font>
			</h1>
		</marquee>

		<h3>
			<a href="index.jsp"><font color="BLUE">HOME PAGE</font></a>
		</h3>

	</font>
</body>
</html>

