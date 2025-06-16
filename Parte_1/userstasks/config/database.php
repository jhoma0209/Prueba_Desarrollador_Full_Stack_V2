<?php
class Database {
    public static function connect() {
        $host = 'localhost';
        $db = 'api_demo';
        $user = 'root';
        $pass = 'root';
        $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";
        return new PDO($dsn, $user, $pass);
    }
}
