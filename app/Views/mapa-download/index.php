<?php

declare(strict_types=1);

/** @var string $downloadUrl */
/** @var string $downloadFilename */
?>
<main
    class="download-page"
    data-download-page
    data-download-url="<?= htmlspecialchars($downloadUrl, ENT_QUOTES, 'UTF-8') ?>"
    data-download-filename="<?= htmlspecialchars($downloadFilename, ENT_QUOTES, 'UTF-8') ?>"
    data-countdown="3"
>
    <div class="download-page__shade" aria-hidden="true"></div>

    <div class="page-container download-page__inner">
        <a class="download-page__brand" href="/" aria-label="Pós-Wellness: voltar para a página inicial">
            <img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness">
        </a>

        <section class="download-card" aria-labelledby="download-title">
            <p class="download-card__eyebrow">Mapa do Dinheiro</p>
            <h1 id="download-title">Seu mapa está a caminho.</h1>
            <p class="download-card__description">
                Em poucos minutos, você vai observar comportamentos concretos que podem estar moldando a sua relação com o dinheiro.
            </p>

            <div class="download-progress" role="status" aria-live="polite" aria-atomic="true">
                <span class="download-progress__label" data-download-status>Preparando o download</span>
                <span class="download-progress__number" data-download-countdown>3</span>
            </div>

            <div class="download-card__fallback" data-download-fallback hidden>
                <p data-download-fallback-message>Se o download não começar em alguns segundos, use o botão abaixo.</p>
                <a
                    class="button button--primary"
                    href="<?= htmlspecialchars($downloadUrl, ENT_QUOTES, 'UTF-8') ?>"
                    download="<?= htmlspecialchars($downloadFilename, ENT_QUOTES, 'UTF-8') ?>"
                    data-download-link
                >Baixar o Mapa do Dinheiro</a>
            </div>
        </section>

        <p class="download-page__footer">Você pode fechar esta página assim que o download começar.</p>
    </div>
</main>

<script src="/assets/js/mapa-download.js" defer></script>
