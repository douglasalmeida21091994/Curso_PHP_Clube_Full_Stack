<?= getFlash('message') ?>

<?php
    $user = find('users', $_GET['id']);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h3>Atualização de Usuário</h3>
                </div>
                <div class="card-body">
                    <form action="/pages/forms/update_user.php" method="post">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input style="opacity: 0.7;" type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome" value="<?= $user->nome ?>" disabled>
                        </div>

                        <input type="hidden" name="id" value="<?= $user->id ?>">

                        <div class="form-group mt-3">
                            <label for="sobrenome">Sobrenome</label>
                            <input style="opacity: 0.7;" type="text" name="sobrenome" id="sobrenome" class="form-control" placeholder="Digite seu sobrenome" value="<?= $user->sobrenome ?>" disabled>
                        </div>

                        <div class="form-group mt-3">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail" value="<?= $user->email ?>" required>
                        </div>

                        <div class="form-group mt-3">
                            <label for="password">Senha</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Digite sua nova senha">
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                            <a href="page=home" class="btn btn-secondary">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
