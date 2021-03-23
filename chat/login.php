<?php
session_start();
include("connect.php");
function clean($string){
  $string = stripslashes($string);
  $string  = strip_tags($string);
  $string = trim($string);
  return $string;
}
   if (isset($_POST["show"])) {
       $name = $_POST["name"];
       $pass = $_POST["Userpass"];
        $name = mysqli_real_escape_string($conn, $name);
        $pass = mysqli_real_escape_string($conn, $pass);
        $name = clean($name);
        $pass = clean($pass);
         $pass= preg_replace("/[^A-Za-z0-9]/", " ", $pass);
       //   echo json_encode(["name"=>$name, "seek"=>$pass, "socket"=>$socket_id]);
   
   

       $sql = "SELECT * FROM users  WHERE name='$name' AND userPass='$pass' ";
       $query = mysqli_query($conn, $sql);
       $row = mysqli_num_rows($query);
       if ($row > 0) {
           $fetch = mysqli_fetch_assoc($query);
           $one = $fetch['name'];
           $userId = $fetch['id'];
           $_SESSION['user_id'] = $userId;
           $_SESSION['name'] = $one;
           $joke = " ";
           header("location:process.php?joke=$joke");
       } else{
         header("location:error.php");
       }
   } 