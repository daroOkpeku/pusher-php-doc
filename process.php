<!DOCTYPE html>
<?php
session_start();
$userName  = $_SESSION['name'];
$userId = $_SESSION['user_id'];
include("log.php");

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
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script defer src="main.js"></script>
</head>
<body class="result" >
 

   <header>
        <div class="brand-logo">
            <h3> The Law Crest</h3>
        </div>
        <div class="search-bar">
            Welcome Mr/Mrs : <?php echo $userName; ?>
            <a href="log.php?name=<?php echo $userName; ?>"><button type="button" id="log">LogOut</button></a>
        </div>
        <div class="graphics">
            <div class="square"></div>
            <div class="square"></div>
            <div class="square"></div>
            <div class="square"></div>
        </div>
    </header>


   <section class="steve" id="steve">
     <div class="dog" id="dog">
       <!-- <aside class="inside" id="members">

       </aside> -->

       

       
     </div>
   </section>

   <section class="message">
       <p class="jack" id="jack"><?php echo $_GET["joke"]?></p>
   <ul class="list">
      
   </ul>
   <form method="POST">
   <input type="text"  id="word" name="word"/>
   <button type="submit" id="send" name="send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
   </form>
   </section>

</body>
<script>
// let kod = document.querySelector(".dog");
// let hoe = document.querySelector(".top")

// kod.addEventListener('click', function(e){
//   e.preventDefault();
//   let item =  e.target.dataset.id 
//     console.log(item)
//      $.ajax({
//         method: "POST",
//         url: "insert.php",
//         //  data:{
//         //     guest:item,
//         //    user:" <?php echo $userName; ?> "
//         //   },
//          dataType: "JSON",
//           success: function (response) {
//           }
// })
// })
    let btn = document.getElementById("send");
    let input = document.getElementById("word");
    let jack = document.querySelector(".jack");
    console.log(jack)
    btn.addEventListener("click", function(e){
      e.preventDefault();
        let item = jack.textContent
       let see = input.value
        $.ajax({
        method: "POST",
        url: "insert.php",
         data:{
         word:see,
         guest:"<?php echo $_GET["joke"]?>",
           user:" <?php echo $userName; ?> "
          },
         dataType: "JSON",
          success: function (response) {
          }
          });
          
          input.value= " ";
          })


    
/** all this code from here is working  */
Pusher.logToConsole = true;
var pusher = new Pusher('2fcf24fa16eb9c680aa3',{ authEndpoint: 'auth.php',  cluster: 'mt1' });
     
var presenceChannel = pusher.subscribe("presence-stephen");

presenceChannel.bind("pusher:subscription_succeeded", function(members){ 
 
presenceChannel.members.each(function(member) {
    addMember(member)
  
});
 
});
presenceChannel.bind('pusher:member_added', function(member) {
  // for example:
    addMember(member);
  
});


presenceChannel.bind('pusher:subscription_error', function(err) {
});

presenceChannel.bind('pusher:member_removed', function(member) {
   
  removeMember(member);
});


function addMember(member) {
 var userId = member.id;
  var userInfo = member.info;
  var {name, email, status} = userInfo
  var output = "";
  output = `
  <aside class="inside" id="${userId}">
 <a href='process.php?joke=${name}'><p data-id="${name}">${name}</p></a>
    <p > <i class="fa fa-circle" aria-hidden="true" data-id="${name}"> ${status}</i></p>
       </aside>
  `;
  $("#dog").append(output)

}

function removeMember (member) { 
    var userId = member.id;
  $(`#${userId}`).remove();

}
// let dog = document.querySelector(".dog");
// let mess = document.querySelector(".jack")

// dog.addEventListener('click', function(e){
//   e.preventDefault();
//   mess.textContent = e.target.dataset.id
// })
var channel3 = pusher.subscribe("presence-first");
channel3.bind("first", function(data){
         let {user, guest, word} =  data
       let show = ``;
       show =`
       <li>
       <small>${user}</small>
       <p>${word}</p>
       <li>`;
      $(".list").append(show);
})

  //  Pusher.channel_auth_endpoint = "auth.php";
    
    var APP_KEY = '2fcf24fa16eb9c680aa3';
    var Pusher = new Pusher(APP_KEY, { authEndpoint: 'private_auth.php',  cluster: 'mt1' });
    var channel = Pusher.subscribe('presence-destination');
    console.log(channel)
    channel.bind('pusher:subscription_succeeded', function(member) {
     channel.members.each(function(member) {
   
  
});
    

    
      // var el = document.getElementById('subscription_status');
      // el.innerText = 'Subscribed!';
      // el.className = 'subscribed';

      //  let {user, guest, word} =  data
      //  let show = ``;
      //  show =`
      //  <li>
      //  <small>${user}</small>
      //  <p>${word}</p>
      //  <li>`;
      // $(".list").append(show);
      
    });

     var channel2 = Pusher.subscribe("presence-drive");
     channel2.bind("Justice", function(data){
           console.log(data)
            let {user, guest, word} =  data
       let show = ``;
       show =`
       <li>
       <small>${user}</small>
       <p>${word}</p>
       <li>`;
      $(".list").append(show);
     })
    
    // for debugging purposes. Not required.
    // Pusher.log = function(msg) {
    //   if(window.console && window.console.log) {
    //     window.console.log(msg);
    //   }
      
    //   // var el = document.createElement('div');
    //   // el.innerText = msg;
    //   // document.getElementById('debug').appendChild(el);
    // }

  
// var ChannelData = pusher.subscribe("private-starwars");
// var privateChat ={};
//  ChannelData.bind('jokers-wars', function(data) {

// if(data.initiated_by === "<?php echo $userId; ?>" && expectingChatWith( data.chat_with )){
//    startPrivateChat( data.chat_with, data.channel-name );
// }else if( data.chat_with === "<?php echo $userId; ?>" ) {
//     // Prompt the user
//     // Note: more user info required
//     displayChatPrompt( data );
//   }
//  });

//  function startPrivateChat( withUserId, channelName ) {
//   privateChat[ withUserId ] = pusher.subscribe( channelName );
//   console.log(privateChat)

// }

 
//  var ChannelData = pusher.subscribe("private-starwars");
//      ChannelData.bind('jokers-wars', function(data) {
//          console.log(data)
//        let {user, guest, word} =  data
//        let show = ``;
//        show =`
//        <li>
//        <small>${user}</small>
//        <p>${word}</p>
//        <li>`;
//       $(".list").append(show);
      
//     });
  

    
     
    // var channel1 = pusher.subscribe('Daro');
    // channel1.bind('jack-ryan', function(data) {
    //    console.log(data)
    //     let {user,  word} =  data
    //    let goat = ``;
    //    goat =`
    //    <li>
    //    <small>${user}</small>
    //    <p>${word}</p>
    //    <li>`;
    //   $(".list").append(goat);
    // });

</script>
</html>