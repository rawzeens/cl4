<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database configuration
    include 'db.php';

    // Get the product information from the form
    $stock_id = $_POST['stock_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Get current date and time
    $created_date = date('Y-m-d');
    $created_time = date('H:i:s');

    // Prepare and execute the SQL statement to insert the order into the database
    $stmt = $conn->prepare("INSERT INTO orders (stock_id, name, address, email, phone, price, quantity, created_date, created_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssisss", $stock_id, $name, $address, $email, $phone, $price, $quantity, $created_date, $created_time);
    
    // Deduct the purchased quantity from the stock
    $updateStmt = $conn->prepare("UPDATE stock SET quantity = quantity - ? WHERE id = ?");
    $updateStmt->bind_param("ii", $quantity, $stock_id);

    // Execute both statements within a transaction to ensure atomicity
    $conn->begin_transaction();
    $stmt->execute();
    $updateStmt->execute();
    $conn->commit();

    // Close the prepared statements
    $stmt->close();
    $updateStmt->close();

    // Close the database connection
    $conn->close();

    // Redirect the user to a thank you page or any other page
    header("Location: thank_you.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-2xl mx-auto bg-white p-8 rounded shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Checkout</h2>

    <form method="post">
        <input type="hidden" name="stock_id" value="<?= $_GET['id'] ?>">
        <input type="hidden" name="name" value="<?= $_GET['name'] ?>">
        <input type="hidden" name="price" value="<?= $_GET['price'] ?>">
        <input type="hidden" name="quantity" value="<?= $_GET['quantity'] ?>">

        <div class="mb-4">
            <label for="address" class="block font-semibold mb-2">Address:</label>
            <input type="text" id="address" name="address" class="border rounded px-4 py-2 w-full">
        </div>
        <div class="mb-4">
            <label for="email" class="block font-semibold mb-2">Email:</label>
            <input type="email" id="email" name="email" class="border rounded px-4 py-2 w-full">
        </div>
        <div class="mb-4">
            <label for="phone" class="block font-semibold mb-2">Phone:</label>
            <input type="text" id="phone" name="phone" class="border rounded px-4 py-2 w-full">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded cursor-pointer">Place Order</button>
    </form>
</div>

</body>
</html>
