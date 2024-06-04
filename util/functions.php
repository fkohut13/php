<?php
namespace App\util;
use \Exception;

class Functions{
    public static function prepararTexto($texto){
        return trim(htmlentities($texto));
    }
    public static function prepararData($data) {
        $dateParts = explode('/', $data);
        if(count($dateParts) == 3) {
            return $dateParts[2] . '-' . $dateParts[1] . '-' . $dateParts[0];
        } else {
            throw new Exception("Formato de data inválido. Porfavor use dd/mm/yyyy.");
        }
    }
}

