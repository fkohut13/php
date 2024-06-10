<?php
namespace App\controller;
require_once("./autoload.php");
use App\util\Functions as Util;
use App\model\Cliente;
use APP\dal\Clientedaoclasse;
use App\util\Caixas as Cx;
use App\view\CadastroView;
use App\view\loginView\Login;
use \Exception;

abstract class ClienteController{
    private static $msg = null;

    public static function cadastrar(){
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" AND isset($_POST["nome"])) {
            Util::CSRF();
            [$nome, $cpf, $data, $tel, $email, $senha] = array_map([Util::class, 'prepararTexto'], array_values($_POST));
            $dataformatada = Util::prepararData($data);
            /* Validações */
            $cliente = new Cliente();
            $cliente-> Cliente(nome: $nome, cpf: $cpf, data: $dataformatada, tel: $tel, email: $email, senha: $senha);
            try{
                Clientedaoclasse::cadastrar($cliente);
                echo Cx::caixaSucesso("Cadastrado com sucesso!", 3);
            }catch(Exception $e){
                self::$msg = $e->getMessage();
            }

        }
        CadastroView::formulario(); 
    }

   
    public static function deletar() {
        if (isset($_POST['cpf'])) {
            $cpf_form = Util::prepararTexto($_POST['cpf']);
            $cpf_db = AdministradorController::getAtributoLogado('cpf');
            if ($cpf_db == $cpf_form) {
                Clientedaoclasse::deletar($cpf_form);
                ClienteController::deslogar();
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
   
    public static function deslogar() {
        Util::startSession();
        $_SESSION['info_logado'] = array();
        session_destroy();
        $_SESSION['usuario_logado'] = false;
        Util::redirect("./index.php");
        exit();
    }

}


