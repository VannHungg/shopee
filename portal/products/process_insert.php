<?php
require('../check_admin_login.php');
session_start();
$name = addslashes($_POST['name']);
$description = addslashes(nl2br($_POST['description']));
$photo = $_FILES['photo']; //trả về một arr
$price = addslashes($_POST['price']);
$discount = addslashes($_POST['discount']);
$company_id = addslashes($_POST['company_id']);

//chuyển ảnh vào folder photos local
$folder = '../../photos/';
$file_extension = explode('.', $photo['name'])[1];
$file_name = time() . '.' . $file_extension;
$file_path = $folder . $file_name;

move_uploaded_file($photo['tmp_name'], $file_path);

require('../../connect.php');

$sql = "INSERT INTO products(name, description, photo, price, discount, company_id)
        VALUES ('$name', '$description', '$file_name', '$price', '$discount', '$company_id')";
    
$query_run = mysqli_query($connect, $sql);
mysqli_close($connect);

if($query_run) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Thêm sản phẩm thành công";
        header('Location: index.php');  
}
else {
        $_SESSION['status'] = "fail";
        $_SESSION['message'] = "Thêm sản phẩm thất bại";
        header('Location: index.php');  
}