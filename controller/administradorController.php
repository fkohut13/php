<?php
namespace App\controller;
require_once("./autoload.php");
require("./dal/ClienteDao.php");
use App\util\Functions as Util;
use App\model\Administrador;
use App\dal\AdministradorDao;
use App\dal\Clientedaoclasse;
use App\util\Caixas as Cx;
use App\view\CadastroView;
use App\view\loginView\Login;
use \Exception;


abstract class AdministradorController{
    private static $msg = null;

    public static function cadastrar(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["nome"])) {
            [$nome, $cpf, $data, $tel, $email, $senha] = array_map([Util::class, 'prepararTexto'], array_values($_POST));
            $dataformatada = Util::prepararData($data);
            $admin = new Administrador();
            $admin-> iniciar(nome: $nome, cpf: $cpf, data: $dataformatada, tel: $tel, email: $email, senha: $senha);
            try{
                AdministradorDao::cadastrar($admin);
                echo Cx::caixaSucesso("Cadastrado com sucesso!", 3);
            }catch(Exception $e){
                self::$msg = $e->getMessage();
            }
        }
        CadastroView::formulario();
    }

    public static function paginalogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["email"])) {
            $email = Util::prepararTexto($_POST["email"]);
            $senha = Util::prepararTexto($_POST["senha"]);
            try {
                if (AdministradorDao::logar($email, $senha)) {
                    echo Cx::caixaSucesso("Logado com sucesso!", 3);
                    if (AdministradorDao::retornaAdmin($email)) {
                        $_SESSION['admin_logado'] = true;
                        $usuarioInfo = AdministradorDao::retornaAdmin($email);
                        $_SESSION['info_logado'] = $usuarioInfo;
                    } elseif(Clientedaoclasse::retornaCliente($email)) {
                        $_SESSION['usuario_logado'] = true;
                        $usuarioInfo = Clientedaoclasse::retornaCliente($email);
                        $_SESSION['info_logado'] = $usuarioInfo;
                    }
                    Util::redirect("./index.php");

                } else {
                    echo Cx::caixaErro("Não foi possivel encontrar uma conta com essas credenciais, verifique a senha, e tente novamente!");
                }
            } 
            catch(Exception $e) {
                self::$msg = $e->getMessage();
            }
        }
        Login::loginFormulario();
        
    }
    public static function deletar() {
        if (isset($_POST['cpf'])) {
            $cpf_form = Util::prepararTexto($_POST['cpf']);
            $cpf_db = AdministradorController::getAtributoLogado('cpf');
            if ($cpf_db == $cpf_form) {
                AdministradorDao::deletar($cpf_form);
                AdministradorController::deslogar();
                Util::redirect("./index.php");
                exit();
            }
            else{
                echo Cx::caixaErro("Digite o cpf correto!!", 3);
                }    
        }
        else{
            echo Cx::caixaErro("Cpf não fornecido!", 3);
            
            }    
      
    }
    public static function atualizarinfo() {
        $email = AdministradorController::getAtributoLogado('email');
        $usuarioInfo = AdministradorDao::retornaAdmin($email);
        $_SESSION['info_logado'] = $usuarioInfo;
    }

  
    public static function adminLogado() {
        Util::startSession();
        return isset($_SESSION['admin_logado']) && $_SESSION['admin_logado'] === true;
    }
    public static function usuarioLogado() {
        Util::startSession();
        return isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado'] === true;
    }
    
    public static function getAtributoLogado(string $atributo, int $esconder = 0) {
        Util::startSession(); 
        $value = isset($_SESSION['info_logado']) ? $_SESSION['info_logado'][$atributo] : '';
        if ($esconder > 0 && strlen($value) > $esconder) {
            $last_digits = substr($value, -$esconder);
            $masked_value = str_repeat('.', strlen($value) - $esconder) . $last_digits;
            return htmlspecialchars($masked_value);
        }
        return htmlspecialchars($value);
    }

    public static function deslogar() {
        Util::startSession();
        $_SESSION['info_logado'] = array();
        session_destroy();
        $_SESSION['admin_logado'] = false;
        Util::redirect("./index.php");
        exit();
    }

    public static function editar() {
        $campos = ["editar-nome", "editar-data", "editar-email", "editar-telefone", "editar-senha"];
        $id = AdministradorController::getAtributoLogado("id");
        ob_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            foreach ($campos as $campo) {
                if (isset($_POST[$campo])) {
                    $novoValor = $_POST[$campo];
                    $nomeAtributo = str_replace("editar-", "", $campo);
                    AdministradorDao::editar($nomeAtributo, $novoValor, $id);
                    AdministradorController::atualizarinfo();
                    break;
                }
            }  
        }
    }
/*  $admindata = AdministradorDao::retornaAdmin($email);
                    $admin = new Administrador();
                    $admin-> iniciar($admindata['id'],$admindata['nome'],$admindata['cpf'],$admindata['datanasc'],$admindata['telefone'],$admindata['email'],$admindata['senha']);
                    return $admin; */

    public static function listar(){
        $clientes = AdministradorDao::listar();

       // AdministradorView::listar($clientes);
    }

}


