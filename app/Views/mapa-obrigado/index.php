<?php

declare(strict_types=1);

/** @var string $downloadUrl */
/** @var string $downloadFilename */
/** @var string $vslVideoUrl */
/** @var string $vslPosterUrl */
?>
<main
    class="thank-you-page"
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

        <section class="thank-you-page__content mapa-thank-you__content" aria-labelledby="thank-you-title">
            <div class="mapa-thank-you__hero">
                <div class="mapa-thank-you__intro">
                    <p class="thank-you-page__eyebrow">Mapa do Dinheiro</p>
                    <h1 id="thank-you-title">Seu download está pronto.<br>Comece por uma situação real.</h1>
                    <p class="thank-you-page__lead">
                        O Mapa ajuda você a escolher um comportamento financeiro que se repete e observá-lo com mais atenção. Use o vídeo para entrar no material com uma pergunta concreta em mãos.
                    </p>

                    <div class="download-progress download-progress--thank-you" role="status" aria-live="polite" aria-atomic="true">
                        <span class="download-progress__label" data-download-status>Preparando o download automático</span>
                        <span class="download-progress__number" data-download-countdown>3</span>
                    </div>

                    <a
                        class="button button--primary thank-you-page__download"
                        href="<?= htmlspecialchars($downloadUrl, ENT_QUOTES, 'UTF-8') ?>"
                        download="<?= htmlspecialchars($downloadFilename, ENT_QUOTES, 'UTF-8') ?>"
                        data-download-link
                    >
                        Baixar o Mapa agora
                    </a>
                </div>

                <div class="vsl__video mapa-thank-you__video">
                    <video controls preload="metadata" playsinline poster="<?= htmlspecialchars($vslPosterUrl, ENT_QUOTES, 'UTF-8') ?>">
                        <source src="<?= htmlspecialchars($vslVideoUrl, ENT_QUOTES, 'UTF-8') ?>" type="video/mp4">
                        Seu navegador não oferece suporte à reprodução deste vídeo.
                    </video>
                </div>
            </div>

            <section class="mapa-next-step" aria-labelledby="mapa-next-step-title">
                <div class="mapa-next-step__content">
                    <p class="thank-you-page__eyebrow">Continue depois do Mapa</p>
                    <h2 id="mapa-next-step-title">Uma repetição começa em uma cena. Por Trás do Dinheiro ajuda você a investigar o que essa cena ainda não mostra.</h2>
                    <p>O Mapa coloca uma pergunta concreta nas suas mãos. Por Trás do Dinheiro continua a jornada com registros de contexto, pensamento, afeto, impulso, ação e efeito imediato. Assim, a sua observação ganha sequência antes de virar explicação.</p>
                    <ul class="mapa-next-step__list">
                        <li>Leve a situação escolhida no Mapa para uma sequência observável.</li>
                        <li>Reúna pistas antes de tentar explicar o que aconteceu.</li>
                        <li>Construa uma hipótese sem buscar um rótulo ou resposta pronta.</li>
                    </ul>
                    <a class="button mapa-next-step__cta" href="/por-tras-do-dinheiro">Conhecer Por Trás do Dinheiro</a>
                    <p class="mapa-next-step__note">O Mapa continua sendo seu ponto de partida. Na próxima página, você vê como seguir a investigação.</p>
                </div>
            </section>
        </section>
    </div>
</main>

<script src="/assets/js/mapa-download.js?v=20261023-2" defer></script>
