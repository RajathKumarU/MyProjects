package application;

import java.awt.BorderLayout;
import java.awt.Dimension;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JOptionPane;
import javax.swing.JScrollPane;
import javax.swing.JTabbedPane;
import javax.swing.JLabel;
import javax.swing.JTextArea;
import javax.swing.JTextField;
import javax.swing.JButton;
import javax.swing.ImageIcon;
import javax.swing.JTree;

import java.awt.Color;
import java.awt.Font;
import java.awt.event.ActionListener;
import java.awt.event.ActionEvent;
import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.net.MalformedURLException;
import java.net.URL;
import java.awt.SystemColor;

import javax.swing.UIManager;
import javax.swing.border.BevelBorder;
import javax.swing.tree.DefaultMutableTreeNode;
import javax.swing.tree.DefaultTreeModel;
import javax.swing.tree.MutableTreeNode;
import java.awt.FlowLayout;

@SuppressWarnings("serial")
public class StartBrowser extends JFrame {

	private JPanel contentPane;
	private JTextField txtField;
	private JTextArea textArea;
	public String StoreURL = "";
	public boolean stopFlag = false;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					StartBrowser frame = new StartBrowser();
					frame.setVisible(true);
					frame.setTitle("Customised Browser");
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public StartBrowser() {
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(0, 0, 1365, 730);
		contentPane = new JPanel();
		contentPane.setBackground(UIManager.getColor("scrollbar"));
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		contentPane.setLayout(new BorderLayout(0, 0));
		setContentPane(contentPane);

		JTabbedPane tabbedPane = new JTabbedPane(JTabbedPane.TOP);
		tabbedPane.setBackground(Color.WHITE);
		tabbedPane.setForeground(Color.BLACK);
		contentPane.add(tabbedPane, BorderLayout.CENTER);

		JPanel browser = new JPanel();
		browser.setBackground(Color.WHITE);
		tabbedPane.addTab("Browse", null, browser, null);
		browser.setLayout(new BorderLayout(0, 0));

		JPanel panel1 = new JPanel();
		panel1.setForeground(Color.BLACK);
		panel1.setBackground(SystemColor.inactiveCaption);
		browser.add(panel1, BorderLayout.NORTH);

		JPanel panel2 = new JPanel();
		panel2.setBackground(SystemColor.inactiveCaption);
		panel2.setForeground(new Color(0, 0, 0));
		browser.add(panel2, BorderLayout.CENTER);

		textArea = new JTextArea();
		textArea.setEditable(false);
		textArea.setFont(new Font("Monospaced", Font.PLAIN, 12));
		textArea.setTabSize(4);
		textArea.setRows(34);
		textArea.setColumns(175);
		textArea.setForeground(Color.BLACK);
		textArea.setBackground(Color.WHITE);
		JScrollPane jScrollPane = new JScrollPane(textArea);
		jScrollPane.setViewportBorder(new BevelBorder(BevelBorder.LOWERED,
				null, UIManager.getColor("scrollbar"), null, null));
		panel2.add(jScrollPane);

		JLabel lblUrl = new JLabel("URL");
		lblUrl.setFont(new Font("Tahoma", Font.BOLD, 18));
		panel1.add(lblUrl);

		txtField = new JTextField();
		txtField.setFont(new Font("Tahoma", Font.PLAIN, 20));
		panel1.add(txtField);
		txtField.setColumns(40);

		JButton btnGo = new JButton("");
		btnGo.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				if (txtField.getText().equals("")) {
					JOptionPane.showMessageDialog(rootPane,
							"URL cannot be empty.\nEnter URL again.");
				} else {
					textArea.setText("");
					StoreURL = txtField.getText();
					stopFlag = false;

					String pageSource = getPageSource(StoreURL);
					textArea.setText(pageSource);
				}
			}
		});
		btnGo.setMnemonic('g');
		btnGo.setForeground(Color.BLACK);
		btnGo.setBackground(Color.WHITE);
		btnGo.setToolTipText("click here to go");
		btnGo.setIcon(new ImageIcon(StartBrowser.class
				.getResource("/images/go.jpg")));
		btnGo.setPreferredSize(new Dimension(30, 30));
		panel1.add(btnGo);

		JButton btnRefresh = new JButton("");
		btnRefresh.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				if (StoreURL.equals("")) {
					JOptionPane.showMessageDialog(rootPane,
							"Go to a page and then Reload.");
				} else {
					textArea.setText("");
					stopFlag = false;

					String pageSource = getPageSource(StoreURL);
					txtField.setText(StoreURL);
					textArea.setText(pageSource);
				}
			}
		});
		btnRefresh.setMnemonic('r');
		btnRefresh.setBackground(Color.WHITE);
		btnRefresh.setForeground(Color.BLACK);
		btnRefresh.setIcon(new ImageIcon(StartBrowser.class
				.getResource("/images/reload.png")));
		btnRefresh.setToolTipText("reload this page");
		btnRefresh.setPreferredSize(new Dimension(30, 30));
		panel1.add(btnRefresh);

		JButton btnStop = new JButton("");
		btnStop.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				stopFlag = true;
			}
		});
		btnStop.setMnemonic('s');
		btnStop.setForeground(Color.BLACK);
		btnStop.setBackground(Color.WHITE);
		btnStop.setToolTipText("stop loading this page");
		btnStop.setIcon(new ImageIcon(StartBrowser.class
				.getResource("/images/stop.jpg")));
		btnStop.setPreferredSize(new Dimension(30, 30));
		panel1.add(btnStop);

		JButton btnFavourite = new JButton("");
		btnFavourite.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				int valReturned = 0;
				if (StoreURL != "") {
					valReturned = writeFavourites(StoreURL);

					if (valReturned == 0) {
						JOptionPane.showMessageDialog(rootPane,
								"Error while adding!!!\nPlease Try again.");
					} else if (valReturned == 1) {
						JOptionPane.showMessageDialog(rootPane,
								"URL already in Favourites list.");
					} else if (valReturned == 2) {
						JOptionPane.showMessageDialog(rootPane,
								"URL added as favourite.");
					}
				} else {
					JOptionPane.showMessageDialog(rootPane,
							"Visit a page and then add as favourite");
				}

			}
		});
		btnFavourite.setIcon(new ImageIcon(StartBrowser.class
				.getResource("/images/bookmark.png")));
		btnFavourite.setToolTipText("add this page to favorites");
		btnFavourite.setMnemonic('f');
		btnFavourite.setForeground(Color.BLACK);
		btnFavourite.setBackground(Color.WHITE);
		btnFavourite.setPreferredSize(new Dimension(30, 30));
		panel1.add(btnFavourite);

		JButton btnViewFavourites = new JButton("");
		btnViewFavourites.addActionListener(new ActionListener() {
			public void actionPerformed(ActionEvent e) {
				showFavourites.main(null);
			}
		});
		btnViewFavourites.setMnemonic('v');
		btnViewFavourites.setIcon(new ImageIcon(StartBrowser.class
				.getResource("/images/view_all.png")));
		btnViewFavourites.setForeground(Color.BLACK);
		btnViewFavourites.setBackground(Color.WHITE);
		btnViewFavourites.setToolTipText("view all favorites");
		btnViewFavourites.setPreferredSize(new Dimension(30, 30));
		panel1.add(btnViewFavourites);

		JPanel history = new JPanel();
		history.setForeground(Color.BLACK);
		history.setBackground(SystemColor.inactiveCaption);
		tabbedPane.addTab("History", null, history, null);

		MutableTreeNode root = new DefaultMutableTreeNode("History");
		MutableTreeNode older = new DefaultMutableTreeNode(
				"Visited before a Week");
		MutableTreeNode lastWeek = new DefaultMutableTreeNode(
				"Visited Last Week");
		MutableTreeNode yesterday = new DefaultMutableTreeNode(
				"Visited Yesterday");
		MutableTreeNode today = new DefaultMutableTreeNode("Visited Today");
		root.insert(older, 0);
		root.insert(lastWeek, 1);
		root.insert(yesterday, 2);
		root.insert(today, 3);
		final DefaultTreeModel model = new DefaultTreeModel(root);
		final JTree tree = new JTree(model);
		tree.setShowsRootHandles(true);
		tree.setForeground(Color.BLACK);
		tree.setFont(new Font("Tahoma", Font.PLAIN, 12));
		JPanel p1 = new JPanel();
		p1.setLayout(new FlowLayout(FlowLayout.LEFT, 5, 5));
		p1.add(tree);
		history.setLayout(new FlowLayout(FlowLayout.LEFT, 5, 5));
		history.add(p1);

		JPanel parent_lock = new JPanel();
		parent_lock.setBackground(SystemColor.inactiveCaption);
		parent_lock.setForeground(Color.BLACK);
		tabbedPane.addTab("Parental Lock", null, parent_lock, null);
	}

	public String getPageSource(String enteredURL) {// method to get particular
													// page source using URL
													// class
		try {
			URL url = new URL(enteredURL);
			InputStream is = url.openConnection().getInputStream();
			BufferedReader reader = new BufferedReader(
					new InputStreamReader(is));
			String line = "", pageSource = "";

			while ((line = reader.readLine()) != null) {
				if (stopFlag) {
					return pageSource;
				}
				pageSource += line;
				pageSource += "\n";
			}
			return pageSource;

		} catch (MalformedURLException e) {
			return "MalformedURLException has occured(enter url correctly with protocol)";
		} catch (IOException e1) {
			return "IO Exception has occured(page not found)";
		} catch (Exception e2) {
			return "Some Exception has occured";
		}
	}

	public int writeFavourites(String url) {// method to write favorites to
											// a file and return required
											// status
		try {
			boolean flag = false;
			String line = "";
			BufferedReader reader = new BufferedReader(new FileReader(
					"bin\\otherFiles\\Favourites.txt"));

			while ((line = reader.readLine()) != null) {
				if (line.equals(url)) {
					flag = true;
				}
			}
			reader.close();

			if (flag) {
				return 1;
			} else {
				PrintWriter writer = new PrintWriter(new FileWriter(
						"bin\\otherFiles\\Favourites.txt", true));
				writer.println(url);
				writer.close();
				return 2;
			}
		} catch (FileNotFoundException e) {
			return 0;
		} catch (IOException e1) {
			return 0;
		}
	}
}
