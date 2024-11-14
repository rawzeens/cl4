<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management</title>
    <!-- Include Tailwind CSS directly from CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <?php include 'nav.php'; ?>
    
    <div class="px-6 pt-6 2xl:container">
        <div class="bg-gray-700 dark:text-white rounded-lg px-4 py-2">
            <h2 class="text-2xl font-semibold py-4">Order Management</h2>

            <!-- Toggle buttons -->
            <div class="flex space-x-4 mb-4">
                <button id="togglePending" class="bg-blue-500 text-white px-4 py-2 rounded-md cursor-pointer">Pending Orders</button>
                <button id="toggleHistory" class="bg-blue-500 text-white px-4 py-2 rounded-md cursor-pointer">Order History</button>
            </div>

            <!-- Container for pending orders -->
            <div id="pendingOrders">
<?php include 'p-o.php';?>
            </div>

            <!-- Container for order history -->
            <div id="orderHistory" class="hidden">

            <div class="rounded-lg">   <?php include 'h-o.php';?></div>
         
            </div>
        </div>
    </div>

    <script>
        const togglePendingButton = document.getElementById('togglePending');
        const pendingOrders = document.getElementById('pendingOrders');
        const toggleHistoryButton = document.getElementById('toggleHistory');
        const orderHistory = document.getElementById('orderHistory');

        togglePendingButton.addEventListener('click', () => {
            pendingOrders.classList.remove('hidden');
            orderHistory.classList.add('hidden');
        });

        toggleHistoryButton.addEventListener('click', () => {
            orderHistory.classList.remove('hidden');
            pendingOrders.classList.add('hidden');
        });
    </script>

</body>
</html>
