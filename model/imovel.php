<?php 
namespace App\model;

class Imovel {
    private $id, $imagem1, $imagem2, $imagem3, $imagem4, $imagem5, $titulo, $endereco, $preco;

    public function __construct(){}

    public function Imovel($id = "", $imagem1 = "", $imagem2 = "", $imagem3 = "", $imagem4 = "", $imagem5 = "", $titulo= "", $endereco = "", $preco = "") {
        $this->id = $id;
        $this->imagem1 = $imagem1;
        $this->imagem2 = $imagem2;
        $this->imagem3 = $imagem3;
        $this->imagem4 = $imagem4;
        $this->imagem5 = $imagem5;
        $this->titulo= $titulo;
        $this->endereco = $endereco;
        $this->preco = $preco;
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







