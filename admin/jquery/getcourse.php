<?php

//connect to the database
$connection = new mysqli('localhost', 'root', '', 'student_db');

if(!$connection){
    die(mysqli_error($connection));
}

$department_id = $_POST['department_id'];

$sql = "SELECT * FROM courses WHERE department_id = $department_id";
$result = $connection->query($sql);

$courses = array();

while ($row = $result->fetch_assoc()) {
    $courses[] = $row;
}

echo json_encode($courses);

?>
