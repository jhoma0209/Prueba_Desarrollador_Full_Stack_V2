Ruta del Proyecto Prueba_Desarrollador_Full_Stack_V2\Parte_1\userstasks

Para ejecutar el proyecto se debe hacer desde la carpeta public, con el sgt comando:

MINGW64 /c/laragon/www/userstasks/public
$ php -S localhost:8000


--> Respuesta Como mejorar la API 

Para mejorar el rendimiento de la API, se puede usar caché e índices. La caché evita repetir trabajo guardando respuestas que no cambian seguido (como una lista de usuarios), lo que hace que las respuestas sean mucho más rápidas. Y los índices en la base de datos optimizan las consultas a la base de datos, pues se va directo al dato necesitado.


Arquitectura Utilizada:

El proyecto utiliza una arquitectura modular inspirada en el patrón MVC (Modelo - Vista - Controlador), aunque no se usa vistas HTML porque es una API. También implementa el patrón Repository y un pequeño ORM.

ESTRUCTURA:

Modelos (models): representan las entidades de la base de datos como objetos PHP (por ejemplo, User y Task).

Repositorios (repositories): encapsulan el acceso a los datos (consultar, guardar, eliminar), para no depender directamente de SQL en los controladores.

Controladores (controllers): gestionan las peticiones HTTP y las operaciones entre el modelo y el repositorio.

Middlewares: validan la información antes de que llegue al controlador.

Core: contiene clases base reutilizables (como el ORM base, la clase Response, la conexión a BD).

Routes/api.php: define las rutas y asigna los controladores según el tipo de petición.

public/index.php: punto de entrada al proyecto, donde se enruta cada petición.



PATRONES DE DISEÑO UTILIZADOS:

Se implementan principalmente dos patrones:

Repository Pattern:

Permite separar la lógica de negocio (controlador) de la lógica de persistencia (base de datos).

Hace más fácil cambiar de motor de base de datos o agregar tests más adelante.

Active Record (ORM):

Cada modelo (User, Task) contiene sus atributos y métodos para guardarse, eliminarse o actualizarse a sí mismo. Este patrón se identifica, cuando se hace $user->save() o $task->delete().

Además, se implementa:

Middleware de Validación: asegura que los datos estén completos y con el formato correcto antes de procesarlos.

Clase Response: estandariza las respuestas JSON para que siempre tengan status, message y data.



FUNCIONALIDADES:

La API permite lo siguiente:

Usuarios

GET /users --> Devuelve todos los usuarios registrados.

POST /users --> Crea un nuevo usuario. Valida que se incluya nombre y email, y que el email tenga un formato correcto.

Tareas

GET /tasks --> Devuelve todas las tareas.

POST /tasks --> Crea una nueva tarea. Se valida que incluya una descripción y el ID de un usuario.

PUT /tasks/{id} --> Marca una tarea como completada (completed = 1). Valida si la tarea existe.

DELETE /tasks/{id} --> Elimina una tarea según su ID. Retorna error si la tarea no existe.