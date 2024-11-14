<?php
// Include database connection code
include('db.php');

// Function to get low-stock items
function getLowStockItems($conn, $threshold = 10) {
    $result = $conn->query("SELECT * FROM stock WHERE quantity < $threshold");
    return $result->fetch_all(MYSQLI_ASSOC);
}

function getStockItems($conn) {
    $result = $conn->query("SELECT * FROM stock WHERE quantity >= '10'");
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Function to get total stock value
function getTotalStockValue($conn) {
    $result = $conn->query("SELECT SUM(price * quantity) AS total_value FROM stock");
    $row = $result->fetch_assoc();
    return $row['total_value'];
}

// Get low-stock items
$lowStockItems = getLowStockItems($conn);

$StockItems = getStockItems($conn);

// Get total stock value
$totalStockValue = getTotalStockValue($conn);

// Get current date and time
$currentDateTime = date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Reports</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

<div class="w-full mx-auto bg-white p-8 rounded shadow-md">

    <!-- Current Date and Time -->
    <div class="mb-6 flex  justify-between">  
        <div class="">
        <h2 class="text-2xl font-semibold mb-4">Stock Reports</h2>

        <p class="text-sm mb-2">Report generated on: <?= $currentDateTime ?></p>
        </div> 
        
        <div class="flex my-auto align-center justify-center">  
        <button onclick="window.print()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">Print</button>

        </div>
    </div>

    <!-- Low-Stock Report -->
    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-2">Low-Stock Items</h3>
        <?php if (empty($lowStockItems)): ?>
            <p>No low-stock items found.</p>
        <?php else: ?>
            <table class="border-collapse border border-gray-400">
                <thead>
                    <tr>
                        <th class="border border-gray-400 px-4 py-2">Name</th>
                        <th class="border border-gray-400 px-4 py-2">Price</th>
                        <th class="border border-gray-400 px-4 py-2">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lowStockItems as $item): ?>
                        <tr>
                            <td class="border border-gray-400 px-4 py-2"><?= $item['name'] ?></td>
                            <td class="border border-gray-400 px-4 py-2">$<?= $item['price'] ?></td>
                            <td class="border border-gray-400 px-4 py-2"><?= $item['quantity'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <div class="mb-6">
        <h3 class="text-xl font-semibold mb-2">Total Stock Items</h3>
        <?php if (empty($StockItems)): ?>
            <p>No stock items found.</p>
        <?php else: ?>
            <table class="border-collapse border border-gray-400 w-full">
                <thead>
                    <tr>
                        <th class="border border-gray-400 px-4 py-2">Name</th>
                        <th class="border border-gray-400 px-4 py-2">Price</th>
                        <th class="border border-gray-400 px-4 py-2">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($StockItems as $itema): ?>
                        <tr>
                            <td class="border border-gray-400 px-4 py-2"><?= $itema['name'] ?></td>
                            <td class="border border-gray-400 px-4 py-2">$<?= $itema['price'] ?></td>
                            <td class="border border-gray-400 px-4 py-2"><?= $itema['quantity'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <!-- Total Stock Value Report -->
    <div>
        <h3 class="text-xl font-semibold mb-2">Total Stock Value</h3>
        <p>$<?= number_format($totalStockValue, 2) ?></p>
    </div>
</div>

</body>
</html>
