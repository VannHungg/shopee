<?php 

session_start();
$id = $_GET['id'];

$_SESSION['cart'][$id]['quantity']++;
header('Location: viewcart.php');