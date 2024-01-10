<?php
include '../../includes/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userStatus = $_POST["userStatus"];
    $encodedPassword = base64_encode($_POST["userPassword"]);
    $sql = "UPDATE users SET user_name='$userName', user_email='$userEmail', user_password='$encodedPassword', 
            user_status='$userStatus' WHERE user_id=$id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['toastr_message'] = [
            'type' => 'success', // or 'error', 'warning', 'info'
            'message' => 'User updated successfully'
        ];
        header("Location: ../users.php");
        exit();
    } else {
        $_SESSION['toastr_message'] = [
            'type' => 'error', // or 'error', 'warning', 'info'
            'message' => 'Something went wrong, please try again'
        ];
        header("Location: ../users.php");
        exit();
    }
}

$conn->close();
?>
