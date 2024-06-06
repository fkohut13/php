<?php
namespace App;
require_once("./autoload.php");
require __DIR__.'/view/deletarView.php';

use App\controller\AdministradorController;
use App\view\deletarView\Deletar;

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <title>Informações</title>
</head>


<body>
    <?php

    include_once 'header.php'; ?>
    <section class="infousuario">
        <article class="titulo-usuarioinfo">
            <h2>Informações do Usuário</h2>
        </article>
        <article class="detalhes-usuario">
            <label for="nome">Nome:</label>
            <span id="nome"><?php echo htmlspecialchars(AdministradorController::getAtributoUsuario('nome')); ?></span>

            <label for="cpf">CPF:</label>
            <span id="cpf"><?php echo htmlspecialchars(AdministradorController::getAtributoUsuario('cpf')); ?></span>

            <label for="datanasc">Data nascimento:</label>
            <span id="datanasc"><?php echo date("d/m/Y", strtotime(AdministradorController::getAtributoUsuario('datanasc'))); ?></span>


            <label for="telefone">Telefone:</label>
            <span id="telefone"><?php echo htmlspecialchars(AdministradorController::getAtributoUsuario('telefone')); ?></span>

            <label for="email">Email:</label>
            <span id="email"><?php echo htmlspecialchars(AdministradorController::getAtributoUsuario('email')); ?></span>

            <label for="senha">Senha:</label>
            <span id="senha"><?php echo htmlspecialchars(AdministradorController::getAtributoUsuario('senha')); ?></span>

            <form method="post" action="">
                <label class="acoes">
                    <button type="submit" name="logout" id="logout">Deslogar</button>
                </label>
                <label class="acoes">
                    <button type="submit" name="delete" id="deletar">Deletar Conta!</button>
                </label>
            </form>
            <?php
            if (isset($_POST['logout'])) {
                AdministradorController::deslogar();
            } elseif(isset($_POST['delete'])) {
                AdministradorController::deletar();
                
            }
            ?>
        </article>
    </section>
    <?php include_once 'footer.php'; ?>

</body>

<script src="index.js"></script>

</html>