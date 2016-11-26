/*
 * code to implement project operation in Hotel Management Database.
 */

package dbms;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.PrintWriter;
import java.util.Scanner;

public class Query {
	public static void main(String[] args) {
		Scanner s = new Scanner(System.in);
		String sqlQuery = "";

		System.out.println("Enter Query");
		while (true) { // to get query in different lines.

			String line = s.nextLine().toLowerCase();
			sqlQuery += line + " "; // line+" " to split the query correctly.
			if (line.endsWith(";"))
				break;

		}

		String splitQuery[] = sqlQuery.split(" ");

		for (int i = 0; i < splitQuery.length; i++) {
			System.out.println(splitQuery[i]);
		}

		if (splitQuery[0].equals("select") && splitQuery[2].equals("from")) {
			try {
				if (splitQuery[1].equals("*")) {
					String tables[] = splitQuery[3].split(",");
					String fileName = "", line = "";
					boolean f = false;
					int maxLen = 0;

					if (tables[tables.length - 1].endsWith(";")) {
						tables[tables.length - 1] = tables[tables.length - 1]
								.substring(0,
										tables[tables.length - 1].length() - 1);
					}

					for (int i = 0; i < tables.length; i++) {
						fileName += tables[i];
					}

					writeFile(tables);

					BufferedReader reader = new BufferedReader(new FileReader(
							"F:/dbms/products/" + fileName + ".txt"));

					while ((line = reader.readLine()) != null) {
						String columns[] = line.split("~");

						if (f == false) {
							maxLen = longestString(columns);
						}
						for (int i = 0; i < columns.length; i++) {
							System.out.printf("%" + maxLen + "s|", columns[i]);
						}
						if (f == false) {
							System.out.println();
							for (int j = 0; j < (maxLen * columns.length + columns.length); j++)
								System.out.print("-");
							f = true;
						}
						System.out.println();
					}

					reader.close();
				} else {

				}
			} catch (Exception e) {
				System.out.println(e);
			}

		} else {
			System.out.println("Invalid Query");
		}

		s.close();
	}

	// function to form cartesian product
	public static void writeFile(String eachFile[]) {
		try {
			if (eachFile.length == 1) {
				BufferedReader r1 = new BufferedReader(new FileReader(
						"F:/dbms/entities/" + eachFile[0] + ".txt"));
				PrintWriter p = new PrintWriter(new FileWriter(
						"F:/dbms/products/" + eachFile[0] + ".txt"));
				String nextLine = "";

				while ((nextLine = r1.readLine()) != null) {
					p.println(nextLine);
				}
				r1.close();
				p.close();

			} else if (eachFile.length == 2) {
				BufferedReader r1 = new BufferedReader(new FileReader(
						"F:/dbms/entities/" + eachFile[0] + ".txt"));
				BufferedReader r2 = null;
				PrintWriter p = new PrintWriter(new FileWriter(
						"F:/dbms/products/" + eachFile[0] + eachFile[1]
								+ ".txt"));
				String nextLine1 = "", nextLine2 = "";
				int i = 0, j = 0;

				while ((nextLine1 = r1.readLine()) != null) {

					r2 = new BufferedReader(new FileReader("F:/dbms/entities/"
							+ eachFile[1] + ".txt"));
					j = 0;
					while ((nextLine2 = r2.readLine()) != null) {
						if (i == 0 && j == 0) {
							p.println(nextLine1 + "~" + nextLine2);
							j++;
							continue;
						} else if (i == 0 && j != 0) {
							continue;
						} else if (j == 0) {
							j++;
							continue;
						} else {
							p.println(nextLine1 + "~" + nextLine2);
						}
					}
					i++;
				}

				r1.close();
				r2.close();
				p.close();
			} else if (eachFile.length == 3) {
				BufferedReader r1 = new BufferedReader(new FileReader(
						"F:/dbms/entities/" + eachFile[0] + ".txt"));
				BufferedReader r2 = null;
				BufferedReader r3 = null;
				PrintWriter p = new PrintWriter(new FileWriter(
						"F:/dbms/products/" + eachFile[0] + eachFile[1]
								+ eachFile[2] + ".txt"));
				String nextLine1 = "", nextLine2 = "", nextLine3 = "";
				int i = 0, j = 0, k = 0;

				while ((nextLine1 = r1.readLine()) != null) {

					r2 = new BufferedReader(new FileReader("F:/dbms/entities/"
							+ eachFile[1] + ".txt"));
					j = 0;
					while ((nextLine2 = r2.readLine()) != null) {
						r3 = new BufferedReader(new FileReader(
								"F:/dbms/entities/" + eachFile[2] + ".txt"));
						k = 0;
						while ((nextLine3 = r3.readLine()) != null) {
							if (i == 0 && j == 0 && k == 0) {
								p.println(nextLine1 + "~" + nextLine2 + "~"
										+ nextLine3);
								k++;
								continue;
							} else if (i == 0 && j != 0) {
								continue;
							} else if (i != 0 && j == 0) {
								continue;
							} else if (i != 0 && j != 0 && k == 0) {
								k++;
								continue;
							} else if (i == 0 && j == 0 && k != 0) {
								continue;
							} else {
								p.println(nextLine1 + "~" + nextLine2 + "~"
										+ nextLine3);
							}
						}
						j++;
					}
					i++;
				}
				r1.close();
				r2.close();
				r3.close();
				p.close();
			}
		} catch (Exception e1) {
			System.out.println(e1);
		}
	}

	public static int longestString(String arr[]) {

		int len = 0;
		for (int i = 0; i < arr.length; i++) {
			if (len < arr[i].length())
				len = arr[i].length();
		}
		return len;
	}
}
