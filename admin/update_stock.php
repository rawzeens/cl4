<!-- update_stock.php -->

<?php
// Include database connection code
include('db.php');

// Initialize variables for form input
$itemId = $name = $price = $quantity = '';
$errors = [];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form input
    $itemId = trim($_POST['item_id']);
    $name = trim($_POST['name']);
    $price = trim($_POST['price']);
    $quantity = trim($_POST['quantity']);

    if (!ctype_digit($itemId) || $itemId <= 0) {
        $errors[] = 'Invalid item ID';
    }

    if (empty($name)) {
        $errors[] = 'Name is required';
    }

    if (!is_numeric($price) || $price <= 0) {
        $errors[] = 'Price must be a positive number';
    }

    if (!ctype_digit($quantity) || $quantity < 0) {
        $errors[] = 'Quantity must be a non-negative integer';
    }

    // If no validation errors, update the item in the database
    if (empty($errors)) {
        $updateQuery = "UPDATE stock SET name = '$name', price = $price, quantity = $quantity WHERE id = $itemId";
        if ($conn->query($updateQuery)) {
            header('Location: index.php');
            exit();
        } else {
            $errors[] = 'Error updating stock item in the database';
        }
    }
}

// Check if an item ID is provided in the URL
if (isset($_GET['id']) && ctype_digit($_GET['id']) && $_GET['id'] > 0) {
    // Fetch the details of the selected item
    $itemId = $_GET['id'];
    $result = $conn->query("SELECT * FROM stock WHERE id = $itemId");

    if ($result->num_rows === 1) {
        $item = $result->fetch_assoc();
        $name = $item['name'];
        $price = $item['price'];
        $quantity = $item['quantity'];
    } else {
        $errors[] = 'Item not found';
    }
} else {
    $errors[] = 'Invalid item ID';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Stock Item</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Update Stock Item</h2>

    <!-- Display validation errors if any -->
    <?php if (!empty($errors)): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Stock Item Update Form -->
    <form method="post" action="update_stock.php">
        <input type="hidden" name="item_id" value="<?= $itemId ?>">

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
            <input type="text" id="name" name="name" class="w-full border rounded px-3 py-2" value="<?= $name ?>">
        </div>

        <div class="mb-4">
            <label for="price" class="block text-gray-700 font-bold mb-2">Price:</label>
            <input type="text" id="price" name="price" class="w-full border rounded px-3 py-2" value="<?= $price ?>">
        </div>

        <div class="mb-4">
            <label for="quantity" class="block text-gray-700 font-bold mb-2">Quantity:</label>
            <input type="text" id="quantity" name="quantity" class="w-full border rounded px-3 py-2" value="<?= $quantity ?>">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Item</button>
    </form>
</div>

</body>
</html>
