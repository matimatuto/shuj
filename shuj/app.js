$(document).ready(function() {
  // Global Settings
  let edit = false;

  // Testing Jquery
  console.log('jquery is working!');
  $('#task-result').hide();

  // search key type event
  $('#search').keyup(function() {
    if ($('#search').val()) {
      let search = $('#search').val();
      $.ajax({
        url: 'task-search.php',
        data: { search },
        type: 'POST',
        success: function(response) {
          if (!response.error) {
            let trimmedResponse = response.trim();
            let tasks = JSON.parse(trimmedResponse);
            let template = '';
            tasks.forEach(task => {
              template +=
                `
                <li class="task-item">${task.name} ${task.description}</li>
              `;
            });
            $('#task-result').show();
            $('#container').html(template);
          }
        }
      });
    } else {
      $('#task-result').hide();
    }
  });

  $('#task-form').submit(e => {
    e.preventDefault();
    const postData = {
      name: $('#name').val(),
      description: $('#description').val(),
      id: $('#taskId').val(),
    };
    const url = edit === false ? 'task-add.php' : 'task-edit.php';
    console.log(postData, url);
    $.post(url, postData, (response) => {
      console.log(response);
      $('#task-form').trigger('reset');
      fetchTasks();
    });
    edit = false;
  });

  // Fetching Tasks
  var username; // Variable para almacenar el nombre de usuario

  $.ajax({
  url: 'get-username.php',
  method: 'GET',
  success: function(response) {
    username = response;
    if (response == "ADMIN") {
      fetchTasksAdmin(); // Llama a la función fetchTasksAdmin()
    } else {
      fetchTasks(); // Llama a la función fetchTasks()
    }
  },
  error: function(xhr, status, error) {
    console.log('Error al obtener el nombre de usuario:', error);
  }
});


  function fetchTasks() {
    $.ajax({
      url: 'tasks-list.php',
      type: 'GET',
      success: function(response) {
        const tasks = JSON.parse(response);
        let template = '';
        tasks.forEach(task => {
          template += `
          <tr taskId="${task.id}">
            <td>${task.id}</td>
            <td>${task.name}</td>
            <td>${task.description}</td>
            <td>
              <button class="task-delete btn btn-danger">
                Delete
              </button>
            </td>
            <td>
              <button class="task-item btn btn">
                Edit
              </button>
            </td>
          </tr>
        `;
        });
        $('#tasks').html(template);
      }
    });
  }

  function fetchTasksAdmin() {
    $.ajax({
      url: 'tasks-list.php',
      type: 'GET',
      success: function(response) {
        const tasks = JSON.parse(response);
        let template = '';
        tasks.forEach(task => {
          template += `
          <tr taskId="${task.id}">
            <td>${task.id}</td>
            <td>${task.usuario}</td>
            <td>${task.name}</td>
            <td>${task.description}</td>
            <td>
              <button class="task-delete btn btn-danger">
                Delete
              </button>
            </td>
            <td>
              <button class="task-item btn btn">
                Edit
              </button>
            </td>
          </tr>
        `;
        });
        $('#tasks').html(template);
      }
    });
  }

  // Get a Single Task by Id
  $(document).on('click', '.task-item', function(e) {
    const element = $(this).closest('tr');
    const id = $(element).attr('taskId');
    $.post('task-single.php', { id }, function(response) {
      console.log(response);
      const task = JSON.parse(response);
      $('#name').val(task.name);
      $('#description').val(task.description);
      $('#taskId').val(task.id);
      edit = true;
    });
    e.preventDefault();
  });

  // Delete a Single Task
  $(document).on('click', '.task-delete', function(e) {
    if (confirm('Are you sure you want to delete it?')) {
      const element = $(this).closest('tr');
      const id = $(element).attr('taskId');
      $.post('task-delete.php', { id }, function(response) {
        fetchTasks();
      });
    }
  });
});

