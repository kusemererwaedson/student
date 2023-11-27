<?php
require 'config/database.php';

//get signup form data if signup button was clicked
 if(isset($_POST['submit'])){
    $faculty = filter_var($_POST['faculties'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // var_dump($avatar);

    // validate input values
    if(!$faculty){
        $_SESSION['faculty'] = "Please enter Faculty Name";
    }else{

    // redirect back to signup page if there was any problem
    if(isset($_SESSION['faculty'])){
        // pass form data back to signup page
        $_SESSION['faculty-data'] = $_POST;
        header('location: ../admin/faculties.php');
    }else{

         // check if course already exists in the database
         $course_check_query = "SELECT * FROM faculties WHERE name='$faculty'";
         $course_check_result = mysqli_query($connection,$user_check_query);
         if(mysqli_num_rows($course_check_result) > 0){
             $_SESSION['faculty'] = "faculty already exists";
         }else{
        // insert new user into table
        $insert_user_query = "INSERT INTO faculties(name) values('$faculty')";
        
        $insert_user_result= mysqli_query($connection,$insert_user_query);
        if($insert_user_result){
            $_SESSION['faculty-success'] = "faculty Inserted Successfully";
        }else{
            die(mysqli_error($connection));
        }
        if(!mysqli_errno($connection)){
            // redirect to login page success message
            $_SESSION['faculty-success'] = "faculty Registration successful";
            header('location: ../admin/faculties.php');
            die();

        }
        else{
            die(mysqli_error($connection));
        }
    }
    }
}
 }
?>