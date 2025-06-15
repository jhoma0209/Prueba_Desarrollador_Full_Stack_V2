<?php
require_once __DIR__ . '/../core/Model.php';

class Task extends Model {
    public $id;
    public $description;
    public $user_id;
    public $completed = 0;

    protected $table = 'tasks';
}
