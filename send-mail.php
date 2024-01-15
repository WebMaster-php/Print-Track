

// Load HTML template
$templatePath = 'email_template.html';
$date = date('d-m-Y');
$data = array(
    'client_name' => 'User Name',
    'client_email' => 'username@gmail.com.',
    'date' => $date
);
$htmlBody = loadTemplate($templatePath, $data);

// Send the email
sendEmail('m.rehman@techleadz.com', 'Test Email', $htmlBody);
?>
