<?php
if(isset($_POST['click'])){

    if(!empty($_POST['search-input'])){
        $item = $_POST['search-input'];
        $look = str_replace("", "+", $item);
        header("location:next.php?search=$look");
        
    }else{
        header("location:error.php");
    }

}

