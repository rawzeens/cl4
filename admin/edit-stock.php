<?php
session_start();
include('db.php');

if (empty($_SESSION)) {
    echo "No session variables set.";
} else {
    // Loop through all session variables and display them
    echo "Session variables:<br>";
    foreach ($_SESSION as $key => $value) {
        echo $key . " => " . $value . "<br>";
    
    }
}

if(isset($_POST['edit_id4'])) {
    $eid = $_POST['edit_id4'];
    $sql = "SELECT * FROM stock WHERE id=?";
    $query = $conn->prepare($sql);
    $query->bind_param('i', $eid); // 'i' indicates integer type
    $query->execute();
    $result = $query->get_result();
    $row = $result->fetch_assoc();

?>
    <form class="form-sample" method="post" action="s.php" enctype="multipart/form-data">
        <div class="mb-4">
            <div class="form-group col-md-12">
                <label class="block font-semibold">Product Name</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2 text-black font-medium" value="<?php echo $row['name']; ?>" required />
            </div>
        </div>

        <input type="text" value="<?php echo $row['id']; ?>" name="editbid" hidden>
        <div class="mb-4">
            <div class="form-group col-md-12">
                <label class="block font-semibold">Price</label>
                <input type="text" name="price" class="w-full border rounded px-3 py-2 text-black font-medium" value="<?php echo $row['price']; ?>" required>
            </div>
        </div>
        <div class="mb-4">
            <div class="form-group col-md-12 ">
                <label class="block font-semibold">Quantity</label>
                <input type="number" name="quantity" class="w-full border rounded px-3 py-2 text-black font-medium" value="<?php echo $row['quantity']; ?>" required>
            </div>
        </div>

        <div class="mb-4">
            <button type="button" class="btn btn-default py-2 px-4 text-center rounded-md bg-red-500 hover:bg-red-600" onclick="closeModal()">Cancel</button>
            <button type="submit" name="submit" class="py-2 px-4 text-center rounded-md bg-green-500 hover:bg-green-600">Update</button>

        </div>
    </form>
<?php } ?>
