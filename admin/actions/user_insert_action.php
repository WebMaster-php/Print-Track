<?php
include '../../includes/db.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $encodedPassword = base64_encode($_POST["userPassword"]);
    $userStatus = $_POST["userStatus"];

    $sql = "INSERT INTO users (user_name, user_email, user_password, user_status) 
            VALUES ('$userName', '$userEmail', '$encodedPassword', '$userStatus')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['toastr_message'] = [
            'type' => 'success', // or 'error', 'warning', 'info'
            'message' => 'User added successfully'
        ];
				header("Location: ../users.php");
				exit();
    } else {
        $_SESSION['toastr_message'] = [
            'type' => 'error', // or 'error', 'warning', 'info'
            'message' => 'Something went wrong, please try again'
        ];
        header("Location: ../usernew.php");
        exit();
    }
}
?>
