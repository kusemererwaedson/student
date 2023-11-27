<?php
require 'config/database.php';

if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $faculty = filter_var($_POST['faculty'], FILTER_SANITIZE_NUMBER_INT);
    

    // validation input
    if(!$name){
        $_SESSION['editDepartment'] = "Invalid form input on edit course page";
        header('location: ../admin/courses.php');
    }else{
        
        $query = "UPDATE departments SET name='$name',faculty_id='$faculty' WHERE id=$id LIMIT 1"; 
        $result = mysqli_query($connection,$query);

        if(mysqli_errno($connection)){
            $echo = mysqli_error($connection);
            $_SESSION['editDepartment'] = $echo; 
            header('location: ../admin/departments.php');
        }
        else{
            $_SESSION['editDepartment-success'] = "Department $name updated successfully"; 
            header('location: ../admin/departments.php');
        }
    }
}
header('location: ../admin/departments.php');
die();
?>