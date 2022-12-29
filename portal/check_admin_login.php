<?php

session_start();
if(!isset($_SESSION['level'])) {
    $_SESSION['status'] = "fail";
    $_SESSION['message'] = "Bạn cần có quyền của admin, vui lòng đăng nhập";
    header('Location: ../signin.php');
    return 0;
}