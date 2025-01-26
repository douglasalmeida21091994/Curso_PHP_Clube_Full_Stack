<?php
require '../../../bootstrap.php';

if (isEmpty()) {
    flash('message', 'Preencha todos os campos', 'danger');
    return redirect('create_user');
}

$validate = validate([
    'nome' => 's',
    'sobrenome' => 's',
    'email' => 'e',
    'password' => 's'
]);

// Verifica se já existe um usuário com o mesmo email
$emailExiste = select('users', $validate->email);

// Verifica se o e-mail já existe
if ($emailExiste) {
    flash('message', 'Este e-mail já está cadastrado', 'danger');
    return redirect('create_user');
}

$cadastrado = create('users', $validate);

if ($cadastrado) {
    flash('message', 'Usuário cadastrado com sucesso', 'success');
    return redirect('create_user');
} else {
    flash('message', 'Erro ao cadastrar usuário', 'danger');
    return redirect('create_user');
}
?>
