<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'pranavsutar4747@gmail.com';                 // SMTP username
$mail->Password = 'iaotkvomkvulnqaq';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('pranavsutar4747@gmail.com', 'Insta');
$mail->addAddress('drsandip511@gmail.com');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>



// <?php
//     use PHPMailer\PHPMailer\PHPMailer;
//     use PHPMailer\PHPMailer\Exception;
//     //require('vendor/autoload.php');
//     require_once 'PHPMailer/src/Exception.php';
//     require_once 'PHPMailer/src/PHPMailer.php';
//     require_once 'PHPMailer/src/SMTP.php';
//     $mail= new PHPMailer();
//     session_start();
// ?>

// <?php 
// try{
//     $email="manishsutar1314@gmail.com";
//     $header="From:pranavsutar4747@gmail.com\r\n";
//     $subject="Insta Restaurant";
//     $txt="Hi Pranav.\nThank you for your order.\nWe know you have a lot of choices when it comes to restarant!!!";
//     $mail->isSMTP();
//     $mail->Host='smtp.gmail.com';
//     $mail->SMTPAuth=true;
//     $mail->Username='pranavsutar4747@gmail.com';
//     $mail->Password='iaotkvomkvulnqaq';
//     $mail->SMTPSecure="tls";
//     $mail->Port='587';
//     $mail->setFrom('pranavsutar4747@gmail.com');
//     $mail->addAddress($email);
//     $mail->isHTML(true);
//     $mail->Subject=$subject;
//     $mail->Body=$txt;
//     $mail->send();
//     echo "<script> alert('Email sent successfully') </script>";
// }catch(Exception $e){
//     echo "Error:{$mail->ErrorInfo}";
// }




// ?>