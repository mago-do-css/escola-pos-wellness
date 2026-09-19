<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\RadarObrigado;

final class RadarObrigadoController
{
    public function index(): void
    {
        $pageTitle = 'Obrigado | Radar do Dinheiro | Pós-Wellness';
        $vslEmbedUrl = RadarObrigado::VSL_EMBED_URL;
        $view = dirname(__DIR__) . '/Views/radar-obrigado/index.php';

        ob_start();
        require $view;
        $content = (string) ob_get_clean();

        require dirname(__DIR__) . '/Views/layout.php';
    }
}
