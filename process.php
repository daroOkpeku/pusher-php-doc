<!DOCTYPE html>
<?php 
session_start();
$userName  = $_SESSION['name'];
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
       <p class="jack" id="jack"><?php echo $_GET['joke']; ?></p>
   <ul class="list">
      
   </ul>
   <form method="POST">
   <input type="text"  id="word" name="word"/>
   <button type="submit" id="send" name="send"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
   </form>
   </section>

</body>
<script>
    let btn = document.getElementById("send");
    let input = document.getElementById("word");

    btn.addEventListener("click", function(e){
      e.preventDefault();
       let see = input.value
        $.ajax({
        method: "POST",
        url: "insert.php",
         data:{
         word:see,
         guest:" <?php echo $_GET['joke']; ?> ",
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
//  console.log(members)

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


function addMember(member){
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

let dog = document.querySelector(".dog");
let mess = document.querySelector(".jack")
let list = document.querySelector(".list");
dog.addEventListener('click', function(e){
  // e.preventDefault();
  let item =  e.target.dataset.id 
     mess.innerText = item
     list.innerHTML =  "";
})


  
var channel = new Pusher('93446f0926d274083738', {
      cluster: 'us2'
    });
var ChannelData = channel.subscribe("starwars");
     ChannelData.bind('jokers-wars', function(data) {
          console.log(`starwar:${data}`);
       let {user, guest, word} =  data
       let show = ``;
       show =`
       <li>
       <small>${user}</small>
       <p>${word}</p>
       <li>`;
      $(".list").append(show);
      
    });
  

     
    var pusher1 = new Pusher('31b95d4182f02ed6754b', {
      cluster: 'eu'
    });

    var channel1 = pusher1.subscribe('Daro');
    channel1.bind('jack-ryan', function(data) {
      console.log(`daro${data}`);
        let {user, guest, word} =  data
       let show = ``;
       show =`
       <li>
       <small>${user}</small>
       <p>${word}</p>
       <li>`;
      $(".list").append(show);
    });

</script>
</html>