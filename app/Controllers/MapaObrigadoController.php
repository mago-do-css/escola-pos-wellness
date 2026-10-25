<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\MapaDownload;

final class MapaObrigadoController
{
    public function index(): void
    {
        $pageTitle = 'Obrigado | Mapa do Dinheiro | Pós-Wellness';
        $downloadUrl = MapaDownload::FILE_URL;
        $downloadFilename = MapaDownload::FILE_NAME;
        $vslVideoUrl = MapaDownload::UPSELL_VIDEO_URL;
        $vslPosterUrl = '/assets/images/mapa/hero-mapa-do-dinheiro.png';
        $view = dirname(__DIR__) . '/Views/mapa-obrigado/index.php';

        ob_start();
        require $view;
        $content = (string) ob_get_clean();

        require dirname(__DIR__) . '/Views/layout.php';
    }
}
