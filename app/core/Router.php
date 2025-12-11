<?php
namespace App\Core;

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
}