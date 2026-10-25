<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\PorTrasLanding;

final class PorTrasController
{
    public function index(): void
    {
        $this->render('index.php', 'Por Trás do Dinheiro | Escola Pós-Wellness');
    }

    public function backup(): void
    {
        $this->render('backup.php', 'Por Trás do Dinheiro | Escola Pós-Wellness');
    }

    private function render(string $file, string $pageTitle): void
    {
        $checkoutUrl = PorTrasLanding::checkoutHref();
        $price = PorTrasLanding::PRICE;
        $vslVideoUrl = PorTrasLanding::VSL_VIDEO_URL;
        $vslPosterUrl = PorTrasLanding::VSL_POSTER_URL;
        $view = dirname(__DIR__) . '/Views/por-tras/' . $file;

        ob_start();
        require $view;
        $content = (string) ob_get_clean();

        require dirname(__DIR__) . '/Views/layout.php';
    }
}
