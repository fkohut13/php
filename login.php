<?php 
namespace App;
require __DIR__.'/view/loginView.php';
require_once("./autoload.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <title>Login Quarto PHP</title>
</head>
    

<body>
    <?php
    use App\controller\AdministradorController;
    include_once 'header.php';
    AdministradorController::logar();
    include_once 'footer.php'?>
    
</body>

<script src="index.js"></script>

</html>