<?php
require '../../../bootstrap.php';

if (isEmpty()) {
   
    flash('message', 'Preencha todos os campos', 'danger');

    return redirect('contato');
   
}

$validate = validate([
    'nome' => 's',
    'sobrenome' => 's',
    'email' => 'e',
    'password' => 's'
]);

$cadastrado = create('users', $validate);

if ($cadastrado) {
    flash('message', 'Usuário cadastrado com sucesso', 'success');
    return redirect('create_user');
} else {
    flash('message', 'Erro ao cadastrar usuário', 'danger');
    return redirect('create_user');
}

?>
