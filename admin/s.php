<?php 

include "db.php";


if(isset($_POST['submit'])) {
    $eib = $_POST['editbid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE stock SET name=?, price=?, quantity=? WHERE id=?";
    $query = $conn->prepare($sql);
    $query->bind_param('siii', $name, $price, $quantity, $eib); // 'siii' indicates one string and two integers
    $query->execute();

    if ($query->affected_rows > 0) {
        echo '<script>alert("Updated successfully")</script>';
        echo "<script>window.location.href = 'manage-stock.php'</script>"; 
    } else {
        echo '<script>alert("Update failed! Please try again later")</script>';
    }
}


?>