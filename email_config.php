<?php

// Replace these variables with your Mailtrap SMTP credentials
$smtp_username = '1600a4b9840755';
$smtp_password = '969f8803b7a53f';
$smtp_host = 'sandbox.smtp.mailtrap.io';
$smtp_port = 2525;

// Sender email address
$from_email = 'tester.techleadz.cfteam@gmail.com';

// SMTP configuration
$smtp_config = array(
    'host' => $smtp_host,
    'port' => $smtp_port,
    'auth' => true,
    'username' => $smtp_username,
    'password' => $smtp_password
);
?>
