<?PHP
require("mail/class.phpmailer.php");
// robot detection
$honeypot = trim($_POST["email"]);     

if(!empty($honeypot)) {
  echo "BAD ROBOT!"; 
  exit;
}

$name = trim($_POST['name']);
$email = trim($_POST['email_real']);
$subject = trim($_POST['subject']);

$msg = "Name:". $name . "<br>" . "Email:" . $email . "<br>". 
"Subject:" . $subject."<br>".
 "Message:" . $_POST['message'] ;
 

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "bhin-pp-wb4.webhostbox.net";

$mail->SMTPAuth = true;
//$mail->SMTPSecure = "ssl";
$mail->Port = 25;
$mail->Username = "admin@technoartz.com";
$mail->Password = "Shital@123#";

$mail->From = "admin@technoartz.com";
$mail->FromName = "Admin";
$mail->AddAddress("info@technoartz.com");
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);

$mail->Subject = "Contact Form Enquiry";
$mail->Body = $msg;
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
    header('Location: contact.html?message=Not sent');

}

header('Location: contact.html?message=Successfully sent');

?>