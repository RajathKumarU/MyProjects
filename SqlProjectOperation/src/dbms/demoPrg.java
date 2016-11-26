/*
 * java program to perform "project" operation for any given(existing) relation.
 */


package dbms;

import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;
import java.util.Hashtable;
import java.util.Scanner;

public class demoPrg {

	public static void main(String[] args) {
		try {
			// Scanner s = new Scanner(System.in);
			int ch = 0;

			abc: while (true) {
				Scanner s = new Scanner(System.in);

				System.out.println("1 : Display Relation(File)");
				System.out.println("2 : Execute Relational Query");
				System.out.println("3 : Exit");
				System.out.println("Enter choice");
				// s.nextLine();
				ch = Integer.parseInt(s.nextLine());

				switch (ch) {
				case 1:
					readFile();

					break;
				case 2:
					execute();

					break;

				default:
					break abc;
				}
				System.in.close();
				s.close();
			}

			// s.close();
		} catch (Exception e) {
			System.out.println(e);
		}

	}

	public static void readFile() {
		try {
			Scanner s = new Scanner(System.in);
			BufferedReader reader = null;
			int maxLen = 0;
			String line = "";
			boolean f = false;

			System.out.println("Enter relation name");
			String fName = s.nextLine().toLowerCase();

			if (fName.endsWith(".txt")) {
				reader = new BufferedReader(new FileReader("F:/dbms/entities/"
						+ fName));
			} else {
				reader = new BufferedReader(new FileReader("F:/dbms/entities/"
						+ fName + ".txt"));
			}

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

			s.close();
			reader.close();

		} catch (FileNotFoundException e) {
			System.out.println("Entered relation does not exists!!!");
			return;
		} catch (IOException e1) {
			System.out.println("IO exception has occurred!!!");
			return;
		} catch (Exception e2) {

		}
	}

	public static void execute() {
		try {
			Scanner s = new Scanner(System.in);
			BufferedReader reader = null;
			Hashtable<String, Integer> h = new Hashtable<String, Integer>();
			Hashtable<String, Integer> h2 = new Hashtable<String, Integer>();
			String line = "";
			boolean f = false, f1 = false;
			int maxLen = 0;

			System.out.println("Enter relational Query");
			String relQuery = s.nextLine().toLowerCase();
			String splitQuery[] = relQuery.split(" ");

			String relation = splitQuery[2];
			// relation = relation.substring(0, relation.length() - 1);
			String attr = splitQuery[1];
			// attr = attr.substring(0, attr.length() - 1);

			reader = new BufferedReader(new FileReader("F:/dbms/entities/"
					+ relation + ".txt"));

			while ((line = reader.readLine()) != null) {
				String cols[] = line.split("~");
				for (int i = 0; i < cols.length; i++) {
					h.put(cols[i], new Integer(i));
				}
				break;
			}
			reader.close();

			reader = new BufferedReader(new FileReader("F:/dbms/entities/"
					+ relation + ".txt"));

			String eachAttr[] = attr.split(",");

			for (int i = 0; i < eachAttr.length; i++) {

				if (!h.containsKey(eachAttr[i]))
					f1 = true;
				else {
					h2.put(eachAttr[i], h.get(eachAttr[i]));
				}
			}
			if (f1 == true) {
				System.out.println("Entered Attribute(s) doesnt exist in "
						+ relation);
				s.close();
				return;
			}

			while ((line = reader.readLine()) != null) {
				String columns[] = line.split("~");

				if (f == false) {
					maxLen = longestString(columns);
				}
				for (int i = 0; i < columns.length; i++) {
					if (h2.contains(i))
						System.out.printf("%" + maxLen + "s|", columns[i]);
				}

				if (f == false) {
					System.out.println();
					for (int j = 0; j < (maxLen * h2.size() + h2.size()); j++)
						System.out.print("-");
					f = true;
				}
				System.out.println();
			}

			s.close();
			reader.close();

		} catch (FileNotFoundException e) {
			System.out.println("Entered relation does not exists!!!");
			System.out.println(e);
			return;
		} catch (IOException e1) {
			System.out.println("IO exception has occurred!!!");
			return;
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
