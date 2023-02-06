<?php
session_start();
require('connect.php');

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$dob = date('Y-m-d', strtotime($_POST['dateofbirth']));
$token = uniqid('user_', true);

$sql = "SELECT count(*) as count FROM customers
        WHERE email = '$email'";

$arr = mysqli_query($connect, $sql);
$result_rows = mysqli_fetch_array($arr)['count'];

if($result_rows != 0) {
    $_SESSION['status'] = "fail";
    $_SESSION['message'] = "Email đăng ký đã bị trùng";
    mysqli_close($connect);
    header('Location: signup.php');
    return 0;
}
else {
    $_SESSION['status'] = "success";
    $_SESSION['message'] = "Đăng ký tài khoản thành công";

    $sql_insert = "INSERT INTO customers(name, gender, birthday, email, password, phone, address, token)
                   VALUES ('$name', '$gender', '$dob', '$email', '$password', '$phone', '$address', '$token')";
    mysqli_query($connect, $sql_insert);

    //gửi mail thông báo thành công
    require('send_mail.php');
    $subject = 'Đăng ký thành công';
    $body = "Please Click on the link here: <a href='https://hacked.io' title='My Page'>Link uy tín</a>";
    email($email, $name, $subject, $body);

    $sql_select_id = "SELECT id FROM customers
        WHERE email = '$email'";
    $arr_id = mysqli_query($connect, $sql_select_id);
    $result_id = mysqli_fetch_array($arr_id)['id'];
    $_SESSION['customer_id'] = $result_id;
    $_SESSION['customer_name'] = $name;
    mysqli_close($connect);
    header('Location: index.php');
}