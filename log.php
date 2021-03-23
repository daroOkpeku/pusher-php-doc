<?php
if(isset($_REQUEST['name'])){
    session_start();
   session_unset();
   session_destroy();
 header("location:Login.php");
 echo "<script>window.open('Login.php')</script>";
}