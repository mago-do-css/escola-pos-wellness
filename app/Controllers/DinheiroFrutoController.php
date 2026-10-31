<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\DinheiroFrutoLanding;

final class DinheiroFrutoController
{
    public function index(): void
    {
        $checkoutUrl = DinheiroFrutoLanding::checkoutHref();
        $hasCheckout = DinheiroFrutoLanding::hasCheckout();
        $vslVideoUrl = DinheiroFrutoLanding::VSL_VIDEO_URL;
        $vslPosterUrl = DinheiroFrutoLanding::VSL_POSTER_URL;

        ob_start();
        require dirname(__DIR__) . '/Views/dinheiro-fruto/index.php';
        $content = (string) ob_get_clean();
        $pageTitle = 'Dinheiro é Fruto | Escola Pós-Wellness';

        require dirname(__DIR__) . '/Views/layout.php';
    }
}
