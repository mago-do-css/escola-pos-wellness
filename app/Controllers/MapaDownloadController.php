<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\MapaDownload;

final class MapaDownloadController
{
    public function index(): void
    {
        $pageTitle = 'Baixar Mapa do Dinheiro | Pós-Wellness';
        $downloadUrl = MapaDownload::FILE_URL;
        $downloadFilename = MapaDownload::FILE_NAME;
        $view = dirname(__DIR__) . '/Views/mapa-download/index.php';

        ob_start();
        require $view;
        $content = (string) ob_get_clean();

        require dirname(__DIR__) . '/Views/layout.php';
    }
}
