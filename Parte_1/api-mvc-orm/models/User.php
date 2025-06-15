<?php
require_once __DIR__ . '/../core/Model.php';

class User extends Model {
    public $id;
    public $name;
    public $email;

    protected $table = 'users';
}
