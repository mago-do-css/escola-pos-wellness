<?php

declare(strict_types=1);

/** @var string $downloadUrl */
/** @var string $downloadFilename */
/** @var string $vslVideoUrl */
/** @var string $vslPosterUrl */
/** @var string $nextProductUrl */
?>
<main class="thank-you-page download-upsell">
    <div class="thank-you-page__shade" aria-hidden="true"></div>

    <div class="page-container thank-you-page__inner">
        <a class="thank-you-page__brand" href="/" aria-label="Pós-Wellness: voltar para a página inicial">
            <img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness">
        </a>

        <section class="thank-you-page__content download-upsell__content" aria-labelledby="download-title">
            <div class="download-upsell__hero">
                <div class="download-upsell__intro">
                    <p class="thank-you-page__eyebrow">Mapa do Dinheiro · gratuito</p>
                    <h1 id="download-title">Seu Mapa está pronto.<br>Agora escolha uma situação real.</h1>
                    <p class="thank-you-page__lead">Você pediu o Mapa pelo Instagram para enxergar uma repetição com mais clareza. Comece por uma cena concreta: a compra, o Pix, a conta adiada ou a conversa que sempre termina do mesmo jeito.</p>

                    <div class="download-upsell__fallback">
                        <p>Seu download não começa sozinho. Use o botão para baixar o Mapa.</p>
                        <a class="button button--primary" href="<?= htmlspecialchars($downloadUrl, ENT_QUOTES, 'UTF-8') ?>" download="<?= htmlspecialchars($downloadFilename, ENT_QUOTES, 'UTF-8') ?>">Baixar o Mapa agora</a>
                    </div>
                </div>

                <figure class="download-upsell__image">
                    <img src="/assets/images/mapa/hero-mapa-do-dinheiro.webp" alt="Caderno aberto para observar uma situação financeira de forma guiada">
                </figure>
            </div>

            <section class="download-upsell__bridge" aria-labelledby="vsl-title">
                <div class="vsl download-upsell__vsl">
                    <div class="vsl__heading">
                        <p>Conheça Por Trás do Dinheiro</p>
                        <h2 id="vsl-title">O Mapa mostra uma cena. Assista e veja como investigar o que acontece antes e depois dela.</h2>
                    </div>
                    <div class="vsl__video">
                        <video controls preload="metadata" playsinline poster="<?= htmlspecialchars($vslPosterUrl, ENT_QUOTES, 'UTF-8') ?>">
                            <source src="<?= htmlspecialchars($vslVideoUrl, ENT_QUOTES, 'UTF-8') ?>" type="video/mp4">
                            Seu navegador não oferece suporte à reprodução deste vídeo.
                        </video>
                    </div>
                </div>
                <div class="download-upsell__summary">
                    <p class="download-upsell__invitation">Continue a partir do seu Mapa com <strong>Por Trás do Dinheiro.</strong></p>
                    <a class="button button--primary download-upsell__cta" href="<?= htmlspecialchars($nextProductUrl, ENT_QUOTES, 'UTF-8') ?>">Conhecer Por Trás do Dinheiro <span aria-hidden="true">→</span></a>
                    <p class="download-upsell__note">Veja os dois módulos de Por Trás do Dinheiro e como começar.</p>
                    <ul class="download-upsell__benefits" aria-label="O que vem a seguir">
                        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="3"/><path d="M12 1v3m0 16v3M1 12h3m16 0h3"/></svg><span>Observe a sequência</span></li>
                        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><circle cx="10" cy="10" r="6"/><path d="m15 15 6 6M7 10h6m-3-3v6"/></svg><span>Investigue o que se repete</span></li>
                        <li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true"><path d="M3 5c4-2 6-1 9 1 3-2 5-3 9-1v15c-4-2-6-1-9 1-3-2-5-3-9-1V5Zm9 1v15"/></svg><span>Siga uma jornada guiada</span></li>
                    </ul>
                </div>
            </section>
        </section>
    </div>
</main>
