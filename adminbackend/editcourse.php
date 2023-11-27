<?php
require 'config/database.php';

if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $departments = filter_var($_POST['departments'], FILTER_SANITIZE_NUMBER_INT);
    $faculty = filter_var($_POST['faculty'], FILTER_SANITIZE_NUMBER_INT);
    

    // validation input
    if(!$name){
        $_SESSION['editCourse'] = "Invalid form input on edit course page";
        header('location: ../admin/courses.php');
    }else{
        $query = "UPDATE courses SET name='$name',faculty_id='$faculty',department_id='$departments' WHERE id=$id LIMIT 1"; 
        $result = mysqli_query($connection,$query);

        if(mysqli_errno($connection)){
            $echo = mysqli_error($connection);
            $_SESSION['editCourse'] = $echo; 
            header('location: ../admin/courses.php');
        }
        else{
            $_SESSION['editCourse-success'] = "Course $name updated successfully"; 
            header('location: ../admin/courses.php');
        }
    }
}
header('location: ../admin/courses.php');
die();
?>