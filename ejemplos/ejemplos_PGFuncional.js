const tasks = [
{ id: 1, title: "Task 1", completed: true },
{ id: 2, title: "Task 2", completed: false },
{ id: 3, title: "Task 3", completed: true},
{ id: 4, title: "Task 4", completed: false },
{ id: 5, title: "Task 5", completed: false },
{ id: 6, title: "Task 6", completed: false },
{ id: 7, title: "Task 7", completed: false },
{ id: 8, title: "Task 8", completed: false },
{ id: 9, title: "Task 9", completed: false },
{ id: 10, title: "Task 10", completed: false },
];

// tasks.forEach((task) => console.log(task.title))

tasks.forEach((task) => {
    if(task.completed){
      console.log(task.title + ' completado')
    } else {
      console.log(task.title + ' incompleto')
    }
})

// 

const personas = [
  {nombre: 'Ana', edad: 25},
  {nombre: 'Mariam', edad: 19},
  {nombre: 'Juan', edad: 30},
  {nombre: 'Melany', edad: 24},|
  {nombre: 'Óscar', edad: 40},
];

let personasMayoresOIguales30 = [];
let personasMenoresA30 = [];

personas.forEach( persona => {
  if(persona.edad >= 30) {
    persona.bono = true
    personasMayoresOIguales30.push(persona)
  } else {
    persona.bono = false
    personasMenoresA30.push(persona)
  }
});

personasMayoresOIguales30
personasMenoresA30



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
