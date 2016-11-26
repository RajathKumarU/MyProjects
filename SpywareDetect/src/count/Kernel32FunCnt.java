package count;

import java.io.BufferedReader;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.PrintWriter;

public class Kernel32FunCnt {
	public static void main(String[] args) {
		try {
			BufferedReader reader = new BufferedReader(new FileReader(
					"kernel32Func.txt"));
			PrintWriter writer = new PrintWriter(new FileWriter(
					"kernel32Func1.txt"));
			String line = "";
			while ((line = reader.readLine()) != null) {
				writer.println(line.split("\t")[0]);
			}

			reader.close();
			writer.close();
		} catch (Exception e) {
			e.printStackTrace();
		}

	}
}
