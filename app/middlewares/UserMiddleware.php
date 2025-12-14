<?php
namespace App\Middlewares;
use App\Middlewares\MiddlewareInterface;

class UserMiddleware implements MiddlewareInterface
{
    public function handle($request, $next) {
        // If user isn't logged in at all
        if (!isset($_SESSION['user_role'])):
            header("Location: /signin");
            exit;
        endif;

        // If logged in but NOT user
        if ($_SESSION['user_role'] !== 'user'):
            (new ErrorController())->show(403);
            exit;
        endif;

        return $next($request);
    }
}

?>