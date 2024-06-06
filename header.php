<nav class="navbar">
    <button class="abrirnav" onclick="abrirlateral()">
        <!--Icone abrir nav--><svg xmlns="http://www.w3.org/2000/svg" height="40px" viewBox="0 -960 960 960" width="40px" fill="#e8eaed">
            <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
        </svg>
    </button>
    <a href="index.php"><img class="logo" src="assets/logo (2).png"></a>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="./quartos.php">Quartos</a></li>
        <?php

use App\controller\AdministradorController;

            if (AdministradorController::usuarioLogado()) {
                $nomeUsuario = AdministradorController::getAtributoUsuario('nome')
                ?>
                <li class="login"><a href="./InfoLogado.php">Ola <?php echo ($nomeUsuario); ?>! <!--Icone login--></a></li>
                <?php

            } else {
                ?>
                <li class="login"><a href="login.php">Login <!--Icone login--><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#e8eaed">
                    <path d="M480-120v-80h280v-560H480v-80h280q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z" />
                </svg></a></li>
                <?php
            }
        ?>
        <li><a href="cadastrar.php">Cadastre-se</a></li>
        
    </ul>
</nav>
<nav class="navbar lateral">
    <button class="fecharnav" onclick="fecharlateral()"><!--Icone Fechar 'X'--><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="white">
            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
        </svg></button>

    <ul>
        <li><a href="index.php">Home</a></li>
        <li class="login"><a href="login.php'">Login<!--Icone login--><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px" fill="#e8eaed">
                    <path d="M480-120v-80h280v-560H480v-80h280q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z" />
                </svg></a></li>
        <li><a href="cadastrar.php">Cadastre-se</a></li>
    </ul>
</nav>