<?php
declare(strict_types=1);

spl_autoload_register(static function (string $class): void {
    if (str_starts_with($class, 'App\\')) {
        require dirname(__DIR__) . '/app/' . str_replace('\\', '/', substr($class, 4)) . '.php';
    }
});

putenv('META_PIXEL_ID=123456789');
putenv('META_CAPI_ENABLED=false');
$_SERVER['HTTP_HOST'] = 'example.test';
$_SERVER['HTTPS'] = 'on';
$pageTitle = 'Teste';
$content = '';
$showWhatsapp = false;
$paths = [
    '/' => 'PaginaMapaOriginal',
    '/mapa-do-dinheiro-gratuito' => 'PaginaMapaGratuitoB',
    '/mapa-do-dinheiro-gratuito/' => 'PaginaMapaGratuitoB',
    '/obrigado-mapa-do-dinheiro' => 'ObrigadoMapaOriginal',
    '/obrigado-mapa-gratuito' => 'ObrigadoMapaGratuito',
    '/obrigado-mapa-do-dinheiro-gratuito' => 'ObrigadoMapaGratuitoB',
    '/baixar-mapa-do-dinheiro' => 'PaginaBaixarMapa',
    '/por-tras-do-dinheiro' => 'PaginaPorTrasDinheiro',
    '/por-tras-do-dinheiro-oferta' => 'PaginaPorTrasDinheiroOferta',
    '/obrigado-por-tras-do-dinheiro' => 'ObrigadoPorTrasDinheiro',
    '/radar-do-dinheiro' => 'PaginaRadarDinheiro',
    '/obrigado-radar-do-dinheiro' => 'ObrigadoRadarDinheiro',
    '/dinheiro-e-fruto' => 'PaginaDinheiroFruto',
];
foreach ($paths as $path => $event) {
    $_SERVER['REQUEST_URI'] = $path;
    ob_start();
    require dirname(__DIR__) . '/app/Views/layout.php';
    $html = ob_get_clean();
    if (!str_contains($html, "fbq('track', 'PageView', metaPageData") || !str_contains($html, $event) || !str_contains($html, 'window.location.origin + window.location.pathname')) {
        throw new RuntimeException('Evento incorreto para ' . $path);
    }
}
$source = new ReflectionMethod(App\Services\MetaConversionsApi::class, 'leadSourceUrl');
$_SERVER['REQUEST_URI'] = '/leads/capture';
foreach (['/', '/mapa-do-dinheiro-gratuito'] as $path) {
    if ($source->invoke(null, $path) !== 'https://example.test' . $path) {
        throw new RuntimeException('Origem incorreta para Lead em ' . $path);
    }
}
echo "Eventos por página e URLs de origem do Lead verificados.\n";
