package count;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;

public class HexDump {
	public static void main(String[] args) {

		FileInputStream inputStream = null;
		PrintWriter pw = null;
		PrintWriter pw2 = null;
		try {
			inputStream = new FileInputStream(new File(
					"InFiles/TrojanAnnoy.txt"));
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		}

		try {
			pw = new PrintWriter(new FileWriter("OutFiles/TrojanHexOut.txt"));
			pw2 = new PrintWriter(new FileWriter("OutFiles/TrojanCharOut.txt"));
			int i, count = 0, j = 0;

			do {
				i = inputStream.read();
				if (i != -1) {
					// System.out.printf("%02X - ", i);
					System.out.print((char) i + " ");
					pw.printf("%02X ", i);
					pw2.print((char) i + "");
				}
				count++;
				j++;

				if (count == 16) {
					System.out.println();
					pw.println();
					// pw2.println();
					count = 0;
				}
			} while (i != -1);
			pw.close();
			pw2.close();
		} catch (Exception e1) {
			e1.printStackTrace();

		}
		try {
			inputStream.close();
		} catch (IOException e2) {
			e2.printStackTrace();
		}
	}
}
