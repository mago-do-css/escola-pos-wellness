<?php

declare(strict_types=1);

/** @var string $downloadUrl */
/** @var string $vslVideoUrl */
/** @var string $vslPosterUrl */
/** @var string $nextProductUrl */
?>
<main class="download-release" data-download-release data-download-url="<?= htmlspecialchars($downloadUrl, ENT_QUOTES, 'UTF-8') ?>">
    <iframe name="mapa-download-target" title="" aria-hidden="true" tabindex="-1" class="download-release__target"></iframe>
    <div class="page-container download-release__inner">
        <a class="download-release__brand" href="/" aria-label="Pós-Wellness: voltar para a página inicial"><img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness"></a>

        <section class="download-release__hero" aria-labelledby="download-title">
            <header class="download-release__heading">
                <div>
                    <p class="download-release__eyebrow" data-release-kicker>Seu download está sendo preparado. Aguarde...</p>
                    <h1 id="download-title">Enquanto seu Mapa é preparado, descubra o que está por trás da sua relação com o dinheiro.</h1>
                </div>
                <a class="download-release__next-step" href="<?= htmlspecialchars($nextProductUrl, ENT_QUOTES, 'UTF-8') ?>"><span>Próximo passo</span>Conhecer Por Trás do Dinheiro <b aria-hidden="true">→</b></a>
            </header>

            <p class="download-release__video-intro">O Mapa ajuda você a reconhecer situações que se repetem. Neste vídeo, conheça o próximo passo para observar o que acontece antes, durante e depois delas.</p>
            <div class="download-release__video">
                <video data-release-video playsinline preload="metadata" poster="<?= htmlspecialchars($vslPosterUrl, ENT_QUOTES, 'UTF-8') ?>">
                    <source src="<?= htmlspecialchars($vslVideoUrl, ENT_QUOTES, 'UTF-8') ?>" type="video/mp4">
                    Seu navegador não oferece suporte à reprodução deste vídeo.
                </video>
                <button class="download-release__play" type="button" data-video-play aria-label="Iniciar vídeo com som">
                    <span aria-hidden="true">▶</span>
                </button>
            </div>
            <p class="download-release__play-hint">Aperte o play para assistir ao vídeo.</p>

            <div class="download-release__progress" aria-live="polite">
                <div class="download-release__progress-copy"><strong data-release-status>Preparando seu Mapa do Dinheiro...</strong><span data-release-percent>0%</span></div>
                <div class="download-release__track" role="progressbar" aria-label="Preparação do download" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-release-track><span data-release-progress></span></div>
                <button class="download-release__download download-release__download--progress" type="button" disabled data-release-download><span data-release-button-text>Aguarde: preparando o PDF</span><b aria-hidden="true">↓</b></button>
            </div>
        </section>

        <section class="download-release__material is-locked" data-release-material aria-labelledby="material-title">
            <figure class="download-release__cover">
                <img src="/assets/images/mapa/mapa-do-dinheiro-capa-v2.webp" alt="Capa do Mapa do Dinheiro">
                <span data-release-cover-label>Preparando...</span>
            </figure>
            <div class="download-release__material-copy">
                <p class="download-release__eyebrow">Seu material</p>
                <h2 id="material-title">O Mapa do Dinheiro está sendo preparado para você.</h2>
                <p>Quando a barra chegar a 100%, a capa ganha cor e o botão de download é liberado.</p>
                <button class="download-release__download" type="button" disabled data-release-download><span data-release-button-text>Aguarde: preparando o PDF</span><b aria-hidden="true">↓</b></button>
                <p class="download-release__feedback" data-release-feedback aria-live="polite"></p>
                <div class="download-release__browser-help" data-in-app-browser-help hidden>
                    <strong>Está no navegador do Instagram?</strong>
                    <p>Se o arquivo não aparecer nos seus downloads, toque em <b>⋯</b> e escolha <b>Abrir no navegador externo</b>. Depois, volte e toque no botão novamente.</p>
                </div>
                <noscript><p><a href="<?= htmlspecialchars($downloadUrl, ENT_QUOTES, 'UTF-8') ?>">Baixar o Mapa do Dinheiro em PDF</a></p></noscript>
            </div>
        </section>
    </div>
</main>
<script src="/assets/js/mapa-download-release.js?v=20261031-3" defer></script>
