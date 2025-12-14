<?php

namespace App\Controllers;

class ErrorController
{
    public function show(int $code)
    {
        http_response_code($code);

        $view = match ($code) {
            403 => 'errors/403',
            404 => 'errors/404',
            500 => 'errors/500',
            default => 'errors/500',
        };

        require __DIR__ . "/../views/{$view}.php";
        exit;
    }
}
