<?php
session_start();
require('../../connect.php');
require('../check_admin_login.php');

$id = addslashes($_POST['id']);
$name = addslashes($_POST['name']);
$description = nl2br($_POST['description']);
$new_photo = $_FILES['new_photo'];
if ($new_photo['size'] > 0) {
        $folder = '../../photos/';
        $file_extension = explode('.', $new_photo['name'])[1];
        $file_name = time() . '.' . $file_extension;
        $path_file = $folder . $file_name;
        move_uploaded_file($new_photo['tmp_name'], $path_file);
} 
else {
        $file_name = $_POST['old_photo']; //string
}

$price = $_POST['price'];
$discount = $_POST['discount'];
$company_id = $_POST['company_id'];

$sql = "UPDATE products
        SET name = '$name', description = '$description', photo = '$file_name', 
            price = '$price', discount = '$discount', company_id = '$company_id'
        WHERE id = '$id'";
        
    
$query_run = mysqli_query($connect, $sql);
mysqli_close($connect);

if($query_run) {
        $_SESSION['status'] = "success";
        $_SESSION['message'] = "Cập nhật sản phẩm thành công";
        header('Location: index.php');  
}
else {
        $_SESSION['status'] = "fail";
        $_SESSION['message'] = "Cập nhật sản phẩm thất bại";
        header('Location: index.php'); 
        // return 0; 
}