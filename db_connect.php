<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "sql300.infinityfree.com"; // Replace with actual MySQL host
$username = "if0_38404209"; // Replace with actual username
$password = "HtUDsfZDCpHIC3"; // Replace with actual password
$dbname = "if0_38404209_freelance"; // Replace with actual DB name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connected successfully!";
}
?>
