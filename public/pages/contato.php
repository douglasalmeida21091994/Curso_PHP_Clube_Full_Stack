
<h2>Página de contatos</h2>

<?= getFlash('message') ?>

<form action="/pages/forms/contato.php" method="post" class="container mt-5">
    <legend>Formulário</legend>

    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Digite seu nome">
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="Digite seu e-mail">
    </div>
    <div class="form-group">
        <label for="assunto">Assunto</label>
        <input type="text" name="assunto" id="assunto" class="form-control" placeholder="Digite o assunto">
    </div>
    <div class="form-group">
        <label for="message">Mensagem</label>
        <textarea name="message" id="message" class="form-control" rows="5" placeholder="Digite sua mensagem"></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary mt-3">Enviar</button>
</form>