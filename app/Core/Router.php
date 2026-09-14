<?php

declare(strict_types=1);

namespace App\Core;

final class Router
{
    /** @var array<string, array{0: class-string, 1: string}> */
    private array $routes = [];

    /** @param array{0: class-string, 1: string} $handler */
    public function get(string $path, array $handler): void
    {
        $this->routes['GET:' . $path] = $handler;
    }

    public function dispatch(string $method, string $path): void
    {
        $normalizedPath = '/' . ltrim(rtrim($path, '/'), '/');
        $handler = $this->routes[strtoupper($method) . ':' . $normalizedPath] ?? null;

        if ($handler === null) {
            http_response_code(404);
            echo 'Página não encontrada.';
            return;
        }

        [$controller, $action] = $handler;
        (new $controller())->{$action}();
    }
}
