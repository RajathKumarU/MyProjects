package count;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.util.Enumeration;
import java.util.Hashtable;

public class FreqCount {
	public static void main(String[] args) {

		FileInputStream f = null;
		File inp = null;

		try {
			inp = new File("InFiles/TrojanAnnoy.txt");
			f = new FileInputStream(inp);
		} catch (FileNotFoundException e) {
			e.printStackTrace();
		}

		try {
			byte[] b = new byte[(int) inp.length()];
			f.read(b);
			Hashtable<String, Integer> ht = new Hashtable<String, Integer>();

			int i, j, k;

			for (k = 0, i = 0, j = 4; k < (int) inp.length() - 5; k++, i++, j++) {
				String key = "";
				for (int m = i; m < j; m++) {
					key += m;
				}
				if (ht.containsKey(key)) {
					System.out.println("aaaaaaaaaaaaaaaaaaaaaaaaaaa");
					int val = ht.get(key);
					ht.put(key, val + 1);
				} else {
					ht.put(key, 1);
				}
			}

			Enumeration<String> e = ht.keys();

			while (e.hasMoreElements()) {
				String key = (String) e.nextElement();
				System.out.println(key + "|" + ht.get(key));
			}

		} catch (Exception e1) {
			e1.printStackTrace();
		}
	}
}
