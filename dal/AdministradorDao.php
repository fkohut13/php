<?php

namespace APP\dal;

use App\model\Administrador;
use \App\dal\Conn;
use \Exception;
use \PDOException;
use \PDO;

abstract class AdministradorDao
{
    public static function cadastrar(Administrador $admin)
    {
        try {
            $pdo = Conn::getConn(); //Guarda conexão bd em uma variavel "pdo"
            $sql = $pdo->prepare("INSERT INTO administradores VALUES (null, ?, ? ,? ,?, ?, ?)"); //Prepara uma variavel com query sql
            $sql->execute([$admin->__get("nome"), $admin->__get("cpf"), $admin->__get("data"), $admin->__get("tel"), $admin->__get("email"), $admin->__get("senha")]); //Guarda atributos no SQL usando classe Administrador no \model
        } catch (PDOException $e) {
            throw new Exception("Erro ao salvar no banco de dados" . $e->getMessage(), 14);
        } catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }


    public static function logar($email, $senha)
    {

        try {
            $pdo = Conn::getConn();

            $sql = $pdo->prepare("SELECT senha FROM administradores WHERE email = ?"); //Verificação de usuario ou admin
            $sql->execute([$email]);
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            if ($result === false) {
                return false;
            } else {
                $hashSenha = $result['senha'];
                if ($senha == $hashSenha) {
                    // Sucesso no login
                    return true;
                } else {
                    // Senha incorreta
                    return false;
                }
            }
        } catch (PDOException $e) {
            throw new Exception("Erro ao verificar login no banco de dados: " . $e->getMessage(), 15);
        } catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }
    public static function retornaAdmin($email)
    {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("SELECT * FROM administradores WHERE email = ?");
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
            $sql = $pdo->prepare("SELECT * FROM administradores");
            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_CLASS, Administrador::class);
        } catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }
    public static function deletar($cpf) {
        try{
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("DELETE FROM `administradores` WHERE cpf = ?");
            $sql->execute($cpf);
            return true;
            
        }catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }

    }
}
