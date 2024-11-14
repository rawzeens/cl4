<?php
//edit-stock.php
session_start();
error_reporting(0);
// manage-stock.php

// Include the database connection code
include('db.php');

// Fetch all items from the stock
$result = $conn->query("SELECT * FROM stock");

// Check if there are any items
if ($result->num_rows > 0) {
    $stockItems = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $stockItems = [];
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Stock</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> <!-- Updated viewport meta tag -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <?php include 'nav.php'; ?>
    
    <div class="px-6 pt-6 2xl:container">
        <div class="bg-white dark:bg-[#374151] dark:text-white rounded-lg px-4 py-2">


<div class="">
    <div class="flex justify-between py-2">
    <h2 class="text-2xl font-semibold py-2">Manage Stock</h2>

    <a href="reports.php" class="py-2 px-4 flex text-center rounded-lg bg-slate-900"><p>Print Reports</p></a>
    </div>

    <!-- Display the list of stock items -->
    <ul>

<?php foreach ($stockItems as $item): ?>
    <li class="flex bg-white dark:bg-[#1f2937] justify-between w-full items-center mb-4 cursor-pointer hover:shadow-xl border-b pb-2 py-2 px-4 rounded-md">
        <div>
            <strong>Name:</strong> <?= $item['name'] ?><br>
            <strong>Price:</strong> $<?= $item['price'] ?><br>
            <strong>Quantity:</strong> <?= $item['quantity'] ?><br>
        </div>
        <div class="flex space-x-2">
            <!-- Pass the item ID as data-id attribute -->
            <a href="#" class="edit_data4 bg-blue-500 text-white px-4 py-2 rounded" data-id="<?= $item['id'] ?>">Edit</a>
            <form method="post" action="delete_item.php">
                <input type="hidden" name="item_id" value="<?= $item['id'] ?>">
                <button type="submit" name="delete" class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
            </form>
        </div>
    </li>
<?php endforeach; ?>

    </ul>

        <!--  start  modal -->
        <div id="editData4" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden w-full mx-auto px-6">
        <div class=" bg-white dark:bg-gray-500 rounded-lg shadow-lg w-full">
            <div class=" py-2 px-4 ">
                <div class="modal-header flex  mb-2 py-4 justify-between">
                    <h1 class="text-xl font-bold ">Edit Product Details</h5>
                    <button type="button" class="close " data-dismiss="modal" aria-label="Close" onclick="closeModal()">
                        <span class="font-bold text-2xl" aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body" id="info_update4">
                <?php @include("edit-stock.php");?>

                </div>

            </div>
        </div>
    </div>
    <!--   end modal -->


    <script type="text/javascript">

$(document).ready(function(){
    $(document).on('click','.edit_data4',function(){
        var edit_id4 = $(this).data('id'); // Retrieve item ID from data-id attribute
        $.ajax({
            url:"edit-stock.php",
            type:"post",
            data:{edit_id4:edit_id4},
            success:function(data){
                $("#info_update4").html(data);
                $("#editData4").removeClass('hidden');
            }
        });
    });
});



    function closeModal() {
        var modal = document.getElementById('editData4');
        modal.classList.add('hidden');
    }

</script>

</div>
        </div>
    </div>

</body>
</html>
