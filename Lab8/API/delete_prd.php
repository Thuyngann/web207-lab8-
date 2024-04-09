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

if(isset($_POST['pid'])) {
    $pid = $_POST['pid'];

    $sql = "DELETE FROM prd WHERE pid = '$pid'";

    if ($conn->query($sql) === TRUE) {
        echo "Product successfully deleted.";
    } else {
        echo "Error occurred while deleting product: " . $conn->error;
    }
} else {
    echo "Required field 'pid' is missing";
}

$conn->close();
?>
