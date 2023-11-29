<?php

require 'vendor/autoload.php';
use Deno\Hello\BlogController;

$router = new AltoRouter();

$router->map('GET', '/', [BlogController::class, 'index']);

$match = $router->match();

if (is_array($match)) {
    $controllerClass = $match['target'][0];
    $controllerMethod = $match['target'][1];

    $controller = new $controllerClass();
    call_user_func_array([$controller, $controllerMethod], $match['params']);
}
