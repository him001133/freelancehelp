<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

// Include database connection
include 'db_connection.php'; // Make sure this file exists and is correct

// Fetch milestones from the database
$query = "SELECT name, amount FROM milestones";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo json_encode(["error" => "Database query failed: " . mysqli_error($conn)]);
    exit;
}

// Convert to an array
$milestones = [];
while ($row = mysqli_fetch_assoc($result)) {
    $milestones[] = $row;
}

// Close the database connection
mysqli_close($conn);

// Output JSON
echo json_encode($milestones);
?>
