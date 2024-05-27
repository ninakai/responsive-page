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
            <button class="add-task-btn" onclick="showAddTaskForm()"> ✚ </button>
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
    <div class="container" id="taskForm" style="display:none;">
        <h3>Add New Task</h3>
        <form id="newTaskForm">
            <label for="taskTitle">Title:</label>
            <input type="text" id="taskTitle" name="taskTitle" required><br>
            <label for="taskDescription">Description:</label>
            <textarea id="taskDescription" name="taskDescription" required></textarea><br>
            <input type="hidden" id="taskAuthor" name="taskAuthor" value="<?php echo $_SESSION['user_id'] ?>">
            <input type="hidden" id="taskStatus" name="taskStatus" value="1">
            <button type="submit" class="add-task-btn">Add Task</button>
        </form>
    </div>
</body>
</html>
<script src="js.js"></script>
<script src="/3333.js"></script>
