<?php
// delete_item.php

// Include the database connection code
include('db.php');

// Check if the item ID is set and not empty
if(isset($_POST['item_id'])) {
    // Sanitize the item ID to prevent SQL injection
    $item_id = $_POST['item_id'];

    // Prepare the SQL statement to delete the item
    $sql = "DELETE FROM stock WHERE id = ?";
    $query = $conn->prepare($sql);
    $query->bind_param('i', $item_id); // 'i' indicates integer type

    // Execute the query
    if ($query->execute()) {
        // Redirect back to manage-stock.php after successful deletion
        header("Location: manage-stock.php");
        exit();
    } else {
        // Error occurred while deleting the item
        echo "Error deleting item.";
    }
} else {
    // Invalid request, item ID not provided
    echo "Item ID not provided.";
}
?>
