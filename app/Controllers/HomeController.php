<?php

declare(strict_types=1);

namespace App\Controllers;

final class HomeController
{
    public function index(): void
    {
        $this->render(false);
    }

    public function gratuito(): void
    {
        $this->render(true);
    }

    private function render(bool $variation): void
    {
        session_start([
            'cookie_httponly' => true,
            'cookie_samesite' => 'Lax',
        ]);
        $_SESSION['lead_csrf_token'] ??= bin2hex(random_bytes(32));

        $pageTitle = 'Mapa do Dinheiro | Pós-Wellness';
        $whatsappMessage = 'Olá, me interessei pelo Mapa do Dinheiro gratuito e gostaria de mais informações sobre os produtos da Pós-Wellness.';
        $leadFormToken = $_SESSION['lead_csrf_token'];
        $leadFormStartedAt = time();
        $view = dirname(__DIR__) . ($variation ? '/Views/home/gratuito.php' : '/Views/home/index.php');

        ob_start();
        require $view;
        $content = (string) ob_get_clean();

        require dirname(__DIR__) . '/Views/layout.php';
    }
}
