<?php
// Include the database configuration
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id']) && isset($_GET['quantity'])) {
    $itemId = $_GET['id'];
    $requestedQuantity = $_GET['quantity'];

    try {
        // Check if the item exists and has sufficient quantity
        $stmt = $conn->prepare("SELECT quantity FROM stock WHERE id = ?");
        $stmt->bind_param("i", $itemId);
        $stmt->execute();
        $stmt->bind_result($availableQuantity);
        $stmt->fetch();
        $stmt->close();

        if ($availableQuantity >= $requestedQuantity && $requestedQuantity > 0) {
            // Perform the purchase
            $updateStmt = $conn->prepare("UPDATE stock SET quantity = quantity - ? WHERE id = ?");
            $updateStmt->bind_param("ii", $requestedQuantity, $itemId);
            $updateStmt->execute();
            $updateStmt->close();

            // Return success response
            header('Content-Type: application/json');
            echo json_encode(['success' => true]);
        } else {
            // Return error response if insufficient quantity or invalid request
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Invalid request or insufficient quantity']);
        }
    } catch (Exception $e) {
        // Handle database connection or query error
        http_response_code(500); // Internal Server Error
        echo json_encode(['success' => false, 'message' => 'Error processing the request']);
    }
} else {
    // Return error response for invalid request
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>
