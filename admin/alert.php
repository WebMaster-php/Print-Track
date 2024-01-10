<?php
// Check if a session message is set
$_SESSION['toastr_message'] = [
    'type' => 'success', // or 'error', 'warning', 'info'
    'message' => 'User added successfully'
];
if (isset($_SESSION['toastr_message'])) {
    $messageType = $_SESSION['toastr_message']['type'];
    $message = $_SESSION['toastr_message']['message'];

    // Display Toastr alert using JavaScript
    echo "<script>
            toastr.$messageType('$message');
         </script>";

    // Clear the session message
    unset($_SESSION['toastr_message']);
}
?>
