<?php

declare(strict_types=1);

/** @var string $checkoutUrl */
/** @var bool $hasCheckout */
/** @var string $vslVideoUrl */
/** @var string $vslPosterUrl */
?>
<link rel="stylesheet" href="/assets/css/por-tras-landing.css?v=20261020-2">
<link rel="stylesheet" href="/assets/css/dinheiro-fruto-landing.css?v=20261031-1">

<main id="top" class="dinheiro-fruto-page">
    <section class="df-hero">
        <?php require dirname(__DIR__) . '/partials/dinheiro-fruto-navbar.php'; ?>
        <div class="page-container df-hero__grid">
            <div class="df-hero__copy">
                <p class="section-kicker section-kicker--light">Dinheiro é Fruto · Caderno de observação guiada</p>
                <h1>Antes de tentar mudar sua relação com o dinheiro, observe o que ela está tentando mostrar.</h1>
                <p class="df-hero__lead">Um percurso para ligar o que você faz hoje, a história que reconhece, o que se repete e as escolhas que deseja construir com mais presença.</p>
                <div class="df-hero__actions">
                    <a class="button button--primary" href="#oferta">Quero conhecer Dinheiro é Fruto</a>
                    <p>Um material digital para percorrer no seu ritmo, sem testes, rótulos ou explicações prontas.</p>
                </div>
            </div>

            <figure class="df-visual-slot df-visual-slot--hero">
                <figcaption>
                    <span>Imagem para criar no Magnific</span>
                    <strong>O caderno aberto no começo de uma observação</strong>
                    <small>Fotografia editorial vertical. Mesa de madeira clara, caderno sofisticado com o título “Dinheiro é Fruto”, caneta e luz de fim de tarde. Sem pessoas, sem texto adicional e com área negativa na parte superior para a página respirar.</small>
                </figcaption>
            </figure>
        </div>
        <div class="page-container df-hero__note">
            <span>O objetivo não é encontrar uma explicação definitiva.</span>
            <strong>É aprender a fazer perguntas melhores sobre uma situação real.</strong>
        </div>
    </section>

    <section id="vsl" class="df-section df-section--vsl" aria-labelledby="df-vsl-title">
        <div class="page-container df-vsl__heading">
            <p class="section-kicker">Conheça o percurso</p>
            <h2 id="df-vsl-title">Uma pausa entre o impulso e a resposta que você já conhece.</h2>
            <p>Assista antes de começar. O vídeo apresenta o jeito de usar o caderno e por que observar uma situação vem antes de tentar resolvê-la.</p>
        </div>
        <div class="page-container df-vsl">
            <?php if ($vslVideoUrl !== ''): ?>
                <video class="df-vsl__video" controls playsinline preload="metadata"<?= $vslPosterUrl !== '' ? ' poster="' . htmlspecialchars($vslPosterUrl, ENT_QUOTES, 'UTF-8') . '"' : '' ?>>
                    <source src="<?= htmlspecialchars($vslVideoUrl, ENT_QUOTES, 'UTF-8') ?>" type="video/mp4">
                    Seu navegador não oferece suporte à reprodução deste vídeo.
                </video>
            <?php else: ?>
                <div class="df-vsl__placeholder" role="img" aria-label="Espaço reservado para a VSL de Dinheiro é Fruto">
                    <span>VSL · espaço preparado</span>
                    <strong>Insira aqui o vídeo que apresenta o caderno e convida a pessoa a começar por uma situação real.</strong>
                    <p>Duração sugerida: 3 a 7 minutos. O vídeo deve mostrar os autores em um ambiente calmo, intercalado com cenas do caderno sendo preenchido. Evite promessas de cura, diagnóstico ou mudança garantida.</p>
                    <i aria-hidden="true">▶</i>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="df-section df-section--paper" aria-labelledby="df-problem-title">
        <div class="page-container df-split df-split--start">
            <div>
                <p class="section-kicker">Quando uma escolha parece voltar</p>
                <h2 id="df-problem-title">O dinheiro aparece na cena. A reação costuma ter uma história maior.</h2>
            </div>
            <div class="df-prose">
                <p>Adiar uma conversa, evitar abrir o aplicativo, comprar para aliviar a tensão ou dizer sim antes de olhar o próprio orçamento são cenas diferentes. O caderno ajuda você a descrevê-las antes de transformá-las em um rótulo.</p>
                <p>Em vez de “eu sou assim”, você registra o que aconteceu, o que sentiu, qual impulso apareceu e o que veio depois. É daí que uma observação honesta começa.</p>
            </div>
        </div>
    </section>

    <section id="percurso" class="df-section df-section--sand" aria-labelledby="df-path-title">
        <div class="page-container">
            <div class="df-heading-row">
                <div>
                    <p class="section-kicker">Quatro movimentos, um mapa</p>
                    <h2 id="df-path-title">Você não precisa responder tudo de uma vez.</h2>
                </div>
                <p>O percurso convida a escrever devagar, comparar situações e deixar espaço para aquilo que ainda não está claro.</p>
            </div>
            <ol class="df-movements">
                <li>
                    <span>01</span>
                    <h3>O fruto</h3>
                    <p>O que está acontecendo hoje, de verdade?</p>
                </li>
                <li>
                    <span>02</span>
                    <h3>A história</h3>
                    <p>Que cenas, frases e regras parecem familiares?</p>
                </li>
                <li>
                    <span>03</span>
                    <h3>A repetição</h3>
                    <p>Que lugar volta a aparecer quando a situação muda?</p>
                </li>
                <li>
                    <span>04</span>
                    <h3>A escolha</h3>
                    <p>Qual pequeno sinal pode abrir uma pausa antes da reação?</p>
                </li>
            </ol>
        </div>
    </section>

    <section id="caderno" class="df-section df-section--ink" aria-labelledby="df-caderno-title">
        <div class="page-container df-split df-split--media">
            <figure class="df-visual-slot df-visual-slot--spread">
                <figcaption>
                    <span>Imagem para criar no Magnific</span>
                    <strong>Detalhe de páginas internas em uso</strong>
                    <small>Fotografia editorial horizontal de um caderno aberto sobre uma mesa, com campos de escrita delicados e anotações manuscritas discretas em português. Paleta areia, marrom e cobre. Mostrar textura do papel e uma caneta, sem rostos e sem marcas concorrentes.</small>
                </figcaption>
            </figure>
            <div class="df-caderno-copy">
                <p class="section-kicker section-kicker--light">O que existe dentro</p>
                <h2 id="df-caderno-title">Um caderno que acompanha a observação sem tomar o seu lugar.</h2>
                <ul class="df-check-list">
                    <li>Orientações para diferenciar fatos, hipóteses e perguntas abertas.</li>
                    <li>Páginas para registrar uma situação, a resposta e seus efeitos.</li>
                    <li>Exemplos fictícios para mostrar como observar sem se diagnosticar.</li>
                    <li>Um mapa final para reunir o que fez sentido e o que ainda precisa de tempo.</li>
                </ul>
                <a class="button button--primary" href="#oferta">Quero percorrer esse caderno</a>
            </div>
        </div>
    </section>

    <section class="df-section df-section--paper" aria-labelledby="df-method-title">
        <div class="page-container df-method">
            <div class="df-method__copy">
                <p class="section-kicker">Um cuidado importante</p>
                <h2 id="df-method-title">Observar não é concluir cedo demais.</h2>
                <p>O material separa o que pode ser confirmado, o que parece uma explicação possível e o que ainda não se sabe. Essa diferença protege sua história de virar uma resposta pronta.</p>
            </div>
            <div class="df-method__cards">
                <article><span>Fato</span><p>O que uma câmera, um extrato, uma agenda ou outra pessoa poderia confirmar.</p></article>
                <article><span>Hipótese</span><p>Uma explicação possível que ajuda a observar melhor, sem virar conclusão.</p></article>
                <article><span>Em aberto</span><p>O que ainda precisa de tempo, comparação e uma pergunta mais precisa.</p></article>
            </div>
        </div>
    </section>

    <section class="df-section df-section--warm" aria-labelledby="df-life-title">
        <div class="page-container df-split df-split--media df-split--reverse">
            <div class="df-life-copy">
                <p class="section-kicker">Para levar à vida de hoje</p>
                <h2 id="df-life-title">Uma escolha não precisa nascer do oposto. Pode começar com uma pausa.</h2>
                <p>O caderno não promete acabar com uma repetição. Ele ajuda você a reconhecer o primeiro sinal e perguntar o que aquela situação precisa agora, antes de responder no automático.</p>
                <blockquote>“Se eu não precisasse responder imediatamente, que outras respostas existiriam?”</blockquote>
            </div>
            <figure class="df-visual-slot df-visual-slot--lifestyle">
                <figcaption>
                    <span>Imagem para criar no Magnific</span>
                    <strong>Uma pausa possível no cotidiano</strong>
                    <small>Fotografia realista, horizontal. Pessoa adulta vista de costas ou em perfil, sentada perto de uma janela, escrevendo em um caderno ao lado de uma xícara. Luz natural suave, expressão serena e ambiente brasileiro contemporâneo. A imagem deve transmitir presença, não euforia.</small>
                </figcaption>
            </figure>
        </div>
    </section>

    <section class="df-section df-section--audience" aria-labelledby="df-audience-title">
        <div class="page-container df-audience">
            <div>
                <p class="section-kicker section-kicker--light">Para quem é</p>
                <h2 id="df-audience-title">Para quem percebe uma repetição e quer olhar para ela com mais cuidado.</h2>
            </div>
            <div class="df-audience__lists">
                <div>
                    <h3>Este material pode fazer sentido se você:</h3>
                    <ul>
                        <li>quer observar escolhas financeiras sem se reduzir a um rótulo;</li>
                        <li>prefere perguntas honestas a respostas rápidas;</li>
                        <li>consegue reservar um tempo para escrever e reler o que registrou.</li>
                    </ul>
                </div>
                <div>
                    <h3>Ele não foi criado para oferecer:</h3>
                    <ul>
                        <li>diagnóstico psicológico;</li>
                        <li>promessa de mudança imediata;</li>
                        <li>substituição de terapia, orientação financeira ou acompanhamento profissional.</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="faq" class="df-section df-section--paper" aria-labelledby="df-faq-title">
        <div class="page-container df-faq-layout">
            <div>
                <p class="section-kicker">Dúvidas frequentes</p>
                <h2 id="df-faq-title">Antes de começar.</h2>
            </div>
            <div class="df-faq">
                <?php
                $faqs = [
                    ['Preciso preencher o caderno de uma vez?', 'Não. O percurso foi pensado para ser feito em movimentos. Você pode escrever, pausar e voltar quando tiver mais elementos para observar.'],
                    ['O material vai explicar por que ajo assim?', 'Ele não entrega uma explicação pronta. Ajuda você a reunir fatos, hipóteses e perguntas abertas para construir uma leitura mais cuidadosa da sua situação.'],
                    ['Isso substitui terapia ou orientação financeira?', 'Não. Dinheiro é Fruto é um material educativo de observação guiada. Ele não substitui psicoterapia, acompanhamento clínico, orientação financeira ou atendimento profissional.'],
                    ['E se eu não souber responder alguma pergunta?', '“Ainda não sei” é uma resposta válida. O caderno valoriza registrar o que aparece, sem preencher as lacunas com certezas apressadas.'],
                ];
                foreach ($faqs as $index => [$question, $answer]):
                ?>
                    <details<?= $index === 0 ? ' open' : '' ?>>
                        <summary><?= htmlspecialchars($question, ENT_QUOTES, 'UTF-8') ?></summary>
                        <p><?= htmlspecialchars($answer, ENT_QUOTES, 'UTF-8') ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="oferta" class="df-section df-section--offer" aria-labelledby="df-offer-title">
        <div class="page-container df-offer">
            <div>
                <p class="section-kicker section-kicker--light">Dinheiro é Fruto</p>
                <h2 id="df-offer-title">Comece por uma situação que merece ser observada com mais calma.</h2>
                <p>Você não precisa chegar com respostas. Basta escolher uma cena real e permitir que o percurso organize as perguntas seguintes.</p>
            </div>
            <article class="df-offer__card">
                <p>Material digital</p>
                <h3>Caderno de observação guiada</h3>
                <ul>
                    <li>Quatro movimentos de observação</li>
                    <li>Exemplos e orientações de preenchimento</li>
                    <li>Mapa final para reunir o que você percebeu</li>
                </ul>
                <?php if ($hasCheckout): ?>
                    <a class="button button--primary" href="<?= htmlspecialchars($checkoutUrl, ENT_QUOTES, 'UTF-8') ?>">Quero acessar Dinheiro é Fruto</a>
                <?php else: ?>
                    <a class="button button--primary" href="#top">Acesso em breve</a>
                    <p class="df-offer__note">O checkout será conectado aqui quando a URL estiver definida.</p>
                <?php endif; ?>
            </article>
        </div>
    </section>
</main>

<footer class="df-footer">
    <div class="page-container df-footer__grid">
        <div>
            <img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness">
            <p>Mais presença nas escolhas que você faz todos os dias.</p>
        </div>
        <nav aria-label="Rodapé">
            <a href="#percurso">O percurso</a>
            <a href="#caderno">O caderno</a>
            <a href="#faq">Dúvidas</a>
            <a href="#top">Voltar ao início ↑</a>
        </nav>
    </div>
</footer>
