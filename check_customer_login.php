<?php

session_start();
if(isset($_SESSION['level'])) {
    $_SESSION['status'] = "fail";
    $_SESSION['message'] = "Bạn không phải là khách hàng, vui lòng đăng nhập đúng tài khoản";
    header('Location: signin.php');
    return 0;
}