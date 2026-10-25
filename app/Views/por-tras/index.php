<?php

declare(strict_types=1);

/** @var string $checkoutUrl */
/** @var int $price */
/** @var string $vslVideoUrl */
/** @var string $vslPosterUrl */
?>
<link rel="stylesheet" href="/assets/css/radar-landing.css">
<link rel="stylesheet" href="/assets/css/por-tras-landing.css?v=20261020-2">

<main id="top" class="por-tras-page">
    <section class="por-tras-hero">
        <?php require dirname(__DIR__) . '/partials/por-tras-navbar.php'; ?>
        <div class="page-container por-tras-hero__grid">
            <div class="por-tras-hero__copy">
                <p class="section-kicker section-kicker--light">Por Trás do Dinheiro · Uma jornada, dois módulos</p>
                <h1>Entenda o caminho que você repete com o dinheiro — e investigue o que ele produz em você.</h1>
                <p class="por-tras-hero__lead">Primeiro, observe uma situação real durante sete dias. Depois, aprofunde a investigação em cinco encontros para construir uma hipótese sobre a função desse comportamento. Tudo dentro do Por Trás do Dinheiro.</p>
                <div class="por-tras-hero__actions">
                    <a class="button button--primary" href="#oferta">Quero começar Por Trás do Dinheiro</a>
                    <p>Pagamento único de R$<?= $price ?> · acesso digital pela Kiwify.</p>
                </div>
            </div>
            <figure class="por-tras-image por-tras-image--hero">
                <img src="/assets/images/por-tras/hero-livro-cafe.webp" alt="Pessoa virando a página de um caderno de observação em uma mesa de café">
            </figure>
        </div>
        <div class="page-container por-tras-hero__trail" aria-label="Jornada de investigação">
            <span>O que eu repito?</span><i aria-hidden="true"></i>
            <span>Como isso acontece?</span><i aria-hidden="true"></i>
            <strong>Para que isso pode estar servindo?</strong>
        </div>
    </section>

    <section class="por-tras-section por-tras-section--vsl" aria-labelledby="por-tras-vsl-title">
        <div class="page-container">
            <div class="por-tras-vsl__heading">
                <p class="section-kicker">Antes de começar</p>
                <h2 id="por-tras-vsl-title">Assista e entenda como a observação pode ganhar profundidade.</h2>
                <p>O Mapa ajuda a escolher uma cena. O primeiro módulo organiza a sequência. No vídeo, você conhece a jornada completa de Por Trás do Dinheiro.</p>
            </div>
            <div class="vsl__video por-tras-vsl__video">
                <video controls preload="metadata" playsinline poster="<?= htmlspecialchars($vslPosterUrl, ENT_QUOTES, 'UTF-8') ?>">
                    <source src="<?= htmlspecialchars($vslVideoUrl, ENT_QUOTES, 'UTF-8') ?>" type="video/mp4">
                    Seu navegador não oferece suporte à reprodução deste vídeo.
                </video>
            </div>
        </div>
    </section>

    <section id="modulo-um" class="por-tras-section por-tras-section--sand">
        <div class="page-container por-tras-split por-tras-split--center">
            <div>
                <p class="section-kicker">Módulo 1 · Seu primeiro Radar</p>
                <h2>Você conhece o comportamento. Agora pode enxergar a sequência.</h2>
                <p class="por-tras-prose">“Eu gasto demais.” “Eu adio minhas contas.” “Eu quase sempre digo sim.” O comportamento é o final mais visível. Durante sete dias, você observa o que acontece antes, durante e logo depois de uma situação real.</p>
                <a class="button button--ink" href="#oferta">Quero construir essa sequência</a>
            </div>
            <figure class="radar-editorial-media">
                <img src="/assets/images/radar/radar-preenchido.webp" alt="Caderno com o Radar do Dinheiro preenchido para observar a sequência de uma situação financeira" loading="lazy">
            </figure>
        </div>
        <div class="page-container">
            <ol class="question-ledger">
                <?php
                $days = [
                    ['Comportamento', 'Troque o rótulo por uma ação concreta.'],
                    ['Contexto', 'Observe o que aconteceu antes.'],
                    ['Pensamento', 'Capture a frase rápida próxima da ação.'],
                    ['Afeto', 'Perceba o sentimento e o corpo.'],
                    ['Impulso', 'Diferencie vontade de urgência.'],
                    ['Efeito imediato', 'Veja o que mudou nos primeiros minutos.'],
                    ['Consequência', 'Reúna as peças e leia o seu Radar.'],
                ];
                foreach ($days as $day => [$title, $description]): ?>
                    <li><span>Dia <?= $day + 1 ?></span><h3><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h3><p><?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8') ?></p></li>
                <?php endforeach; ?>
            </ol>
            <p class="por-tras-prose">Ao final do módulo 1, você tem uma sequência observável. Ela se torna o ponto de partida do módulo 2: investigar o que esse comportamento pode ajudar a sustentar, evitar ou proteger.</p>
        </div>
    </section>

    <section id="a-virada" class="por-tras-section por-tras-section--paper">
        <div class="page-container por-tras-split">
            <div>
                <p class="section-kicker">Da observação à função</p>
                <h2>A consequência conta o que veio depois. A função começa a aparecer no que mudou imediatamente.</h2>
            </div>
            <div class="por-tras-prose">
                <p>Você pode saber que uma escolha trouxe culpa, arrependimento, preocupação ou ressentimento. E ainda assim repeti-la.</p>
                <p>Isso não torna o comportamento irracional. Pode indicar que, naquele momento, ele produziu alguma coisa: alívio, prazer, controle, segurança ou a sensação de que um problema foi resolvido.</p>
                <p class="por-tras-emphasis">Não vamos transformar essa pista em diagnóstico. Vamos investigar.</p>
            </div>
        </div>

        <div class="page-container effect-grid">
            <article>
                <p>Consequência</p>
                <h3>“Depois eu me arrependi.”</h3>
                <span>É a parte mais fácil de lembrar.</span>
            </article>
            <div class="effect-grid__turn" aria-hidden="true">→</div>
            <article class="effect-grid__active">
                <p>Efeito imediato</p>
                <h3>“Por alguns minutos, a tensão diminuiu.”</h3>
                <span>É aqui que a investigação ganha profundidade.</span>
            </article>
        </div>
    </section>

    <section class="por-tras-section por-tras-section--ink">
        <div class="page-container story-sequence">
            <div class="story-sequence__intro">
                <p class="section-kicker section-kicker--light">Uma cena possível</p>
                <h2>A pessoa sabe que o dinheiro fará falta. Mesmo assim, faz o Pix.</h2>
                <p>Olhar apenas para o arrependimento deixa uma parte da história invisível.</p>
            </div>
            <ol class="story-sequence__steps">
                <li><span>01</span><p>Alguém próximo pede ajuda.</p></li>
                <li><span>02</span><p>A culpa aparece antes da resposta.</p></li>
                <li><span>03</span><p>Surge a urgência de resolver.</p></li>
                <li><span>04</span><p>O Pix é feito.</p></li>
                <li class="is-highlighted"><span>05</span><p>Imediatamente: “pronto, resolvi”.</p></li>
                <li><span>06</span><p>Mais tarde vêm irritação e arrependimento.</p></li>
            </ol>
        </div>
    </section>

    <section id="cinco-perguntas" class="por-tras-section por-tras-section--sand">
        <div class="page-container">
            <p class="section-kicker">Módulo 2 · Por Trás do Dinheiro</p>
            <div class="por-tras-heading-row">
                <h2>Cinco perguntas para construir uma hipótese sem inventar uma explicação.</h2>
                <p>Cada encontro acrescenta uma camada ao seu Mapa da Função. Se a resposta ainda não estiver clara, “não sei” continua sendo uma resposta honesta.</p>
            </div>
            <ol class="question-ledger">
                <?php
                $questions = [
                    ['O que isso me dá?', 'Observe o que acontece dentro de você imediatamente depois do comportamento.'],
                    ['O que isso me ajuda a evitar?', 'Investigue o que precisaria sentir, enfrentar, sustentar ou decidir se não agisse daquela maneira.'],
                    ['O que isso parece proteger?', 'Perceba o que parece importante demais para ser colocado em risco.'],
                    ['O que estou buscando através disso?', 'Diferencie o objeto ou a ação da experiência humana que espera alcançar.'],
                    ['Que função isso pode estar cumprindo?', 'Reúna convergências e formule uma hipótese — não uma verdade sobre você.'],
                ];
                foreach ($questions as $index => [$question, $description]):
                ?>
                    <li>
                        <span>0<?= $index + 1 ?></span>
                        <h3><?= htmlspecialchars($question, ENT_QUOTES, 'UTF-8') ?></h3>
                        <p><?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8') ?></p>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>

    <section id="mapa-da-funcao" class="por-tras-section por-tras-section--bronze">
        <div class="page-container por-tras-split por-tras-split--center">
            <div>
                <p class="section-kicker section-kicker--light">O que você constrói</p>
                <h2>Um Radar preenchido. Uma hipótese de função. Mais clareza para continuar.</h2>
                <p class="por-tras-light-copy">Você começa reunindo contexto, pensamento, afeto, impulso, comportamento, efeito imediato e consequência. Com essa sequência em mãos, organiza uma hipótese no seu Mapa da Função.</p>
                <blockquote>“Esse comportamento pode estar funcionando como uma maneira de…”</blockquote>
                <p class="por-tras-disclaimer">Isso é uma hipótese. Não uma verdade definitiva sobre você.</p>
            </div>
            <figure class="por-tras-image por-tras-image--product">
                <img src="/assets/images/por-tras/mapa-da-funcao.webp" alt="Mapa da Função em um caderno aberto, com cartões de apoio">
            </figure>
        </div>
    </section>

    <section class="por-tras-section por-tras-section--paper">
        <div class="page-container journey-bundle">
            <div class="journey-bundle__intro">
                <p class="section-kicker">Você pode começar por aqui</p>
                <h2>Um único produto. Uma investigação que ganha profundidade.</h2>
                <p>O Radar de sete dias é o primeiro módulo. Por Trás do Dinheiro reúne os dois módulos na mesma jornada. O Mapa do Dinheiro está incluído como preparação para escolher uma situação concreta.</p>
            </div>
            <div class="journey-bundle__steps">
                <article><span>Preparação incluída</span><h3>Mapa do Dinheiro</h3><p>O que eu repito?</p></article>
                <article><span>Módulo 1 · 7 dias</span><h3>Seu primeiro Radar</h3><p>Como isso acontece?</p></article>
                <article class="is-current"><span>Módulo 2 · 5 encontros</span><h3>Por Trás do Dinheiro</h3><p>Para que isso pode estar servindo?</p></article>
            </div>
        </div>
    </section>

    <section class="por-tras-section por-tras-section--image-break">
        <div class="page-container image-break-grid">
            <figure class="por-tras-image por-tras-image--lifestyle">
                <img src="/assets/images/por-tras/pratica-de-observacao.webp" alt="Pessoa preenchendo seu caderno de observação perto de uma janela">
            </figure>
            <div>
                <p class="section-kicker">Uma investigação, não um teste</p>
                <h2>Você não recebe um perfil pronto. Aprende a formular uma pergunta melhor.</h2>
                <ul class="quiet-list">
                    <li>Sem pontuação ou classificação financeira.</li>
                    <li>Sem procurar um trauma para explicar tudo.</li>
                    <li>Sem transformar um exemplo em diagnóstico.</li>
                    <li>Sem prometer que compreender significa mudar imediatamente.</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="por-tras-section por-tras-section--ink">
        <div class="page-container audience-grid">
            <div>
                <p class="section-kicker section-kicker--light">Para quem é</p>
                <h2>Para quem já percebe uma repetição e quer ir além do “eu fiz de novo”.</h2>
                <ul>
                    <li>Você reconhece um comportamento financeiro recorrente.</li>
                    <li>Já percebe parte da sequência, mas não entende o que muda naquele momento.</li>
                    <li>Prefere investigar com honestidade a receber uma explicação rápida.</li>
                    <li>Consegue acompanhar uma situação por sete dias e aprofundar seus registros em cinco encontros.</li>
                </ul>
            </div>
            <div class="audience-grid__not">
                <p>Não foi criado para quem procura</p>
                <ul>
                    <li>Uma planilha ou estratégia de organização financeira.</li>
                    <li>Um diagnóstico psicológico.</li>
                    <li>Uma causa definitiva para um comportamento.</li>
                    <li>Uma promessa de eliminar padrões em cinco encontros.</li>
                </ul>
            </div>
        </div>
    </section>

    <section id="faq" class="por-tras-section por-tras-section--paper">
        <div class="page-container faq-layout">
            <div>
                <p class="section-kicker">Perguntas frequentes</p>
                <h2>Antes de começar.</h2>
            </div>
            <div class="por-tras-faq">
                <?php
                $faqs = [
                    ['Preciso comprar dois produtos?', 'Não. Por Trás do Dinheiro reúne os dois módulos em um único acesso. Comece pelo Mapa incluído, siga os sete dias do módulo 1 e avance para os cinco encontros do módulo 2.'],
                    ['Vou descobrir a causa do meu comportamento?', 'Não é essa a promessa. Você construirá uma hipótese de função baseada no que observou, sem transformar essa hipótese em verdade definitiva.'],
                    ['Isso substitui terapia ou orientação financeira?', 'Não. É uma experiência educativa e estruturada de observação. Não substitui psicoterapia, acompanhamento clínico, orientação financeira ou atendimento profissional.'],
                    ['E se eu não souber responder alguma pergunta?', 'Registre “ainda não sei”. A proposta valoriza uma observação honesta; inventar uma explicação seria o oposto do trabalho.'],
                    ['Como recebo o material?', 'Após a confirmação do pagamento, o acesso digital é enviado e também fica disponível na sua conta da Kiwify.'],
                    ['O acesso é por assinatura?', 'Não. O valor é um pagamento único para acessar a experiência digital.'],
                ];
                foreach ($faqs as $index => [$question, $answer]):
                ?>
                    <details <?= $index === 0 ? 'open' : '' ?>>
                        <summary><?= htmlspecialchars($question, ENT_QUOTES, 'UTF-8') ?></summary>
                        <p><?= htmlspecialchars($answer, ENT_QUOTES, 'UTF-8') ?></p>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="oferta" class="por-tras-section por-tras-section--offer">
        <div class="page-container offer-grid">
            <div>
                <p class="section-kicker">Por Trás do Dinheiro completo</p>
                <h2>Comece pela sequência. Avance para a função.</h2>
                <p>Uma compra reúne a preparação, os sete dias de observação e os cinco encontros de aprofundamento. Você constrói seu Radar e seu Mapa da Função no mesmo percurso.</p>
            </div>
            <article class="offer-card">
                <p class="offer-card__eyebrow">Acesso digital completo</p>
                <h3>Por Trás do Dinheiro</h3>
                <ul>
                    <li>Mapa do Dinheiro</li>
                    <li>Módulo 1 — observação guiada de 7 dias e Radar preenchido</li>
                    <li>Módulo 2 — Por Trás do Dinheiro, em 5 encontros</li>
                    <li>Exercícios e Mapa da Função</li>
                </ul>
                <div class="offer-card__price"><span>Pagamento único</span><strong>R$<?= $price ?></strong></div>
                <a class="button button--primary" href="<?= htmlspecialchars($checkoutUrl, ENT_QUOTES, 'UTF-8') ?>">Quero começar Por Trás do Dinheiro</a>
                <p class="offer-card__note">Checkout seguro pela Kiwify. Sem assinatura e sem urgência artificial.</p>
            </article>
        </div>
    </section>

    <section class="por-tras-section por-tras-section--closing">
        <div class="page-container closing-grid">
            <p class="section-kicker section-kicker--light">A pergunta que fica</p>
            <h2>Talvez o comportamento não conte apenas o que você faz. Talvez também mostre o que você tenta sustentar, evitar ou proteger.</h2>
            <div>
                <p>O próximo passo não é encontrar uma resposta rápida. É construir uma hipótese boa o bastante para continuar investigando.</p>
                <a class="button button--primary" href="#oferta">Começar por R$<?= $price ?></a>
            </div>
        </div>
    </section>
</main>

<footer class="por-tras-footer">
    <div class="page-container por-tras-footer__grid">
        <div>
            <img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness">
            <p>Comportamentos repetidos merecem ser investigados antes de serem simplesmente julgados.</p>
        </div>
        <nav aria-label="Rodapé">
            <a href="#a-virada">A virada</a>
            <a href="#cinco-perguntas">Como funciona</a>
            <a href="#faq">FAQ</a>
            <a href="#top">Voltar ao início ↑</a>
        </nav>
    </div>
</footer>
