<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json'); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myproject";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get task details from POST request
$task_title = $_POST['taskTitle'];
$task_description = $_POST['taskDescription'];
$task_author = $_POST['taskAuthor']; 
$task_status = 1; 

// Insert the new task into the database
$sql = "INSERT INTO tasks (task_author, task_title, task_description, task_status) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param('issi', $task_author, $task_title, $task_description, $task_status);
if ($stmt->execute()) {
    echo json_encode(['success' => true, 'task_id' => $stmt->insert_id]);
} else {
    echo json_encode(['success' => false, 'error' => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
