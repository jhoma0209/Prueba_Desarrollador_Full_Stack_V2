<?php
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../controllers/TaskController.php';

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', trim($uri, '/'));

header("Content-Type: application/json");


if ($segments[0] === 'users') {
    $controller = new UserController();

    if ($method === 'GET') $controller->index();
    elseif ($method === 'POST') $controller->store();
    else notFound();

} elseif ($segments[0] === 'tasks') {
    $controller = new TaskController();

    if ($method === 'GET') $controller->index();
    elseif ($method === 'POST') $controller->store();
    elseif ($method === 'PUT' && isset($segments[1])) $controller->complete($segments[1]);
    elseif ($method === 'DELETE' && isset($segments[1])) $controller->destroy($segments[1]);
    else notFound();
} else {
    notFound();
}

function notFound() {
    http_response_code(404);
    echo json_encode(["error" => "Not found"]);
}
