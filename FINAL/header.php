<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kanban Task Manager</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div style="text-align:right; padding-right: 12%;">
            <?php if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
                } 
            ?>
        </div>
        <h1>Kanban Task Manager</h1>
        <nav>
            <ul>
                <li><a href="upload_form.php">Upload</a></li>
                <?php 
                    if(!isset($_SESSION["username"])){
                ?>
                    <li><a href="login_form.php">Log in</a></li>
                <?php } else { ?>
                    <li><a href="auth.php"><?=$_SESSION["username"]?></a></li>

                <?php
                    }
                ?>

            </ul>
        </nav>
    </header>