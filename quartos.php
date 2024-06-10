<?php

namespace App;

require_once("./autoload.php");
require __DIR__ . '/view/deletarView.php';

use App\controller\AdministradorController;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <title>Document</title>
</head>
<?php include_once './header.php';
$imoveisObjetos = AdministradorController::getQuartos();


?>

<body>
    <!--Include header php-->
    <main>
        <section class="imoveis">
            <article class="titulo">
                <h2>Imoveis</h2>
            </article>
            <article class="imoveis-conteudo">
                <?php
                foreach($imoveisObjetos as $imovelobjeto) {
                    echo '<div class="imovel-popular">
                    <img src="' . $imovelobjeto['imagem1'] . '" alt="">
                    <a href="./quarto.php?id='.$imovelobjeto['id'].'"><h5> '.$imovelobjeto['titulo'] .'</h5></a>
                    <p>'.$imovelobjeto['endereco'].'</p>
                    <p>R$'.$imovelobjeto['preco'].'</p>
                    <div class="lista">
                        <a href="#" class="Conteudo">
                            <i class="bx bx-bed"></i>
                            3 Quartos
                        </a>
                        <a href="#" class="Conteudo">
                            <i class="bx bx-bath"></i>
                            2 Banheiros
                        </a>
                        <a href="#" class="Conteudo">
                            <i class="bx bx-wifi"></i>
                            Wifi 5ghz
                        </a>
                    </div>
                </div>';
                

                }
                ?>

            </article>
        </section>';
        <!--
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
            </article>-->
        <?php
        if (AdministradorController::adminLogado()) {
        ?>
            <article class="centro-btn">
                <a href="./novoimovel.php" class="btn">Adicionar imóvel</a>
            </article>
        <?php
        }
        ?>

        </section>
    </main>
    <?php include_once './footer.php' ?>
    <!--Include footer php-->

</body>
<script src="index.js"></script>

</html>