<?php
abstract class Repository {
    protected $db;

    public function __construct() {
        $this->db = Database::connect();
    }
}
