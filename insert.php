<?php
require __DIR__ . '/vendor/autoload.php';
include('connect.php');
$guest =   $_REQUEST['guest'];
$user =  $_REQUEST['user'];
$word = $_REQUEST['word'];


$sql = "INSERT INTO pusher (user, guest, word) values( '$user', '$guest', '$word')";
$query = mysqli_query($conn, $sql);
  $options = array(
    'cluster' => 'us2',
    'useTLS' => true
  );
$pusher = new Pusher\Pusher(
           '93446f0926d274083738',
    '486ba266e3046713143d',
    '1164015', 
    $options
        );



  $option = array(
    'cluster' => 'eu',
    'useTLS' => true
  );
  $push = new Pusher\Pusher(
    '31b95d4182f02ed6754b',
    '80287b06e29f1c93c298',
    '1170178',
    $option
  );
         
$sql_select = "SELECT * FROM  pusher WHERE (user='$user' AND guest='$guest' ) OR (user='$guest' AND guest='$user') ORDER by 1 ASC";
$query_select = mysqli_query($conn, $sql_select);
$select = mysqli_fetch_assoc($query_select);
   $one = $select['user'];
   $two = $select['guest'];
   $speech = $select['word'];
   
   
     $pusher->trigger('starwars', 'jokers-wars', array('user' => $user,  'word'=>$word ));
 
   

       $push->trigger('Daro', 'jack-ryan', array( 'guest'=>$guest,  'word'=>$word ));
   
  

 

?>