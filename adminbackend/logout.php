<?php 
require 'config/database.php';
//destroy all session and redirect user to home page
session_destroy();
header('location: ../admin/index.php');
die();
?>