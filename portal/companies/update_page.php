<?php
session_start();
if(isset($_GET['type'])) {
    $type = $_GET['type'];
}

if(isset($_GET['num_page'])) {
    $num_page = $_GET['num_page'];
}

if($_SESSION['page_companies'] > 1 && $type === 'before') {
    $_SESSION['page_companies']--;
}
else if($_SESSION['page_companies'] < $num_page && $type === 'after') {
    $_SESSION['page_companies']++;
}

header('Location: index.php?page=' . $_SESSION['page_companies']);