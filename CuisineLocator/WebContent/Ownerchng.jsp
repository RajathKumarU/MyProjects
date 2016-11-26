<%@page import="java.util.*"%>
<%@page import="java.io.*"%>

<html>
<title>Owner pass change</title>
<body background="jsp_imgs/glass.jpg">
	<font color=WHITE>

		<h2>
			<font color=WHITE>Password change wizard</font>
		</h2>

		<form action="Ownerchng.jsp" method="post">
			<table>
				<tr>
					<td><font color=WHITE>OLD password</font></td>
					<td><input type="password" name="b1"></td>
				</tr>
				<tr>
					<td><font color=WHITE>NEW password</font></td>
					<td><input type="password" name="b2"></td>
				</tr>
				<tr>
					<td><font color=WHITE>CONFIRM password</font></td>
					<td><input type="password" name="b3"></td>
				</tr>
			</table>
			<input type="submit" value="Change">

			<%
				try {
					String opass = request.getParameter("b1");
					String npass = request.getParameter("b2");
					String cpass = request.getParameter("b3");
					String oname = (String) session.getAttribute("oname");

					//out.println(session.getAttribute( "oname" ));

					String line;
					//out.println(oname);

					if (npass.equals(cpass)
							&& opass.equals((String) session.getAttribute("opass"))) {
						LinkedList l = new LinkedList();

						String fileName = "/jsp_pro/Ownerinfo.txt";
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
							if (data.startsWith(oname)) {
								String col[] = data.split(",");
								String ndt = col[0] + "," + npass + "," + col[2]
										+ "," + col[3] + "," + col[4];
								l.set(i, ndt);
							}

						}
						PrintWriter p = new PrintWriter(new FileOutputStream(
								application.getRealPath("/") + fileName));
						for (int i = 0; i < l.size(); i++) {
							p.println((String) l.get(i));
						}
						p.close();
						session.setAttribute("opass", npass);
			%>

			<br> <a href="Ownerchk.jsp">Password changed go back</a>

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
				<font color="LightSeaGreen">CUISINE LOCATOR</font>
			</h1>
		</marquee>
		<h3>
			<a href="index.jsp"><font color="blue">HOME PAGE</font></a>
		</h3>

	</font>
</body>
</html>