<?php

session_start();
if(empty($_SESSION['level'])) {
    $_SESSION['status'] = "fail";
    $_SESSION['message'] = "Bạn cần có quyền của super admin, vui lòng đăng nhập";
    header('Location: ../signin.php');
    return 0;
}