<?php

namespace App;

require_once("./autoload.php");

use App\controller\AdministradorController;
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
    include_once './header.php'; ?>
    <?php
    AdministradorController::recuperarsenha();
    ?>

</body>

<script src="index.js"></script>
<?php include_once './footer.php' ?>

</html>