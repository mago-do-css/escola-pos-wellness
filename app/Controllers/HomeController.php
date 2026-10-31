<?php

declare(strict_types=1);

namespace App\Controllers;

final class HomeController
{
    public function index(): void
    {
        session_start([
            'cookie_httponly' => true,
            'cookie_samesite' => 'Lax',
        ]);
        $_SESSION['lead_csrf_token'] ??= bin2hex(random_bytes(32));

        $pageTitle = 'Mapa do Dinheiro | Pós-Wellness';
        $leadFormToken = $_SESSION['lead_csrf_token'];
        $leadFormStartedAt = time();
        $view = dirname(__DIR__) . '/Views/home/index.php';

        ob_start();
        require $view;
        $content = (string) ob_get_clean();

        require dirname(__DIR__) . '/Views/layout.php';
    }
}
