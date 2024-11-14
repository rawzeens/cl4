<?php
// Include the database configuration
include 'db.php';

// Fetch orders data from the database
$query = "SELECT * FROM orders";
$result = $conn->query($query);

if (!$result) {
    // Handle database query error
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Unable to fetch orders data']);
    exit();
}

$orders = [];
while ($row = $result->fetch_assoc()) {
    $orders[] = $row;
}

// Return orders data as JSON
header('Content-Type: application/json');
echo json_encode($orders);

// Close the database connection
$conn->close();
?>
