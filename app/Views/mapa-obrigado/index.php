<?php
declare(strict_types=1);
?>
<main class="mapa-thanks-light" data-download-page data-download-url="<?= htmlspecialchars($downloadUrl, ENT_QUOTES, 'UTF-8') ?>" data-download-filename="<?= htmlspecialchars($downloadFilename, ENT_QUOTES, 'UTF-8') ?>" data-countdown="3">
    <div class="page-container mapa-thanks-light__inner">
        <a class="mapa-thanks-light__brand" href="/" aria-label="Pós-Wellness: página inicial"><img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness"></a>
        <section class="mapa-thanks-light__download" aria-labelledby="download-title">
            <div>
                <p class="mapa-thanks-light__eyebrow">Seu Mapa gratuito</p>
                <h1 id="download-title">O primeiro passo está nas suas mãos.</h1>
                <p>Obrigado por começar. Seu download será iniciado automaticamente.</p>
            </div>
            <div class="mapa-thanks-light__download-action">
                <p role="status" aria-live="polite"><span data-download-status>Preparando o download</span> <strong data-download-countdown>3</strong></p>
                <a class="button mapa-thanks-light__download-button" href="<?= htmlspecialchars($downloadUrl, ENT_QUOTES, 'UTF-8') ?>" download="<?= htmlspecialchars($downloadFilename, ENT_QUOTES, 'UTF-8') ?>" data-download-link>Baixar meu Mapa em PDF <span aria-hidden="true">↓</span></a>
            </div>
        </section>
        <section class="mapa-thanks-light__upsell" aria-labelledby="upsell-title">
            <header>
                <p class="mapa-thanks-light__eyebrow">Da primeira observação ao próximo passo</p>
                <h2 id="upsell-title">Perceber que você repete abre uma pergunta: o que acontece ao redor dessa escolha?</h2>
                <p>Assista ao vídeo e conheça a continuação do seu Mapa.</p>
            </header>
            <div class="mapa-thanks-light__video">
                <video controls preload="metadata" playsinline poster="<?= htmlspecialchars($vslPosterUrl, ENT_QUOTES, 'UTF-8') ?>">
                    <source src="<?= htmlspecialchars($vslVideoUrl, ENT_QUOTES, 'UTF-8') ?>" type="video/mp4">
                    Seu navegador não oferece suporte à reprodução deste vídeo.
                </video>
            </div>
            <div class="mapa-thanks-light__action">
                <p>Com <strong>Por Trás do Dinheiro</strong>, leve sua observação para uma investigação guiada.</p>
                <a class="button mapa-thanks-light__cta" href="/por-tras-do-dinheiro">Quero dar o próximo passo <span aria-hidden="true">→</span></a>
                <p class="mapa-thanks-light__reassurance">Conheça os dois módulos e veja como seguir a partir da cena que escolheu.</p>
                <ul aria-label="A continuação da jornada">
                    <li><span aria-hidden="true">01</span>Observe a sequência</li>
                    <li><span aria-hidden="true">02</span>Investigue sua função</li>
                    <li><span aria-hidden="true">03</span>Construa sua hipótese</li>
                </ul>
            </div>
        </section>
    </div>
</main>
<script src="/assets/js/mapa-download.js?v=20261023-2" defer></script>
