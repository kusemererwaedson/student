<?php
require 'config/database.php';

//get signup form data if signup button was clicked
 if(isset($_POST['submit'])){
    $faculty = filter_var($_POST['faculties'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $departments = filter_var($_POST['departments'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // var_dump($avatar);

    // validate input values
    if(!$faculty){
        $_SESSION['department'] = "Please enter Faculty Name";
    }elseif(!$departments){
        $_SESSION['department'] = "Please enter Department";
    }else{
        //check if passwords don't match
        if($password !== $confirmpassword){
            $_SESSION['signup'] = "Passwords do not match";
        }else{
            
            // check if course already exists in the database
            $course_check_query = "SELECT * FROM departments WHERE name='$faculty'";
            $course_check_result = mysqli_query($connection,$user_check_query);
            // if($user_check_result){
            //     echo "worked";
            // }else{
            //     die(mysqli_error($connection));
            // }
            if(mysqli_num_rows($course_check_result) > 0){
                $_SESSION['department'] = "department already exists";
            }
              
        }
    }

    // redirect back to signup page if there was any problem
    if(isset($_SESSION['department'])){
        // pass form data back to signup page
        $_SESSION['department-data'] = $_POST;
        header('location: ../admin/departments.php');
    }else{
        // insert new user into table
        $insert_user_query = "INSERT INTO departments(name, faculty_id) values('$departments','$faculty')";
        
        $insert_user_result= mysqli_query($connection,$insert_user_query);
        if($insert_user_result){
            $_SESSION['department-success'] = "department Inserted Successfully";
        }else{
            die(mysqli_error($connection));
        }
        if(!mysqli_errno($connection)){
            // redirect to login page success message
            $_SESSION['department-success'] = "Department Registration successful";
            header('location: ../admin/departments.php');
            die();

        }
        else{
            die(mysqli_error($connection));
        }
    }
 }else{
    //if button wasn't clicked, bounce back to signup page
    header('location: ../admin/departments.php');
    $_SESSION['department-failure'] = "Department Registeration failed";
    die();
 }
?>