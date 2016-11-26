<%@ page contentType="text/html;charset=UTF-8" language="java"%>
<%@ page import="java.io.*,weka.classifiers.functions.*,weka.core.*"%>
<%@ page import="java.util.List"%>
<html>
<body>
	<%
		try {
			BufferedReader inputReader = null;
			inputReader = new BufferedReader(new FileReader(
					"motog3_rated_extended_sentiment.arff"));
			out.println(inputReader.readLine());

			SMO smo = new SMO();
			Instances data = new Instances(inputReader);
			data.setClassIndex(data.numAttributes() - 1);

			/*
			SMO smo = new SMO();
			smo.buildClassifier(data);
			Instance ins = null;
				ins = data.instance(20);
			out.println("Class attribute = "+smo.classifyInstance(ins));
			 */

			out.println("classifier built");

		} catch (Exception e) {
			out.println(e.toString());
		}
	%>

	Hello everyone
</body>
</html>