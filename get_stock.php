<?php
// Include the database configuration
include 'db.php';

// Initialize an empty array to store stock data
$stock = [];

// Fetch stock data from the database
$result = $conn->query("SELECT * FROM stock");

// Check if the query was successful
if ($result) {
    // Fetch the results as an associative array
    while ($row = $result->fetch_assoc()) {
        $stock[] = $row;
    }

    // Close the result set
    $result->close();
    
    // Return stock data as JSON
    header('Content-Type: application/json');
    echo json_encode($stock);
} else {
    // Handle database query error
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Unable to fetch stock data']);
}

// Close the database connection
$conn->close();
?>
