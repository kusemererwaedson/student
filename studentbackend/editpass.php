<?php
require '../config/database.php';


//get signup form data if signup button was clicked
 if(isset($_POST['submitpassword'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['confirmpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // redirect back to signup page if there was any problem
    if($password !== $confirmpassword){
        header('location: ../dashboard.php');
        $_SESSION['student'] = "Passwords do not match";
    }elseif(strlen($password) < 8){
        header('location: ../dashboard.php');
        $_SESSION['student'] = "Password should be 8+ characters";
    }else{
         // hash password
         $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE students SET password='$hashed_password' WHERE id=$id LIMIT 1";
        $query = mysqli_query($connection,$sql);

        if(!$query){
            // redirect to login page success message
            $_SESSION['student'] = "Password update failed";
            header('location: ../dashboard.php');
            die();

        }
        else{
            $_SESSION['student-success'] = "Password updated";
            header('location: ../dashboard.php');
            die();
        }
    }
 }else{
    //if button wasn't clicked, bounce back to signup page
    header('location: ../dashboard.php');
    die();
 }

?>