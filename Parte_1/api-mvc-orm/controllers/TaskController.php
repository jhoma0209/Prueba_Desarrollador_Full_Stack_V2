<?php

require_once __DIR__ . '/../middlewares/Validator.php';
require_once __DIR__ . '/../core/Response.php';

class TaskController {
    public function store() {
        $data = json_decode(file_get_contents("php://input"), true);

        $errors = Validator::validate([
            'description' => 'required',
            'user_id' => 'required'
        ], $data);

        if (!empty($errors)) {
            return Response::error($errors);
        }

        $task = new Task();
        $task->description = $data['description'];
        $task->user_id = $data['user_id'];
        $task->save();

        return Response::json(['id' => $task->id], 'Tarea creada', 201);
    }

    public function complete($id) {
        $repo = new TaskRepository();
        $task = $repo->find($id);

        if (!$task) {
            return Response::error([], 'Tarea no encontrada', 404);
        }

        $task->completed = 1;
        $task->save();

        return Response::json(null, 'Tarea marcada como completada');
    }

    public function destroy($id) {
        $repo = new TaskRepository();
        $task = $repo->find($id);

        if (!$task) {
            return Response::error([], 'Tarea no encontrada', 404);
        }

        $task->delete();

        return Response::json(null, 'Tarea eliminada');
    }
}
