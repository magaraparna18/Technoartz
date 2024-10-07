<?php

require("class.phpmailer.php");

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "bhin-pp-wb4.webhostbox.net";

$mail->SMTPAuth = true;
//$mail->SMTPSecure = "ssl";
$mail->Port = 25;
$mail->Username = "admin@technoartz.com";
$mail->Password = "Shital@123#";

$mail->From = "admin@technoartz.com";
$mail->FromName = "Test from Info";
$mail->AddAddress("mailhostingserver@gmail.com");
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);

$mail->Subject = "Test message from server";
$mail->Body = "Test Mail<b>in bold!</b>";
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
echo "Message could not be sent. <p>";
echo "Mailer Error: " . $mail->ErrorInfo;
exit;
}

echo "Message has been sent";

?>