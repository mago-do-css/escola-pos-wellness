<?php

declare(strict_types=1);

/** @var string $pageTitle */
/** @var string $content */
/** @var bool|null $noIndex */
/** @var bool|null $showWhatsapp */
/** @var string|null $whatsappMessage */

use App\Config\MetaTracking;
use App\Config\WhatsAppSupport;

$metaPixelId = MetaTracking::pixelId();
$metaEventId = $metaPixelId !== '' ? 'pv_' . bin2hex(random_bytes(12)) : '';
$showWhatsapp = $showWhatsapp ?? true;
$whatsappUrl = WhatsAppSupport::link($whatsappMessage ?? WhatsAppSupport::DEFAULT_MESSAGE);

$metaPath = parse_url((string) ($_SERVER['REQUEST_URI'] ?? '/'), PHP_URL_PATH);
$metaProduct = [
    '/por-tras-do-dinheiro' => 'Por Trás do Dinheiro',
    '/por-tras-do-dinheiro-oferta' => 'Por Trás do Dinheiro - oferta',
    '/radar-do-dinheiro' => 'Radar do Dinheiro',
    '/dinheiro-e-fruto' => 'Dinheiro é Fruto',
][$metaPath] ?? null;
?>
<!doctype html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Reconheça os comportamentos que se repetem na sua relação com o dinheiro.">
    <?php if (($noIndex ?? false) === true): ?><meta name="robots" content="noindex, nofollow, noarchive"><?php endif; ?>
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="icon" href="/assets/images/favicon/favicon.svg" type="image/svg+xml">
    <link rel="alternate icon" href="/favicon.ico" sizes="any">
    <link rel="apple-touch-icon" href="/assets/images/favicon/favicon-180x180.png">
    <link rel="icon" href="/assets/images/favicon/favicon-192x192.png" type="image/png" sizes="192x192">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/cta-pulse.css?v=1">
    <script src="/assets/js/app.js?v=20261102-6" defer></script>
    <?php if ($metaPixelId !== ''): ?>
    <script>window.metaTracking = <?= json_encode(['pixelId' => $metaPixelId, 'pageEventId' => $metaEventId], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;</script>
    <!-- Meta Pixel + Conversions API deduplication -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', <?= json_encode($metaPixelId) ?>);
    fbq('track', 'PageView', {}, {eventID: <?= json_encode($metaEventId) ?>});
    <?php if ($metaProduct !== null): ?>
    fbq('track', 'ViewContent', {content_name: <?= json_encode($metaProduct, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>, content_category: 'produto'});
    <?php endif; ?>
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=<?= rawurlencode($metaPixelId) ?>&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel + Conversions API deduplication -->
    <?php endif; ?>
</head>
<body class="bg-cream text-ink antialiased">
    <?= $content ?>
    <?php if ($showWhatsapp): ?>
    <a class="whatsapp-float" href="<?= htmlspecialchars($whatsappUrl, ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer" aria-label="Falar com a Pós-Wellness pelo WhatsApp">
        <svg viewBox="0 0 24 24" aria-hidden="true" focusable="false"><path d="M20.52 3.48A11.78 11.78 0 0 0 12.08 0C5.57 0 .27 5.3.27 11.81c0 2.08.54 4.1 1.57 5.88L.17 23.8l6.25-1.64a11.77 11.77 0 0 0 5.65 1.44h.01c6.51 0 11.81-5.3 11.81-11.81 0-3.15-1.23-6.1-3.37-8.31Zm-8.44 18.13h-.01a9.76 9.76 0 0 1-4.97-1.36l-.36-.22-3.71.97.99-3.62-.24-.37a9.8 9.8 0 0 1-1.5-5.2c0-5.4 4.4-9.8 9.8-9.8a9.72 9.72 0 0 1 6.93 2.87 9.73 9.73 0 0 1 2.87 6.93c0 5.4-4.4 9.8-9.8 9.8Zm5.38-7.34c-.3-.15-1.77-.87-2.04-.97-.27-.1-.47-.15-.67.15-.2.3-.77.97-.94 1.17-.17.2-.35.22-.65.07-.3-.15-1.25-.46-2.39-1.47a8.99 8.99 0 0 1-1.66-2.07c-.17-.3-.02-.46.13-.61.14-.14.3-.35.45-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.03-.52-.07-.15-.67-1.62-.91-2.22-.24-.57-.48-.5-.67-.5h-.57c-.2 0-.52.08-.8.37-.27.3-1.04 1.02-1.04 2.47 0 1.46 1.06 2.86 1.2 3.06.15.2 2.08 3.18 5.04 4.46.7.3 1.25.48 1.68.62.71.23 1.36.2 1.87.12.57-.08 1.77-.72 2.02-1.42.25-.7.25-1.3.17-1.42-.07-.12-.27-.2-.57-.35Z"/></svg>
        <span>Dúvidas? Nossa equipe está pronta para te atender.</span>
    </a>
    <?php endif; ?>
</body>
</html>
