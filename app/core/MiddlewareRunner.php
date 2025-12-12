<?php
namespace App\Core;

class MiddlewareRunner
{
    public static function run($request, $middlewares, $controllerAction)
    {
        $instances = array_map(fn($m) => new $m(), $middlewares);

        $runner = array_reduce(
            array_reverse($instances),
            fn($next, $middleware) => fn($req) => $middleware->handle($req, $next),
            $controllerAction
        );

        return $runner($request);
    }
}
