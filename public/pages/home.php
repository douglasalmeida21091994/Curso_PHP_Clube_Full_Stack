<Style>
    #dialog-modal {
        max-width: 800px;
        border-radius: 5px;
        border: 1px solid #ccc;
        transition: all 0.3s;
    }
    #dialog-modal h1 {
        background-color:rgba(74, 63, 197, 0.66);
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
        background-color:rgb(216, 56, 56);
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s;
    }

    #fechar-modal:hover {
        background-color:rgb(216, 56, 56, 0.8);
    }

    #footer {
        text-align: center;
        margin-top: 10px;
        font-size: 1.1em;
        font-weight: bold;
        background: linear-gradient(135deg, rgb(75,63,197) 0%, rgb(79,145,214) 100%);
        -webkit-background-clip: text;
        color: transparent;
        opacity: .8;
    }

    .typing {
        border-right: .1em solid #000;
        white-space: nowrap;
        overflow: hidden;
    }
</Style>

<h2>Página Home</h2>

<a href="?page=create_user">Cadastro de Usuário</a>

<button id="abrir-modal">Abrir Modal</button>

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

    const phrases = ["Smile Saúde", "Saúde que se renova!", "Copyrigth © - " + year];
    let phraseIndex = 0;
    let charIndex = 0;

    function typeEffect() {
        if (charIndex < phrases[phraseIndex].length) {
            footer.innerHTML += phrases[phraseIndex].charAt(charIndex);
            charIndex++;
            setTimeout(typeEffect, 130);
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
    
</script>