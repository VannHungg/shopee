<?php
require '../connect.php';
session_start();
$previous_date = $_POST['previous_date'];
$present_date = $_POST['present_date'];
$sql = "SELECT count(*) FROM bill
        WHERE time_order > '$previous_date' && time_order < '$present_date'";
$arr = mysqli_query($connect, $sql);
$result = mysqli_fetch_array($arr);
// die($result['count(*)']);
$_SESSION['num_bill'] = $result['count(*)'];
header('Location: index.php');