<?php
session_start();
 
$name = $_POST['name'];
$email = $_POST['email'];

// Set cookies for name and email
setcookie('name', $name); 
setcookie('email', $email);

// File upload handling
if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $uploadFileDir = './uploads/';
    $destPath = $uploadFileDir . $fileName;

    // Create uploads directory if it does not exist
    if (!is_dir($uploadFileDir)) {
        mkdir($uploadFileDir, 0777, true);
    }

    // Move the file to the upload directory
    if (move_uploaded_file($fileTmpPath, $destPath)) {
        // Set cookie for uploaded file
        setcookie('uploaded_file', $fileName); 
    } else {
        echo 'Error moving the file to the upload directory.';
    }
}

// Redirect back to the form page
header('Location: upload_form.php');
exit();

