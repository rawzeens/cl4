<!-- add_stock.php -->

<?php
// Include database connection code
include('db.php');

// Initialize variables for form input
$name = $price = $quantity = '';
$errors = [];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate form input
    $name = trim($_POST['name']);
    $price = trim($_POST['price']);
    $quantity = trim($_POST['quantity']);
    
    // Handle image upload
    $img = $_FILES['image']['name']; // Get the name of the uploaded image file
    $target = "images/".basename($img); // Specify the directory where you want to save the image
    
    if (empty($name)) {
        $errors[] = 'Name is required';
    }

    if (!is_numeric($price) || $price <= 0) {
        $errors[] = 'Price must be a positive number';
    }

    if (!ctype_digit($quantity) || $quantity < 0) {
        $errors[] = 'Quantity must be a non-negative integer';
    }

    // If no validation errors, insert the new item into the database
    if (empty($errors)) {
        // Move the uploaded image to the specified directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $insertQuery = "INSERT INTO stock (name, price, quantity, img) VALUES ('$name', $price, $quantity, '$img')";
            if ($conn->query($insertQuery)) {
                header('Location: manage-stock.php');
                exit();
            } else {
                $errors[] = 'Error adding stock item to the database';
            }
        } else {
            $errors[] = 'Error uploading image';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Stock Item</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> <!-- Updated viewport meta tag -->


</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <?php include 'nav.php'; ?>
    
    <div class="px-6 pt-6 2xl:container">
        <div class="bg-[#1f2937] rounded-lg px-4 py-2">

<div class="px-4 py-2 text-black dark:text-white">
    <h2 class="text-2xl font-semibold mb-4">Add Stock Item</h2>

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

    <!-- Stock Item Form -->
    <form method="post" action="add_stock.php" enctype="multipart/form-data">
        <div class="mb-4">
            <label for="name" class="block  font-bold mb-2">Name:</label>
            <input type="text" id="name" name="name" class="bg-gray w-full text-black border rounded px-3 py-2" value="<?= $name ?>">
        </div>

        <div class="mb-4">
            <label for="price" class="block  font-bold mb-2">Price:</label>
            <input type="text" id="price" name="price" class="bg-gray w-full text-black border rounded px-3 py-2" value="<?= $price ?>">
        </div>

        <div class="mb-4">
            <label for="quantity" class="block  font-bold mb-2">Quantity:</label>
            <input type="text" id="quantity" name="quantity" class="bg-gray w-full text-black border rounded px-3 py-2" value="<?= $quantity ?>">
        </div>

        <div class="mb-4">
            <label  class="block  font-bold mb-2">Image:</label>
            <label for="image" class=" mb-2 w-full block text-black border bg-white rounded px-3 py-2">Choose Image:</label>
            <input type="file" id="image" name="image" accept="image/*" class="" hidden>
        </div>

        <button type="submit" class="bg-blue-500  px-4 py-2 rounded">Add Item</button>
    </form>
</div>
        </div></div>
</body>
</html>
