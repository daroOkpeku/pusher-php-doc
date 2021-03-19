<?php
require __DIR__ . '/vendor/autoload.php';
include('connect.php');

$guest =   $_REQUEST['guest'];
$user =  $_REQUEST['user'];
$word = $_REQUEST['word'];
  
$sql = "INSERT INTO pusher (user, guest, word) values( '$user', '$guest', '$word')";
$query = mysqli_query($conn, $sql);

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



         $pusher->trigger('presence-drive', 'Justice', array('user'=>$user, 'word'=>$word));


         ?>