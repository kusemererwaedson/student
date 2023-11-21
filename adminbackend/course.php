<?php
require 'config/database.php';

//get signup form data if signup button was clicked
 if(isset($_POST['submit'])){
    $course = filter_var($_POST['courseName'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $faculty = filter_var($_POST['faculties'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $departments = filter_var($_POST['departments'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // var_dump($avatar);

    // validate input values
    if(!$course){
        $_SESSION['course'] = "Please enter course Name";
    }elseif(!$faculty){
        $_SESSION['course'] = "Please enter faculty";
    }elseif(!$departments){
        $_SESSION['course'] = "Please enter Department";
    }else{
        //check if passwords don't match
        if($password !== $confirmpassword){
            $_SESSION['signup'] = "Passwords do not match";
        }else{
            
            // check if course already exists in the database
            $course_check_query = "SELECT * FROM courses WHERE name='$course'";
            $course_check_result = mysqli_query($connection,$user_check_query);
            // if($user_check_result){
            //     echo "worked";
            // }else{
            //     die(mysqli_error($connection));
            // }
            if(mysqli_num_rows($course_check_result) > 0){
                $_SESSION['course'] = "course already exists";
            }
              
        }
    }

    // redirect back to signup page if there was any problem
    if(isset($_SESSION['course'])){
        // pass form data back to signup page
        $_SESSION['course-data'] = $_POST;
        header('location: ../admin/courses.php');
    }else{
        // insert new user into table
        $insert_user_query = "INSERT INTO courses(name, faculty_id, department_id) values('$course','$faculty','$departments')";
        
        $insert_user_result= mysqli_query($connection,$insert_user_query);
        if($insert_user_result){
            $_SESSION['course-success'] = "course Inserted Successfully";
        }else{
            die(mysqli_error($connection));
        }
        if(!mysqli_errno($connection)){
            // redirect to login page success message
            $_SESSION['course-success'] = "Course Registration successful";
            header('location: ../admin/courses.php');
            die();

        }
        else{
            die(mysqli_error($connection));
        }
    }
 }else{
    //if button wasn't clicked, bounce back to signup page
    header('location: ../admin/dashboard.php');
    $_SESSION['course-failure'] = "Course Registeration failed";
    die();
 }
?>