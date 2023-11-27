<?php
 require 'config/database.php';

 if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //fetch user from database
    $query = "SELECT * FROM faculties WHERE id=$id";
    $result = mysqli_query($connection,$query);
    $faculties = mysqli_fetch_assoc($result);

    //delete students from database
    $delete_faculty_query = "DELETE FROM faculties WHERE id=$id";
    $delete_faculty_result = mysqli_query($connection,$delete_faculty_query);
    if (!$delete_faculty_result){
        $_SESSIOM['delete-faculty'] = "Couldn't delete '{$faculties['name']}'";
    }else{
        $_SESSION['delete-faculty-success'] = "'{$faculties['name']}' deleted successfully";
        header('location: ../admin/faculties.php');
        die();
        
    }
 }else{

    header('location: ../admin/faculties.php');
    die();
 }

?>