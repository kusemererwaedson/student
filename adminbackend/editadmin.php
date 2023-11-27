<?php
require 'config/database.php';

//get signup form data if signup button was clicked
 if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];
    // var_dump($avatar);

    // validate input values
    if(!$email){
        $_SESSION['admin'] = "Please enter email";
    }else{            
            // check if email or username already exists in the database
            $user_check_query = "SELECT * FROM admin WHERE id='$id'";
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
                        $_SESSION['admin'] = 'File size too big. Should be less than 1mb';
                        
                    }
                }else{
                    $_SESSION['admin'] = "File should be png. jpg, or jpeg";
                }              
        
    }

    // redirect back to signup page if there was any problem
    if(isset($_SESSION['admin'])){
        // pass form data back to signup page
        $_SESSION['editStudent-data'] = $_POST;
        header('location: ../admin/settings.php');
    }else{
        // insert new user into table
        $insert_user_query = "UPDATE admin SET email='$email', avatar='$avatar_name' WHERE id=$id LIMIT 1";
        
        $insert_user_result= mysqli_query($connection,$insert_user_query);
        if($insert_user_result){
            echo 'success';
        }else{
            die(mysqli_error($connection));
        }
        if(!mysqli_errno($connection)){
            // redirect to login page success message
            $_SESSION['admin-success'] = "Admin Edited successful";
            header('location: ../admin/settings.php');
            die();

        }
        else{
            die(mysqli_error($connection));
        }
    }
 }else{
    //if button wasn't clicked, bounce back to signup page
    header('location: ../admin/settings.php');
    $_SESSION['Edit-admin'] = "Admin Edit failed";
    die();
 }

 ?>