<?php

require('../../connect.php');
$id = $_GET['id'];
$status = $_GET['status'];

$sql = "UPDATE bill 
        SET status = '$status'
        WHERE id = '$id'";
mysqli_query($connect, $sql);
mysqli_close($connect);

header('Location: index.php');