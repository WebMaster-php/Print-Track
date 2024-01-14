<?php
session_start();
include '../../includes/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    $supplier = $_POST["supplier"];
    $customer = $_POST["customer"];
    $reference = $_POST["reference"];
    $invoice = $_POST["invoice"];
    $dateIn = $_POST["dateIn"];
    $dateOut = $_POST["dateOut"];
    $archived = $_POST["archived"];
    $consignment = $_POST["consignment"];
    $notes = $_POST['notes'];
    $sql = "UPDATE jobs SET supplier='$supplier', customer='$customer', reference='$reference', invoice='$invoice', date_in='$dateIn', date_out='$dateOut', archived='$archived', notes='$notes', consignment='$consignment' WHERE job_id=$id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['toastr_message'] = [
                'type' => 'success', // or 'error', 'warning', 'info'
                'message' => 'Record added successfuly'
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
