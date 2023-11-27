<?php
require 'config/database.php';

if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $name = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // validation input
    if(!$name){
        $_SESSION['editFaculty'] = "Invalid form input on edit Faculty page";
        header('location: ../admin/faculties.php');
    }else{
        $query = "UPDATE faculties SET name='$name' WHERE id=$id LIMIT 1"; 
        $result = mysqli_query($connection,$query);

        if(mysqli_errno($connection)){
            $echo = mysqli_error($connection);
            $_SESSION['editFaculty'] = $echo; 
            header('location: ../admin/faculties.php');
        }
        else{
            $_SESSION['editFaculty-success'] = "Faculty $name updated successfully"; 
            header('location: ../admin/faculties.php');
        }
    }
}
header('location: ../admin/faculties.php');
die();
?>