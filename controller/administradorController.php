<?php
namespace App\controller;
require_once("./autoload.php");
require("./dal/ClienteDao.php");
require("./view/recuperarView.php");
require("./view/novoimovelView.php");
require("./dal/ImovelDao.php");
use App\util\Functions as Util;
use App\model\Administrador;
use App\dal\AdministradorDao;
use App\dal\Clientedaoclasse;
use APP\dal\imovelDaoClasse;
use App\model\Imovel;
use App\util\Caixas as Cx;
use App\view\CadastroView;
use App\view\loginView\Login;
use App\view\novaSenha as recuperarview;
use App\view\CadastroImovel as cadastroimovel;
use \Exception;


abstract class AdministradorController{
    private static $msg = null;

    public static function cadastrar(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["nome"])) {
            Util::CSRF();
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
    public static function atualizarinfoAdmin() {
        $email = AdministradorController::getAtributoLogado('email');
        $usuarioInfo = AdministradorDao::retornaAdmin($email);
        $_SESSION['info_logado'] = $usuarioInfo;
    }
    public static function atualizarinfoUsuario() {
        $email = AdministradorController::getAtributoLogado('email');
        $usuarioInfo = Clientedaoclasse::retornaCliente($email);
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
    
    public static function getAtributoLogado(string $atributo) {
        Util::startSession(); 
        $value = isset($_SESSION['info_logado']) ? $_SESSION['info_logado'][$atributo] : '';
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

    public static function editarlogado() {
        $campos = ["editar-nome", "editar-data", "editar-email", "editar-telefone", "editar-senha"];
        if (AdministradorController::adminLogado()) {
            $id = AdministradorController::getAtributoLogado("id");
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                foreach ($campos as $campo) {
                    if (isset($_POST[$campo])) {
                        $novoValor = $_POST[$campo];
                        $nomeAtributo = str_replace("editar-", "", $campo);
                        AdministradorDao::editar($nomeAtributo, $novoValor, $id);
                        AdministradorController::atualizarinfoAdmin();
                        break;
                    }
                }  
            }
        } else {
            $id = AdministradorController::getAtributoLogado("clienteid");
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                foreach ($campos as $campo) {
                    if (isset($_POST[$campo])) {
                        $novoValor = $_POST[$campo];
                        $nomeAtributo = str_replace("editar-", "", $campo);
                        Clientedaoclasse::editar($nomeAtributo, $novoValor, $id);
                        AdministradorController::atualizarinfoUsuario();
                        break;
                    }
                }  
            }
        }
    }
    public static function editar() {

    }

    public static function recuperarsenha() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["cpf"], $_POST["data"])) {
                $cpf_form = $_POST['cpf'];
                $_COOKIE['valor'] = $cpf_form;
                setcookie("cpf-formulario", $cpf_form, time() + 120);
                $datanasc_form = $_POST['data'];
                $datanasc_form = Util::prepararData($datanasc_form);
                $existe_no_bd = AdministradorDao::verificador($cpf_form, $datanasc_form);
                if ($existe_no_bd) {
                    recuperarview::redefinirsenha();
                } else {
                    echo Cx::caixaErro("Verifique o cpf e a data de nascimento e tente novamente!");
                }
            }
            if (isset($_POST["novasenha"])) {
                $novasenha = $_POST['novasenha'];
                $cpf = $_COOKIE['cpf-formulario'];
                AdministradorDao::editarSenha($cpf, $novasenha);
                echo Cx::caixaSucesso("Senha editada com sucesso!");
                Util::redirect("login.php");
                exit();
            }
        }
        recuperarview::recuperarSenhaFormulario(); 
    }

    public static function cadastroImovel(){
        if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["imagem1"])) {
            [$imagem1, $imagem2, $imagem3, $imagem4, $imagem5, $titulo, $endereco, $preco] = array_map([Util::class, 'prepararTexto'], array_values($_POST));
            $imovel = new Imovel();
            $imovel-> Imovel(imagem1: $imagem1, imagem2: $imagem2, imagem3: $imagem3, imagem4: $imagem4, imagem5: $imagem5, titulo: $titulo, endereco: $endereco, preco: $preco);
            try{
                imovelDaoClasse::cadastrar($imovel);
                echo Cx::caixaSucesso("Imóvel cadastrado com sucesso!", 3);
            }catch(Exception $e){
                self::$msg = $e->getMessage();
            }

        }
        cadastroImovel::formularioImovel();
        
    }
    public static function getQuartos() {
        return $quartos = imovelDaoClasse::retornaimoveis();
    }
    public static function getQuarto($id) {
        return $quarto = imovelDaoClasse::retornaimovel($id);
    }
    

    public static function listar(){
        $clientes = AdministradorDao::listar();
    }
}


