<?php
namespace App\dal;
use \PDO;
use \PDOException;

abstract class Conn {
    private static $conn;
    private static $host = "localhost:3308"; //Minha config é 3308, trocar para 3307 padrão.
    private static $dbname = "quartophpdb";
    private static $login = "root";
    private static $senha = "";

    public static function getConn() {
        try {
            if (!isset(self::$conn)){
                self::$conn = new PDO("mysql:host=". self::$host . "; dbname=" . self::$dbname,self::$login, self::$senha);  
            }
            return self::$conn;
            echo "<h1>Conectado</h1>";
        } catch (PDOException $e) {
            die("Erro ao conectar ao banco de dados: " . $e->getMessage());
        }
    }  

}
























?>