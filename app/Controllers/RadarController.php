<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\RadarLanding;

final class RadarController
{
    public function index(): void
    {
        $pageTitle = 'Radar do Dinheiro | Escola Pós-Wellness';
        $checkoutUrl = '#oferta';
        $planCheckoutUrl = RadarLanding::checkoutHref();
        $vslVideoUrl = RadarLanding::VSL_VIDEO_URL;
        $vslPosterUrl = RadarLanding::VSL_POSTER_URL;
        $hasVsl = RadarLanding::hasVsl();
        $referencePrice = RadarLanding::REFERENCE_PRICE;
        $view = dirname(__DIR__) . '/Views/radar/index.php';

        ob_start();
        require $view;
        $content = (string) ob_get_clean();

        require dirname(__DIR__) . '/Views/layout.php';
    }
}
