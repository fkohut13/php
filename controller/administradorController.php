<?php
namespace App\controller;
use App\util\Functions as Util;
use App\model\Administrador;
use App\dal\AdministradorDao;
use App\util\Caixas as Cx;
use App\view\AdministradorView;
use App\view\deletarView\Deletar;
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
                echo Cx::caixaSucesso("Cadastrado com sucesso!", 3);
                
            }catch(Exception $e){
                self::$msg = $e->getMessage();
            }

        }
        AdministradorView::formulario();
    }

    public static function paginalogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["email"])) {
            $email = Util::prepararTexto($_POST["email"]);
            $senha = Util::prepararTexto($_POST["senha"]);
            try {
                if (AdministradorDao::logar($email, $senha)) {
                    echo Cx::caixaSucesso("Logado com sucesso!", 3);
                    $_SESSION['logado'] = true;
                    $usuarioInfo = AdministradorDao::retornaAdmin($email);
                    $_SESSION['usuario_info'] = $usuarioInfo;
                    header("Location: ./index.php");

                } else {
                    echo Cx::caixaErro("Email ou senha incorretos!!", 3);

                }
            } 
            catch(Exception $e) {
                self::$msg = $e->getMessage();
            }
            

        }
           
        Login::loginFormulario();
        
    }
    public static function deletar() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["cpf"])) {
            $cpf_form = Util::prepararTexto($_POST['cpf']);
            $cpf_db = AdministradorController::getAtributoUsuario('cpf');
            if ($cpf_db == $cpf_form) {
                echo "Existe";
                echo "<p>Cpf formulario = " . $cpf_form . "</p>";
                echo "<p>Cpf banco de dados = " . $cpf_db . "</p>";
            }
            else 
                echo"Nope";
            
        }
        Deletar::exibirFormularioDeletar();
    }

  
    public static function usuarioLogado() {
        Util::startSession();
        return isset($_SESSION['logado']) && $_SESSION['logado'] === true;
    }
    public static function getAtributoUsuario(string $atributo) {
        Util::startSession(); 
        return isset($_SESSION['usuario_info']) ? $_SESSION['usuario_info'][$atributo] : '';
    }
    public static function deslogar() {
        Util::startSession();
        $_SESSION['usuario_info'] = array();
        session_destroy();
        $_SESSION['logado'] = false;
        header("Location: ./login.php");
        exit();
    }
    

    






/*  $admindata = AdministradorDao::retornaAdmin($email);
                    $admin = new Administrador();
                    $admin-> iniciar($admindata['id'],$admindata['nome'],$admindata['cpf'],$admindata['datanasc'],$admindata['telefone'],$admindata['email'],$admindata['senha']);
                    return $admin; */




    public static function listar(){
        $clientes = AdministradorDao::listar();

        AdministradorView::listar($clientes);
    }

}


