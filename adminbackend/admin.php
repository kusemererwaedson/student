<?php
require 'config/database.php';

if(isset($_POST['submit'])){
    //get form data
    $email = filter_var($_POST['email'],  FILTER_VALIDATE_EMAIL);
    $password = filter_var($_POST['password'],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if(!$email){
        $_SESSION['signin'] = "Email required";
    }elseif(!$password){
        $_SESSION['signin'] = "Password Required";
    }else{
        //fetch user from database
        $sql = "select * from admin where email='$email'";
        $query = mysqli_query($connection,$sql);
        if(mysqli_num_rows($query) == 1){
            // convert the record into assoc array
            $row = mysqli_fetch_assoc($query);
            $db_password = $row['password'];
            // compare form passsword database password
            if(password_verify($password, $db_password)){
                // set session for access control
                $_SESSION['user-id']=$row['id'];
                header('location: ../admin/dashboard.php');
            }else{
                $_SESSION['signin'] = "please check your input";
            }
        }else{
            $_SESSION['signin'] = "User not found";
        }
    }
    
// if any problem, redirect back to sign in page with sign in details
if(isset($_SESSION['signin'])){
    $_SESSION['signin-data'] = $_POST;
    header('location: ../admin/index.php');
    die();
}
}else{
    header('location: ../admin/index.php');
    die();
}
?>