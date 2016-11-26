<?php

//used to test if mail works

date_default_timezone_set('asia/Kolkata');

// require_once('../PHPMailer/class.phpmailer.php');
require '../PHPMailer/PHPMailerAutoload.php';
// require '../PHPMailer/class.smtp.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 3; // Enable verbose debug output

//$mail->isSMTP (); // Set mailer to use SMTP
// $//mail->Host = 'smtp-relay.gmail.com;smtp.gmail.com;relay-hosting.secureserver.net;p3plcpnl0489.prod.phx3.secureserver.net'; // Specify main and backup SMTP servers
$mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'info@edusculpt.com'; // SMTP username
$mail->Password = 'Ramana123'; // SMTP password
$mail->SMTPSecure = 'TLS'; // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587; // TCP port to connect to 587/465

$mail->setFrom ( 'info@edusculpt.com' );
$mail->addAddress ( 'rok.rajath123@gmail.com' ); // Add a recipient
$mail->addReplyTo ( 'info@edusculpt.com' );
$mail->WordWrap = 50; 
// $//mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
// $//mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name
$mail->isHTML ( false ); // Set email format to HTML

$mail->Subject = 'Test subject';
$mail->Body = 'This is the message body :<br> Hello Rajath';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if (! $mail->send ()) {
	echo 'Message could not be sent.';
	echo 'Mailer Error: ' . $mail->ErrorInfo . '<br>';
} else {
	echo 'Message has been sent';
}
?>