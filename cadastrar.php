<?php
namespace App;

require __DIR__ . '/view/cadastroView.php';
require_once("./autoload.php");
use App\controller\AdministradorController as admin;
use App\controller\ClienteController as usuario;
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

</body>

<?php
if (Admin::adminLogado()) {
?>
    <div class="parent">
        <section>
            <ul class="textoul">
                <li>
                    <h1 style="font-size: 35px;"><b>Bem vindo Admin</b></h1>
                </li>
                <li>
                    <p>Registre aqui as informaçôes do novo Admin!</p>
                </li>
            </ul>

        </section>

        </form>
    </div>
<?php
    admin::cadastrar();
} else {
?>
    <div class="parent">
        <section>
            <ul class="textoul">
                <li>
                    <h1 style="font-size: 35px;"><b>Bem vindo ao Quarto PHP!</b></h1>
                </li>
                <li>
                    <p>Para <b>agilizar a abertura da sua conta</b>, tenha um documento em mãos.
                        Pode ser <b>CPF.</b> Pedimos essa informação apenas por questões
                        regulatórias. <b>Não se preocupe, seus dados estão protegidos aqui no Quarto.</b></p>
                </li>
            </ul>

        </section>

        </form>
    </div>
<?php
    usuario::cadastrar();
}
?>

<script src="index.js"></script>
<?php include_once './footer.php' ?>

</html>