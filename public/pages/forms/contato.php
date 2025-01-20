<?php
require '../../../bootstrap.php';

dd($_POST);

$validate = validate([
    'name' => 's',
    'email' => 'e',
    'assunto' => 's',
    'message' => 's'
]);
