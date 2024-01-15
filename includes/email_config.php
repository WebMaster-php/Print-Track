<?php

// Replace these variables with your Mailtrap SMTP credentials
$smtp_username = '16b3891533cb7f';
$smtp_password = '077e6bcc09ca92';
$smtp_host = 'sandbox.smtp.mailtrap.io';
$smtp_port = 2525;

// Sender email address
$from_email = 'maanjutt425@gmail.com';

// SMTP configuration
$smtp_config = array(
    'host' => $smtp_host,
    'port' => $smtp_port,
    'auth' => true,
    'username' => $smtp_username,
    'password' => $smtp_password
);
?>
