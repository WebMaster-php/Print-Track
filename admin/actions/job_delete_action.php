<?php
session_start();
include '../../includes/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $id = $_POST["id"];
    $sql = "DELETE FROM jobs WHERE job_id=$id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['toastr_message'] = [
                'type' => 'success', // or 'error', 'warning', 'info'
                'message' => 'Record deleted successfuly'
        ];
        header("Location: ../jobs.php");
        exit();
    } else {
        $_SESSION['toastr_message'] = [
            'type' => 'error', // or 'error', 'warning', 'info'
            'message' => 'Something went wrong, please try again'
        ];
        header("Location: ../jobs.php");
        exit();
    }
}

$conn->close();
?>