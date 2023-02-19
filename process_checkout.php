<?php
require('connect.php');
session_start();

$customer_name = $_POST['customer_name'];
$customer_phone = $_POST['customer_phone'];
$customer_address = $_POST['customer_address'];

$total_price = 0;

$cart = $_SESSION['cart'];
foreach ($cart as $each) {
    $total_price += $each['quantity'] * $each['price'];
}

$customer_id = $_POST['customer_id'];
$status = 0; //mới đặt

$sql = "INSERT INTO bill(customer_id, status, customer_name,
                         customer_phone, customer_address, total_price)
        VALUES ('$customer_id', '$status', '$customer_name',
                '$customer_phone', '$customer_address', '$total_price')";

mysqli_query($connect, $sql);

$sql = "SELECT max(id) FROM bill WHERE customer_id = '$customer_id'";
$arr = mysqli_query($connect, $sql);
$bill_id = mysqli_fetch_array($arr)['max(id)'];

foreach ($cart as $product_id => $each) {
    $quantity =  $each['quantity'];
    $sql = "INSERT INTO bill_product
            VALUES ('$bill_id', '$product_id', '$quantity')";
    mysqli_query($connect, $sql);
}

mysqli_close($connect);
unset($_SESSION['cart']);

$_SESSION['status'] = "success";
$_SESSION['message'] = "Thanh toán giỏ hàng thành công";
header('Location: index.php');