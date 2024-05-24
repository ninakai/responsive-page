<?php
session_start();
?>
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
        <div style="text-align:right; padding-right: 12%; z-index: 1000;">
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
                    <li><a href="logout.php"><?=$_SESSION["username"]?></a></li>

                <?php
                    }
                ?>

            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="tabs">
            <button class="tablink" onclick="openTab(event, 'Column1')">Column 1</button>
            <button class="tablink" onclick="openTab(event, 'Column2')">Column 2</button>
            <button class="tablink" onclick="openTab(event, 'Column3')">Column 3</button>
        </div>
    </div>
    <div class="container">
        <div id="Column1" class="column">
            <div class="tasks" id="todo">
                <h2>To Do</h2>
                <!-- -->
            </div>
            <button onclick="addTask('todo')">Add Task</button>
        </div>
        <div id="Column2" class="column">
            <div class="tasks" id="inProgress">
                <h2>In Progress</h2>
                <!-- -->
            </div>
        </div>
        <div id="Column3" class="column">
            <div class="tasks" id="done">
                <h2>Done</h2>
                <!-- -->
            </div>
        </div>
    </div>
</body>
</html>
<script src="js.js"></script>
<script src="/3333.js"></script>
