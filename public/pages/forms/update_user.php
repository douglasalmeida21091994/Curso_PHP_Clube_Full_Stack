<?php
    
    require '../../../bootstrap.php';

    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    
    if (isEmpty()) {
       
        flash('message', 'Preencha todos os campos', 'danger');
    
        return redirect('edit_user&id=' . $id);
       
    }
    
    $validate = validate([
        'nome' => 's',
        'sobrenome' => 's',
        'email' => 'e',
        'password' => 's'
    ]);
    
    $atualizado = update('users', $validate);
    
    // dd($cadastrado);
    
    if ($atualizado) {
        flash('message', 'Usuário atualizado com sucesso', 'success');
        return redirect('edit_user&id=' . $id);
    } else {
        flash('message', 'Erro ao atualizar usuário', 'danger');
        return redirect('edit_user&id=' . $id);
    }   