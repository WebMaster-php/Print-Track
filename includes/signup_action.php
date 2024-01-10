<?php
include '../includes/db.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];

    $sql = "INSERT INTO users (userName, userEmail, userPassword) 
            VALUES ('$userName', '$userEmail', '$userPassword')";
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
        header("Location: ../users.php");
        exit();
    }
}
?>
