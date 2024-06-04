<?php
namespace App\controller;
use App\util\Functions as Util;
use App\model\Administrador;
use App\dal\AdministradorDao;
use App\util\Caixas as Cx;
use App\view\AdministradorView;
use App\view\loginView\Login;
use \Exception;

abstract class AdministradorController{
    private static $msg = null;

    public static function cadastrar(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["nome"])) {
            [$nome, $cpf, $data, $tel, $email, $senha] = array_map([Util::class, 'prepararTexto'], array_values($_POST));

            $dataformatada = Util::prepararData($data);

            /* Validações */

            $admin = new Administrador();
            $admin-> iniciar(nome: $nome, cpf: $cpf, data: $dataformatada, tel: $tel, email: $email, senha: $senha);
           

            try{
                AdministradorDao::cadastrar($admin);
                echo Cx::caixaSucesso("Cadastrado com sucesso!");
                
            }catch(Exception $e){
                self::$msg = $e->getMessage();
            }

        }
        AdministradorView::formulario();
    }

    public static function logar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["email"])) {
            $email = Util::prepararTexto($_POST["email"]);
            $senha = Util::prepararTexto($_POST["senha"]);
        
            try {
                if (AdministradorDao::logar($email, $senha)) {
                    // Login bem-sucedido
                    echo Cx::caixaSucesso("Logado com sucesso!");
                    $admindata = AdministradorDao::retornaAdmin($email);
                    $admin = new Administrador();
                    $admin-> iniciar($admindata['id'],$admindata['nome'],$admindata['cpf'],$admindata['datanasc'],$admindata['telefone'],$admindata['email'],$admindata['senha']);

                } else {
                    ?>
                    <button class="popuperro" id="popuperro">Email ou senha incorretos!</button>
                    <script>
                        setTimeout(function() {
                        var errorButton = document.getElementById('popuperro');
                        if (errorButton) {
                        errorButton.style.opacity = '0%';
                        }
                        }, 2000);
                    </script>
                    <?php
                }
            } catch(Exception $e) {
                self::$msg = $e->getMessage();
            }
        }
        Login::loginFormulario();


    }











    public static function listar(){
        $clientes = AdministradorDao::listar();

        AdministradorView::listar($clientes);
    }

}


