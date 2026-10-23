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

                <figure class="mapa-thank-you__image">
                    <img src="/assets/images/mapa/hero-mapa-do-dinheiro.png" alt="Caderno aberto para observar uma situação financeira com mais atenção">
                </figure>
            </div>

            <section class="vsl mapa-thank-you__vsl" aria-labelledby="vsl-title">
                <div class="vsl__heading">
                    <p>Antes de começar</p>
                    <h2 id="vsl-title">Uma pergunta boa muda a forma de preencher o Mapa.</h2>
                </div>
                <div class="vsl__video vsl__video--mapa">
                    <video controls preload="metadata" playsinline poster="<?= htmlspecialchars($vslPosterUrl, ENT_QUOTES, 'UTF-8') ?>">
                        <source src="<?= htmlspecialchars($vslVideoUrl, ENT_QUOTES, 'UTF-8') ?>" type="video/mp4">
                        Seu navegador não oferece suporte à reprodução deste vídeo.
                    </video>
                </div>
            </section>

            <section class="mapa-next-step" aria-labelledby="mapa-next-step-title">
                <div class="mapa-next-step__content">
                    <p class="thank-you-page__eyebrow">Depois do Mapa</p>
                    <h2 id="mapa-next-step-title">Você encontrou uma repetição. O próximo passo é olhar para a sequência que a mantém.</h2>
                    <p>O Mapa aponta uma situação concreta. No Radar do Dinheiro, você acompanha o que acontece antes, durante e logo depois dela: contexto, pensamento, afeto, impulso, comportamento, efeito imediato e consequência.</p>
                    <ul class="mapa-next-step__list">
                        <li>Transforme um rótulo amplo em uma situação observável.</li>
                        <li>Reúna pistas antes de tentar explicar o que aconteceu.</li>
                        <li>Avance para uma hipótese de função sem se reduzir a um diagnóstico.</li>
                    </ul>
                    <a class="button mapa-next-step__cta" href="/por-tras-do-dinheiro">Conhecer o Radar do Dinheiro completo</a>
                    <p class="mapa-next-step__note">O Mapa continua sendo seu ponto de partida. A próxima página mostra como a investigação segue.</p>
                </div>
            </section>
        </section>
    </div>
</main>

<script src="/assets/js/mapa-download.js?v=20261023-2" defer></script>
