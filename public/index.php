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
use App\Controllers\RadarController;
use App\Controllers\MapaDownloadController;
use App\Controllers\MapaObrigadoController;
use App\Controllers\RadarObrigadoController;
use App\Core\Router;

$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/baixar-mapa-do-dinheiro', [MapaDownloadController::class, 'index']);
$router->get('/obrigado-mapa-do-dinheiro', [MapaObrigadoController::class, 'index']);
$router->get('/radar-do-dinheiro', [RadarController::class, 'index']);
$router->get('/obrigado-radar-do-dinheiro', [RadarObrigadoController::class, 'index']);

$router->dispatch(
    $_SERVER['REQUEST_METHOD'],
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/'
);
