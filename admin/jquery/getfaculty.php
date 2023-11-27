<?php

//connect to the database
$connection = new mysqli('localhost', 'root', '', 'student_db');

$sql = "SELECT * FROM faculties";
$result = $connection->query($sql);

$faculities = array();

while ($row = $result->fetch_assoc()) {
    $faculities[] = $row;
}

echo json_encode($faculities);

?>
