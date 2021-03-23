<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("./search/new.php");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Law Crest</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css2/style.css?v=<?php echo time(); ?>">
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
</head>

<body class="result">

    <header>
        <div class="brand-logo">
            <h3>The Law Crest</h3>
        </div>
        <div class="search-bar">
            <form action="">
                <input type="search" name="search" id="search-bar"  value="<?php echo $search;?>"  placeholder="Ask a question...">
            </form>
        </div>
        <div class="graphics">
            <div class="square"></div>
            <div class="square"></div>
            <div class="square"></div>
            <div class="square"></div>
        </div>
    </header>


    <h3>Here are some answers to your question </h3>

    <section class="search-container" id="container">

       <?php  include("./search/data.php");
        
        ?>
    </section>
    <div class="tell">
        <button type="button" data-id="<?php echo$search;?>" id="show">show more</button>
    </div>
</body>
 <script>
$(document).ready(function(){
    $(document).on("click", "#show", function(){
      // you also use this  $("#show").attr("data-id");
        var hook = $("#show").data("id");
        
        $.ajax({
            method: "POST",
            url: "./search/hook.php",
            data:{hook:hook},
            dataType: "text",
            success: function (data) {
                $("#container").append(data)
            }
        });
       

    })
})
    </script>
</html>