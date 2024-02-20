<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../assets/vendor/PhpMailer/PhpMailer/src/PHPMailer.php';
require '../assets/vendor/PhpMailer/PhpMailer/src/Exception.php';
require '../assets/vendor/PhpMailer/PhpMailer/src/SMTP.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Create a new PHPMailer instance
  $mail = new PHPMailer(true);

  try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // for detailed debug
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                 // Enable SMTP authentication
    $mail->Username   = 'hlaingminhtun28@gmail.com';  // SMTP username
    $mail->Password   = 'pisv skdp asvh iuzy';      // SMTP password
    $mail->SMTPSecure = 'tls';               // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                 // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $name);  // Sender's email and name
    $mail->addAddress('hlaingminhtun28@gmail.com', 'Hlaing Min Htun');  // Recipient's email and name

    // Content
    $mail->isHTML(true);  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;

    $mail->send();
    echo 'Message has been sent';
  } catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
