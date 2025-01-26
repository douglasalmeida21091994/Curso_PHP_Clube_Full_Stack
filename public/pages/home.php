<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Home</title>
    <!-- jqyery, este deve ser carregado antes do DataTable e não pode haver erros no console para não interromper o carregamento -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <style>
        #dialog-modal {
            max-width: 800px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: all 0.3s;
        }

        #dialog-modal h1 {
            background-color: rgba(74, 63, 197, 0.66);
            padding: 5px;
            margin: 0;
            margin-bottom: 10px;
            border-radius: 5px;
            text-align: center;
            font-size: 1.5em;
            font-weight: bolder;
            color: #fff;
        }

        #dialog-modal p {
            padding: 10px 0px;
            font-size: 1.2em;
            text-align: justify;
        }

        #dialog-modal::backdrop {
            -webkit-backdrop-filter: blur(5px);
            backdrop-filter: blur(5px);
        }

        .close {
            text-align: center;
        }

        #fechar-modal {
            padding: 8px 15px;
            background-color: rgb(216, 56, 56);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s;
        }

        #fechar-modal:hover {
            background-color: rgb(216, 56, 56, 0.8);
        }

        #footer {
            text-align: center;
            margin-top: 10px;
            font-size: 1.1em;
            font-weight: bold;
            background: linear-gradient(135deg, rgb(75, 63, 197) 0%, rgb(79, 145, 214) 100%);
            -webkit-background-clip: text;
            color: transparent;
            opacity: .8;
        }

        .typing {
            border-right: .1em solid #000;
            white-space: nowrap;
            overflow: hidden;
        }

        /* PERSONALIZAÇÃO DA TABELA */
        #users-table thead th {
            background-color:rgba(74, 63, 197, 0.82);
            /* Azul personalizado */
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 10px;
        }

        #users-table tbody td {
            text-align: center;
            padding: 10px;
        }

        /* Linhas alternadas */
        #users-table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        #users-table tbody tr:nth-child(even) {
            background-color: #e6e6e6;
        }

        /* Hover nas linhas */
        #users-table tbody tr:hover {
            background-color: #d6d6d6;
        }

       
        /* Estilização geral dos botões de paginação */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            background-color: #4a3fc5 !important;
            /* Cor de fundo personalizada */
            color: #fff !important;
            /* Cor do texto branca */
            border: 1px solid #4a3fc5 !important;
            /* Borda com a mesma cor do fundo */
            padding: 8px 12px;
            margin: 0 3px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Estilo do botão da página atual (selecionada) */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #fff !important;
            /* Fundo branco */
            color: #000 !important;
            /* Texto preto */
            font-weight: bold;
            border: 1px solid #4a3fc5 !important;
        }

        /* Efeito hover nos botões de paginação */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background-color: #4a3fc5 !important;
            /* Mantém a cor de fundo */
            color: #fff !important;
            border-color: #4a3fc5 !important;
        }

        /* Botões desativados (quando não há mais páginas) */
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
            background-color: #4a3fc5 !important;
            /* Mantém a mesma cor para consistência */
            color: #fff !important;
            cursor: not-allowed;
            opacity: 0.6;
            /* Reduz a opacidade para indicar desativado */
        }
    </style>

</head>

<body>       

    <h2>Página Home</h2>

    <a href="?page=create_user">Cadastro de Usuário</a>
    <button id="abrir-modal">Abrir Modal</button>

    <table id="users-table" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Completo</th>
                <th>Email</th>
                <!-- <th>Telefone</th>
            <th>Endereço</th> -->
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $users = all('users');
            foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->nome . ' ' . $user->sobrenome ?></td>
                    <td><?= $user->email ?></td>
                    <!-- <td><?= $user->phone ?></td>
                <td><?= $user->address ?></td> -->
                    <td>
                        <a href="?page=edit_user&id=<?= $user->id ?>" class="btn btn-success" >Editar</a>
                        <a href="?page=delete_user&id=<?= $user->id ?>&situacao=0" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <dialog id="dialog-modal">
        <h1>TESTE DIALOG</h1>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur quisquam vel incidunt, et veritatis vitae perferendis, facere mollitia reprehenderit corporis omnis! Doloremque odit eum repellat iusto, saepe vero suscipit hic.
        </p>
        <hr>
        <div class="close"><button id="fechar-modal">Fechar Modal</button></div>
        <div id="footer"></div>
    </dialog>

    <script>
        const abrirModal = document.getElementById('abrir-modal');
        const fecharModal = document.getElementById('fechar-modal');
        const dialogModal = document.getElementById('dialog-modal');
        const footer = document.getElementById('footer');

        const data = new Date();
        const year = data.getFullYear();

        const phrases = ["Smile Saúde", "Saúde que se renova!", "Copyright © - " + year];
        let phraseIndex = 0;
        let charIndex = 0;

        function typeEffect() {
            if (charIndex < phrases[phraseIndex].length) {
                footer.innerHTML += phrases[phraseIndex].charAt(charIndex);
                charIndex++;
                setTimeout(typeEffect, 100);
            } else {
                charIndex = 0;
                phraseIndex = (phraseIndex + 1) % phrases.length;
                setTimeout(() => {
                    footer.innerHTML = '';
                    typeEffect();
                }, 3000);
            }
        }

        abrirModal.addEventListener('click', () => {
            dialogModal.showModal();
            footer.innerHTML = '';
            phraseIndex = 0;
            charIndex = 0;
            typeEffect();
        });

        fecharModal.addEventListener('click', () => {
            dialogModal.close();
        });

        $(document).ready(function() {
            $('#users-table').DataTable({
                "responsive": true, // Responsividade
                "autoWidth": false, // Evita larguras automáticas
                "lengthChange": true, // Desabilita a opção de escolher a quantidade de registros por página
                "lengthMenu": [10, 25, 50, 75, 100], // Quantidade de registros por página
                "pageLength": 10, // Quantidade de registros por página
                "searching": true, // Campo de busca
                "ordering": true, // Ordenação            
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json" // Tradução para português
                }
            });
        });
    </script>

</body>

</html>