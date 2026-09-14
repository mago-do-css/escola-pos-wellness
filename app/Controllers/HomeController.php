<?php

declare(strict_types=1);

namespace App\Controllers;

final class HomeController
{
    public function index(): void
    {
        $pageTitle = 'Mapa do Dinheiro | Pós-Wellness';
        $view = dirname(__DIR__) . '/Views/home/index.php';

        ob_start();
        require $view;
        $content = (string) ob_get_clean();

        require dirname(__DIR__) . '/Views/layout.php';
    }
}
