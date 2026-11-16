<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Config\MapaDownload;
use App\Config\Assinatura;

final class AssinaturaController
{
    public function aula(): void
    {
        session_start(['cookie_httponly' => true, 'cookie_samesite' => 'Lax']);
        $_SESSION['lead_csrf_token'] ??= bin2hex(random_bytes(32));
        $leadFormToken = $_SESSION['lead_csrf_token'];
        $leadFormStartedAt = time();
        $pageTitle = 'Aula gratuita | Pós-Wellness';
        $downloadUrl = MapaDownload::DOWNLOAD_ENDPOINT;
        $videoUrl = trim((string) getenv('ASSINATURA_AULA_VIDEO_URL'));
        $posterUrl = trim((string) getenv('ASSINATURA_AULA_POSTER_URL'));
        $lessons = Assinatura::LESSONS;
        $this->render('aula', get_defined_vars());
    }

    public function oferta(): void
    {
        $pageTitle = 'Acesso completo | Pós-Wellness';
        $checkoutUrl = trim((string) getenv('ASSINATURA_CHECKOUT_URL'));
        if (!filter_var($checkoutUrl, FILTER_VALIDATE_URL) || parse_url($checkoutUrl, PHP_URL_SCHEME) !== 'https') $checkoutUrl = '';
        $testimonials = Assinatura::TESTIMONIALS;
        $guarantee = trim((string) getenv('ASSINATURA_GARANTIA_TEXTO'));
        $demo = filter_var(getenv('ASSINATURA_DEMO_SOCIAL') ?: false, FILTER_VALIDATE_BOOL);
        $this->render('oferta', get_defined_vars());
    }

    private function render(string $page, array $data): void
    {
        extract($data, EXTR_SKIP);
        $whatsappMessage = 'Olá! Gostaria de saber mais sobre o acesso à área de membros da Pós-Wellness.';
        ob_start();
        require dirname(__DIR__) . '/Views/assinatura/' . $page . '.php';
        $content = (string) ob_get_clean();
        require dirname(__DIR__) . '/Views/layout.php';
    }
}
