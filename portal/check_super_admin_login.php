<?php

session_start();
$level = $_SESSION['level'];
if($level != 1) {
    $_SESSION['status'] = "fail";
    $_SESSION['message'] = "Bạn cần có quyền của super admin, vui lòng đăng nhập";
    header('Location: ../signin.php');
    return 0;
}