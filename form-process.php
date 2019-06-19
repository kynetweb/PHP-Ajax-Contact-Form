<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["name"])){
	// PHONE
 $phone = $_POST["phone"];
 
 $errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required </br>";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required </br>";
} else {
    $email = $_POST["email"];
}

// MSG SUBJECT
if (empty($_POST["msg_subject"])) {
    $errorMSG .= "Subject is required </br>";
} else {
    $msg_subject = $_POST["msg_subject"];
}
// MSG 
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $msg = $_POST["message"];
}

$error = '<div class=" s10 pull-s1 m6 pull-m3 l4 pull-l4 card-panel red lighten-2">'.$errorMSG.'</div> ';
 if(!empty($errorMSG)){
	echo $error;
	
}else{
//Add your email here
$EmailTo = "testdemo256@gmail.com";
$Subject = $msg_subject;
// prepare email body text
$Body = "";
$Body .= "Phone: </br>";
$Body .= $phone;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $msg;
$Body .= "\n";

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'testdemo256@gmail.com';                     // SMTP username
    $mail->Password   = 'demotest12345';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress('testdemo256@gmail.com', 'test demo');     // Add a recipient
    $mail->addAddress('testdemo256@gmail.com');               // Name is optional
    $mail->addReplyTo('testdemo256@gmail.com', 'Information');
    $mail->addCC('testdemo256@gmail.com');
    $mail->addBCC('testdemo256@gmail.com');

    // Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $Subject;
    $mail->Body    = $Body;
    

   $mail->send();
   
   $mssg = '<div class=" s10 pull-s1 m6 pull-m3 l4 pull-l4 card-panel green lighten-2">Message has been sent</div> ';
   echo $mssg;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}
}
?>
</body>
</html>