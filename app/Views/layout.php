<?php

declare(strict_types=1);

/** @var string $pageTitle */
/** @var string $content */
?>
<!doctype html>
<html lang="pt-BR" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Reconheça os comportamentos que se repetem na sua relação com o dinheiro.">
    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="icon" href="/assets/images/favicon/favicon.svg" type="image/svg+xml">
    <link rel="alternate icon" href="/favicon.ico" sizes="any">
    <link rel="apple-touch-icon" href="/assets/images/favicon/favicon-180x180.png">
    <link rel="icon" href="/assets/images/favicon/favicon-192x192.png" type="image/png" sizes="192x192">
    <link rel="stylesheet" href="/assets/css/app.css">
    <script src="/assets/js/app.js" defer></script>
    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '856427817463701');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=856427817463701&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
</head>
<body class="bg-cream text-ink antialiased">
    <?= $content ?>
</body>
</html>
