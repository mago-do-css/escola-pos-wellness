<?php

declare(strict_types=1);
?>
<header class="site-header" data-header>
    <div class="page-container site-header__inner">
        <a class="site-header__brand" href="/" aria-label="Pós-Wellness — página inicial">
            <img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness" width="192" height="70">
        </a>

        <nav class="site-header__nav" aria-label="Navegação principal">
            <a href="#como-funciona">Como funciona</a>
            <a href="#o-que-voce-recebe">O que você recebe</a>
            <a href="#limites">Limites</a>
            <a href="#duvidas">Dúvidas</a>
        </nav>

        <a class="site-header__cta" href="#receber-mapa">Acessar gratuitamente</a>

        <button
            class="site-header__toggle"
            type="button"
            aria-label="Abrir menu"
            aria-controls="mobile-navigation"
            aria-expanded="false"
            data-menu-toggle
        >
            <span></span>
            <span></span>
        </button>
    </div>

    <div id="mobile-navigation" class="mobile-nav" aria-hidden="true" data-mobile-menu>
        <nav class="page-container mobile-nav__links" aria-label="Navegação mobile">
            <a href="#como-funciona">Como funciona</a>
            <a href="#o-que-voce-recebe">O que você recebe</a>
            <a href="#limites">Limites</a>
            <a href="#duvidas">Dúvidas</a>
            <a class="button button--primary" href="#receber-mapa">Acessar gratuitamente</a>
        </nav>
    </div>
</header>
