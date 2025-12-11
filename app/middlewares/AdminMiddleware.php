<?php
namespace App\Middlewares;

class AdminMiddleware 
{
    public static function handle() 
    {
        // If user isn't logged in at all
        if (!isset($_SESSION['user_role'])):
            header("Location: /signin");
            exit;
        endif;

        // If logged in but NOT admin
        if ($_SESSION['user_role'] !== 'admin'):
            http_response_code(403);
            echo "⛔ Forbidden: You do not have permission to access this area.";
            exit;
        endif;
    }
}

?>