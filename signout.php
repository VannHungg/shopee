<?php

session_start();
unset($_SESSION['cart']);
unset($_SESSION['customer_id']);
unset($_SESSION['customer_name']);
setcookie('remember', null, -1); //thời gian trong quá khứ

header('Location: index.php');