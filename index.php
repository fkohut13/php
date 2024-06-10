<?php
namespace App;
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
    <title>Document</title>
</head>

<body>
    <?php include_once './header.php' ?>
    <main>
        <section class="inicial">
            <article>
                <h1 class="title">Lorem ipsum</h1>
                <p class="title">Dolor amet</p>
                <ul class="sub-text">
                    <li>
                        <p>Alugar</p>
                    </li>
                    <li>
                        <p>Vender</p>
                    </li>
                </ul>
            </article>
        </section>
        
        <section class="patrocinio-container">
            <article class="titulo">
                <h2>Patrocinadores</h2>
            </article>
            <article class="patrocionio">
                <div class="logo-patrocionio">
                    <img alt="">
                </div>
                <div class="logo-patrocionio">
                    <img src="assets/f2.png" alt="">
                </div>
                <div class="logo-patrocionio">
                    <img src="assets/f3.png" alt="">
                </div>
                <div class="logo-patrocionio">
                    <img src="assets/f4.png" alt="">
                </div>
                <div class="logo-patrocionio">
                    <img src="assets/f5.png" alt="">
                </div>
            </article>
        </section>
        <section class="imoveis">
            <article class="titulo">
                <h2>Imoveis populares</h2>
            </article>
            <article class="imoveis-conteudo">
                <div class="imovel-popular">
                    <img src="assets/p1.png" alt="">
                    <h5>Casa um</h5>
                    <p>1090 Pin oak Drive, Clinton, UK</p>
                    <div class="lista">
                        <a href="#" class="Conteudo">
                            <i class='bx bx-bed'></i>
                            4 Quartos
                        </a>
                        <a href="#" class="Conteudo">
                            <i class='bx bx-bath'></i>
                            2 Banheiros
                        </a>
                        <a href="#" class="Conteudo">
                            <i class='bx bx-wifi'></i>
                            Wifi 5ghz
                        </a>
                    </div>
                </div>
                <div class="imovel-popular">
                    <img src="assets/p2.png" alt="">
                    <h5>Casa dois</h5>
                    <p>1090 Pin oak Drive, Clinton, UK</p>
                    <div class="lista">
                        <a href="#" class="Conteudo">
                            <i class='bx bx-bed'></i>
                            4 Quartos
                        </a>
                        <a href="#" class="Conteudo">
                            <i class='bx bx-bath'></i>
                            2 Banheiros
                        </a>
                        <a href="#" class="Conteudo">
                            <i class='bx bx-wifi'></i>
                            Wifi 5ghz
                        </a>
                    </div>
                </div>
                <div class="imovel-popular">
                    <img src="assets/p3.png" alt="">
                    <h5>Casa tres</h5>
                    <p>1090 Pin oak Drive, Clinton, UK</p>
                    <div class="lista">
                        <a href="#" class="Conteudo">
                            <i class='bx bx-bed'></i>
                            4 Quartos
                        </a>
                        <a href="#" class="Conteudo">
                            <i class='bx bx-bath'></i>
                            2 Banheiros
                        </a>
                        <a href="#" class="Conteudo">
                            <i class='bx bx-wifi'></i>
                            Wifi 5ghz
                        </a>
                    </div>
                </div>
            </article>
        </section>
        <section class="servicos">
            <h2>Nossos serviços</h2>
            <section>
                <article class="servico">
                    <h3>Property Buying</h3>
                    <p>We help you find the perfect property that meets your needs and budget. Our team of experts will
                        guide you through the entire buying process.</p>
                </article>
                <article class="servico">
                    <h3>Property Selling</h3>
                    <p>Our selling services ensure that your property gets the best market exposure and value. We handle
                        everything from listing to closing the deal.</p>
                </article>
                <article class="servico">
                    <h3>Rental</h3>
                    <p>Our selling services ensure that your property gets the best market exposure and value. We handle
                        everything from listing to closing the deal.</p>
                </article>
            </section>
        </section>
    </main>
    <?php include_once './footer.php' ?>




</body>
<script src="index.js"></script>

</html>