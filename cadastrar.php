<?php
namespace App;
require __DIR__.'/view/administradorView.php';
require_once("./autoload.php");

use App\controller\AdministradorController as admin;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <title>Cadastro Quarto PHP</title>
</head>

<body>
    <?php
    include_once './header.php' ?>
    <div class="parent">
        <section>
            <ul class="textoul">
                <li>
                    <h1 style="font-size: 35px;"><b>Bem vindo ao Quarto PHP!</b></h1>
                </li>
                <li>
                    <p>Para <b>agilizar a abertura da sua conta</b>, tenha um documento em mãos.
                        Pode ser <b>CNH, RG ou RNE.</b> Pedimos essa informação apenas por questões
                        regulatórias. <b>Não se preocupe, seus dados estão protegidos aqui no Quarto.</b></p>
                </li>
            </ul>
            <?php
            admin::cadastrar();
            ?>
        </section>

        </form>
    </div>
</body>

<script src="index.js"></script>
<?php include_once './footer.php' ?>

</html>