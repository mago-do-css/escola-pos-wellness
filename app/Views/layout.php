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
    <link rel="stylesheet" href="/assets/css/app.css">
    <script src="/assets/js/app.js" defer></script>
</head>
<body class="bg-cream text-ink antialiased">
    <?= $content ?>
</body>
</html>
