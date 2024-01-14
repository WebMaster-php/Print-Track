<?php
// data.php
$sampleData = [
    ['id' => 1, 'name' => 'John Doe', 'email' => 'john@example.com'],
    ['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane@example.com'],
    // Add more sample data as needed
];

header('Content-Type: application/json');
echo json_encode($sampleData);
?>
