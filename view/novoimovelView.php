<?php

namespace App\view;

class CadastroImovel
{
    public static function formularioImovel()
    {
?>
        <div id="formulario-container">
            <section id="formulario-secao">
                <form action="?p=adicionar-imovel" method="POST" id="formulario">
                    <input type="text" id="imagem1" placeholder="Url imagem 1#" name="imagem1" required>
                    <input type="text" id="imagem2" placeholder="Url imagem 2#" name="imagem2" required>
                    <input type="text" id="imagem3" placeholder="Url imagem 3#" name="imagem3" required>
                    <input type="text" id="imagem4" placeholder="Url imagem 4#" name="imagem4" required>
                    <input type="text" id="imagem5" placeholder="Url imagem 5#" name="imagem5" required>
                    <input type="text" id="titulo" placeholder="Titulo" name="titulo" required>
                    <input type="text" id="endereco" placeholder="Endereço" name="endereco" required>
                    <input type="number" id="preco" step="0.01" id="totalAmt" placeholder="Preço R$" name="preco" required>
                    <input class="enviar" type="submit" value="Enviar informações" id="enviar">
                </form>
            </section>
        </div>

<?php
    }
}
