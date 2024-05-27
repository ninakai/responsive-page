<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproject";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the task ID and new status from the POST request
$task_id = $_POST['task_id'];
$new_status = $_POST['new_status'];

// Update the task status in the database
$sql = "UPDATE tasks SET task_status = ? WHERE task_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ii', $new_status, $task_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
