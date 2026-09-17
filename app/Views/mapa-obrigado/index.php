<?php

declare(strict_types=1);

/** @var string $vslEmbedUrl */
?>
<main class="thank-you-page">
    <div class="thank-you-page__shade" aria-hidden="true"></div>

    <div class="page-container thank-you-page__inner">
        <a class="thank-you-page__brand" href="/" aria-label="Pós-Wellness: voltar para a página inicial">
            <img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness">
        </a>

        <section class="thank-you-page__content" aria-labelledby="thank-you-title">
            <p class="thank-you-page__eyebrow">Mapa do Dinheiro</p>
            <h1 id="thank-you-title">Seu download está pronto.<br>Agora, olhe além do padrão.</h1>
            <p class="thank-you-page__lead">
                O Mapa é o seu primeiro passo. Assista ao vídeo abaixo para entender como transformar essa observação em uma mudança mais consciente na sua relação com o dinheiro.
            </p>

            <section class="vsl" aria-labelledby="vsl-title">
                <div class="vsl__heading">
                    <p>Próximo passo</p>
                    <h2 id="vsl-title">Assista antes de abrir o mapa.</h2>
                </div>

                <?php if ($vslEmbedUrl !== '') : ?>
                    <div class="vsl__embed">
                        <iframe
                            src="<?= htmlspecialchars($vslEmbedUrl, ENT_QUOTES, 'UTF-8') ?>"
                            title="Vídeo: próximo passo após o Mapa do Dinheiro"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen
                        ></iframe>
                    </div>
                <?php else : ?>
                    <div class="vsl__placeholder" aria-label="Área reservada para a VSL">
                        <span class="vsl__play" aria-hidden="true">▶</span>
                        <p>VSL</p>
                        <strong>Área pronta para inserir o seu vídeo de oferta.</strong>
                    </div>
                <?php endif; ?>
            </section>

            <a class="button button--primary thank-you-page__download" href="/baixar-mapa-do-dinheiro">
                Baixar o Mapa do Dinheiro novamente
            </a>
        </section>
    </div>
</main>
