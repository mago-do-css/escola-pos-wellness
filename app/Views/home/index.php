<?php

declare(strict_types=1);
?>
<main id="top">
    <section class="hero" aria-labelledby="hero-title">
        <div class="hero__shade" aria-hidden="true"></div>
        <?php require dirname(__DIR__) . '/partials/navbar.php'; ?>

        <div class="page-container hero__content">
            <div class="hero__copy">
                <p class="hero__eyebrow">Mapa do Dinheiro</p>
                <h1 id="hero-title" class="hero__title">
                    O que você repete<br class="hidden sm:block"> sem perceber?
                </h1>
                <p class="hero__description">
                    Uma experiência gratuita e breve para reconhecer comportamentos concretos que podem moldar a forma como você organiza suas finanças — sem rótulos e sem julgamentos.
                </p>

                <div class="hero__actions">
                    <a class="button button--primary" href="#receber-mapa">Quero receber o mapa</a>
                    <a class="button button--text" href="#o-que-voce-repete">Entenda como funciona</a>
                </div>
            </div>

            <aside class="hero__note" aria-label="Sobre a experiência">
                <span class="hero__note-index" aria-hidden="true">01</span>
                <p>
                    Em poucos minutos, você observa situações reais e identifica o que costuma fazer quando o dinheiro entra em cena.
                </p>
            </aside>
        </div>

        <div class="page-container hero__footer" aria-hidden="true">
            <span>Role para conhecer</span>
            <span class="hero__line"></span>
        </div>
    </section>

    <section id="o-que-voce-repete" class="patterns" aria-labelledby="patterns-title">
        <div class="page-container">
            <div class="patterns__intro">
                <p class="section-kicker">Antes de tentar corrigir</p>
                <h2 id="patterns-title" class="patterns__title">O que você repete<br>sem perceber?</h2>
                <p class="patterns__lead">
                    Às vezes, o que parece ser apenas uma dificuldade com dinheiro é uma resposta que volta sempre que uma situação acontece. O Mapa do Dinheiro começa por aqui: observar, com mais precisão, o que você faz.
                </p>
            </div>

            <ol class="patterns__grid">
                <li class="pattern-card">
                    <span class="pattern-card__number" aria-hidden="true">01</span>
                    <h3>Gastar demais</h3>
                    <p>O dinheiro entra e logo encontra um destino — mesmo quando você tinha outro plano.</p>
                </li>
                <li class="pattern-card">
                    <span class="pattern-card__number" aria-hidden="true">02</span>
                    <h3>Não conseguir guardar</h3>
                    <p>Guardar parece importante, mas algo sempre acontece antes de o valor ficar.</p>
                </li>
                <li class="pattern-card">
                    <span class="pattern-card__number" aria-hidden="true">03</span>
                    <h3>Ter medo de gastar</h3>
                    <p>Mesmo quando é possível, gastar pode trazer culpa, tensão ou a sensação de risco.</p>
                </li>
                <li class="pattern-card">
                    <span class="pattern-card__number" aria-hidden="true">04</span>
                    <h3>Ajudar sempre</h3>
                    <p>As necessidades dos outros parecem vir antes, inclusive quando isso aperta a sua vida.</p>
                </li>
                <li class="pattern-card pattern-card--featured">
                    <span class="pattern-card__number" aria-hidden="true">05</span>
                    <h3>Ver o dinheiro desaparecer</h3>
                    <p>Entrou, passou por você e saiu. Sem clareza de como ou por quê.</p>
                </li>
            </ol>

            <p class="patterns__note">
                Não é sobre definir quem você é. É sobre reconhecer o que você faz quando algo acontece.
            </p>
        </div>
    </section>

    <section id="como-funciona" class="method" aria-labelledby="method-title">
        <div class="page-container">
            <div class="method__intro">
                <p class="section-kicker section-kicker--light">Como funciona</p>
                <h2 id="method-title" class="method__title">Primeiro, observe.<br>Depois, dê nome ao que acontece.</h2>
                <p class="method__lead">
                    Em poucos minutos, você percorre dez situações comuns envolvendo dinheiro. Não há resposta certa, madura ou bonita: importa reconhecer a reação que aparece com mais frequência.
                </p>
            </div>

            <ol class="method__steps">
                <li class="method-step">
                    <span class="method-step__number" aria-hidden="true">01</span>
                    <h3>Observe a situação</h3>
                    <p>Escolha a alternativa que mais se aproxima do que realmente acontece com você em cada cena.</p>
                </li>
                <li class="method-step">
                    <span class="method-step__number" aria-hidden="true">02</span>
                    <h3>Descreva o comportamento</h3>
                    <p>Em vez de se explicar ou se julgar, repare no que você faz quando aquela situação aparece.</p>
                </li>
                <li class="method-step">
                    <span class="method-step__number" aria-hidden="true">03</span>
                    <h3>Reconheça o que se repete</h3>
                    <p>Você termina com um comportamento concreto para observar, não com um rótulo sobre quem você é.</p>
                </li>
            </ol>

            <div class="method__scenes" aria-labelledby="scenes-title">
                <div class="method__scenes-heading">
                    <p class="method__scenes-label">As dez cenas</p>
                    <h3 id="scenes-title">Situações comuns. Respostas que contam uma história.</h3>
                </div>

                <ol class="scene-list">
                    <li><span>01</span>O dinheiro entrou</li>
                    <li><span>02</span>Você teve um dia difícil</li>
                    <li><span>03</span>Alguém pede ajuda</li>
                    <li><span>04</span>Você quer muito alguma coisa</li>
                    <li><span>05</span>Existe uma conta que você não quer ver</li>
                    <li><span>06</span>Você conseguiu guardar dinheiro</li>
                    <li><span>07</span>Alguém próximo começa a ganhar muito bem</li>
                    <li><span>08</span>Você ganhou bem por algo que foi fácil para você</li>
                    <li><span>09</span>Você pensa no futuro</li>
                    <li><span>10</span>Agora esqueça o dinheiro por um instante</li>
                </ol>
            </div>

            <p class="method__closing">
                “Eu sou assim” transforma um comportamento em identidade. “Eu faço isso quando algo acontece” abre uma investigação.
            </p>
        </div>
    </section>

    <section id="o-que-voce-recebe" class="outcome" aria-labelledby="outcome-title">
        <div class="page-container">
            <div class="outcome__intro">
                <p class="section-kicker">O que você recebe</p>
                <h2 id="outcome-title" class="outcome__title">Você não sai com um rótulo.<br>Sai com algo para observar.</h2>
                <p class="outcome__lead">
                    Ao terminar, você terá uma pergunta mais clara sobre a sua relação com dinheiro — e um comportamento concreto que vale a pena acompanhar.
                </p>
            </div>

            <div class="outcome__body">
                <div class="outcome__map">
                    <div class="outcome__map-heading">
                        <span class="outcome__index" aria-hidden="true">01</span>
                        <p>Meu primeiro mapa</p>
                    </div>
                    <p class="outcome__formula">
                        Quando <span>algo acontece</span>,<br>
                        eu costumo <span>agir de uma forma</span>.<br>
                        Logo depois, sinto <span>alguma coisa</span>.
                    </p>
                </div>

                <div class="outcome__discovery">
                    <p class="outcome__discovery-label">A sua primeira descoberta</p>
                    <p>
                        Em vez de uma ideia vaga como “tenho problema com dinheiro”, você começa a enxergar uma situação e a resposta que costuma aparecer nela.
                    </p>
                </div>
            </div>

            <ol class="outcome__changes">
                <li>
                    <span aria-hidden="true">01</span>
                    <p class="outcome__before">Antes</p>
                    <p>“Eu sou gastador.”</p>
                </li>
                <li>
                    <span aria-hidden="true">02</span>
                    <p class="outcome__before">Agora</p>
                    <p>“Quando acontece X, eu costumo fazer Y.”</p>
                </li>
                <li>
                    <span aria-hidden="true">03</span>
                    <p class="outcome__before">O que muda</p>
                    <p>Uma identidade se transforma em uma investigação.</p>
                </li>
            </ol>
        </div>
    </section>

    <section id="limites" class="limits" aria-labelledby="limits-title">
        <div class="page-container">
            <div class="limits__intro">
                <p class="section-kicker section-kicker--light">Os limites do mapa</p>
                <h2 id="limits-title" class="limits__title">Você sabe o que costuma fazer.<br>Ainda não sabe como chega até lá.</h2>
                <p class="limits__lead">
                    Reconhecer um comportamento é o primeiro passo. Mas, entre uma situação e uma decisão com dinheiro, há coisas que podem passar rápido demais para serem percebidas.
                </p>
            </div>

            <div class="limits__sequence" aria-labelledby="sequence-title">
                <div class="limits__sequence-heading">
                    <p id="sequence-title">Entre uma situação e uma decisão</p>
                    <span aria-hidden="true">↓</span>
                </div>

                <ul class="limits__signals">
                    <li>Um pensamento</li>
                    <li>Uma emoção</li>
                    <li>Uma urgência</li>
                    <li>Uma necessidade de aliviar alguma coisa</li>
                    <li>Uma vontade de controlar</li>
                    <li>Um impulso</li>
                </ul>

                <p class="limits__consequence">E, muitas vezes, quando tudo isso aparece, o dinheiro já se moveu.</p>
            </div>

            <div class="limits__question">
                <span class="limits__question-index" aria-hidden="true">Próxima pergunta</span>
                <p>Se eu já sei o que faço, o que acontece antes?</p>
            </div>
        </div>
    </section>

    <section id="dinheiro-e-fruto" class="fruit" aria-labelledby="fruit-title">
        <div class="page-container">
            <div class="fruit__intro">
                <p class="section-kicker section-kicker--light">Dinheiro é fruto</p>
                <h2 id="fruit-title" class="fruit__title">Você começou olhando para aquilo que aparece.</h2>
                <p class="fruit__lead">
                    Ainda não precisamos correr para a raiz. Primeiro, é importante reconhecer o fruto e observar como você chega até ele.
                </p>
            </div>

            <ol class="fruit__steps">
                <li>
                    <span aria-hidden="true">01</span>
                    <div>
                        <p>Primeiro</p>
                        <h3>Reconhecemos o fruto.</h3>
                    </div>
                </li>
                <li>
                    <span aria-hidden="true">02</span>
                    <div>
                        <p>Depois</p>
                        <h3>Observamos como chegamos até ele.</h3>
                    </div>
                </li>
                <li>
                    <span aria-hidden="true">03</span>
                    <div>
                        <p>Mais adiante</p>
                        <h3>Poderemos perguntar para que esse comportamento serve e onde ele encontra a sua história.</h3>
                    </div>
                </li>
            </ol>

            <div class="fruit__closing">
                <p>Mas não precisamos responder tudo hoje.</p>
                <p class="fruit__closing-emphasis">Hoje você já fez algo importante: escolheu o que vai observar.</p>
            </div>
        </div>
    </section>

    <section id="receber-mapa" class="capture" aria-labelledby="capture-title">
        <div class="page-container capture__layout">
            <div class="capture__intro">
                <p class="section-kicker">Mapa do Dinheiro</p>
                <h2 id="capture-title" class="capture__title">Comece por aquilo que se repete.</h2>
                <p class="capture__lead">
                    Receba uma experiência breve para observar, com mais clareza, o que acontece na sua relação com dinheiro — sem rótulos e sem julgamentos.
                </p>
                <p class="capture__note">Leva poucos minutos. Você começa escolhendo o que vale observar.</p>
            </div>

            <form class="capture__form" data-capture-form novalidate>
                <div class="capture__form-heading">
                    <span aria-hidden="true">01</span>
                    <p>Receba o mapa</p>
                </div>

                <div class="capture__field">
                    <label for="lead-name">Seu nome</label>
                    <input id="lead-name" name="name" type="text" autocomplete="name" required>
                </div>

                <div class="capture__field">
                    <label for="lead-email">Seu melhor e-mail</label>
                    <input id="lead-email" name="email" type="email" autocomplete="email" required>
                </div>

                <label class="capture__consent">
                    <input name="consent" type="checkbox" required>
                    <span>Quero receber o Mapa do Dinheiro e as comunicações relacionadas a esta experiência.</span>
                </label>

                <button class="button capture__submit" type="submit">Quero receber o mapa</button>
                <p class="capture__feedback" data-capture-feedback role="status" aria-live="polite"></p>
            </form>
        </div>
    </section>

    <section id="duvidas" class="faq" aria-labelledby="faq-title">
        <div class="page-container">
            <div class="faq__intro">
                <p class="section-kicker section-kicker--light">Dúvidas frequentes</p>
                <h2 id="faq-title" class="faq__title">Antes de começar, talvez você queira saber.</h2>
            </div>

            <div class="faq__list">
                <details class="faq__item" open>
                    <summary>O que é o Mapa do Dinheiro?</summary>
                    <p>É uma experiência breve para reconhecer um comportamento que se repete na sua relação com dinheiro. O ponto de partida não é explicar tudo, mas observar o que acontece com mais precisão.</p>
                </details>
                <details class="faq__item">
                    <summary>Quanto tempo leva?</summary>
                    <p>Leva poucos minutos. Você percorre situações comuns e escolhe as respostas que mais se aproximam do que realmente acontece com você.</p>
                </details>
                <details class="faq__item">
                    <summary>Existem respostas certas?</summary>
                    <p>Não. A proposta não é encontrar a resposta mais madura, bonita ou esperada. É reconhecer a reação que aparece com mais frequência.</p>
                </details>
                <details class="faq__item">
                    <summary>Vou receber um diagnóstico?</summary>
                    <p>Não. O Mapa não define quem você é. Ele ajuda você a nomear um comportamento concreto que pode observar na sua própria vida.</p>
                </details>
                <details class="faq__item">
                    <summary>O Mapa é gratuito?</summary>
                    <p>Sim. Esta primeira experiência é gratuita e foi feita para ajudar você a começar a enxergar o que se repete.</p>
                </details>
            </div>
        </div>
    </section>
</main>

<footer class="site-footer">
    <div class="page-container">
        <div class="site-footer__top">
            <a class="site-footer__brand" href="#top" aria-label="Pós-Wellness — voltar ao início">
                <img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness">
            </a>
            <a class="button site-footer__cta" href="#receber-mapa">Quero receber o mapa</a>
        </div>

        <div class="site-footer__content">
            <p class="site-footer__statement">Uma pausa para observar o que se repete antes de tentar mudar.</p>
                <div class="site-footer__nav-group">
                    <p class="site-footer__nav-heading">Mapa do Dinheiro</p>
                    <nav class="site-footer__nav" aria-label="Navegação do rodapé">
                        <a href="#como-funciona">Como funciona</a>
                        <a href="#o-que-voce-recebe">O que você recebe</a>
                        <a href="#limites">Limites do mapa</a>
                        <a href="#duvidas">Dúvidas</a>
                    </nav>
                </div>
                <div class="site-footer__social">
                    <p>Redes sociais</p>
                    <div class="site-footer__social-links">
                        <a href="https://www.instagram.com/" target="_blank" rel="noreferrer" aria-label="Instagram">
                            <span class="social-mark social-mark--instagram" aria-hidden="true">ig</span>
                        </a>
                        <a href="https://www.linkedin.com/" target="_blank" rel="noreferrer" aria-label="LinkedIn">
                            <span class="social-mark social-mark--linkedin" aria-hidden="true">in</span>
                        </a>
                        <a href="https://www.youtube.com/" target="_blank" rel="noreferrer" aria-label="YouTube">
                            <span class="social-mark social-mark--youtube" aria-hidden="true">▶</span>
                        </a>
                    </div>
                </div>
            </div>

        <div class="site-footer__bottom">
            <span>© <?= date('Y') ?> Pós-Wellness</span>
            <a href="#top">Voltar ao início <span aria-hidden="true">↑</span></a>
        </div>
    </div>
</footer>
