<?php
require('../../connect.php');
require('../check_super_admin_login.php');

$id = addslashes($_POST['id']);
$name = addslashes($_POST['name']);
$address = nl2br($_POST['address']);
$new_logo = $_FILES['new_logo'];
if ($new_logo['size'] > 0) {
        $folder = 'logo/';
        $file_extension = explode('.', $new_logo['name'])[1];
        $file_name = time() . '.' . $file_extension;
        $path_file = $folder . $file_name;
        move_uploaded_file($new_logo['tmp_name'], $path_file);
} 
else {
        $file_name = $_POST['old_logo']; //string
}
$phone = $_POST['phone'];

$sql = "UPDATE companies
        SET name = '$name', address = '$address', phone = '$phone', logo = '$file_name'
        WHERE id = '$id'";

$query_run = mysqli_query($connect, $sql);
mysqli_close($connect);

if ($query_run) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Cập nhật nhà sản xuất thành công";
        header('Location: index.php');
} else {
        $_SESSION['status'] = "fail";
        $_SESSION['message'] = "Cập nhật nhà sản xuất thất bại";
        header('Location: index.php');
}
