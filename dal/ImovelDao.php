<?php

namespace APP\dal;

use App\model\Imovel;
use \App\dal\Conn;
use \Exception;
use \PDOException;
use \PDO;

abstract class imovelDaoClasse
{
    public static function cadastrar(Imovel $imovel)
    {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("INSERT INTO imoveis VALUES (null, ?, ? ,? ,?, ?, ?, ?, ?)");
            $sql->execute([$imovel->__get("imagem1"), $imovel->__get("imagem2"), $imovel->__get("imagem3"), $imovel->__get("imagem4"), $imovel->__get("imagem5"), $imovel->__get("titulo"), $imovel->__get("endereco"), $imovel->__get("preco"),]);
        } catch (PDOException $e) {
            throw new Exception("Erro ao salvar no banco de dados" . $e->getMessage(), 14);
        } catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }
    public static function retornaimovel($id)
    {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("SELECT * FROM imoveis WHERE id = ?");
            $sql->execute([$id]);
            $imoveldata = $sql->fetch(PDO::FETCH_ASSOC);
            return $imoveldata;
        } catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }
    public static function retornaimoveis()
    {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("SELECT * FROM imoveis");
            $sql->execute();
            $imoveldata = $sql->fetchAll(PDO::FETCH_ASSOC);
            return $imoveldata;
        } catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }

    public static function deletar($id)
    {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("DELETE FROM `imoveis` WHERE `id`= ?");
            $sql->execute([$id]);
            return true;
        } catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }
    public static function atualizar($atributo, $novoValor, $id)
    {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("UPDATE `imoveis` SET `$atributo`=? WHERE `id`=?");
            $sql->execute([$novoValor, $id]);
            return true;
        } catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }


    public static function editar($atributo, $novoValor, $id)
    {
        try {
            $pdo = Conn::getConn();
            $sql = $pdo->prepare("UPDATE `imoveis` SET `$atributo`=? WHERE `id=?");
            $sql->execute([$novoValor, $id]);
            return true;
        } catch (Exception $e) {
            throw new Exception("Ocorreu um erro inesperado " . $e->getMessage() . $e->getCode());
        }
    }
}
