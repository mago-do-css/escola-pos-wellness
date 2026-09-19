<?php

declare(strict_types=1);

/** @var string $vslEmbedUrl */
?>
<main class="thank-you-page radar-thank-you">
    <div class="thank-you-page__shade" aria-hidden="true"></div>

    <div class="page-container thank-you-page__inner">
        <a class="thank-you-page__brand" href="/radar-do-dinheiro" aria-label="Pós-Wellness: voltar ao Radar do Dinheiro">
            <img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness">
        </a>

        <section class="thank-you-page__content" aria-labelledby="thank-you-title">
            <p class="thank-you-page__eyebrow">Radar do Dinheiro concluído</p>
            <div class="radar-thank-you__hero">
                <div>
                    <h1 id="thank-you-title">Você enxergou o caminho.<br>Agora, uma pergunta fica aberta.</h1>
                    <p class="thank-you-page__lead">
                        Seu Radar não é um diagnóstico. É uma sequência que você conseguiu observar: o que aconteceu, o que passou pela sua cabeça, o que sentiu, a urgência, a ação e o que veio depois.
                    </p>
                    <p class="radar-thank-you__question">Se esse comportamento produz algo naquele momento, para que ele pode estar servindo?</p>
                </div>
                <div class="image-placeholder image-placeholder--portrait" role="img" aria-label="Espaço reservado para imagem de uma pessoa com o Radar do Dinheiro nas mãos">
                    <span>Imagem sugerida</span>
                    <strong>Pessoa segurando o Radar do Dinheiro, em um momento de observação.</strong>
                </div>
            </div>

            <section class="vsl" id="vsl" aria-labelledby="vsl-title">
                <div class="vsl__heading">
                    <p>Próximo passo</p>
                    <h2 id="vsl-title">Assista antes de decidir se quer continuar a investigação.</h2>
                </div>

                <?php if ($vslEmbedUrl !== '') : ?>
                    <div class="vsl__embed">
                        <iframe
                            src="<?= htmlspecialchars($vslEmbedUrl, ENT_QUOTES, 'UTF-8') ?>"
                            title="Vídeo: Por Trás do Dinheiro"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen
                        ></iframe>
                    </div>
                <?php else : ?>
                    <div class="vsl__placeholder" aria-label="Área reservada para a VSL do produto Por Trás do Dinheiro">
                        <span class="vsl__play" aria-hidden="true">▶</span>
                        <p>VSL — Por Trás do Dinheiro</p>
                        <strong>Área pronta para inserir o vídeo de apresentação do próximo passo.</strong>
                    </div>
                <?php endif; ?>
            </section>

            <section class="radar-thank-you__offer" aria-labelledby="offer-title">
                <div>
                    <p class="thank-you-page__eyebrow">Por Trás do Dinheiro · R$47</p>
                    <h2 id="offer-title">Não é mais sobre o que você faz. É sobre o que isso pode estar tentando resolver.</h2>
                    <p>
                        Em cinco encontros, você parte do seu Radar para construir uma hipótese sobre a função do comportamento — sem procurar uma explicação pronta, uma causa definitiva ou um rótulo para você.
                    </p>
                    <ul>
                        <li>O que isso me dá?</li>
                        <li>O que isso me ajuda a evitar?</li>
                        <li>O que isso parece proteger?</li>
                        <li>O que estou buscando através disso?</li>
                        <li>Que função esse comportamento pode estar cumprindo?</li>
                    </ul>
                    <a class="button button--primary" href="#vsl">Quero entender o próximo passo</a>
                    <p class="radar-thank-you__note">Ao final, você terá o seu Mapa da Função: uma hipótese construída a partir da sua própria experiência.</p>
                </div>
                <div class="image-placeholder image-placeholder--product" role="img" aria-label="Espaço reservado para mockup do produto Por Trás do Dinheiro">
                    <span>Imagem sugerida</span>
                    <strong>Mockup do produto Por Trás do Dinheiro com o Mapa da Função aberto.</strong>
                </div>
            </section>

            <section class="radar-thank-you__path" aria-label="Caminho da investigação">
                <p>Mapa do Dinheiro <span>O que eu repito?</span></p>
                <span aria-hidden="true">→</span>
                <p>Radar do Dinheiro <span>Como isso acontece?</span></p>
                <span aria-hidden="true">→</span>
                <p>Por Trás do Dinheiro <span>Para que isso pode estar servindo?</span></p>
            </section>
        </section>
    </div>
</main>
