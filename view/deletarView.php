<?php

namespace App\view\deletarView;

class Deletar
{
    public static function exibirConfirmacaoDeletar()
    {
    echo '
        <form method="post" id="formulario">
            <label for="cpf">Confirme seu CPF para continuar:</label>
            <input type="text" placeholder="CPF" name="cpf" id="cpf" required>
            <button id="logout" type="submit" name="cancelar_deletar">Cancelar</button>
            <br>
            <button name="confirmar_deletar" type="submit" id="deletar">Confirmar</button>
        </form>
        ';

    }
}

//Exibe o formulário de confirmação de CPF! :)
