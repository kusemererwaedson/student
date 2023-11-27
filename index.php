<?php require 'config/database.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Student Login</title>
        <link rel="stylesheet" href="fonts/font-awesome.min.css">
        <!-- <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'> -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <link rel="stylesheet" href="css/login.css">


    </head>

    <body>
        <div class="container">
            <div class="info">
            <h1>Student Login</h1>
            </div>
        </div>
        <?php if(isset($_SESSION['signin'])){ ?>
        <div class="alert alert-danger w-25 mx-auto">
            <?= $_SESSION['signin']; 
            unset($_SESSION['signin']);
            ?> 
        </div>
        <?php } ?>
            <div class="form">
                <div class="thumbnail"><img src="images/manager.png" /></div>
                <span style="color:red;"></span>
                <span style="color:green;"></span>
                <form class="login-form" action="studentbackend/login.php" method="post">
                    <input type="email" placeholder="Email" name="email" required/>
                    <input type="password" placeholder="Password" name="password" required/>
                    <input type="submit" name="submit" value="Login" />

                </form>
            </div>
    </body>

</html>