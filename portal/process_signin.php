<?php
session_start();
require('../connect.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT *FROM admin 
        WHERE email = '$email' AND password = '$password'";
$arr = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($arr);

if($number_rows == 1) {
    $result = mysqli_fetch_array($arr);
    $_SESSION['id'] = $result['id'];
    $_SESSION['name'] = $result['name'];
    $_SESSION['level'] = $result['level'];
    header('Location: index.php');
    return 0;
}
else {
    $_SESSION['status'] = "fail";
    $_SESSION['message'] = "Sai tài khoản hoặc mật khẩu";
    header('Location: signin.php');
    return 0;
}
