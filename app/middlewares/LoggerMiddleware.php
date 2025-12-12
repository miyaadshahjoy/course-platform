<?php
namespace App\Middlewares;
use App\Middlewares\MiddlewareInterface;

class LoggerMiddleware implements MiddlewareInterface {
    public function handle($request, $next) {
        file_put_contents('logs.txt', date('Y-m-d H:i:s') . " Accessed: " . $request['uri'] . PHP_EOL, FILE_APPEND);
        return $next($request);
    }
}
