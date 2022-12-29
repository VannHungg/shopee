<?php

session_start();
$id = $_GET['id'];
$page = $_GET['page'];
unset($_SESSION['cart'][$id]);

if($page === "index") {
    header('Location: index.php');
}
else if($page === "viewcart") {
    header('Location: viewcart.php');
}