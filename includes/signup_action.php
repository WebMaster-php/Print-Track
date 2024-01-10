<?php
include '../includes/db.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    $userName = $_POST["userName"];
    $userEmail = $_POST["userEmail"];
    $userPassword = $_POST["userPassword"];
    $encodedPassword = base64_encode($userPassword);

    $sql = "INSERT INTO users (user_name, user_email, user_password) 
            VALUES ('$userName', '$userEmail', '$encodedPassword')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['toastr_message'] = [
            'type' => 'success', // or 'error', 'warning', 'info'
            'message' => 'Your are sign up successfully pleass login'
        ];
		header("Location: ../login.php");
		
    } else {
        $_SESSION['toastr_message'] = [
            'type' => 'error', // or 'error', 'warning', 'info'
            'message' => 'Something went wrong, please try again'
        ];
        header("Location: ../signup.php");
        
    }
}
?>
