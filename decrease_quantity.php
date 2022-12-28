<?php 

session_start();
$id = $_GET['id'];

if($_SESSION['cart'][$id]['quantity'] > 1) {
    $_SESSION['cart'][$id]['quantity']--;
}
else {
    $_SESSION['status'] = "fail";
    $_SESSION['message'] = "Số lượng sản phẩm đã đến tối thiểu";
}

header('Location: viewcart.php');