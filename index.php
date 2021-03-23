<!DOCTYPE html>
<html lang="en">
    <?php 
session_start();
?>
<?php include("./search/law.php")?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Law Crest</title>
     <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css2/style.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
</head>

<body>

    <div class="search">
        <h1 class="search-heading">The Law Crest</h1>
        <!-- <p class="search-subheading">Looking for answers? Just ask the ask the question.</p> -->

        <div class="search-form">
            <form method="POST">
                <input type="search" name="search-input" id="search-input" autocomplete="off"
                    placeholder="Ask a question...">
                <button type="submit" name="click"><i class="fa fa-search" aria-hidden="true"></i></button>
                <div class="feed" id="feed">
                  <?php   include("./search/action.php"); 
        
         
         ?>
                </div>
            </form>
        </div>
    </div>





</body>
<script>
$(document).ready(function () {
    $("#search-input").keyup(function (e) { 
        var joke = $("#search-input").val();
        if(joke.length > 0){
            $.ajax({
                method: "POST",
                url: "./search/action.php",
                data: {
                    times:1,
                    word:joke,
                },
                
                success: function (data) {
                    $("#feed").html(data);
                   
                }, 
                dataType: "text",
            });
        }else if(joke.length == ""){
           $("#feed").html("")
        }
    });
  ////another
  
});
</script>
</html>