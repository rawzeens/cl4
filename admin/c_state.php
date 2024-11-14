<?php
// Include the database configuration
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Check if 'marked' parameter is provided in the query string
    if (isset($_GET['marked']) && isset($_GET['id'])) {
        // Sanitize the inputs to prevent SQL injection
        $marked = $_GET['marked'];
        $id = intval($_GET['id']);

        // Prepare the SQL statement based on the 'marked' parameter
        $sql = "";
        if ($marked === "cancel") {
            // Delete the order from the database
            $sql = "DELETE FROM orders WHERE id = ?";
        } elseif ($marked === "proceed") {
            // Change the status of the order to 1 (proceed)
            $sql = "UPDATE orders SET status = 1 WHERE id = ?";
        }

        // Execute the SQL statement
        if (!empty($sql)) {
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                header("Location: dashboard.php?success=1");
                exit;
            } else {
                header("Location: dashboard.php?error=1");
                exit;
            }
            $stmt->close();
        } else {
            header("Location: dashboard.php?error=1");
            exit;
        }
    } elseif (isset($_GET['state']) && isset($_GET['id'])) {
        // Get the state and order ID from the query string
        $state = $_GET['state'];
        $orderId = $_GET['id'];

        // Update the status of the order based on the provided state
        if ($state === 'cancel') {
            // Delete the order from the database
            $sql = "DELETE FROM orders WHERE id = ?";
        } elseif ($state === 'proceed') {
            // Change the status of the order to 1 (proceed)
            $sql = "UPDATE orders SET confirm = 1 WHERE id = ?";
        }

        // Prepare and execute the SQL statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $orderId);
        $stmt->execute();

        // Check if the query was successful
        if ($stmt->affected_rows > 0) {
            // Redirect back to the admin dashboard with a success message
            header("Location: dashboard.php?success=1");
            exit;
        } else {
            // Redirect back to the admin dashboard with an error message
            header("Location: dashboard.php?error=1");
            exit;
        }
    } else {
        // Redirect back to the admin dashboard if 'marked' or 'state' parameter is not provided
        header("Location: dashboard.php?error=1");
        exit;
    }
} else {
    // Redirect back to the admin dashboard if request method is not GET
    header("Location: dashboard.php?error=1");
    exit;
}

// Close the database connection
$conn->close();
?>
