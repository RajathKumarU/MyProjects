package application;

import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.JScrollPane;
import javax.swing.border.EmptyBorder;
import javax.swing.JTextArea;

import java.awt.Color;

import javax.swing.JLabel;

import java.awt.Font;
import java.awt.SystemColor;
import java.io.BufferedReader;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.IOException;

@SuppressWarnings("serial")
public class showFavourites extends JFrame {

	private JPanel contentPane;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					showFavourites frame = new showFavourites();
					frame.setVisible(true);
					frame.setTitle("Showing All Favorites");
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public showFavourites() {
		setDefaultCloseOperation(JFrame.DISPOSE_ON_CLOSE);
		setBounds(100, 100, 900, 550);
		contentPane = new JPanel();
		contentPane.setBackground(Color.GRAY);
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		contentPane.setLayout(new BorderLayout(0, 0));
		setContentPane(contentPane);

		JTextArea textArea = new JTextArea();
		textArea.setEditable(false);
		textArea.setTabSize(4);
		textArea.setForeground(Color.BLACK);
		textArea.setBackground(Color.WHITE);
		textArea.setRows(10);
		textArea.setColumns(20);
		if (readFavourites().equals("")) {
			textArea.setText("No Favorites Added till now...");
		} else {
			textArea.setText(readFavourites());
		}
		JScrollPane pane = new JScrollPane(textArea);
		contentPane.add(pane, BorderLayout.CENTER);

		JLabel lblFavouritesList = new JLabel("Favorites list");
		lblFavouritesList.setBackground(SystemColor.activeCaption);
		lblFavouritesList.setFont(new Font("Tahoma", Font.BOLD, 16));
		pane.setColumnHeaderView(lblFavouritesList);
	}

	public String readFavourites() {// method to read all favorites
		try {
			BufferedReader reader = new BufferedReader(new FileReader(
					"bin\\otherFiles\\Favourites.txt"));
			String line = "", list = "";

			while ((line = reader.readLine()) != null) {
				list += line;
				list += "\n";
			}
			reader.close();
			return list;

		} catch (FileNotFoundException e) {
			return "FileNotFoundException has occured.";
		} catch (IOException e1) {
			return "IOException has occured.";
		} catch (Exception e2) {
			return "Some Exception has occured.";
		}
	}
}
