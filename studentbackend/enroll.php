<?php 
require '../config/database.php';

if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $sql = "UPDATE students SET reg_status='registered' WHERE id=$id LIMIT 1";
    $query = mysqli_query($connection,$sql);

    if($query){
        echo 'hello';
        header('Location: ../dashboard.php');
        $_SESSION['enroll'] = "You have been Enrolled Successfully";
    }else{
        header('Location: ../enroll.php');
        $_SESSION['enroll-failure'] = "Enrollment Failed";
    }
}else{
    header('Location: ../enroll.php');
    $_SESSION['enroll-failure'] = "Enrollment Failed";
}
?>