<?php
include '../includes/db.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['userName'];
    $password = $_POST['userPassword'];
    $encodedPassword = base64_encode($password);
    $query = "SELECT * FROM users WHERE user_name = '$username' AND user_password = '$encodedPassword'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            if ($user['user_status'] == 0) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['user_name'];
                $_SESSION['role'] = $user['role'];
                $_SESSION['toastr_message'] = [
                'type' => 'success', // or 'error', 'warning', 'info'
                'message' => 'Login Successfuly'
                ];
                if ($user['role'] == 'admin') {
                    header('Location: ../admin/dashboard.php');
                } else {
                    header('Location: ../user/dashboard.php');
                }
            else {
                 $_SESSION['toastr_message'] = [
                'type' => 'error', // or 'error', 'warning', 'info'
                'message' => 'Your account is currently temporarily blocked, and you do not have access at the moment.'
                ];
                header("Location: ../login.php");
                exit();
            }
        } else {
            $_SESSION['toastr_message'] = [
            'type' => 'error', // or 'error', 'warning', 'info'
            'message' => 'Invalid username or password'
            ];
           header("Location: ../login.php");
           exit();
        }
    } else {
        $_SESSION['toastr_message'] = [
            'type' => 'error', // or 'error', 'warning', 'info'
            'message' => 'Database query error'
        ];
        header("Location: ../login.php");
        exit();
    }
}
$conn->close();
?>
