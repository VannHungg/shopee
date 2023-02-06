<?php

session_start();
$level = $_SESSION['level'];
if($level != 1 && $level != 0) {
    $_SESSION['status'] = "fail";
    $_SESSION['message'] = "Bạn cần có quyền của admin, vui lòng đăng nhập";
    header('Location: ../signin.php');
    return 0;
}