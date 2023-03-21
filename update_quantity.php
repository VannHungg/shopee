<?php 

session_start();
$id = $_GET['id'];
$type = $_GET['type'];

if($type === 'decrease') {
    if($_SESSION['cart'][$id]['quantity'] > 1) {
        $_SESSION['cart'][$id]['quantity']--;
    }
    else {
        $_SESSION['status'] = "fail";
        $_SESSION['message'] = "Số lượng sản phẩm đã đến tối thiểu 🙂";
    }
}
else {
    if($_SESSION['cart'][$id]['quantity'] < 10) {
        $_SESSION['cart'][$id]['quantity']++;
    }
    else {
        $_SESSION['status'] = "fail";
        $_SESSION['message'] = "Bạn đặt hơi nhiều sản phẩm rồi đấy 🤑";
    }
}