<?php

namespace App\view\deletarView;

class Deletar
{
    public static function exibirFormularioDeletar()
    {
?>
        <form method="post" id="formulario">
            <label for="cpf">Confirme seu CPF para continuar:</label>
            <input type="text" placeholder="CPF" name="cpf" id="cpf" required>
            <input class="enviar" type="submit" value="Confirmar!" id="enviar">
        </form>
<?php
    }
}

//Exibe o formulário de confirmação de CPF! :)
