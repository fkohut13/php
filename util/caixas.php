<?php

namespace App\util;

class Caixas
{



    public static function caixaSucesso(string $message): string
    {
        return '
    <div role="alert" aria-live="polite" class="success-box" style="border: 1px solid green; padding: 1em; margin: 1em 0; background-color: #d4edda; color: #155724; border-radius: 5px;">
        <strong>Sucesso:</strong> ' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '
    </div>';
    }

    public static function caixaErro(string $message): string
    {
        return '
    <div role="alert" aria-live="assertive" class="error-box">
        <strong>Erro:</strong> ' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '
    </div>';
    }
}
