<?php

    $conn = mysqli_connect("localhost", "root", "", "chat");
    if(mysqli_errno($conn)){
        echo "failed to connect to DB".mysqli_errno($conn);
        mysqli_close($conn);
    }
    $zoo = mysqli_real_escape_string($conn, $_REQUEST['hook']);
     $sql_jump = "SELECT *  FROM product WHERE MATCH(name, description)  AGAINST('$zoo*' IN BOOLEAN MODE) ORDER BY name LIMIT 7 ";
     $jump = mysqli_query($conn, $sql_jump);
      

     while ($stone = mysqli_fetch_assoc($jump)){
           $dog = $stone["name"];
           $cat = $stone["description"];

        echo'<div class="search-container-item">
            <div class="search-meta">
                <span><i class="fa fa-calendar-o"></i> <span class="date">15, january 2021</span></span>
            </div>
            <div class="search-body">
                '.$dog.'
                <p>'.$cat.'</p>
            </div>
        </div>
        
        
        
        
        '
        
        
        
        ;
      }


?>