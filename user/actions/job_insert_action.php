<?php
  session_start();
	include '../../includes/db.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create"])) {
	    $supplier = $_POST["supplier"];
	    $customer = $_POST["customer"];
	    $reference = $_POST["reference"];
	    $invoice = $_POST["invoice"];
	    $dateIn = $_POST["dateIn"];
	    $dateOut = $_POST["dateOut"];
			$archieved = $_POST["archieved"];
			$user_id = $_SESSION['user_id'];
			$consignment = $_POST["consignment"];
			$notes = $_POST['notes'];
	    $sql = "INSERT INTO jobs (supplier, customer, reference, invoice, date_in, date_out, archived,user_id,notes, consignment) 
	            VALUES ('$supplier', '$customer', '$reference', '$invoice', '$dateIn', '$dateOut', '$archieved', '$user_id', '$notes', '$consignment')";

	    if ($conn->query($sql) === TRUE) {
				$_SESSION['toastr_message'] = [
						'type' => 'success', // or 'error', 'warning', 'info'
						'message' => 'Record added successfuly'
				];
				header("Location: ../dashboard.php");
	    } else {
				$_SESSION['toastr_message'] = [
						'type' => 'error', // or 'error', 'warning', 'info'
						'message' => 'Something went wrong, please try again'
				];
				header("Location: ../jobnew.php");
	    }
	}
?>
