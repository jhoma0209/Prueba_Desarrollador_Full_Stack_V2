<?php
require_once __DIR__ . '/../models/Task.php';
require_once __DIR__ . '/../core/Repository.php';

class TaskRepository extends Repository {
    public function all() {
        $stmt = $this->db->query("SELECT * FROM tasks");
        return $stmt->fetchAll(PDO::FETCH_CLASS, Task::class);
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE id = ?");
        $stmt->execute([$id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, Task::class);
        return $stmt->fetch();
    }
}
