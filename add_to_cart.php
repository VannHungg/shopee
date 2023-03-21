<?php
session_start();
$id = $_GET['id'];
// $page = $_GET['page'];

//nếu cart trống
if (empty($_SESSION['cart'][$id])) {
    require('connect.php');
    $sql = "SELECT *FROM products WHERE id = '$id'";
    $arr = mysqli_query($connect, $sql);
    $num_rows_result = mysqli_num_rows($arr);
    if ($num_rows_result > 0) {
        $result = mysqli_fetch_array($arr);
        $_SESSION['cart'][$id]['name'] = $result['name'];
        $_SESSION['cart'][$id]['photo'] = $result['photo'];
        $_SESSION['cart'][$id]['price'] = $result['price'];
        $_SESSION['cart'][$id]['quantity'] = 1;
    } else {
        //không phải là sản phẩm trong db
        $_SESSION['status'] = "fail";
        $_SESSION['message'] = "Sản phẩm vừa chọn không có trên shop";
        header('Location: index.php');
        return 0;
    }
} else {
    $_SESSION['cart'][$id]['quantity']++;
}

$_SESSION['status'] = "success";
$_SESSION['message'] = "Thêm sản phẩm vào giỏ hàng thành công";
// header('Location: index.php?page=' . $page);
header('Location: index.php');