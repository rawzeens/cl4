<?php
// Include the database configuration
include 'db.php';

// Fetch pending orders data from the database
$query = "SELECT * FROM orders WHERE status = 0 AND confirm = 1"; // Assuming status 0 represents pending orders
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="bg-gray-200 dark:bg-gray-800 rounded-lg p-4 mb-4">
            <div class="text-lg font-semibold mb-2">Order ID: <?= $row['id'] ?></div>
            <div class="mb-2">Name: <?= $row['name'] ?></div>
            <div class="mb-2">Address: <?= $row['address'] ?></div>
            <div class="mb-2">Email: <?= $row['email'] ?></div>
            <div class="mb-2">Phone: <?= $row['phone'] ?></div>
            <div class="mb-2">Price: $<?= $row['price'] ?></div>
            <div class="mb-2">Quantity: <?= $row['quantity'] ?></div>

            <div class="justify-between flex py-4">
                <a href="c_state.php?marked=cancel&id=<?= $row['id'] ?>" class="rounded-md py-2 px-4 bg-red-500"> Cancel</a>
                <a href="c_state.php?marked=proceed&id=<?= $row['id'] ?>" class="rounded-md py-2 px-4 bg-green-500">Mark As Done</a>

            </div>
        </div>
        <?php
    }
} else {
    echo "<p class='py-4 font-bold'>No pending orders found.</p>";
}

// Close the database connection
$conn->close();
?>
