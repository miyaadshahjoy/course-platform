<?php
namespace App\Middlewares;

class AuthMiddleware 
{
    public static function handle() 
    {
        if (!isset($_SESSION['user_id'])) :
            header("Location: /signin");
            exit;
        endif;
    }
}

?>