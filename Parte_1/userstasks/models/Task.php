<?php
require_once __DIR__ . '/../core/Model.php';

class Task extends Model {
    public $id;
    public $title;
    public $user_id;
    public $completed = 0;
    public $created_at;

    protected $table = 'tasks';
}
