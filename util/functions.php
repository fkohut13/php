<?php

namespace App\util;

use \Exception;

class Functions
{
    public static function prepararTexto($texto)
    {
        return trim($texto);
    }
    public static function prepararData($data)
    {
        $dateParts = explode('/', $data);
        if (count($dateParts) == 3) {
            return $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];
        } else {
            throw new Exception("Formato de data inválido. Porfavor use dd/mm/yyyy.");
        }
    }
    public static function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }
    public static function redirect($url)
    {
        if (!headers_sent()) {
            header('Location: ' . $url);
            exit;
        } else {
            echo '<script type="text/javascript">';
            echo 'window.location.href="' . $url . '";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url=' . $url . '" />';
            echo '</noscript>';
            exit;
        }
    }
    public static function criarToken()
    {
        Functions::startSession();
        if (empty($_SESSION['token'])) {
            $_SESSION['token'] = bin2hex(random_bytes(32));
        }
        $token = $_SESSION['token'];
        return $token;
    }
    
    public static function CSRF() {
        $Tokensubmetido = filter_input(INPUT_POST, 'token');
        $Tokensubmetido = strip_tags($Tokensubmetido); // Strip HTML tags
        $Tokensubmetido = htmlspecialchars($Tokensubmetido, ENT_QUOTES, 'UTF-8'); // Encode special characters
    
        if (!$Tokensubmetido || $Tokensubmetido !== $_SESSION['token']) {
            
            exit;
        }
    }
}