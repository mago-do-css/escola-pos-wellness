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
                    <a class="button button--text" href="#o-que-voce-repete">Entenda como funciona</a>
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

    <section id="o-que-voce-repete" class="patterns" aria-labelledby="patterns-title">
        <div class="page-container">
            <div class="patterns__intro">
                <p class="section-kicker">Antes de tentar corrigir</p>
                <h2 id="patterns-title" class="patterns__title">O que você repete<br>sem perceber?</h2>
                <p class="patterns__lead">
                    Às vezes, o que parece ser apenas uma dificuldade com dinheiro é uma resposta que volta sempre que uma situação acontece. O Mapa do Dinheiro começa por aqui: observar, com mais precisão, o que você faz.
                </p>
            </div>

            <ol class="patterns__grid">
                <li class="pattern-card">
                    <span class="pattern-card__number" aria-hidden="true">01</span>
                    <h3>Gastar demais</h3>
                    <p>O dinheiro entra e logo encontra um destino — mesmo quando você tinha outro plano.</p>
                </li>
                <li class="pattern-card">
                    <span class="pattern-card__number" aria-hidden="true">02</span>
                    <h3>Não conseguir guardar</h3>
                    <p>Guardar parece importante, mas algo sempre acontece antes de o valor ficar.</p>
                </li>
                <li class="pattern-card">
                    <span class="pattern-card__number" aria-hidden="true">03</span>
                    <h3>Ter medo de gastar</h3>
                    <p>Mesmo quando é possível, gastar pode trazer culpa, tensão ou a sensação de risco.</p>
                </li>
                <li class="pattern-card">
                    <span class="pattern-card__number" aria-hidden="true">04</span>
                    <h3>Ajudar sempre</h3>
                    <p>As necessidades dos outros parecem vir antes, inclusive quando isso aperta a sua vida.</p>
                </li>
                <li class="pattern-card pattern-card--featured">
                    <span class="pattern-card__number" aria-hidden="true">05</span>
                    <h3>Ver o dinheiro desaparecer</h3>
                    <p>Entrou, passou por você e saiu. Sem clareza de como ou por quê.</p>
                </li>
            </ol>

            <p class="patterns__note">
                Não é sobre definir quem você é. É sobre reconhecer o que você faz quando algo acontece.
            </p>
        </div>
    </section>
</main>
