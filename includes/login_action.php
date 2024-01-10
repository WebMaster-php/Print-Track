<?php
include '../includes/db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    $userName = $_POST["userName"];
    $userPassword = $_POST["userPassword"];

    $sql = "SELECT * FROM users WHERE userName='$userName'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify password
        if (password_verify($userPassword, $row['userPassword'])) {
            $_SESSION['user_id'] = $row['ID'];
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['toastr_message'] = [
			    'type' => 'success', // or 'error', 'warning', 'info'
			    'message' => 'This is a sample toastr message.'
			];
			 header("Location: admin/dashboard.php");
            exit();
        } else {
            echo "Invalid password!";
             $_SESSION['toastr_message'] = [
			    'type' => 'error', // or 'error', 'warning', 'info','success'
			    'message' => 'Invalid password!.'
			];
        }
    } else {
        $_SESSION['toastr_message'] = [
			    'type' => 'error', // or 'error', 'warning', 'info','success'
			    'message' => 'User not found!.'
			];
			header("Location: ../login.php");
    }
}

$conn->close();
?>
