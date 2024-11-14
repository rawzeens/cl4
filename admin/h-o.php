<?php
// Include the database configuration
include 'db.php';

// Get the current date
$currentDate = date("Y-m-d");

// Calculate the date 3 days ago
$threeDaysAgo = date("Y-m-d", strtotime("-3 days", strtotime($currentDate)));

// Fetch order history data from the database for orders created in the last 3 days
$queryNewest = "SELECT * FROM orders WHERE status = 1 AND confirm = 1 AND created_date >= DATE_SUB('$currentDate', INTERVAL 3 DAY)";
$resultNewest = $conn->query($queryNewest);

// Fetch order history data from the database for orders created more than 3 days ago
$queryOlder = "SELECT * FROM orders WHERE status = 1 AND confirm = 1 AND created_date < '$threeDaysAgo'";
$resultOlder = $conn->query($queryOlder);
?>
<h2 class="mb-4 font-bold">For The Last 3 days</h2>

<?php
if ($resultNewest->num_rows > 0) {
    ?>
    <div class="overflow-x-auto bg-gray-900 rounded-lg shadow-md mb-4">
        <table class="bg-gray-900 w-full">
            <thead class="bg-gray-800 text-gray-300 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Address</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Phone</th>
                    <th class="py-3 px-6 text-left">Price</th>
                    <th class="py-3 px-6 text-left">Quantity</th>
                    <th class="py-3 px-6 text-left">Order Id</th>
                    <th class="py-3 px-6 text-left">Created Date</th>
                    <th class="py-3 px-6 text-left">Created Time</th>
                </tr>
            </thead>
            <tbody class="text-gray-400 text-sm font-light">
                <?php
                $i = 1;
                while ($row = $resultNewest->fetch_assoc()) {
                    ?>
                    <tr class="border-b border-gray-600 hover:bg-slate-700 font-medium">
                        <td class="py-3 px-6 text-left whitespace-no-wrap"><?php echo $i; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['name']; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['address']; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['email']; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['phone']; ?></td>
                        <td class="py-3 px-6 text-left">$<?php echo $row['price']; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['quantity']; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['id']; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['created_date']; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['created_time']; ?></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
} else {
    echo "<p class='py-4 font-bold text-gray-300'>No orders newer than 3 days found.</p>";
}

?>


<?php 
if ($resultOlder->num_rows > 0) {
    ?>

<hr class="mb-4">
<h2 class="mb-4 font-bold">History Orders</h2>

    <div class="overflow-x-auto bg-gray-900 rounded-lg shadow-md">
        <table class="bg-gray-900 w-full">
            <thead class="bg-gray-800 text-gray-300 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-left">Address</th>
                    <th class="py-3 px-6 text-left">Email</th>
                    <th class="py-3 px-6 text-left">Phone</th>
                    <th class="py-3 px-6 text-left">Price</th>
                    <th class="py-3 px-6 text-left">Quantity</th>
                    <th class="py-3 px-6 text-left">Order Id</th>
                    <th class="py-3 px-6 text-left">Created Date</th>
                    <th class="py-3 px-6 text-left">Created Time</th>
                </tr>
            </thead>
            <tbody class="text-gray-400 text-sm font-light">
                <?php
                $i = 1;
                while ($row = $resultOlder->fetch_assoc()) {
                    ?>
                    <tr class="border-b border-gray-600 hover:bg-slate-700 font-medium">
                        <td class="py-3 px-6 text-left whitespace-no-wrap"><?php echo $i; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['name']; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['address']; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['email']; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['phone']; ?></td>
                        <td class="py-3 px-6 text-left">RM<?php echo $row['price']; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['quantity']; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['id']; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['created_date']; ?></td>
                        <td class="py-3 px-6 text-left"><?php echo $row['created_time']; ?></td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
    <?php
} else {
    echo "<p class='py-4 font-bold text-gray-300'>No orders older than 3 days found.</p>";
}

// Close the database connection
$conn->close();
?>
