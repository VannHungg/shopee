<?php
session_start();
require('connect.php');

$customer_id = $_POST['customer_id'];
$customer_name = $_POST['customer_name'];
$customer_email = $_POST['customer_email'];
$customer_phone = $_POST['customer_phone'];
$customer_gender = $_POST['customer_gender'];
$dob = date('Y-m-d', strtotime($_POST['customer_dateofbirth']));
$customer_new_photo = $_FILES['customer_new_photo'];

if ($customer_new_photo['size'] > 0) {
    $folder = 'photos/';
    $file_extension = explode('.', $customer_new_photo['name'])[1];
    $file_name = time() . '.' . $file_extension;
    $path_file = $folder . $file_name;
    move_uploaded_file($customer_new_photo['tmp_name'], $path_file);
} else {
    $file_name = $_POST['customer_old_photo'];
}

$sql = "UPDATE customers
        SET name = '$customer_name', gender = '$customer_gender', 
            birthday = '$dob', email = '$customer_email', 
            photo = '$file_name', phone = '$customer_phone'
        WHERE id = '$customer_id'";
$query = mysqli_query($connect, $sql);

if ($query == true) {
    $_SESSION['status'] = 'success';
    $_SESSION['message'] = "Cập nhật thông tin thành công";
    $sql = "SELECT photo FROM customers
        WHERE id = '$customer_id'";
    $arr = mysqli_query($connect, $sql);
    $customer_photo = mysqli_fetch_array($arr)['photo'];
    $_SESSION['customer_photo'] = $customer_photo;
    $_SESSION['customer_name'] = $customer_name;
    header('Location: profile.php');
} else {
    $_SESSION['status'] = 'error';
    $_SESSION['message'] = "Lỗi hệ thống, xin vui lòng thử lại sau";
    header('Location: profile.php');
}
