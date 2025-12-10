<?php

# Start the session
session_start();

# Autoload classes using Composer
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use App\Core\Router;

# Load routes
require_once __DIR__ . '/../routes/web.php';


$router = new Router();
# $routes - an associative array defined in routes/web.php
$router->loadRoutes($routes);  # $routes comes from web.php
# Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

?>