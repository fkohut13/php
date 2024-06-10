<?php
require_once("./autoload.php");
use App\controller\AdministradorController;
use App\controller\ClienteController;

?>
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
            if (AdministradorController::adminLogado()) {
                $nomeUsuario = AdministradorController::getAtributoLogado('nome');
                ?>
                <li class="login"><a href="./InfoLogado.php">Minha Conta</a></li>
                <li><a href="cadastrar.php">Cadastrar Admin</a></li>
                <?php

            }  else if (AdministradorController::usuarioLogado()) {
                $nomeUsuario = AdministradorController::getAtributoLogado('nome');
                ?>
                <li class="login"><a href="./InfoLogado.php">Minha Conta</a></li>
                <li><a href="cadastrar.php">Cadastre-se</a></li>
                <?php
            }
            else {
                ?>
                <li class="login"><a href="login.php">Login <!--Icone login--></a></li>
                <li><a href="cadastrar.php">Cadastre-se</a></li>
                <?php
            }
        ?>
        
    </ul>
</nav>
<nav class="navbar lateral">
    <button class="fecharnav" onclick="fecharlateral()"><!--Icone Fechar 'X'--><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="white">
            <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z" />
        </svg></button>

    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="./quartos.php">Quartos</a></li>
        <?php
            if (AdministradorController::adminLogado()) {
                $nomeUsuario = AdministradorController::getAtributoLogado('nome');
                ?>
                <li class="login"><a href="./InfoLogado.php">Minha Conta <!--Icone login--></a></li>
                <li><a href="cadastrar.php">Cadastrar Admin</a></li>
                <?php

            }  else if (AdministradorController::adminLogado()) {
                $nomeUsuario = AdministradorController::getAtributoLogado('nome');
                ?>
                <li class="login"><a href="./InfoLogado.php">Minha Conta <!--Icone login--></a></li>
                <li><a href="cadastrar.php">Cadastre-se</a></li>
                <?php
            }
            else {
                ?>
                <li class="login"><a href="login.php">Login <!--Icone login--></a></li>
                <?php
            }
        ?>
        <li><a href="cadastrar.php">Cadastre-se</a></li>
    </ul>
</nav>