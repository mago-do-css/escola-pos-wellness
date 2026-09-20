<?php

declare(strict_types=1);

/** @var string $upsellCheckoutUrl */
/** @var int $upsellPrice */
?>
<link rel="stylesheet" href="/assets/css/radar-landing.css">
<link rel="stylesheet" href="/assets/css/por-tras-landing.css">

<main class="por-tras-thanks">
    <div class="page-container por-tras-thanks__topbar">
        <a href="/por-tras-do-dinheiro" aria-label="Voltar ao Por Trás do Dinheiro">
            <img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness">
        </a>
        <span>Compra confirmada</span>
    </div>

    <section class="page-container por-tras-thanks__hero">
        <div>
            <p class="section-kicker section-kicker--light">Seu próximo passo já está disponível</p>
            <h1>Seu Mapa da Função começa aqui. E uma nova pergunta pode começar agora.</h1>
            <p>O acesso ao Por Trás do Dinheiro será enviado pela Kiwify para o e-mail usado na compra. Você também pode entrar na sua conta da Kiwify e abrir a área de membros.</p>
            <div class="access-note">
                <span>Como acessar</span>
                <ol>
                    <li>Procure o e-mail de confirmação da Kiwify.</li>
                    <li>Abra o link de acesso à área de membros.</li>
                    <li>Comece pelo Mapa e pelo Radar caso ainda não tenha feito essas etapas.</li>
                </ol>
            </div>
        </div>
        <figure class="creative-placeholder creative-placeholder--thanks" aria-label="Espaço preparado para imagem de confirmação e continuidade">
            <span>Imagem sugerida</span>
            <strong>Mãos colocando o Mapa da Função dentro de uma pasta de estudo, enquanto outro caderno permanece fechado ao lado.</strong>
            <small>Direção: composição zenital, gesto de conclusão e continuidade. O segundo caderno pode antecipar discretamente o Dinheiro é Fruto.</small>
        </figure>
    </section>

    <section id="vsl" class="page-container por-tras-upsell-vsl">
        <div class="por-tras-upsell-vsl__heading">
            <p class="section-kicker section-kicker--light">Antes de abrir o material</p>
            <h2>Assista: onde uma hipótese de função pode levar a investigação.</h2>
        </div>
        <div class="vsl-stage" role="img" aria-label="Espaço preparado para a VSL do produto Dinheiro é Fruto">
            <span class="vsl-stage__play" aria-hidden="true">▶</span>
            <p>VSL — Dinheiro é Fruto</p>
            <strong>Área pronta para receber o vídeo de apresentação do produto de R$<?= $upsellPrice ?>.</strong>
            <small>Thumbnail sugerida: Sávio e Mari diante de uma mesa com os quatro mapas abertos, sem pose, em conversa real.</small>
        </div>
    </section>

    <section class="por-tras-upsell">
        <div class="page-container por-tras-upsell__grid">
            <div>
                <p class="section-kicker section-kicker--light">Dinheiro é Fruto · R$<?= $upsellPrice ?></p>
                <h2>Você construiu uma hipótese. Agora pode investigar onde essa lógica encontra a sua história — e onde começa a existir escolha.</h2>
                <p>O Por Trás do Dinheiro ajuda você a formular uma hipótese sobre a função do comportamento. O Dinheiro é Fruto conecta comportamento, sequência, função, história e os primeiros sinais que podem abrir um intervalo antes da resposta automática.</p>
                <a class="button button--primary" href="<?= htmlspecialchars($upsellCheckoutUrl, ENT_QUOTES, 'UTF-8') ?>">Quero conhecer o Dinheiro é Fruto</a>
                <p class="por-tras-upsell__note">Pagamento único de R$<?= $upsellPrice ?>. A oferta será conectada ao checkout da Kiwify.</p>
            </div>
            <figure class="creative-placeholder creative-placeholder--upsell" aria-label="Espaço preparado para mockup do Dinheiro é Fruto">
                <span>Mockup sugerido</span>
                <strong>Quatro cadernos sobrepostos representando Fruto, História, Repetição e Escolha, ligados por uma linha cobre contínua.</strong>
                <small>Direção: fundo escuro, luz recortada, acabamento editorial premium e um “Mapa Integrado” parcialmente aberto.</small>
            </figure>
        </div>
    </section>

    <section class="por-tras-thanks__movements">
        <div class="page-container">
            <p class="section-kicker">Quatro movimentos</p>
            <h2>Do que acontece hoje ao ponto em que pode surgir espaço para responder de outra maneira.</h2>
            <ol>
                <li><span>01</span><div><h3>O Fruto</h3><p>Separar fatos concretos da resposta que continua chamando sua atenção.</p></div></li>
                <li><span>02</span><div><h3>A História</h3><p>Investigar relações, frases e momentos sem procurar culpados nem uma causa rápida.</p></div></li>
                <li><span>03</span><div><h3>A Repetição</h3><p>Reconhecer semelhanças e diferenças entre situações antigas e atuais.</p></div></li>
                <li><span>04</span><div><h3>A Escolha</h3><p>Perceber sinais mais cedo e construir um intervalo antes da resposta automática.</p></div></li>
            </ol>
        </div>
    </section>

    <section class="por-tras-thanks__integrated">
        <div class="page-container por-tras-split por-tras-split--center">
            <figure class="creative-placeholder creative-placeholder--integrated" aria-label="Espaço preparado para fotografia do Mapa Integrado">
                <span>Imagem de entrega sugerida</span>
                <strong>Foto realista de uma mesa ao fim de uma sessão de estudo: páginas marcadas, lápis apoiado e o “Meu Mapa Integrado do Dinheiro” no centro.</strong>
                <small>Direção: luz do fim da tarde, pequenas imperfeições, sensação de percurso concluído — não de material recém-impresso.</small>
            </figure>
            <div>
                <p class="section-kicker">O que você constrói</p>
                <h2>Um Mapa Integrado do Dinheiro.</h2>
                <p>Um documento que reúne comportamento, sequência, hipótese de função, histórias que apareceram, repetições, diferenças, sinais de entrada e aquilo que continua aberto.</p>
                <p class="por-tras-emphasis">Não é uma promessa de mudar seu padrão. É uma forma mais precisa de reconhecer onde pode existir espaço de escolha.</p>
            </div>
        </div>
    </section>
</main>

<footer class="por-tras-footer">
    <div class="page-container por-tras-footer__grid">
        <div>
            <img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness">
            <p>O dinheiro abriu a porta. A investigação continua no ser humano que o movimenta.</p>
        </div>
        <nav aria-label="Rodapé">
            <a href="#vsl">Assistir à VSL</a>
            <a href="/por-tras-do-dinheiro">Ver o Por Trás do Dinheiro</a>
        </nav>
    </div>
</footer>
