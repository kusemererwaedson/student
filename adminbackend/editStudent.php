<?php
require 'config/database.php';

//get signup form data if signup button was clicked
 if(isset($_POST['editStudent'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $regnumber = filter_var($_POST['regnumber'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);    
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $course_id = filter_var($_POST['courses'], FILTER_SANITIZE_NUMBER_INT);
    $department_id = filter_var($_POST['departments'], FILTER_SANITIZE_NUMBER_INT);
    $faculty_id = filter_var($_POST['faculty'], FILTER_SANITIZE_NUMBER_INT);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmpassword = filter_var($_POST['passwordConfirm'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
    $avatar = $_FILES['avatar'];
    // var_dump($avatar);

    // validate input values
    if(!$firstname){
        $_SESSION['signup'] = "Please enter First Name";
    }elseif(!$lastname){
        $_SESSION['signup'] = "Please enter Last Name";
    }elseif(!$regnumber){
        $_SESSION['signup'] = "Please enter Registration number";
    }elseif(!$email){
        $_SESSION['signup'] = "Please enter a valid email";
    }elseif(!$phone){
        $_SESSION['signup'] = "Please enter Phone Number";
    }elseif(!$course_id){
        $_SESSION['signup'] = "Please enter Course";
    }elseif(!$department_id){
        $_SESSION['signup'] = "Please enter Department";
    }elseif(strlen($password) < 8){
        $_SESSION['signup'] = "Password should be 8+ characters";
    }elseif(!$avatar['name']){
        $_SESSION['signup'] = "Please add avatar";
    }else{
        //check if passwords don't match
        if($password !== $confirmpassword){
            $_SESSION['signup'] = "Passwords do not match";
        }else{
            // hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // check if email or username already exists in the database
            $user_check_query = "SELECT * FROM students WHERE id='$id'";
            $user_check_result = mysqli_query($connection,$user_check_query);
            $user_check_fetch = mysqli_fetch_assoc($user_check_result);

            $avatar_name = $user_check_fetch['avatar'];
            $avatar_path = 'images/'.$avatar_name;
            //delete image if available
            if($avatar_path){
                unlink($avatar_path);
            }

            //WORK ON AVATAR
                //rename avatar
                $time = time(); // make each image name unique using current timestamp
                $avatar_name = $time . $avatar['name'];
                $avatar_tmp_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/' . $avatar_name;

                // make sure file is an image
                $allowed_files = ['png','jpg','jpeg'];
                $extention = explode('.', $avatar_name);
                $extention = end($extention);
                if(in_array($extention, $allowed_files)){
                    // make sure is not large (1mb+)
                    if($avatar['size'] < 5000000){
                        //upload avatar
                        move_uploaded_file($avatar_tmp_name, $avatar_destination_path);
                    }else{
                        $_SESSION['signup'] = 'File size too big. Should be less than 1mb';
                        
                    }
                }else{
                    $_SESSION['signup'] = "File should be png. jpg, or jpeg";
                }              
        }
    }

    // redirect back to signup page if there was any problem
    if(isset($_SESSION['editStudent'])){
        // pass form data back to signup page
        $_SESSION['signup-data'] = $_POST;
        header('location: ../admin/dashboard.php');
    }else{
        // insert new user into table
        $insert_user_query = "UPDATE students SET first_name='$firstname', last_name='$lastname', reg_number='$regnumber',email='$email', phone='$phone', avatar='$avatar_name', faculty_id='$faculty_id', department_id='$department_id', course_id='$course_id', password='$hashed_password' WHERE id=$id LIMIT 1";
        
        $insert_user_result= mysqli_query($connection,$insert_user_query);
        if($insert_user_result){
            echo 'success';
        }else{
            die(mysqli_error($connection));
        }
        if(!mysqli_errno($connection)){
            // redirect to login page success message
            $_SESSION['editStudent-success'] = "Student Edited successful";
            header('location: ../admin/dashboard.php');
            die();

        }
        else{
            die(mysqli_error($connection));
        }
    }
 }else{
    //if button wasn't clicked, bounce back to signup page
    header('location: ../admin/dashboard.php');
    $_SESSION['Edit-failure'] = "student Edit failed";
    die();
 }
?>