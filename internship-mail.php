<?PHP
require("mail/class.phpmailer.php");
// robot detection
$honeypot = trim($_POST["email"]);     

if(!empty($honeypot)) {
  echo "BAD ROBOT!"; 
  exit;
}

$name=trim($_POST['name']);
$mobile=trim($_POST['mobile']);
$email=trim($_POST['email_real']);
$dob=trim($_POST['dob']);
$qualification=trim($_POST['qualification']);
$year=trim($_POST['year']);
$course=trim($_POST['course']);
$gender=trim($_POST['gender']);
$address=trim($_POST['address']);
$status=trim($_POST['status']);

$msg = "Name:". $name . "<br>" . "Mobile No.:" . $mobile . "<br>" . "Email:" . $email . "<br>". 
            "Date of Birth:" . $dob . "<br>" . "Qualification:" . $qualification ."<br>".
            "Current year:" . $year . "<br>" . "Interested in:" . $course . "<br>" . 
            "Gender:" . $gender . "<br>" . "Address:" . $address . "<br>" .
            "Status:". $status . "<br>";
 

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->Host = "bhin-pp-wb4.webhostbox.net";

$mail->SMTPAuth = true;
//$mail->SMTPSecure = "ssl";
$mail->Port = 25;
$mail->Username = "admin@technoartz.com";
$mail->Password = "Shital@123#";

$mail->From = "admin@technoartz.com";
$mail->AddAddress("info@technoartz.com");
//$mail->AddReplyTo("mail@mail.com");

$mail->IsHTML(true);

$mail->Subject = "Internship Enquiry";
$mail->Body = $msg;
//$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

if(!$mail->Send())
{
    header('Location: internship.html?message=Not sent');

}

header('Location: internship.html?message=Successfully sent');

?>