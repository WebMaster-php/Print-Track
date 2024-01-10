<?php
include '../../includes/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $id = $_POST["id"];
    $sql = "DELETE FROM users WHERE user_id=$id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['toastr_message'] = [
            'type' => 'success', // or 'error', 'warning', 'info'
            'message' => 'Recored deleted successfuly'
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