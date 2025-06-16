<?php
require_once __DIR__ . '/../config/database.php';

abstract class Model {
    protected $db;
    protected $table;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function save() {
        $vars = get_object_vars($this);
        unset($vars['db'], $vars['table']);

        $columns = array_keys($vars);
        $placeholders = array_map(fn($col) => ":$col", $columns);

        if (!isset($this->id)) {
            $sql = "INSERT INTO {$this->table} (" . implode(',', $columns) . ") VALUES (" . implode(',', $placeholders) . ")";
        } else {
            $sets = array_map(fn($col) => "$col = :$col", $columns);
            $sql = "UPDATE {$this->table} SET " . implode(', ', $sets) . " WHERE id = :id";
            $vars['id'] = $this->id;
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($vars);

        if (!isset($this->id)) {
            $this->id = $this->db->lastInsertId();
        }
    }

    public function delete() {
        if (!isset($this->id)) return false;
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = ?");
        return $stmt->execute([$this->id]);
    }
}
