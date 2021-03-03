<?php 
require __DIR__ . '/vendor/autoload.php';
// header("Content-Type: application/json"); 
// include "Pusher.php";

 include("connect.php");
$_SESSION['name'];
$_SESSION['user_id'];
  
$socket_id = $_SESSION['socket'];
    if (isset($_SESSION['user_id'])) {
        $sql = "SELECT * FROM users WHERE  id='".$_SESSION['user_id']."'";
        $query = mysqli_query($conn, $sql);
        $find = mysqli_fetch_assoc($query);
        $userName = $find['name'];
        $userId = $find['id'];
        $channel = "stephen_Black";
           $options = array(
    'cluster' => 'mt1',
    'useTLS' => true
  );
        $pusher = new Pusher\Pusher(
            '2fcf24fa16eb9c680aa3',//app_key
    '18ef0d0c106ac0d2a964',//app_secret
    '1139482',//app_id
        $options
        );
       
        $presence_data = array('id'=>$userId, 'name'=> $find['name']);
    
        $pusher->presence_auth($channel,  $socket_id, $_SESSION['user_id'],  $presence_data);
         

      
    }
    
    
// ?>