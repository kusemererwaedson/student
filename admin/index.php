<?php
require '../adminbackend/config/database.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Admin Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/login.css">
    </head>

    <body>
        <div class="container">
            <div class="info">
            <h1>Admin Panel </h1>
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
            <div class="thumbnail"><img src="../images/manager.png" /></div>
            <span style="color:red;"></span>
            <span style="color:green;"></span>
            <form class="login-form" action="../adminbackend/admin.php" method="post">
                <input type="email" placeholder="Email" name="email" />
                <input type="password" placeholder="Password" name="password" />
                <input type="submit" name="submit" value="Login" />
            </form>
        </div>
    </body>

</html>