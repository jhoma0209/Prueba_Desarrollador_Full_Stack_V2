<?php

class Response {
    public static function json($data = null, $message = '', $status = 200) {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => $status,
            'message' => $message,
            'data' => $data
        ]);
    }

    public static function error($errors = [], $message = 'Error de validación', $status = 400) {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => $status,
            'message' => $message,
            'errors' => $errors
        ]);
    }
}
