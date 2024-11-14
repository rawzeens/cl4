<!-- db.php -->

<?php

$servername = "sql203.infinityfree.com";
$username = "if0_36233764";
$password = "OXxgXxT8UiqSo98";
$dbname = "if0_36233764_cl4";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
