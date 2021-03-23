<?php 
session_start();
include("./connect.php");
$typing = $_REQUEST['typing'];
$userName  = $_SESSION['name'];
$second = $_SESSION['joke'];
$sql = "UPDATE pusher set typing='$typing' WHERE user='$userName' ";
$query =  mysqli_query($conn, $sql);



?>