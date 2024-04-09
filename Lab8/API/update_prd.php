<?php
header('Access-Control-Allow-Origin: *');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prd";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['pid']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description'])) {
    $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $sql = "UPDATE prd SET name='$name', price='$price', description='$description' WHERE pid='$pid'";

    if ($conn->query($sql) === TRUE) {
        echo "Product successfully updated.";
    } else {
        echo "Error occurred while updating product: " . $conn->error;
    }
} else {
    echo "Required field(s) are missing";
}

$conn->close();
?>
