<?php
session_start();
require('../../connect.php');
$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id = '$id'";
$query_run = mysqli_query($connect, $sql);
mysqli_close($connect);

if($query_run) {
    $_SESSION['status'] = "success";
    $_SESSION['message'] = "Xóa sản phẩm thành công";
    header('Location: index.php');  
}
else {
    $_SESSION['status'] = "fail";
    $_SESSION['message'] = "Xóa sản phẩm thất bại";
    header('Location: index.php');  
}