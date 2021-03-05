<!DOCTYPE html>
<?php 
session_start();
 
$userName  = $_SESSION['name'];

include("log.php");
// include("display.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
     <script type="text/javascript" src="jquery-3.5.1.js"></script>
     <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <link rel="stylesheet" href="./main.css?v=<?php echo time(); ?>">
    <script defer src="main.js"></script>
</head>
<body class="result" >
 

   <header>
        <div class="brand-logo">
            <h3>Law Crest</h3>
        </div>
        <div class="search-bar">
            Welcome Mr/Mrs : <?php echo $userName; ?>
            <a href="log.php?name=<?php echo $userName; ?>"><button type="button">LogOut</button></a>
        </div>
        <div class="graphics">
            <div class="square"></div>
            <div class="square"></div>
            <div class="square"></div>
            <div class="square"></div>
        </div>
    </header>


   <section class="steve">
     <div class="dog" id="dog">
       <aside class="inside" id="members">

       </aside>

       

       
     </div>
   </section>

   

</body>
<script>
    $(document).ready(function(){
//      $.ajax({
//     method: "GET",
//     url: "user_config.php",
//     data: "data",
//     dataType: "JSON",
//     success: function(data){
//       console.log(data)
//     }

// })
// $(document).ready(function(){
//   $.ajax({
//     method: "GET",
//     url: "display.php",
//     data: "data",
//     dataType: "JSON",
//     success: function (response) {
//       var output = ``;
//        response.map((item)=>{
//         var {email, name, login, phoneNumber } = item
//         output = `
//          <aside class="inside">
//          <p>
//          <a href='process.php?name=${name}'><h2>${name}</h2></a>
//          <h2>${email}</h2>
//          <h2>${login}</h2>
//            <h2> ${phoneNumber}</h2>
//            </p>
        
           
//        </aside>
//         `;
      
//        $("#dog").append(output)
//        })
//     }
//   });
// })
// fetch('user_config.php').then(res=> res.json()
//  ).then(Response=>{
//   console.log(Response)
//  })
/** all this code from here is working  */
Pusher.logToConsole = true;
var pusher = new Pusher('2fcf24fa16eb9c680aa3',{ authEndpoint: 'auth.php',  cluster: 'mt1' });
     
var presenceChannel = pusher.subscribe("presence-stephen");
presenceChannel.bind("pusher:subscription_succeeded", function(members){ 
 
});


})

</script>
</html>