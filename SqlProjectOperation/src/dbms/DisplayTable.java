package dbms;

import java.awt.BorderLayout;
import java.io.BufferedReader;
import java.io.FileReader;
import java.util.Hashtable;

import javax.swing.JFrame;
import javax.swing.JScrollPane;
import javax.swing.JTable;

public class DisplayTable {

	public static void main(final Hashtable<String, Integer> Htable,
			final String relName) {

		BufferedReader read = null;
		Object col_names[] = null;
		Object data[][] = null;
		String line = "";
		boolean f = false;
		int j = 0, count = 0, k = 0;
		try {
			JFrame frame = new JFrame();
			frame.setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
			frame.setTitle(relName.toUpperCase() + " relation");

			read = new BufferedReader(new FileReader(relName + ".txt"));
			col_names = new String[Htable.size()];

			while ((line = read.readLine()) != null) {
				String columns[] = line.split("~");
				if (!f) {
					f = true;
					for (int i = 0; i < columns.length; i++) {
						if (Htable.contains(i)) {
							col_names[j] = new String(columns[i]).toUpperCase();
							j++;
						}
					}
				} else {
					count++;
				}
			}
			read.close();

			f = false;
			j = 0;
			data = new String[count][Htable.size()];
			read = new BufferedReader(new FileReader(relName + ".txt"));
			while ((line = read.readLine()) != null) {
				String columns[] = line.split("~");
				if (!f) {
					f = true;
					continue;
				} else {
					k = 0;
					for (int i = 0; i < columns.length; i++) {
						if (Htable.contains(i)) {
							data[j][k] = new String(columns[i]);
							k++;
						}
					}
					j++;
				}
			}
			read.close();

			JTable table = new JTable(data, col_names);

			JScrollPane scrollPane = new JScrollPane(table);
			frame.add(scrollPane, BorderLayout.CENTER);
			frame.setSize(300, 150);
			frame.setVisible(true);
		} catch (Exception e) {
			e.printStackTrace();
		}

	}
}
