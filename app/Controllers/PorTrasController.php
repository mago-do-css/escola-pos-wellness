<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\PorTrasLanding;

final class PorTrasController
{
    public function index(): void
    {
        $pageTitle = 'Por Trás do Dinheiro | Escola Pós-Wellness';
        $checkoutUrl = PorTrasLanding::checkoutHref();
        $price = PorTrasLanding::PRICE;
        $view = dirname(__DIR__) . '/Views/por-tras/index.php';

        ob_start();
        require $view;
        $content = (string) ob_get_clean();

        require dirname(__DIR__) . '/Views/layout.php';
    }
}
