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

// dd($validate->name);

$data =[
    'quem' => $validate->name,
    'para' => $validate->email,
    'assunto' => $validate->assunto,
    'message' => $validate->message
];

// dd(send($data));


if (send($data) == true) {
    flash('message', 'E-mail enviado com sucesso', 'success');
    return redirect('contato');
} else {
    flash('message', 'Erro ao enviar e-mail', 'danger');
    return redirect('contato');
}
