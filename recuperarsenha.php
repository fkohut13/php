<?php
namespace App;
require __DIR__.'/view/recuperarView.php';
require_once("./autoload.php");
use App\view\recuperarView\recuperarSenha;
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
    include_once './header.php';
    recuperarSenha::recuperarSenhaFormulario(); 
    ?>
    
</body>

<script src="index.js"></script>
<?php include_once './footer.php' ?>

</html>