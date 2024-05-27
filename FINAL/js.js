document.addEventListener('DOMContentLoaded', function () {
  const todoColumn = document.getElementById('todo');
  const inProgressColumn = document.getElementById('inProgress');
  const doneColumn = document.getElementById('done');

  // Fetch tasks from the server
  fetch('getTasks.php')
      .then(response => response.json())
      .then(tasksData => {
          console.log("Tasks Data:", tasksData); // Debugging
          tasksData.forEach(task => {
              const taskElement = createTaskElement(task);
              if (task.task_status === 'todo') {
                  todoColumn.appendChild(taskElement);
              } else if (task.task_status === 'inProgress') {
                  inProgressColumn.appendChild(taskElement);
              } else if (task.task_status === 'done') {
                  doneColumn.appendChild(taskElement);
              }
          });

          // Attach event listeners to move buttons after tasks are added
          attachMoveButtons();
      })
      .catch(error => console.error('Error fetching tasks:', error));

  // create a task element
  function createTaskElement(taskData) {
      console.log("Creating Task Element for:", taskData); // Debugging
      const taskElement = document.createElement('div');
      taskElement.classList.add('task');
      taskElement.setAttribute('data-task-id', taskData.task_id);
      taskElement.setAttribute('data-task-status', taskData.task_status);
      taskElement.innerHTML = `
          <div class="task-info">
              <div class="task-title">${taskData.task_title}</div>
              <div class="task-description">${taskData.task_description}</div>
          </div>
          <button class="move-button"> ➤ </button>
      `;
      return taskElement;
  }

  // attach event listeners to move buttons
  function attachMoveButtons() {
      const moveButtons = document.querySelectorAll('.move-button');
      moveButtons.forEach(button => {
          button.addEventListener('click', function () {
              const task = this.parentNode;
              const taskId = task.getAttribute('data-task-id');
              const currentStatus = task.getAttribute('data-task-status');
              let newStatus;

              const currentColumn = task.parentNode;
              const nextColumn = currentColumn.parentNode.nextElementSibling;
              if (nextColumn) {
                  const nextColumnTasks = nextColumn.querySelector('.tasks');
                  nextColumnTasks.appendChild(task);
                  if (nextColumnTasks.id === 'todo') {
                      newStatus = 1;
                  } else if (nextColumnTasks.id === 'inProgress') {
                      newStatus = 2;
                  } else if (nextColumnTasks.id === 'done') {
                      newStatus = 3;
                  }

                  // Update the task status attribute
                  task.setAttribute('data-task-status', newStatus);

                  // Send AJAX request to update task status in the database
                  fetch('updateTaskStatus.php', {
                      method: 'POST',
                      headers: {
                          'Content-Type': 'application/x-www-form-urlencoded'
                      },
                      body: `task_id=${taskId}&new_status=${newStatus}`
                  })
                  .then(response => response.json())
                  .then(data => {
                      if (!data.success) {
                          console.error('Error updating task status:', data.error);
                      }
                  })
                  .catch(error => console.error('Error updating task status:', error));
              }
          });
      });
  }

  // new task form
  window.showAddTaskForm = function() {
    document.getElementById('taskForm').style.display = 'block';
  }
  document.getElementById('newTaskForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(this);
    fetch('addTask.php', {
        method: 'POST',
        body: new URLSearchParams(formData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const newTask = {
                task_author: formData.get('taskAuthor'),
                task_title: formData.get('taskTitle'),
                task_description: formData.get('taskDescription'),
                task_status: 'todo'
            };
            const taskElement = createTaskElement(newTask);
            todoColumn.appendChild(taskElement);
            attachMoveButtons();
            this.reset();
            document.getElementById('taskForm').style.display = 'none';
        } else {
            console.error('Error adding task:', data.error);
        }
    })
    .catch(error => console.error('Error adding task:', error));
});
});