<?php
require 'email_config.php';

function loadTemplate($templatePath, $data) {
    $templateContent = file_get_contents($templatePath);

    // Replace placeholders with actual values
    foreach ($data as $key => $value) {
        $templateContent = str_replace("{{{$key}}}", $value, $templateContent);
    }

    return $templateContent;
}

function sendEmail($to, $subject, $message) {
    global $smtp_config, $from_email;

    // Create a new PHPMailer instance
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try {
        // Set the mailer to use SMTP
        $mail->isSMTP();

        // Set SMTP host and port
        $mail->Host = $smtp_config['host'];
        $mail->Port = $smtp_config['port'];

        // Enable SMTP authentication
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_config['username'];
        $mail->Password = $smtp_config['password'];

        // Set sender and recipient email addresses, subject, and message
        $mail->setFrom($from_email);
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->msgHTML($message);

        // Send the email
        $mail->send();
        echo 'Email sent successfully';
    } catch (Exception $e) {
        echo 'Error sending email: ', $mail->ErrorInfo;
    }
}
?>
