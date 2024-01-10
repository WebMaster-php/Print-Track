<?php

// Assuming you have a database connection already established
include 'includes/db.php';

// Inserting into 'users' table
for ($i = 1; $i <= 100; $i++) {
    $user_name = "user_name" . $i;
    $user_email = "user_email" . $i . "@example.com"; // Fix email format
    $user_status = ($i % 2 == 0) ? 0 : 1;
    $role = ($i % 2 == 0) ? 'admin' : 'user';
    $user_password = base64_encode('password');

    $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_status`, `user_password`, `role`)
            VALUES ('$user_name', '$user_email', '$user_status', '$user_password','$role')";

    // Execute the SQL query
    $conn->query($sql);
    $user_id = $i;
    $supplier = "Supplier" . $i;
    $customer = "Customer" . $i;
    $reference = "Reference" . $i;
    $invoice = "Invoice" . $i;
    $date_in = date('Y-m-d', strtotime("2022-01-01 +{$i} days"));
    $date_out = date('Y-m-d', strtotime("2022-02-01 +{$i} days"));
    $archived = ($i % 2 == 0) ? 0 : 1;
    $sql = "INSERT INTO `projects` (`user_id`, `supplier`, `customer`, `reference`, `invoice`, `date_in`, `date_out`, `archived`)
            VALUES ('$user_id', '$supplier', '$customer', '$reference', '$invoice', '$date_in', '$date_out', $archived)";

    // Execute the SQL query
    $conn->query($sql);
}
$conn->close();
?>
