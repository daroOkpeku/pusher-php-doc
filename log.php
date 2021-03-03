<?php
if(isset($_REQUEST['name'])){
    session_start();
   session_unset();
   session_destroy();
 header("location:item.php");
 echo "<script>window.open('item.php')</script>";
}