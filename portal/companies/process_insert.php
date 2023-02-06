<?php
require('../../connect.php');
require('../check_super_admin_login.php');

$name = addslashes($_POST['name']);
$address = addslashes(nl2br($_POST['address']));
$logo = $_FILES['logo'];
$phone = addslashes($_POST['phone']);

//chuyển ảnh vào folder logo local
$folder = 'logo/';
$file_extension = explode('.', $logo['name'])[1];
$file_name = time() . '.' . $file_extension;
$path_file = $folder . $file_name;
move_uploaded_file($logo['tmp_name'], $path_file);


$sql = "INSERT INTO companies(name, address, phone, logo)
        VALUES ('$name', '$address', '$phone', '$file_name')";

$query_run = mysqli_query($connect, $sql);
mysqli_close($connect);

if($query_run) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Thêm nhà sản xuất thành công";
        header('Location: index.php');  
}
else {
        $_SESSION['status'] = "fail";
        $_SESSION['message'] = "Thêm nhà sản xuất thất bại";
        header('Location: index.php');  
}
