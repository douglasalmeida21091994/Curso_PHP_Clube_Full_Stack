<?= getFlash('message') ?>

<form action="/pages/forms/create_user.php" method="post">
    <legend>Cadastro de Usuário</legend>

    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome">
    </div>

    <div class="form-group">
        <label for="sobrenome">Sobrenome</label>
        <input type="text" name="sobrenome" id="sobrenome" class="form-control" placeholder="Digite seu sobrenome">
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail">
    </div>

    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="Digite sua senha">
    </div>   

    <button type="submit" class="btn btn-primary mt-3">Enviar</button>
</form>