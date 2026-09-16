<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\MapaObrigado;

final class MapaObrigadoController
{
    public function index(): void
    {
        $pageTitle = 'Obrigado | Mapa do Dinheiro | Pós-Wellness';
        $vslEmbedUrl = MapaObrigado::VSL_EMBED_URL;
        $view = dirname(__DIR__) . '/Views/mapa-obrigado/index.php';

        ob_start();
        require $view;
        $content = (string) ob_get_clean();

        require dirname(__DIR__) . '/Views/layout.php';
    }
}
