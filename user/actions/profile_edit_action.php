<?php
session_start();
include '../../includes/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    try {
        $id = $_SESSION["user_id"];
        $encodedPassword = base64_encode($_POST["userPassword"]);
        $user_b_name = $_POST["userBusinessName"];
        $user_address = $_POST["userAddress"];
        $user_state = $_POST["userState"];
        $user_postcode = $_POST["userPostcode"];
        $user_phone = $_POST["userPhone"];

        $sql = "UPDATE users SET user_name='$userName', user_email='$userEmail', user_password='$userPassword', user_b_name='$user_b_name', user_address='$user_address', user_state='$user_state', user_postcode='$user_postcode', user_phone='$user_phone' WHERE user_id=$id";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['toastr_message'] = [
                'type' => 'success', // or 'error', 'warning', 'info'
                'message' => 'Profile updated successfully'
            ];
            header("Location: ../profile.php");  
        } else {
            $_SESSION['toastr_message'] = [
                'type' => 'error', // or 'error', 'warning', 'info'
                'message' => 'Something went wrong, please try again'
            ];
            header("Location: ../profile.php");
        }
    } catch (Exception $e) {
        $_SESSION['toastr_message'] = [
            'type' => 'error', // or 'error', 'warning', 'info'
            'message' => 'user name or email not unique'
        ];
        header("Location: ../profile.php");
        exit();
    }
}

$conn->close();
?>
