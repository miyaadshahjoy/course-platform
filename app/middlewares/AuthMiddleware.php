<?php
namespace App\Middlewares;
use App\Middlewares\MiddlewareInterface;

class AuthMiddleware implements MiddlewareInterface 
{
    public function handle($request, $next) {
        if (!isset($_SESSION['user_id'])) :
            (new ErrorController())->show(403);
            header("Location: /signin");
            exit;
        endif;

        return $next($request);
    }
}

?>