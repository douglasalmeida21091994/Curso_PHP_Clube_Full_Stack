<?php
// require '../../../bootstrap.php';

// Captura os parâmetros da URL via GET
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$situacao = filter_input(INPUT_GET, 'situacao', FILTER_VALIDATE_INT);

if ($id === null || $situacao === null) {
    flash('message', 'ID ou Situação não fornecidos', 'danger');
    return redirect('home');
}

$deletado = delete('users', $id, $situacao);

if ($deletado) {
    flash('message', 'Usuário deletado com sucesso', 'success');
    return redirect('home');
} else {
    flash('message', 'Erro ao deletar usuário', 'danger');
    return redirect('home');
}
// ?>