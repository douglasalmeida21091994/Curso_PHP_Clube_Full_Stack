<?php
require '../../../bootstrap.php';

// dd($_SERVER['REQUEST_METHOD']);

// dd($_POST);

$validate = validate([
    'name' => 's',
    'email' => 'e',
    'assunto' => 's',
    'message' => 's'
]);

dd($validate->name);
