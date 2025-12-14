<?php
namespace App\Core;
use App\Core\MiddlewareRunner;
use App\Controllers\ErrorController;

class Router {
    private $routes = []; # Associative array to hold routes

    public function get($path, $handler) {
        $this->routes['GET'][$path] = $handler;
    }

    public function post($path, $handler) { # $handler is an array like ['ControllerName', 'methodName']
    # $path is the URL path
        $this->routes['POST'][$path] = $handler;
    }

    public function loadRoutes($routesArray) {
        $this->routes = $routesArray;
    }

    /*
    public function dispatch($uri, $method) {
        $uri = parse_url($uri, PHP_URL_PATH);

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        # Call the appropriate controller and method
        # $handler is an array like ['ControllerName', 'methodName']
        [$controller, $action] = $this->routes[$method][$uri];

        $controller = new $controller;
        return $controller->$action();
    }
    */

    /*
    public function dispatch($uri, $method){

        $uri = parse_url($uri, PHP_URL_PATH);

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 Not Found";
            return;
        }

        [$controllerClass, $controllerMethod] = $this->routes[$method][$uri];
        
        $request = ['uri' => $uri, 'method' => $method];

        $controller = new $controllerClass($request);

        # Get middlewares from the controller
        $middlewares = method_exists($controller, 'getMiddlewares') ? $controller->getMiddlewares($controllerMethod) : [];


        MiddlewareRunner::run(
            $request, 
            $middlewares, 
            fn($req) => $controller->$controllerMethod());

    }
    */

    public function dispatch($uri, $method){
        $uri = parse_url($uri, PHP_URL_PATH);
        $method = strtoupper($method);

        if (!isset($this->routes[$method])) {
            http_response_code(405);
            return;
        }

        foreach ($this->routes[$method] as $route => $handler) {

            // Convert /course/:slug → regex
            $pattern = preg_replace('#:([\w]+)#', '([^/]+)', $route);
            $pattern = "#^{$pattern}$#";

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); // full match out

                [$controllerClass, $controllerMethod] = $handler;

                $request = [
                    'uri' => $uri,
                    'method' => $method,
                    'params' => $matches
                ];

                $controller = new $controllerClass($request);

                $middlewares = method_exists($controller, 'getMiddlewares')
                    ? $controller->getMiddlewares($controllerMethod)
                    : [];

                MiddlewareRunner::run(
                    $request,
                    $middlewares,
                    fn($req) => call_user_func_array(
                        [$controller, $controllerMethod],
                        $matches
                    )
                );

                return;
            }
        }

        (new ErrorController)->show(404); # Not Found();
    }

}