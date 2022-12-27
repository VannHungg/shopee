<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);
setcookie('remember', null, -1); //thời gian trong quá khứ

header('Location: index.php');