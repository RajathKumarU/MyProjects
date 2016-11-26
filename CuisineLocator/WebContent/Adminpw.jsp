<%@page import="java.util.*"%>
<%@page import="java.io.*"%>

<html>
<title>Admin pass change</title>
<body background="jsp_imgs/glass.jpg">
	<font color=WHITE>

		<h3>ADMIN PASSWORD CHANGE PLATFORM</h3>

		<form action="Adminpw.jsp" method="post">
			<table>
				<tr>
					<td><font color=WHITE>Current Password</font></td>
					<td><input type=password name="a3"></td>
				</tr>
				<tr>
					<td><font color=WHITE>New password</font></td>
					<td><input type=password name="a4"></td>
				</tr>
				<tr>
					<td><font color=WHITE>Confirm password</font></td>
					<td><input type=password name="a5"></td>
				</tr>

			</table>
			<input type="submit" value="Change">

			<%
				try {
					String upass = request.getParameter("a3");
					String npass = request.getParameter("a4");
					String cpass = request.getParameter("a5");
					String admname = (String) session.getAttribute("adname");

					String line;

					if (npass.equals(cpass)
							&& upass.equals((String) session.getAttribute("apass"))) {
						LinkedList l = new LinkedList();
						String fileName = "/jsp_pro/Admin.txt";
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
							if (data.startsWith(admname)) {
								String col[] = data.split(",");
								String ndt = col[0] + "," + npass;
								l.set(i, ndt);
							}

						}

						PrintWriter p = new PrintWriter(new FileOutputStream(
								application.getRealPath("/") + fileName));
						for (int i = 0; i < l.size(); i++) {
							p.println((String) l.get(i));
						}
						p.close();
						session.setAttribute("apass", npass);
			%>

			<br> <a href="Adminchk.jsp">password changed go back</a>

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
				<font color="YELLOW">CUISINE LOCATOR</font>
			</h1>
		</marquee>

		<h3>
			<a href="index.jsp"><font color="BLUE">HOME PAGE</font></a>
		</h3>


	</font>
</body>
</html>