<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\MapaDownload;

final class MapaObrigadoController
{
    public function index(): void
    {
        $pageTitle = 'Obrigado | Mapa do Dinheiro | Pós-Wellness';
        $whatsappMessage = 'Olá, baixei o Mapa do Dinheiro e gostaria de conhecer o Por Trás do Dinheiro para continuar essa jornada.';
        $downloadUrl = MapaDownload::DOWNLOAD_ENDPOINT;
        $vslVideoUrl = MapaDownload::THANK_YOU_UPSELL_VIDEO_URL;
        $vslPosterUrl = MapaDownload::THANK_YOU_UPSELL_POSTER_URL;
        $view = dirname(__DIR__) . '/Views/mapa-obrigado/index.php';

        ob_start();
        require $view;
        $content = (string) ob_get_clean();

        require dirname(__DIR__) . '/Views/layout.php';
    }
}
