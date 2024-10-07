<?php

require("mail/class.phpmailer.php");
// robot detection
$honeypot = trim($_POST["email"]);     

if(!empty($honeypot)) {
  echo "BAD ROBOT!"; 
  exit;
}

$name = trim($_POST['name']);
$mobile =  trim($_POST['mobile']);
$email = trim($_POST['email_real']);
$qualification = trim($_POST['qualification']);
$employment_status = trim($_POST['employment_status']);
$primary_skill =trim($_POST['primary_skill']);
$secondary_skill = trim($_POST['secondary_skill']);

$path = 'Upload/' . $_FILES["resume"]["name"];
move_uploaded_file($_FILES["resume"]["tmp_name"], $path);

$message = "Name:". $name . "<br>" . "Mobile No.:" . $mobile . "<br>" . "Email:" . $email . "<br>". 
"Qualification:" . $qualification ."<br>".
 "Current Employment Status:" . $employment_status . "<br>" . 
 "Primary Skill:" . $primary_skill . "<br>" . "Secondary Skill:" . $secondary_skill . "<br>" ;

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

$mail->Subject = "Job Apllication";
$mail->Body = $message;
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
$mail->addAttachment($path);

if(!$mail->Send())
{
    header('Location: job_opportunity.html?message=Not sent');

}

header('Location: job_opportunity.html?message=Successfully sent');

?>