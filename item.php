<!DOCTYPE html>
<html lang="en">
<?php
include("login.php");
   ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>"/>
     <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
</head>
<body>
     <div class="all">
        <form method="POST" >
            <div class="form">
                <label class="content">
                    <span class="name">Name</span>
                </label>
                <input type="text" name="name" id="name" placeholder="enter your full name"  />
            </div>

            <div class="form">
                <label class="content">
                    <span class="name">password</span>
                </label>
                <input type="password" name="Userpass" id="Userpass"  placeholder="enter your Address"  />
            </div>

            
            <button type="Submit" class="click"  id="show" name="show" data-id="me">enter</button>
       </form>
    </div>

</body>
<script>
// var channel = pusher.subscribe('stephen');
// // Pusher.channel_auth_endpoint = '/process.php';
//   var pusher = new Pusher('2fcf24fa16eb9c680aa3', {
//       cluster: 'mt1',
//       authEndpoint:'/process.php',
//       forceTLS:true
//     });

    $(document).ready(function(){
        // { authEndpoint: 'auth.php' }
    var pusher = new Pusher('2fcf24fa16eb9c680aa3');
    var socketId = null;
    pusher.connection.bind('connected', function(data){
    socketId = pusher.connection.socket_id;
  $("input").keyup(function(){
    //    var name = $("#name").val();
    //   var seek = $("#Userpass").val();
    $.ajax({
        method: "POST",
        url: "form.php",
        data: {
        //    name:name,
        //    seek:seek,
           
           socket_id:socketId
        },
        
        // dataType: "dataType",
        // success: function (response) {
            
        // }
    });
    })
     
    })
    })


</script>
</html>