<?php 
require '../config/database.php';
//destroy all session and redirect user to home page

if(isset($_GET['id']))
session_destroy();
header('location: ../index.php');
die();
?>