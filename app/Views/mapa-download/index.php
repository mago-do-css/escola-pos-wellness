<?php

declare(strict_types=1);

/** @var string $downloadUrl */
/** @var string $downloadFilename */
/** @var string $vslVideoUrl */
/** @var string $vslPosterUrl */
/** @var string $nextProductUrl */
/** @var int $nextProductPrice */
?>
<main
    class="thank-you-page download-upsell"
    data-download-page
    data-download-url="<?= htmlspecialchars($downloadUrl, ENT_QUOTES, 'UTF-8') ?>"
    data-download-filename="<?= htmlspecialchars($downloadFilename, ENT_QUOTES, 'UTF-8') ?>"
    data-countdown="3"
>
    <div class="thank-you-page__shade" aria-hidden="true"></div>

    <div class="page-container thank-you-page__inner">
        <a class="thank-you-page__brand" href="/" aria-label="Pós-Wellness: voltar para a página inicial">
            <img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness">
        </a>

        <section class="thank-you-page__content download-upsell__content" aria-labelledby="download-title">
            <div class="download-upsell__hero">
                <div class="download-upsell__intro">
                    <p class="thank-you-page__eyebrow">Mapa do Dinheiro · gratuito</p>
                    <h1 id="download-title">Seu Mapa está sendo baixado.<br>Agora escolha uma situação real.</h1>
                    <p class="thank-you-page__lead">Você pediu o Mapa pelo Instagram para enxergar uma repetição com mais clareza. Comece por uma cena concreta: a compra, o Pix, a conta adiada ou a conversa que sempre termina do mesmo jeito.</p>

                    <div class="download-progress download-progress--thank-you" role="status" aria-live="polite" aria-atomic="true">
                        <span class="download-progress__label" data-download-status>Preparando o download</span>
                        <span class="download-progress__number" data-download-countdown>3</span>
                    </div>

                    <div class="download-upsell__fallback" data-download-fallback hidden>
                        <p data-download-fallback-message>Se o download não começar em alguns segundos, use o botão abaixo.</p>
                        <a class="button button--primary" href="<?= htmlspecialchars($downloadUrl, ENT_QUOTES, 'UTF-8') ?>" download="<?= htmlspecialchars($downloadFilename, ENT_QUOTES, 'UTF-8') ?>" data-download-link>Baixar o Mapa agora</a>
                    </div>
                </div>

                <figure class="download-upsell__image">
                    <img src="/assets/images/mapa/hero-mapa-do-dinheiro.png" alt="Caderno aberto para observar uma situação financeira de forma guiada">
                </figure>
            </div>

            <section class="vsl download-upsell__vsl" aria-labelledby="vsl-title">
                <div class="vsl__heading">
                    <p>Depois do Mapa</p>
                    <h2 id="vsl-title">Assista ao vídeo antes de decidir se quer aprofundar a observação.</h2>
                </div>
                <div class="vsl__video">
                    <video controls preload="metadata" playsinline poster="<?= htmlspecialchars($vslPosterUrl, ENT_QUOTES, 'UTF-8') ?>">
                        <source src="<?= htmlspecialchars($vslVideoUrl, ENT_QUOTES, 'UTF-8') ?>" type="video/mp4">
                        Seu navegador não oferece suporte à reprodução deste vídeo.
                    </video>
                </div>
            </section>

            <section class="download-upsell__offer" aria-labelledby="offer-title">
                <div>
                    <p class="thank-you-page__eyebrow">Segundo passo · R$<?= $nextProductPrice ?></p>
                    <h2 id="offer-title">O Mapa mostra o que se repete. O Radar ajuda você a acompanhar a sequência que vem antes e depois disso.</h2>
                    <p>Você já tem uma situação para observar. No Radar do Dinheiro, registra o contexto, o pensamento, o afeto, o impulso, a ação e o efeito imediato. São pistas para construir uma hipótese honesta, no seu ritmo.</p>
                    <ul>
                        <li>Transforme uma impressão em uma sequência observável.</li>
                        <li>Veja o que acontece nos minutos antes da ação.</li>
                        <li>Continue a investigação sem buscar um rótulo ou resposta pronta.</li>
                    </ul>
                    <a class="button button--primary" href="<?= htmlspecialchars($nextProductUrl, ENT_QUOTES, 'UTF-8') ?>">Conhecer o Radar do Dinheiro por R$<?= $nextProductPrice ?></a>
                    <p class="download-upsell__note">O Mapa continua sendo seu primeiro passo. O Radar é a continuação para quando você quiser observar mais de perto.</p>
                </div>
                <figure class="download-upsell__product">
                    <img src="/assets/images/mapa/mapa-integrado.png" alt="Materiais do Radar do Dinheiro organizados sobre uma mesa">
                </figure>
            </section>
        </section>
    </div>
</main>

<script src="/assets/js/mapa-download.js?v=20261023-3" defer></script>
