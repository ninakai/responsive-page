<?php
session_start();
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

$userId = $_SESSION['user_id'];
$sql = "SELECT task_id, task_author, task_title, task_description, task_status FROM tasks WHERE task_author = $userId;";
$result = $conn->query($sql);

$tasks = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        switch ($row['task_status']) {
            case 1:
                $row['task_status'] = 'todo';
                break;
            case 2:
                $row['task_status'] = 'inProgress';
                break;
            case 3:
                $row['task_status'] = 'done';
                break;
        }
        $tasks[] = $row;
    }
}
$conn->close();

header('Content-Type: application/json'); 
echo json_encode($tasks);
?>