<?php

namespace App\util;

class Caixas
{



    public static function caixaSucesso(string $message, int $duracao = 0): string
    {
        $html = '
    <div role="alert" aria-live="polite" class="sucesso-caixa" id="sucesso-caixa" style="border: 1px solid green; padding: 1em; margin: 1em 0; background-color: #d4edda; color: #155724; border-radius: 5px; transition: opacity 0.3s ease-out;">
        <strong>Sucesso:</strong> ' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '
    </div>';
        if ($duracao > 0) {
            $html .= '<script>
            setTimeout(function() {
                var element = document.getElementById("sucesso-caixa");
                if (element) {
                    element.style.opacity = "0%";
                }
            }, ' . ($duracao * 1000) . ');
        </script>';
        }
        return $html;
    }

    public static function caixaErro(string $message, int $duracao = 0): string
    {
        $html = '
        <div role="alert" aria-live="assertive" id="caixa-erro" style="border: 1px solid red; padding: 1em; margin: 1em 0; background-color: #f8d7da; color: #721c24; border-radius: 5px; transition: opacity 0.3s ease-out;">
            <strong>Erro:</strong> ' . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . '
        </div>';
        if ($duracao > 0) {
            $html .= '<script>
            setTimeout(function() {
                var element = document.getElementById("caixa-erro");
                if (element) {
                    element.style.opacity = "0%";
                }
            }, ' . ($duracao * 1000) . ');
        </script>';
        }
        return $html;

    }
}
