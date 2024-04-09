<?php
//chon full quyen truy cap
header('Access-Control-Allow-Origin: *');
//khai bao thong tin server
$ser="localhost";
$u="root";
$p="";
$db="prd";
//ket noi voi csdl
$conn=new mysqli($ser,$u,$p,$db);
//kiem tra tham so truyem
if(isset($_POST['name'])&&
    isset($_POST['price'])&&
    isset($_POST['description'])) {
    //nhan gia tri tu tham so truyen
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    //khai bao lenh thuc thi
    $sql = "INSERT INTO prd (name, price, description) VALUES ('$name', '$price', '$description')";
    //thuc thi lenh
    if ($conn->query($sql) === TRUE) {
        echo "Product successfully created.";
    } else {
        echo "Error occurred while creating product: " . $conn->error;
    }
} else {
    // If required fields are missing, set error response
    echo "Required field(s) is missing";
}

//dong ket noi
$conn->close();
?>
