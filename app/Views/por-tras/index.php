<?php

declare(strict_types=1);

/** @var string $checkoutUrl */
/** @var int $price */
?>
<link rel="stylesheet" href="/assets/css/radar-landing.css">
<link rel="stylesheet" href="/assets/css/por-tras-landing.css">

<main id="top" class="por-tras-page">
    <section class="por-tras-hero">
        <?php require dirname(__DIR__) . '/partials/por-tras-navbar.php'; ?>
        <div class="page-container por-tras-hero__grid">
            <div class="por-tras-hero__copy">
                <p class="section-kicker section-kicker--light">Por Trás do Dinheiro · 5 encontros</p>
                <h1>Você já consegue ver o que faz. Agora pode investigar o que isso produz em você.</h1>
                <p class="por-tras-hero__lead">Uma experiência guiada para construir uma hipótese sobre a função que determinados comportamentos financeiros podem assumir na sua vida.</p>
                <div class="por-tras-hero__actions">
                    <a class="button button--primary" href="#oferta">Quero construir meu Mapa da Função</a>
                    <p>Pagamento único de R$<?= $price ?> · acesso digital pela Kiwify.</p>
                </div>
            </div>
            <figure class="creative-placeholder creative-placeholder--hero" aria-label="Espaço preparado para imagem principal do produto">
                <span>Imagem principal sugerida</span>
                <strong>Foto realista de um livro sendo aberto em uma mesa de café, com luz suave da manhã e anotações discretas ao lado.</strong>
                <small>Direção: editorial, humana e silenciosa. Tons areia, café e bronze. O livro deve parecer usado, não publicitário.</small>
            </figure>
        </div>
        <div class="page-container por-tras-hero__trail" aria-label="Jornada de investigação">
            <span>O que eu repito?</span><i aria-hidden="true"></i>
            <span>Como isso acontece?</span><i aria-hidden="true"></i>
            <strong>Para que isso pode estar servindo?</strong>
        </div>
    </section>

    <section id="a-virada" class="por-tras-section por-tras-section--paper">
        <div class="page-container por-tras-split">
            <div>
                <p class="section-kicker">A pergunta muda</p>
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
            <p class="section-kicker">Cinco encontros</p>
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
                <h2>O produto final não são cinco vídeos. É o seu Mapa da Função.</h2>
                <p class="por-tras-light-copy">Ao final, você organiza o que observou em uma frase de trabalho capaz de orientar a próxima investigação.</p>
                <blockquote>“Esse comportamento pode estar funcionando como uma maneira de…”</blockquote>
                <p class="por-tras-disclaimer">Isso é uma hipótese. Não uma verdade definitiva sobre você.</p>
            </div>
            <figure class="creative-placeholder creative-placeholder--product" aria-label="Espaço preparado para mockup do Mapa da Função">
                <span>Mockup sugerido</span>
                <strong>Caderno premium aberto na página “Meu Mapa da Função”, acompanhado de cinco cartões — um para cada pergunta.</strong>
                <small>Direção: fotografia zenital, papel texturizado, capa marrom, detalhes em cobre e escrita manual realista.</small>
            </figure>
        </div>
    </section>

    <section class="por-tras-section por-tras-section--paper">
        <div class="page-container journey-bundle">
            <div class="journey-bundle__intro">
                <p class="section-kicker">Você pode começar por aqui</p>
                <h2>Não fez as etapas anteriores? A jornada necessária está incluída.</h2>
                <p>O Por Trás do Dinheiro parte de um Radar preenchido. Por isso, quem entra diretamente recebe o caminho completo para chegar preparado aos cinco encontros.</p>
            </div>
            <div class="journey-bundle__steps">
                <article><span>Etapa 1</span><h3>Mapa do Dinheiro</h3><p>O que eu repito?</p></article>
                <article><span>Etapa 2</span><h3>Radar do Dinheiro</h3><p>Como isso acontece?</p></article>
                <article class="is-current"><span>Etapa 3</span><h3>Por Trás do Dinheiro</h3><p>Para que isso pode estar servindo?</p></article>
            </div>
        </div>
    </section>

    <section class="por-tras-section por-tras-section--image-break">
        <div class="page-container image-break-grid">
            <figure class="creative-placeholder creative-placeholder--lifestyle" aria-label="Espaço preparado para fotografia humana do produto">
                <span>Imagem de atmosfera sugerida</span>
                <strong>Pessoa lendo e preenchendo o material perto de uma janela no fim da tarde, com uma xícara já pela metade e marcas reais de uso no papel.</strong>
                <small>Direção: plano lateral, sem olhar para a câmera, sensação de pausa e investigação íntima. Evitar pose de banco de imagens.</small>
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
                    <li>Consegue reservar tempo para cinco encontros curtos e seus registros.</li>
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
                    ['Preciso ter feito o Mapa e o Radar?', 'Não. A compra inclui as etapas necessárias. Faça primeiro o Mapa, depois os sete dias do Radar e só então comece os cinco encontros do Por Trás do Dinheiro.'],
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
                <p class="section-kicker">Por Trás do Dinheiro</p>
                <h2>Construa uma hipótese sobre para que o comportamento pode estar servindo.</h2>
                <p>Você recebe o Mapa do Dinheiro, o Radar do Dinheiro e os cinco encontros para construir o seu Mapa da Função.</p>
            </div>
            <article class="offer-card">
                <p class="offer-card__eyebrow">Acesso digital completo</p>
                <h3>Por Trás do Dinheiro</h3>
                <ul>
                    <li>Mapa do Dinheiro</li>
                    <li>Radar do Dinheiro — 7 dias</li>
                    <li>5 encontros do Por Trás do Dinheiro</li>
                    <li>Exercícios e Mapa da Função</li>
                </ul>
                <div class="offer-card__price"><span>Pagamento único</span><strong>R$<?= $price ?></strong></div>
                <a class="button button--primary" href="<?= htmlspecialchars($checkoutUrl, ENT_QUOTES, 'UTF-8') ?>">Quero construir meu Mapa da Função</a>
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
