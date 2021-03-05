   <?php
    $conn = mysqli_connect("localhost", "root", "", "chat");
if(mysqli_errno($conn)){
    echo"failed to connect to the DB". mysqli_errno($conn);
    mysqli_close($conn);
}

?>