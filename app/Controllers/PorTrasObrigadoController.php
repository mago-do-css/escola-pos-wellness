<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\PorTrasLanding;

final class PorTrasObrigadoController
{
    public function index(): void
    {
        $pageTitle = 'Obrigado | Por Trás do Dinheiro | Pós-Wellness';
        $upsellCheckoutUrl = PorTrasLanding::upsellCheckoutHref();
        $upsellPrice = PorTrasLanding::UPSELL_PRICE;
        $view = dirname(__DIR__) . '/Views/por-tras-obrigado/index.php';

        ob_start();
        require $view;
        $content = (string) ob_get_clean();

        require dirname(__DIR__) . '/Views/layout.php';
    }
}
