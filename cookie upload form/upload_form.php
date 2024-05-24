<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form with File Upload</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h2>Upload Form</h2>
    <form method="post" action="upload.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= isset($_COOKIE['name']) ? htmlspecialchars($_COOKIE['name']) : (isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '') ?>">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= isset($_COOKIE['email']) ? htmlspecialchars($_COOKIE['email']) : (isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '') ?>">
        </div>
        <div class="form-group">
            <label for="file">Upload File:</label>
            <input type="file" id="file" name="file">
        </div>
        <button type="submit">Submit</button>
    </form>

    <?php if (isset($_COOKIE['name']) && isset($_COOKIE['email']) && isset($_COOKIE['uploaded_file'])) { ?>
    <div class="output">
        <h3>Submitted Data</h3>
        <p>Name: <?= $_COOKIE['name'] ?></p>
        <p>Email: <?= $_COOKIE['email'] ?></p>
        <p>Uploaded File:</p>
        <img src="uploads/<?= $_COOKIE['uploaded_file'] ?>" alt="Uploaded Image">
    </div>
    <?php } ?> 
</div>

</body>
</html>
