<?php 
require __DIR__ . '/vendor/autoload.php';
// header("Content-Type: application/json"); 
// include "Pusher.php";
session_start();
 include("connect.php");
$_SESSION['name'];
$_SESSION['user_id'];
    if (isset($_SESSION['user_id'])) {
        $sql = "SELECT * FROM users WHERE  id='".$_SESSION['user_id']."'";
        $query = mysqli_query($conn, $sql);
        $find = mysqli_fetch_assoc($query);
        $userName = $find['name'];
        $email = $find['email'];
        $userId = $find['id'];
//           $options = array(
//     'cluster' => 'mt1',
//     'useTLS' => true
//   );
        $pusher = new Pusher\Pusher(
            '2fcf24fa16eb9c680aa3',//app_key
    '18ef0d0c106ac0d2a964',//app_secret
    '1139482'//app_id
        // $options
        );
       
        $presence_data = array( 'name'=> $find['name'], 'email'=>$email,  'status'=>'online');
    
    echo $pusher->presence_auth($_POST['channel_name'], $_POST['socket_id'], $userId, $presence_data);
    //  echo $pusher->socket_auth($_POST['channel_name'], $_POST['socket_id'], $_SESSION['user_id']);
    //   $pusher->trigger($_POST['channel_name'], $_POST['socket_id'], array('user' => $user, 'guest'=>$guest, 'word'=>$word ));
    }
    else{
  header('', true, 403);
  echo( "Forbidden" );
}    
    
    
// ?>