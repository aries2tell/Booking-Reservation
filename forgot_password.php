<?php
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the email address from the form submission
    $email = $_POST['email'];

    // Generate a unique token for the password reset link
    $token = bin2hex(random_bytes(16));

    // Compose the email message with the password reset link
    $subject = "Password Reset";
    $message = "Click the following link to reset your password: http://example.com/reset_password.php?token=$token";
    $headers = "From: YourWebsite <canlasaries99@gmail.com>" . "\r\n"; // Add \r\n for line break

    // Set the SMTP configuration
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'canlasaries99@gmail.com';
    $mail->Password = 'hasb fnnz tyes enyi';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Send the email with TLS encryption
    try {
        //Recipients
        $mail->setFrom('canlasaries99@gmail.com', 'StudySync');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        $mail->send();
        echo '<div class="container mt-5">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-md-6">';
        echo '<div class="card">';
        echo '<div class="card-body text-center">';
        echo '<p style="color: green;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16"><path d="M13.646 2.354a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L6 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/><path fill-rule="evenodd" d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm0-1A7 7 0 1 0 8 1a7 7 0 0 0 0 14z"/></svg> Password reset link sent successfully.</p>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    } catch (Exception $e) {
        echo "Error sending password reset link: {$mail->ErrorInfo}";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Forgot Password</div>
                    <div class="card-body">
                        <form action="forgot_password.php" method="post">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                        <br>
                        <button onclick="window.location.href='login.php';" class="btn btn-primary">Back to Login</button>


                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
