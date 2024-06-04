<?php 
namespace App\model;

class Administrador {
    private $id, $nome, $cpf, $data, $tel, $email, $senha;

    public function __construct(){}

    public function iniciar($id = "", $nome = "", $cpf= "", $data = "", $tel = "", $email = "", $senha = "") {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->data = $data;
        $this->tel = $tel;
        $this->email = $email;
        $this->senha = $senha;
    }



    public function __get($atributo){
        return $this->$atributo;
    }

    public function  getAtributo() {
        return $this->nome;
    }
    
    public function __set($atributo, $valor){
        $this->$atributo = $valor;
    }

        
    
}







