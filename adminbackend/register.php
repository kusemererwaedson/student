<?php
require 'config/database.php';

//get signup form data if signup button was clicked
 if(isset($_POST['submit'])){
    $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $regnumber = filter_var($_POST['regnumber'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);    
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $course_id = filter_var($_POST['courses'], FILTER_SANITIZE_NUMBER_INT);
    $department_id = filter_var($_POST['departments'], FILTER_SANITIZE_NUMBER_INT);
    $faculty_id = filter_var($_POST['faculty'], FILTER_SANITIZE_NUMBER_INT);
    $reg_status = filter_var($_POST['reg_status'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $year = filter_var($_POST['year'], FILTER_SANITIZE_NUMBER_INT);
    $sem = filter_var($_POST['sem'], FILTER_SANITIZE_NUMBER_INT);
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
            $user_check_query = "SELECT * FROM students WHERE email='$email'";
            $user_check_result = mysqli_query($connection,$user_check_query);
            // if($user_check_result){
            //     echo "worked";
            // }else{
            //     die(mysqli_error($connection));
            // }
            if(mysqli_num_rows($user_check_result) > 0){
                $_SESSION['signup'] = "Email already exists";
            }else{
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
    }

    // redirect back to signup page if there was any problem
    if(isset($_SESSION['signup'])){
        // pass form data back to signup page
        $_SESSION['signup-data'] = $_POST;
        header('location: ../admin/dashboard.php');
    }else{
        // insert new user into table
        $insert_user_query = "INSERT INTO students(first_name, last_name, reg_number,email, phone, avatar,reg_status, year, sem, faculty_id, department_id, course_id, password) values('$firstname','$lastname','$regnumber','$email','$phone','$avatar_name','$reg_status','$year','$sem','$faculty_id','$department_id','$course_id','$hashed_password')";
        
        $insert_user_result= mysqli_query($connection,$insert_user_query);
        if($insert_user_result){
            echo 'success';
        }else{
            die(mysqli_error($connection));
        }
        if(!mysqli_errno($connection)){
            // redirect to login page success message
            $_SESSION['signup-success'] = "Student Registration successful";
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
    $_SESSION['signup-failure'] = "Registratio failed";
    die();
 }
?>