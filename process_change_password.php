<?php

$token = $_POST['token'];
$password = $_POST['password'];

require 'connect.php';
$sql = "SELECT customer_id FROM reset_password WHERE token = '$token'";
$arr = mysqli_query($connect, $sql);

if(mysqli_num_rows($arr) != 1) {
    header('Location: signin.php');
    return 0;
}

$customer_id = mysqli_fetch_array($arr)['customer_id'];
$sql = "UPDATE customers
        SET password = '$password'
        WHERE id = '$customer_id'";
mysqli_query($connect, $sql);

$sql = "DELETE FROM reset_password WHERE token = '$token'";
mysqli_query($connect, $sql);

$_SESSION['status'] = "success";
$_SESSION['message'] = "Cập nhật mật khẩu thành công";
header('Location: signin.php');