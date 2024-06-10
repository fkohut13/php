<?php

namespace APP\dal;

use App\model\Cliente;
use \App\dal\Conn;
use \Exception;
use \PDOException;
use \PDO;

abstract class Clientedaoclasse
{
    public static function cadastrar(Cliente $cliente)
    {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("INSERT INTO clientes VALUES (null, ?, ? ,? ,?, ?, ?)"); 
            $sql->execute([$cliente->__get("nome"), $cliente->__get("tel"), $cliente->__get("email"), $cliente->__get("data"), $cliente->__get("senha"), $cliente->__get("cpf")]);
        } catch (PDOException $e) {
            throw new Exception("Erro ao salvar no banco de dados" . $e->getMessage(), 14);
        } catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }
    public static function retornaCliente($email)
    {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("SELECT * FROM clientes WHERE email = ?");
            $sql->execute([$email]);
            $admindata = $sql->fetch(PDO::FETCH_ASSOC);
            return $admindata;
        } catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }

    public static function listar()
    {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("SELECT * FROM clientes");
            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_CLASS, Cliente::class);
        } catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }
    public static function deletar($cpf) {
        try{
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("DELETE FROM `clientes` WHERE cpf = ?");
            $sql->execute([$cpf]);
            return true;
            
        }catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }

    }
    public static function editar($atributo, $novoValor, $id) {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("UPDATE `clientes` SET `$atributo`=? WHERE `clienteid`=?");
            $sql->execute([$novoValor, $id]);
            return true;
        } catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }
}