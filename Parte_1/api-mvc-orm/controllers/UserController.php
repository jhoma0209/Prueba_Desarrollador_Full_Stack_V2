<?php

require_once __DIR__ . '/../middlewares/Validator.php';
require_once __DIR__ . '/../core/Response.php';

class UserController {
    public function store() {
        $data = json_decode(file_get_contents("php://input"), true);
        
        $errors = Validator::validate([
            'name' => 'required',
            'email' => 'required|email'
        ], $data);

        if (!empty($errors)) {
            return Response::error($errors);
        }

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        return Response::json(['id' => $user->id], 'Usuario creado', 201);
    }

    public function index() {
        $repo = new UserRepository();
        $users = $repo->all();
        return Response::json($users, 'Usuarios obtenidos');
    }
}
