<?php
session_start();
require('connect.php');

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phone'])
 && isset($_POST['address']) && isset($_POST['gender']) && isset($_POST['dateofbirth'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $dob = date('Y-m-d', strtotime($_POST['dateofbirth']));
    $token = uniqid('user_', true);
}
else {
    echo "Bạn phải điền đầy đủ thông tin";
    return 0;
}
// $name = $_POST['name'];
// $email = $_POST['email'];
// $password = $_POST['password'];
// $phone = $_POST['phone'];
// $address = $_POST['address'];
// $gender = $_POST['gender'];
// $dob = date('Y-m-d', strtotime($_POST['dateofbirth']));
// $token = uniqid('user_', true);

$sql = "SELECT count(*) as count FROM customers
        WHERE email = '$email'";

$arr = mysqli_query($connect, $sql);
$result_rows = mysqli_fetch_array($arr)['count'];

if($result_rows != 0) {
    echo "Email đăng ký đã bị trùngg";
    mysqli_close($connect);
    return 0;
}
else {
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
    echo "1";
}