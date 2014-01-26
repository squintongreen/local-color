<?php
if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
	$name = stripslashes(strip_tags($_POST['name']));
} else {$name = 'No name entered';}
if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
	$email = stripslashes(strip_tags($_POST['email']));
} else {$email = 'No email entered';}
if ((isset($_POST['message'])) && (strlen(trim($_POST['message'])) > 0)) {
	$message = stripslashes(strip_tags($_POST['message']));
} else {$message = 'No message entered';}
ob_start();
?>
<html>
<head>
<style type="text/css">
</style>
</head>
<body>
<table width="550" border="1" cellspacing="2" cellpadding="2">
  <tr bgcolor="#eeffee">
    <td>Name</td>
    <td><?=$name;?></td>
  </tr>
  <tr bgcolor="#eeeeff">
    <td>Email</td>
    <td><?=$email;?></td>
  </tr>
  <tr bgcolor="#eeffee">
    <td>Message</td>
    <td><?=$message;?></td>
  </tr>
</table>
<?php

require_once('class.phpmailer.php');

$mail             = new PHPMailer(); // defaults to using php "mail()"

$body             = ob_get_contents();
$body             = eregi_replace("[\]",'',$body);

$mail->SetFrom("no-reply@localcolorcreations.com", 'Local Color Contact');

$address = "info@localcolorcreations.com";
$mail->AddAddress('jcrowther1@gmail.com', "Admin");

$mail->Subject    = "Form Submission";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);

if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  echo "Message sent!";
}

?>
</body>
</html>
