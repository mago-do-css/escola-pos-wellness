<?php

declare(strict_types=1);
?>
<header class="site-header" data-header>
    <div class="page-container site-header__inner">
        <a class="site-header__brand" href="/radar-do-dinheiro" aria-label="Escola Pós-Wellness — Radar do Dinheiro">
            <img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness" width="192" height="70">
        </a>
        <nav class="site-header__nav" aria-label="Navegação principal">
            <a href="#o-radar">O Radar</a>
            <a href="#sete-dias">Como funciona</a>
            <a href="#radar-preenchido">O que você constrói</a>
            <a href="#faq">FAQ</a>
        </nav>
        <a class="site-header__cta" href="<?= htmlspecialchars($checkoutUrl, ENT_QUOTES, 'UTF-8') ?>">Começar meu Radar</a>
        <button class="site-header__toggle" type="button" aria-label="Abrir menu" aria-controls="radar-mobile-navigation" aria-expanded="false" data-menu-toggle>
            <span></span><span></span>
        </button>
    </div>
    <div id="radar-mobile-navigation" class="mobile-nav" aria-hidden="true" data-mobile-menu>
        <nav class="page-container mobile-nav__links" aria-label="Navegação mobile">
            <a href="#o-radar">O Radar</a>
            <a href="#sete-dias">Como funciona</a>
            <a href="#radar-preenchido">O que você constrói</a>
            <a href="#faq">FAQ</a>
            <a class="button button--primary" href="<?= htmlspecialchars($checkoutUrl, ENT_QUOTES, 'UTF-8') ?>">Começar meu Radar</a>
        </nav>
    </div>
</header>
