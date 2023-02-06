<?php
session_start();
if(isset($_GET['type'])) {
    $type = $_GET['type'];
}

if(isset($_GET['num_page'])) {
    $num_page = $_GET['num_page'];
}

if($_SESSION['page_products'] > 1 && $type === 'before') {
    $_SESSION['page_products']--;
}
else if($_SESSION['page_products'] < $num_page && $type === 'after') {
    
    $_SESSION['page_products']++;
}

header('Location: index.php?page=' . $_SESSION['page_products']);