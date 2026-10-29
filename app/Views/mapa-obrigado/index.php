<?php
declare(strict_types=1);
?>
<main class="mapa-thanks-light">
    <div class="page-container mapa-thanks-light__inner">
        <a class="mapa-thanks-light__brand" href="/" aria-label="Pós-Wellness: página inicial"><img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness"></a>
        <section class="mapa-thanks-light__download" aria-labelledby="download-title">
            <div>
                <p class="mapa-thanks-light__eyebrow">Seu Mapa gratuito</p>
                <h1 id="download-title">O primeiro passo está nas suas mãos.</h1>
                <p>Obrigado por começar. Baixe seu Mapa pelo botão ao lado.</p>
            </div>
            <div class="mapa-thanks-light__download-action">
                <a class="button mapa-thanks-light__download-button" href="<?= htmlspecialchars($downloadUrl, ENT_QUOTES, 'UTF-8') ?>" download="<?= htmlspecialchars($downloadFilename, ENT_QUOTES, 'UTF-8') ?>">Baixar meu Mapa em PDF <span aria-hidden="true">↓</span></a>
            </div>
        </section>
        <section class="mapa-thanks-light__upsell" aria-labelledby="upsell-title">
            <header>
                <p class="mapa-thanks-light__eyebrow">Do Mapa à jornada Por Trás do Dinheiro</p>
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
                <a class="button mapa-thanks-light__cta" href="/por-tras-do-dinheiro">Conhecer Por Trás do Dinheiro <span aria-hidden="true">→</span></a>
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
