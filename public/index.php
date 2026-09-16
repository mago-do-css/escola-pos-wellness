<?php

declare(strict_types=1);

spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\';

    if (!str_starts_with($class, $prefix)) {
        return;
    }

    $relativeClass = substr($class, strlen($prefix));
    $file = dirname(__DIR__) . '/app/' . str_replace('\\', '/', $relativeClass) . '.php';

    if (is_file($file)) {
        require $file;
    }
});

use App\Controllers\HomeController;
use App\Controllers\MapaDownloadController;
use App\Core\Router;

$router = new Router();
$router->get('/', [HomeController::class, 'index']);
$router->get('/baixar-mapa-do-dinheiro', [MapaDownloadController::class, 'index']);
$router->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/');
