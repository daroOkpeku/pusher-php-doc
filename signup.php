<!DOCTYPE html>
<html lang="en">
    <?php 
session_start();
?>
<?php include("./search/extract.php")?>
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
    <section class="sun"> <h1>The Law Crest</h1>
</section>
    
 <div class="all">
     
        <form method="POST">
            <div class="form">
                <label class="content">
                    <span class="name">full name</span>
                </label>
                <input type="text" name="name" placeholder="enter your full name" autocomplete="off" required />
            </div>

            <div class="form">
                <label class="content">
                    <span class="name">username</span>
                </label>
                <input type="text" name="username" placeholder="enter your username" autocomplete="off" required />
            </div>

            <div class="form">
                <label class="content">
                    <span class="name">Email</span>
                </label>
                <input type="text" name="email" placeholder="enter your email address" autocomplete="off" required />
            </div>



            <div class="form">
                <label class="content">
                    <span class="name">phoneNumber</span>
                </label>
                <input type="tel" name="phone" placeholder="enter your phone number" autocomplete="off" required />
            </div>

            <div class="form">
                <label class="content">
                    <span class="name">password</span>
                </label>
                <input type="password" name="userPass" placeholder="enter your password" autocomplete="off" required />
            </div>
            <button type="submit" class="click" name="click">sign-up</button>
        </form>
        <h2 class="already">Already have an account? <a href="login.php">Sign in</a></h2>
    </div>
    
</body>
</html>