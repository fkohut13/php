<?php
namespace App;
require_once("./autoload.php");
require __DIR__ . '/view/deletarView.php';
use App\controller\AdministradorController;
use App\controller\ClienteController;
use APP\dal\Clientedaoclasse;
use App\util\Functions;
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
            <div class="usuario-detalhe">
                <label for="nome">Nome:</label>
                <span id="nome"><?php echo htmlspecialchars(AdministradorController::getAtributoLogado('nome'))?></span>
                <button class="editar-btn"><i class='bx bx-edit'></i></button>
                <form class="edit-form" action="./infoLogado.php" style="display: none;" method="POST">
                    <input type="text" class="editar-atributo" name="editar-nome" value="<?php echo htmlspecialchars(AdministradorController::getAtributoLogado('nome')); ?>">
                    <button type="submit">Editar</button>
                </form>
                <?php
                if (isset($_POST['editar-nome'])) {
                    AdministradorController::editarlogado();
                    Functions::redirect("./InfoLogado.php");
                }
                ?>
            </div>
            <div class="usuario-detalhe">
                <label for="cpf">CPF:</label>
                <span id="cpf"><?php echo htmlspecialchars(AdministradorController::getAtributoLogado('cpf')); ?></span>
            </div>
            <div class="usuario-detalhe">
                <label for="datanasc">Data nascimento:</label>
                <span id="datanasc"><?php echo date("d/m/Y", strtotime(AdministradorController::getAtributoLogado('datanasc'))); ?></span>
                <button class="editar-btn"><i class='bx bx-edit'></i></button>
                <form class="edit-form" action="./infoLogado.php" style="display: none;" method="POST">
                    <input type="text" class="editar-atributo" name="editar-datanasc" value="<?php echo htmlspecialchars(AdministradorController::getAtributoLogado('datanasc')); ?>">
                    <button type="submit">Editar</button>
                </form>
                <?php
                if (isset($_POST['editar-data'])) {
                    AdministradorController::editarlogado();
                    Functions::redirect("./InfoLogado.php");
                }
                ?>
            </div>

            <div class="usuario-detalhe">
                <label for="telefone">Telefone:</label>
                <span id="telefone"><?php echo htmlspecialchars(AdministradorController::getAtributoLogado('telefone')); ?></span>
                <button class="editar-btn"><i class='bx bx-edit'></i></button>
                <form class="edit-form" action="./infoLogado.php" style="display: none;" method="POST">
                    <input type="text" class="editar-atributo" name="editar-telefone" value="<?php echo htmlspecialchars(AdministradorController::getAtributoLogado('telefone')); ?>">
                    <button type="submit">Editar</button>
                    <?php
                    if (isset($_POST['editar-telefone'])) {
                        AdministradorController::editarlogado();
                        Functions::redirect("./InfoLogado.php");
                    }
                    ?>
                </form>
            </div>
            <div class="usuario-detalhe">
                <label for="email">Email:</label>
                <span id="email"><?php echo htmlspecialchars(AdministradorController::getAtributoLogado('email')); ?></span>
                <button class="editar-btn"><i class='bx bx-edit'></i></button>
                <form class="edit-form" action="./infoLogado.php" style="display: none;" method="POST">
                    <input type="text" class="editar-atributo" name="editar-email" value="<?php echo htmlspecialchars(AdministradorController::getAtributoLogado('email')); ?>">
                    <button type="submit">Editar</button>
                    <?php
                    if (isset($_POST['editar-email'])) {
                        AdministradorController::editarlogado();
                        Functions::redirect("./InfoLogado.php");
                    }
                    ?>
                </form>
            </div>
            <div class="usuario-detalhe">
                <label for="senha">Senha:</label>
                <span id="senha"><?php echo htmlspecialchars(AdministradorController::getAtributoLogado('senha')); ?></span>
                <button class="editar-btn"><i class='bx bx-edit'></i></button>
                <form class="edit-form" action="./infoLogado.php" method="POST" style="display: none;">
                    <input type="text" class="editar-atributo" name="editar-senha" value="<?php echo htmlspecialchars(AdministradorController::getAtributoLogado('senha')); ?>">
                    <button type="submit">Editar</button>
                    <?php
                    if (isset($_POST['editar-senha'])) {
                        AdministradorController::editarlogado();
                        Functions::redirect("./InfoLogado.php");
                    }
                    ?>
                </form>
            </div>


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
            } elseif (isset($_POST['delete'])) {
                Deletar::exibirConfirmacaoDeletar();
            } elseif (isset($_POST['confirmar_deletar'])) {
                if (AdministradorController::adminLogado()) {
                    AdministradorController::deletar();
                } else {
                    ClienteController::deletar();
                }
                
            } elseif (isset($_POST['cancelar_deletar'])) {
                echo "Operação cancelada.";
                Functions::redirect("./InfoLogado.php");
            }
            ?>
        </article>
    </section>
    <?php include_once 'footer.php'; ?>

</body>

<script src="index.js"></script>

</html>
