<?php
session_start();
$search = '';

if(isset($_GET['search'])) {
    $search = $_GET['search'];
    array_push($_SESSION['history_search'], $search);
}

header('Location: index.php?search=' . $search);