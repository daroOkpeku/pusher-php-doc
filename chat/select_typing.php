<?php
include('connect.php');
$userName  = $_SESSION['name'];
$second =  $_GET["joke"];
$sql_select = "SELECT * FROM  pusher WHERE (user='$userName' AND guest='$second' ) OR (user='$second' AND guest='$userName')    ORDER BY  1  DESC ";
  $query_select = mysqli_query($conn, $sql_select);

$fetch = mysqli_fetch_assoc($query_select);
         
    
     
    if($userName == $fetch['guest'] && $second == $fetch['user'] && $fetch["typing"] == "yes"){
      echo "<small>  Typing....</small>";
    }

 
?>