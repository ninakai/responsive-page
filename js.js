document.addEventListener('DOMContentLoaded', function () {
    const todoColumn = document.getElementById('todo');
    const inProgressColumn = document.getElementById('inProgress');
    const doneColumn = document.getElementById('done');
  
    const tasksData = [
      { id: 1, title: 'Task 1', description: 'Description of Task 1' },
      { id: 2, title: 'Task 2', description: 'Description of Task 2' },
      { id: 3, title: 'Task 3', description: 'Description of Task 3' }
    ];
  
    tasksData.forEach(task => {
      const taskElement = createTaskElement(task);
      todoColumn.appendChild(taskElement);
    });
  
    function createTaskElement(taskData) {
      const taskElement = document.createElement('div');
      taskElement.classList.add('task');
      taskElement.innerHTML = `
        <div class="task-info">
          <div class="task-title">${taskData.title}</div>
          <div class="task-description">${taskData.description}</div>
        </div>
        <button class="move-button"> ➤ </button>
      `;
      return taskElement;
    }
  
    const moveButtons = document.querySelectorAll('.move-button');
    moveButtons.forEach(button => {
      button.addEventListener('click', function () {
        const task = this.parentNode;
        const currentColumn = task.parentNode.parentNode;
        const nextColumn = currentColumn.nextElementSibling;
        if (nextColumn) {
          nextColumn.children[0].appendChild(task);
        }
      });
    });
  });

  function addTask(columnId) {
    const column = document.getElementById(columnId);
    const taskTitle = prompt("Enter task title:");
    const taskDesc = prompt("Enter task description:");
    if (taskTitle) {
      const taskElement = createTaskElement(taskTitle, taskDesc);
      column.appendChild(taskElement);
    }
  }
  
  function createTaskElement(title, description) {
    const taskElement = document.createElement('div');
    taskElement.classList.add('task');
    taskElement.innerHTML = `
    <div class="task-info">
      <div class="task-title">${title}</div>
      <div class="task-description">${description}</div>
    </div>
    <button class="move-button"> ➤ </button>
  `;
    return taskElement;
  }
  
  
  
