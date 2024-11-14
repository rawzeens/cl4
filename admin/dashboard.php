<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <?php include 'nav.php'; ?>
    
    <div class="px-6 pt-6 2xl:container">
        <div class=" dark:bg-gray-800 dark:text-white rounded-lg px-4 py-2">

            <h2 class="text-2xl font-semibold py-4">Admin Dashboard - Orders</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php
                // Include the database configuration
                include 'db.php';

                // Fetch orders data from the database
                $query = "SELECT * FROM orders WHERE confirm = '0'";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="dark:bg-gray-700 dark:text-white  bg-white rounded-lg p-4 shadow-md">
                            <div class="text-lg font-semibold mb-2">Order ID: <?= $row['id'] ?></div>
                            <div class=" mb-2">Name: <?= $row['name'] ?></div>
                            <div class=" mb-2">Address: <?= $row['address'] ?></div>
                            <div class=" mb-2">Email: <?= $row['email'] ?></div>
                            <div class=" mb-2">Phone: <?= $row['phone'] ?></div>
                            <div class=" mb-2">Price: $<?= $row['price'] ?></div>
                            <div class=" mb-2">Quantity: <?= $row['quantity'] ?></div>

                            <div class="justify-between flex py-4">
                            <a href="c_state.php?state=cancel&id=<?= $row['id'] ?>" class="rounded-md py-2 px-4 bg-red-500"> Cancel</a>
                            <a href="c_state.php?state=proceed&id=<?= $row['id'] ?>" class="rounded-md py-2 px-4 bg-green-500">Proceed</a>

                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "No orders found.";
                }

                // Close the database connection
                $conn->close();
                ?>
            </div>

        </div>
    </div>

</body>
</html>
