
<?= getFlash('message') ?>

<?php
    // find('users', $_GET['id']);

    $user = find('users', $_GET['id']);
?>

<form action="/pages/forms/update_user.php" method="post">
    <legend>Atualização de Usuário</legend>

    <div class="form-group">
        <label for="nome">Nome</label>
        <input style="opacity: 0.7;" type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome" value="<?= $user->nome ?>" disabled>
    </div>

    <input type="hidden" name="id" value="<?= $user->id ?>">

    <div class="form-group">
        <label for="sobrenome">Sobrenome</label>
        <input style="opacity: 0.7;" type="text" name="sobrenome" id="sobrenome" class="form-control" placeholder="Digite seu sobrenome" value="<?= $user->sobrenome ?>" disabled>
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail" value="<?= $user->email ?>">
    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Digite sua nova senha">
    </div>   

    <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
    <button class="btn btn-success"><a href="page=home" >Voltar</a></button>
</form>
