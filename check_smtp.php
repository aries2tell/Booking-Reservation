<?php
$smtpHost = 'smtp.gmail.com'; 
$smtpPort = 587;
$smtpTimeout = 30; 


$smtpConnection = fsockopen($smtpHost, $smtpPort, $errno, $errstr, $smtpTimeout);


if ($smtpConnection) {
    echo "SMTP connection successful!";
    fclose($smtpConnection);
} else {
    echo "Failed to connect to SMTP server. Error: $errno - $errstr";
}
?>
