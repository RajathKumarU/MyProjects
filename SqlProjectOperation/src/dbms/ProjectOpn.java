package dbms;

import java.awt.EventQueue;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.util.Hashtable;

import javax.swing.JButton;
import javax.swing.JComboBox;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JOptionPane;
import javax.swing.JPanel;
import javax.swing.JTextField;

public class ProjectOpn extends JFrame implements ActionListener {
	private static final long serialVersionUID = 1L;
	JTextField attr = null;
	JComboBox<String> reln = null;

	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					ProjectOpn frame = new ProjectOpn();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	public ProjectOpn() {
		super("Query Frame");
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 450, 300);
		JLabel l1 = new JLabel("π");
		attr = new JTextField(20);
		JLabel l2 = new JLabel("from");

		String currentDir = System.getProperty("user.dir");
		File f = new File(currentDir);
		String files[] = f.list();

		reln = new JComboBox<String>();
		for (int i = 0; i < files.length; i++) {
			if (files[i].endsWith(".txt")) {
				reln.addItem(files[i].substring(0, files[i].length() - 4));
			}
		}

		JButton execute = new JButton("Run");
		execute.addActionListener(this);

		JPanel p1 = new JPanel();

		p1.add(l1);
		p1.add(attr);
		p1.add(l2);
		p1.add(reln);
		p1.add(execute);

		setContentPane(p1);

	}

	@Override
	public void actionPerformed(ActionEvent e) {
		String att = attr.getText();
		String atts[] = att.split(",");
		String rel = (String) reln.getSelectedItem();
		String line = "";

		BufferedReader br1 = null;
		Hashtable<String, Integer> h = new Hashtable<String, Integer>();
		Hashtable<String, Integer> h2 = new Hashtable<String, Integer>();
		boolean f1 = false;

		if (att.equals("") || rel.equals("")) {
			JOptionPane.showMessageDialog(rootPane,
					"Please enter all the details.");
			attr.setText("");
		} else {
			try {
				br1 = new BufferedReader(new FileReader(rel + ".txt"));

				while ((line = br1.readLine()) != null) {
					String cols[] = line.split("~");
					for (int i = 0; i < cols.length; i++) {
						h.put(cols[i], new Integer(i));
					}
					break;
				}
				br1.close();

				if (att.equals("*")) {
					h2 = new Hashtable<String, Integer>(h);
				} else {
					for (int i = 0; i < atts.length; i++) {

						if (!h.containsKey(atts[i]))
							f1 = true;
						else {
							h2.put(atts[i], h.get(atts[i]));
						}
					}
				}
				if (f1) {
					JOptionPane.showMessageDialog(rootPane,
							"Entered Attribute(s) doesnt exist in " + rel);
					attr.setText("");
				} else {
					DisplayTable.main(h2, rel);
				}

			} catch (FileNotFoundException e3) {
				JOptionPane.showMessageDialog(rootPane,
						"Entered relation does not exist!!!\nTry again.");
				attr.setText("");
			} catch (Exception e2) {
				System.out.println(e2);
			}

		}
	}
}
