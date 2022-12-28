<?php
session_start();
// unset($_SESSION['cart']);
$id = $_GET['id'];

//nếu cart trống
if(empty($_SESSION['cart'][$id])) {
    require('connect.php');
    $sql = "SELECT *FROM products WHERE id = '$id'";
    $arr = mysqli_query($connect, $sql);
    $result = mysqli_fetch_array($arr);
    $_SESSION['cart'][$id]['name'] = $result['name'];
    $_SESSION['cart'][$id]['photo'] = $result['photo'];
    $_SESSION['cart'][$id]['price'] = $result['price'];
    $_SESSION['cart'][$id]['quantity'] = 1;
}
else {
    $_SESSION['cart'][$id]['quantity']++;
}

echo json_encode(($_SESSION['cart']));