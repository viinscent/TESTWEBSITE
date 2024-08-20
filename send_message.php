<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'vincentnguyen1029@gmail.com';
    $mail->Password = 'bgrl qkyo abrw wnec'; // Use your Gmail app password
    $mail->SMTPSecure = 'tls'; // or 'ssl'
    $mail->Port = 587; // or 465 for ssl

    //Recipients
    $mail->setFrom('vincentnguyen1029@gmail.com', 'Vincent Nguyen');
    $mail->addAddress('vincentnguyen1029@gmail.com');

    // Content
    $mail->isHTML(false);
    $mail->Subject = 'New Message From Personal Website!';
    $mail->Body    = "Name: " . htmlspecialchars($_POST['name']) . "\n" .
                      "Email: " . filter_var($_POST['email'], FILTER_SANITIZE_EMAIL) . "\n\n" .
                      "Message:\n" . htmlspecialchars($_POST['message']);

    $mail->send();
    echo 'Message sent successfully!';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
