<?php
require('connect.php');

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM customers
        WHERE email = '$email' AND password = '$password'";
$arr = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($arr);

if ($number_rows == 1) {
    session_start();
    $user = mysqli_fetch_array($arr);
    $_SESSION['id']  = $user['id'];
    $_SESSION['name']  = $user['name'];

    header("Location: index.php");
    return 0;
}
else {
    session_start();
    $_SESSION['status'] = "fail";
    $_SESSION['message'] = "Sai tài khoản hoặc mật khẩu";
    header("Location: signin.php");
    return 0;
}

