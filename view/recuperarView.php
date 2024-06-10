<?php
namespace App\view;

class novaSenha {
    public static function recuperarSenhaFormulario(){
         ?>
        <div class="login-container">
        <form action="?p=recuperarsenha" method="post" id="loginform">
            <section>
                <ul class="textoul">
                    <li>
                        <h2 style="font-size:35px ;"><b>Esqueceu sua senha?</b></h2>
                    </li>
                    <li>
                        <p>Insira seu <b>CPF e data de nascimento</b> para cadastrar uma nova senha</b></p>
                    </li>
                </ul>
                <input type="text" placeholder="CPF" name="cpf" id="cpf" required>
                <input type="text" placeholder="Data de nascimento (dd/mm/aaaa)" name="data" id="data" required>
                <input class="enviar" type="submit" value="Entrar">
            </section>
        </form>
    </div>
    <?php
    }
    public static function redefinirsenha(){
        ?>
        <div class="login-container">
        <form action="?p=recuperarsenha" method="post" id="loginform">
            <section>
                <ul class="textoul">
                    <li>
                        <h2 style="font-size:35px ;"><b>Digite sua nova senha</b></h2>
                    </li>
                </ul>
                <input type="password" class="inputpassword" placeholder="Digite sua nova senha" name="novasenha" id="confirmarsenha" required>
                <input class="enviar" type="submit" value="Confirmar senha">
            </section>
        </form>
    </div>
    <?php
        

    }
 
}
