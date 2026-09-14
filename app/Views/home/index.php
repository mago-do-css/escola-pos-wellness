<?php

declare(strict_types=1);
?>
<main>
    <section class="hero" aria-labelledby="hero-title">
        <div class="hero__shade" aria-hidden="true"></div>
        <?php require dirname(__DIR__) . '/partials/navbar.php'; ?>

        <div class="page-container hero__content">
            <div class="hero__copy">
                <p class="hero__eyebrow">Mapa do Dinheiro</p>
                <h1 id="hero-title" class="hero__title">
                    O que você repete<br class="hidden sm:block"> sem perceber?
                </h1>
                <p class="hero__description">
                    Uma experiência gratuita e breve para reconhecer comportamentos concretos que podem moldar a forma como você organiza suas finanças — sem rótulos e sem julgamentos.
                </p>

                <div class="hero__actions">
                    <a class="button button--primary" href="#receber-mapa">Quero receber o mapa</a>
                    <a class="button button--text" href="#como-funciona">Entenda como funciona</a>
                </div>
            </div>

            <aside class="hero__note" aria-label="Sobre a experiência">
                <span class="hero__note-index" aria-hidden="true">01</span>
                <p>
                    Em poucos minutos, você observa situações reais e identifica o que costuma fazer quando o dinheiro entra em cena.
                </p>
            </aside>
        </div>

        <div class="page-container hero__footer" aria-hidden="true">
            <span>Role para conhecer</span>
            <span class="hero__line"></span>
        </div>
    </section>

    <section id="como-funciona" class="stage-placeholder" aria-label="Próxima seção">
        <div class="page-container">
            <p>Como funciona</p>
        </div>
    </section>
</main>
