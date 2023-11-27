<?php

//connect to the database
$connection = new mysqli('localhost', 'root', '', 'student_db');

if(!$connection){
    die(mysqli_error($connection));
}

$faculty_id = $_POST['faculty_id'];

$sql = "SELECT * FROM departments WHERE faculty_id = $faculty_id";
$result = $connection->query($sql);

$departments = array();

while ($row = $result->fetch_assoc()) {
    $departments[] = $row;
}

echo json_encode($departments);

?>
