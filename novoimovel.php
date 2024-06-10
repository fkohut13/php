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
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <title>Adicionar novo imóvel</title>
</head>


<body>
    <?php

    include_once 'header.php'; ?>
    <div class="parent">
        <section>
            <ul class="textoul">
                <li>
                    <h1 style="font-size: 35px;"><b>Olá Admin</b></h1>
                </li>
                <li>
                    <p>Registre aqui as informaçôes do novo imóvel</p>
                </li>
            </ul>
        </section>
        <?php
        AdministradorController::cadastroImovel();
        ?>

        <?php include_once 'footer.php'; ?>

</body>

<script src="index.js"></script>

</html>