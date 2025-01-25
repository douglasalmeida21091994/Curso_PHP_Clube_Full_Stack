<?php
require '../../../bootstrap.php';

if (isEmpty()) {
   
    flash('message', 'Preencha todos os campos', 'danger');

    return redirect('contato');
   
}

$validate = validate([
    'name' => 's',
    'email' => 'e',
    'assunto' => 's',
    'message' => 's'
]);

dd($validate->name);
