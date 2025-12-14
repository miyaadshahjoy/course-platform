<?php
use App\Controllers\ErrorController;

# Start the session
session_start();


set_exception_handler(function ($e) {
    error_log($e);
    (new ErrorController)->show(500);
});

set_error_handler(function ($severity, $message, $file, $line) {

    # 
    if (!(error_reporting() & $severity)) return;
    

    #
    error_log("$message in $file on line $line");

    # Severe errors
    if (in_array($severity, [E_ERROR, E_USER_ERROR])) {
        (new ErrorController)->show(500);
    }
});



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