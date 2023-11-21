<?php
 require 'config/database.php';

 if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //fetch user from database
    $query = "SELECT * FROM courses WHERE id=$id";
    $result = mysqli_query($connection,$query);
    $course = mysqli_fetch_assoc($result);

    //delete students from database
    $delete_course_query = "DELETE FROM courses WHERE id=$id";
    $delete_course_result = mysqli_query($connection,$delete_course_query);
    if (!$delete_course_result){
        $_SESSIOM['delete-course'] = "Couldn't delete '{$course['name']}'";
    }else{
        $_SESSION['delete-course-success'] = "'{$course['name']}' deleted successfully";
        header('location: ../admin/courses.php');
        die();
        
    }
 }else{

    header('location: ../admin/courses.php');
    die();
 }

?>