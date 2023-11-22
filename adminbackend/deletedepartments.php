<?php
 require 'config/database.php';

 if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //fetch user from database
    $query = "SELECT * FROM departments WHERE id=$id";
    $result = mysqli_query($connection,$query);
    $department = mysqli_fetch_assoc($result);

    //delete students from database
    $delete_department_query = "DELETE FROM departments WHERE id=$id";
    $delete_departmant_result = mysqli_query($connection,$delete_department_query);
    if (!$delete_departmant_result){
        $_SESSIOM['delete-department'] = "Couldn't delete '{$department['name']}'";
    }else{
        $_SESSION['delete-department-success'] = "'{$department['name']}' deleted successfully";
        header('location: ../admin/departments.php');
        die();
        
    }
 }else{

    header('location: ../admin/departments.php');
    die();
 }

?>