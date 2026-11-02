<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\MapaDownload;

final class MapaDownloadController
{
    public function index(): void
    {
        $playText = parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH) === '/obrigado-mapa-gratuito' ? 'Clique para assistir' : '';
        $pageTitle = 'Baixar Mapa do Dinheiro | Pós-Wellness';
        $whatsappMessage = 'Olá, acessei o Mapa do Dinheiro gratuito e gostaria de saber qual é o próximo passo para aprofundar essa observação.';
        $downloadUrl = MapaDownload::DOWNLOAD_ENDPOINT;
        $vslVideoUrl = MapaDownload::UPSELL_VIDEO_URL;
        $vslPosterUrl = MapaDownload::UPSELL_POSTER_URL;
        $nextProductUrl = MapaDownload::NEXT_PRODUCT_URL;
        $view = dirname(__DIR__) . '/Views/mapa-download/index.php';

        ob_start();
        require $view;
        $content = (string) ob_get_clean();

        require dirname(__DIR__) . '/Views/layout.php';
    }

    public function backup(): void
    {
        $pageTitle = 'Backup | Baixar Mapa do Dinheiro | Pós-Wellness';
        $whatsappMessage = 'Olá, acessei o Mapa do Dinheiro gratuito e gostaria de saber qual é o próximo passo para aprofundar essa observação.';
        $downloadUrl = MapaDownload::DOWNLOAD_ENDPOINT;
        $vslVideoUrl = MapaDownload::UPSELL_VIDEO_URL;
        $vslPosterUrl = MapaDownload::UPSELL_POSTER_URL;
        $nextProductUrl = MapaDownload::NEXT_PRODUCT_URL;
        $view = dirname(__DIR__) . '/Views/mapa-download/backup.php';

        ob_start();
        require $view;
        $content = (string) ob_get_clean();

        require dirname(__DIR__) . '/Views/layout.php';
    }

    public function gratuito(): void
    {
        $this->index();
    }

    public function download(): void
    {
        $filePath = dirname(__DIR__, 2) . '/public' . MapaDownload::FILE_URL;

        if (!is_file($filePath) || !is_readable($filePath)) {
            http_response_code(404);
            echo 'Arquivo não encontrado.';
            return;
        }

        header('Content-Type: application/pdf');
        header('Content-Length: ' . (string) filesize($filePath));
        header('Content-Disposition: attachment; filename="' . MapaDownload::FILE_NAME . '"');
        header('X-Content-Type-Options: nosniff');
        header('Cache-Control: private, no-store, max-age=0');

        readfile($filePath);
        exit;
    }
}
