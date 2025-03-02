<?php
ob_start(); // Start output buffering to prevent unwanted output
header("Content-Type: application/json");

// Debugging: Remove any PHP errors from breaking JSON
error_reporting(E_ALL);
ini_set('display_errors', 0); // Set to 1 if debugging locally

// Include database connection
if (!file_exists('db_connection.php')) {
    echo json_encode(["error" => "Database connection file not found"]);
    exit;
}

include 'db_connection.php';

if (!$conn) {
    echo json_encode(["error" => "Database connection failed: " . mysqli_connect_error()]);
    exit;
}

// Fetch milestones
$query = "SELECT name, amount FROM milestones";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo json_encode(["error" => "Database query failed: " . mysqli_error($conn)]);
    exit;
}

// Convert to JSON
$milestones = [];
while ($row = mysqli_fetch_assoc($result)) {
    $milestones[] = $row;
}

// Ensure no extra output before JSON
ob_clean();
echo json_encode($milestones);
exit;
?>
