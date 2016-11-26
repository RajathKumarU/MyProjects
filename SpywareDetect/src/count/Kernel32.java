package count;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;

public class Kernel32 {
	public static void main(String[] args) {
		File file = null;
		BufferedReader reader = null;
		PrintWriter p = null;

		String line = null;
		int count = 0;

		try {
			file = new File("src/benign/sqlite.txt");
			reader = new BufferedReader(new FileReader(file));
			p = new PrintWriter(new FileWriter(
					"C:/Users/Rajath/Desktop/test2.txt", true));

			while ((line = reader.readLine()) != null) {
				line = line.toLowerCase();
				if (line.contains("kernel32.dll"))
					count++;
			}

			p.println(file.getName() + "\t\t\t" + count + "times");

			reader.close();
			p.close();
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		} catch (IOException e1) {
			e1.printStackTrace();
		}
	}
}
