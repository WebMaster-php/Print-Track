<?php
// Check if a session message is set
if (isset($_SESSION['toastr_message'])) {
    $messageType = $_SESSION['toastr_message']['type'];
    $message = $_SESSION['toastr_message']['message'];
    // Display Toastr alert using JavaScript
    if ($messageType == 'error') {
        echo '<div class="alert alert-danger bg-danger text-light border-0 alert-dismissible fade show" role="alert">';
        echo $message;
        echo '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    } else {
        echo '<div class="alert alert-success bg-success text-light border-0 alert-dismissible fade show" role="alert">';
        echo $message;
        echo '<button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }

    // Clear the session message
    unset($_SESSION['toastr_message']);
}
?>
