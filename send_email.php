<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include the PHPMailer classes directly
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Create a new PHPMailer instance
$mail = new PHPMailer();

// SMTP configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'canlasaries99@gmail.com'; // Your Gmail username
$mail->Password = 'hasb fnnz tyes enyi'; // Your Gmail password
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

// Sender and recipient
$senderEmail = 'hulideveloper@gmail.com'; // Update with your email
$senderName = 'Aries'; // Update with your name
$recipientEmail = isset($_POST['email']) ? $_POST['email'] : ''; // Get recipient email from form

if (!empty($recipientEmail)) {
    // Set sender and recipient
    $mail->setFrom($senderEmail, $senderName);
    $mail->addAddress($recipientEmail);

    // Email content
    $mail->isHTML(true);
    $token = bin2hex(random_bytes(16)); // Generate token for the reset link
    $resetLink = 'http://example.com/reset_password.php?token=' . $token; // Update with your reset password link
    $mail->Subject = 'Password Reset';
    $mail->Body = "Click the following link to reset your password: $resetLink";

    // Send email
    if ($mail->send()) {
        echo 'Password reset link sent successfully.';
    } else {
        echo 'Error sending password reset link: ' . $mail->ErrorInfo;
    }
} else {
    echo 'Recipient email not provided.';
}
?>
