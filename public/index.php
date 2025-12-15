<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
$routes = require __DIR__ . '/../config/routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);


$uri = str_replace(dirname($_SERVER['SCRIPT_NAME']), '', $uri);

$uri = '/' . trim($uri, '/');

if ($uri === '//') {
    $uri = '/';
}

$found = false;

foreach ($routes as $route => $action) {

    $pattern = preg_replace('#\{[a-zA-Z_]+\}#', '([0-9]+)', $route);
    $pattern = '#^' . $pattern . '$#';

    if (preg_match($pattern, $uri, $matches)) {
        array_shift($matches);

        [$controller, $method] = explode('@', $action);

        $controllerFile = __DIR__ . '/../app/controllers/' . $controller . '.php';

        if (!file_exists($controllerFile)) {
            die("Controller file not found");
        }

        require $controllerFile;

        $controllerInstance = new $controller;
        call_user_func_array([$controllerInstance, $method], $matches);

        $found = true;
        break;
    }
}

// 404
if (!$found) {
    http_response_code(404);
    require __DIR__ . '/../app/views/404.php';
}
