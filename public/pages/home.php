<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Home</title>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <style>
        /* General Layout Adjustments */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0px 0px 20px 0px;
        }

        h2 {
            text-align: center;
            font-size: 2em;
            color: #4a3fc5;
            margin-top: 20px;
        }

        .button-container {
            text-align: center;
            margin-bottom: 20px;
        }

        a,
        button {
            font-size: 1em;
            text-decoration: none;
            padding: 12px 20px;
            color: #fff;
            background-color: #4a3fc5;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: all 0.3s;
            margin: 10px;
        }

        a:hover,
        button:hover {
            background-color: #6b52b6;
        }

        /* Table Styles */
        #users-table {
            width: 100%;
            margin: 0 auto;
            border-collapse: collapse;
        }

        #users-table thead th {
            background-color: rgba(74, 63, 197, 0.82);
            color: white;
            font-weight: bold;
            text-align: center;
        }

        /* Afasta o botão de procurar 10px da tabela */
        .dataTables_filter {
            margin-bottom: 10px;
        }

        .dataTables_filter input {
            margin-left: 10px;
            width: 500px;
        }

        #users-table tbody td {
            text-align: center;
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }

        /* Alternating Row Colors */
        #users-table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        #users-table tbody tr:nth-child(even) {
            background-color: #f0f0f0;
        }

        /* Hover Effect */
        #users-table tbody tr:hover {
            background-color: #d6d6d6;
        }

        /* Modal Styles */
        #dialog-modal {
            max-width: 800px;
            border-radius: 8px;
            border: none;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        #dialog-modal h1 {
            background-color: rgba(74, 63, 197, 0.9);
            padding: 12px;
            margin: 0;
            border-radius: 5px 5px 0 0;
            text-align: center;
            font-size: 1.5em;
            font-weight: bolder;
            color: #fff;
        }

        #dialog-modal p {
            padding: 15px;
            font-size: 1.1em;
            text-align: justify;
        }

        #dialog-modal::backdrop {
            backdrop-filter: blur(5px);
        }

        .close {
            text-align: center;
            margin-top: 20px;
        }

        #fechar-modal {
            padding: 12px 20px;
            background-color: rgb(216, 56, 56);
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        #fechar-modal:hover {
            background-color: rgb(216, 56, 56, 0.8);
        }

        /* Footer Typing Effect */
        #footer {
            text-align: center;
            margin-top: 20px;
            font-size: 1.2em;
            font-weight: bold;
            color: rgba(74, 63, 197, 0.8);
        }

        .typing {
            border-right: .1em solid #000;
            white-space: nowrap;
            overflow: hidden;
        }


        .container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            /* padding: 0 15px; */

        }

        /* Botões de navegação do DataTables */
        .dataTables_paginate .paginate_button {
            background-color: #e0e0e0;
            color: #333;
            border: 1px solid #ddd;
            /* padding: 8px 16px; */
            margin: 0 2px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Estilo do botão da página atual - mais escuro */
        .dataTables_paginate .paginate_button.current {
            background-color: #4a3fc5;
            color: white;
            border: 1px solid #4a3fc5;
        }

        /* Hover para os botões de navegação */
        .dataTables_paginate .paginate_button:hover {
            background-color: #b0b0b0;
            color: #fff;
        }

        /* Ajuste de foco nos botões de navegação */
        .dataTables_paginate .paginate_button:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(74, 63, 197, 0.5);
        }

        /* LOADING */
        .loader {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: inline-block;
            border-top: 4px solid #FFF;
            border-right: 4px solid transparent;
            box-sizing: border-box;
            animation: spin  1s linear infinite;
        }

        .loader::after {
            content: '';
            box-sizing: border-box;
            position: absolute;
            left: 0;
            top: 0;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            border-left: 4px solid #FF3D00;
            border-bottom: 4px solid transparent;
            animation: spin  0.5s linear infinite reverse;
        }

        @keyframes spin  {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

</head>

<body>
   
    <h2>Página Home</h2>

    <div class="button-container">
        <a href="?page=create_user">Cadastro de Usuário</a>
        <button id="abrir-modal">Abrir Modal</button>
    </div>

    <span class="loader" id="loading"></span>

    <table id="users-table" display class="content" style="display: none;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Completo</th>
                <th>Email</th>
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
                    <td>
                        <a href="?page=edit_user&id=<?= $user->id ?>" class="btn btn-success">Editar</a>
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
                "responsive": true,
                "autoWidth": false,
                "lengthChange": true,
                "lengthMenu": [10, 25, 50, 75, 100],
                "pageLength": 10,
                "searching": true,
                "ordering": true,
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pt-BR.json"
                }
            });
        });

        // Aguarda o carregamento da página
        window.addEventListener("load", function() {
            // Esconde o loader
            document.getElementById("loading").style.display = "none";
            // Exibe o conteúdo principal
            document.querySelector(".content").style.display = "";
        });
        
    </script>

</body>

</html>