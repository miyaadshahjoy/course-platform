<?php
namespace App\Middlewares;
use App\Middlewares\MiddlewareInterface;

class AuthMiddleware implements MiddlewareInterface 
{
    public function handle($request, $next) {
        if (!isset($_SESSION['user_id'])) :
            echo "You must be signed in to access this page.";
            // header("Location: /signin");
            exit;
        endif;

        return $next($request);
    }
}

?>