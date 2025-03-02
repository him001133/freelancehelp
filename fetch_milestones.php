<?php
include 'db_connect.php';

$result = $conn->query("SELECT * FROM milestones");
$milestones = [];

while ($row = $result->fetch_assoc()) {
    $milestones[] = $row;
}

echo json_encode($milestones);
?>
