<?php
session_start();
require('connect.php');

$email = $_POST['email'];
$password = $_POST['password'];

if(isset($_POST['remember'])) {
    $remember = true;
}
else {
    $remember = false;
}

$sql = "SELECT * FROM customers
        WHERE email = '$email' AND password = '$password'";
$arr = mysqli_query($connect, $sql);
$number_rows = mysqli_num_rows($arr);

//đăng nhập thành công
if ($number_rows == 1) {
    $user = mysqli_fetch_array($arr);
    $id = $user['id'];
    $_SESSION['customer_id']  = $id;
    $_SESSION['customer_name']  = $user['name'];
    $_SESSION['level'] = 2;

    if($remember) {
        $token = uniqid('user_', true);
        $sql_update = "UPDATE customers
                       SET token = '$token'
                       WHERE id = '$id'";
        mysqli_query($connect, $sql_update);
        //lưu lại cookie remember với value là $token
        setcookie('remember', $token, time() + (86400 * 30));
    }

    header("Location: index.php");
    return 0;
}
//đăng nhập không thành công
else {
    $_SESSION['status'] = "fail";
    $_SESSION['message'] = "Sai tài khoản hoặc mật khẩu";
    header("Location: signin.php");
    return 0;
}

