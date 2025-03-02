<?php
include 'db_connect.php';

echo "Request method: " . $_SERVER['REQUEST_METHOD'] . "<br>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    echo "POST request received!<br>";

    if (empty($_POST)) {
        echo "No POST data received!";
        exit;
    }

    $freelancer_id = $_POST['freelancer_id'];
    $client_id = $_POST['client_id'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO milestones (freelancer_id, client_id, description, amount) 
            VALUES ('$freelancer_id', '$client_id', '$description', '$amount')";

    if ($conn->query($sql) === TRUE) {
        echo "Milestone added successfully";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Invalid request method!";
}
?>



