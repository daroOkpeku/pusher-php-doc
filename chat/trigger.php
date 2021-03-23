<?php

include('connect.php');
$guest =   $_REQUEST["joke"];
$user =  $userName;
  

  $sql_select = "SELECT * FROM  pusher WHERE (user='$user' AND guest='$guest' ) OR (user='$guest' AND guest='$user') ORDER by 1 ASC";
  $query_select = mysqli_query($conn, $sql_select);
while( $select = mysqli_fetch_assoc($query_select)){
      $one = $select['user'];
      $two = $select['guest'];
      $speech = $select['word'];
      if ($user == $one && $guest == $two ) {
        
              echo "<li>
        <small>$one</small>
        <p>$speech</p>
          <li>";
         
          }elseif ($user == $two && $guest == $one) {
              echo "<li>
        <small>$one</small>
        <p>$speech</p>
          <li>";
          }

}
?>