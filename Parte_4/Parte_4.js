const tasks = [
{ id: 1, title: "Task 1", completed: true },
{ id: 2, title: "Task 2", completed: false },
];

function filtrarTareas (tasks, estado){
  if(estado === 'all'){
    return tasks;
  } else if(estado === 'completed'){
    return tasks.filter(task => task.completed === true);
  } else if (estado === 'pending'){
    return tasks.filter(task => task.completed === false);
  } else {
    console.log("Filtro no válido");
    return [];
  }
}


filtrarTareas(tasks,'all')

filtrarTareas(tasks,'completed')

filtrarTareas(tasks,'pending')
