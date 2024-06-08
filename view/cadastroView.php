<?php

namespace App\view;

class CadastroView
{

    public static function formulario()
    {
?>
        <div id="formulario-container">
            <section id="formulario-secao">
                <form action="?p=cad" method="post" id="formulario">
                    <input type="text" placeholder="Nome completo" name="nome" id="nome" required>
                    <input type="text" placeholder="CPF" name="cpf" id="cpf" required>
                    <input type="text" placeholder="Data de nascimento (dd/mm/aaaa)" name="data" id="data" required>
                    <input type="tel" placeholder="Telefone celular" name="tel" id="tel" required>
                    <input type="email" placeholder="Email" name="email" id="email" required>
                    <div class="password-container">
                        <input type="password" class="inputpassword" placeholder="Senha" name="senha" id="senha" required>
                        <svg class="toggle-icon" onclick="togglePasswordVisibility('senha')" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                            <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                        </svg>
                    </div>
                    <div class="password-container">
                        <input type="password" class="inputpassword" placeholder="Confirmar senha" name="confirmarsenha" id="confirmarsenha" required>
                        <svg class="toggle-icon" onclick="togglePasswordVisibility('confirmarsenha')" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368">
                            <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z" />
                        </svg>
                    </div>
                    <input class="enviar" type="submit" value="Enviar informações" id="enviar">
                </form>
            </section>
        </div>
<?php
    }

    /*public static function listar($administradores)
    {
    ?>
        <table>
            <tr>
                <th>Nome</th>
                <th>Email</th>
            </tr>
            <?php foreach ($administradores as $admins) : ?>
                <tr>
                    <td><?= $admins->__get("nome") ?></td>
                    <td><?= $admins->__get("sobrenome") ?></td>
                    <td><?= $admins->__get("ddd") ?></td>
                    <td><?= $admins->__get("telefone") ?></td>

                    <td><a href="?p=alt&alt=<?= $admins->__get("id") ?>">Alterar</a></td>
                    <td><a href="?p=deletar&del=<?= $admins->__get("id") ?>">Excluir</a></td>
                </tr>
            <?php endforeach; ?>
        </table> 



<?php
    }*/
}
