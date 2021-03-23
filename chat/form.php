<?php
include('connect.php');
if (isset($_POST['send'])) {
    $guest =   $_REQUEST['joke'];
    $user =  $userName;
    $word = $_POST['word'];
  
    $sql = "INSERT INTO pusher (user, guest, word) values( '$user', '$guest', '$word')";
    $query = mysqli_query($conn, $sql);
}


   
   
?>