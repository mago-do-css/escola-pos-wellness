<?php

declare(strict_types=1);
?>
<main id="top">
    <section class="hero" aria-labelledby="hero-title">
        <div class="hero__shade" aria-hidden="true"></div>
        <?php require dirname(__DIR__) . '/partials/navbar.php'; ?>

        <div class="page-container hero__content">
            <div class="hero__copy">
                <p class="hero__eyebrow">Mapa do Dinheiro · Gratuito</p>

                <h1 id="hero-title" class="hero__title">
                    Descubra o que você repete com o dinheiro.
                </h1>

                <p class="hero__description">
                    Um material gratuito e rápido para reconhecer um comportamento financeiro que se repete na sua vida — sem rótulos, diagnósticos ou complicação.
                </p>

                <div class="hero__actions">
                    <a class="button button--primary" href="#receber-mapa">Quero receber grátis</a>
                    <a class="button button--text" href="#como-funciona">Como funciona</a>
                </div>
            </div>

            <aside class="hero__note" aria-label="Sobre o Mapa do Dinheiro">
                <span class="hero__note-index" aria-hidden="true">01</span>
                <p>
                    Leva poucos minutos. No final, você sai com um comportamento concreto para observar na sua relação com dinheiro.
                </p>
            </aside>
        </div>

        <div class="page-container hero__footer" aria-hidden="true">
            <span>Entenda em poucos passos</span>
            <span class="hero__line"></span>
        </div>
    </section>

    <section id="como-funciona" class="method" aria-labelledby="method-title">
        <div class="page-container">
            <div class="method__intro">
                <p class="section-kicker section-kicker--light">Como funciona</p>
                <h2 id="method-title" class="method__title">
                    Observe. Reconheça. Leve algo concreto com você.
                </h2>
                <p class="method__lead">
                    Você percorre situações simples do dia a dia e identifica qual reação mais se aproxima do que costuma acontecer com você.
                </p>
            </div>

            <ol class="method__steps">
                <li class="method-step">
                    <span class="method-step__number" aria-hidden="true">01</span>
                    <h3>Veja as situações</h3>
                    <p>Você encontra cenas comuns envolvendo dinheiro.</p>
                </li>

                <li class="method-step">
                    <span class="method-step__number" aria-hidden="true">02</span>
                    <h3>Marque o que mais combina com você</h3>
                    <p>Não existe resposta certa. O objetivo é reconhecer o que realmente acontece.</p>
                </li>

                <li class="method-step">
                    <span class="method-step__number" aria-hidden="true">03</span>
                    <h3>Identifique uma repetição</h3>
                    <p>No final, você tem um comportamento concreto para começar a observar.</p>
                </li>
            </ol>
        </div>
    </section>

    <section id="o-que-voce-recebe" class="outcome" aria-labelledby="outcome-title">
        <div class="page-container">
            <div class="outcome__intro">
                <p class="section-kicker">O que você recebe</p>

                <h2 id="outcome-title" class="outcome__title">
                    Um primeiro mapa daquilo que costuma se repetir.
                </h2>

                <p class="outcome__lead">
                    Em vez de sair com um rótulo sobre quem você é, você termina com uma observação simples sobre o que costuma fazer quando o dinheiro entra em cena.
                </p>
            </div>

            <div class="outcome__body">
                <div class="outcome__map">
                    <div class="outcome__map-heading">
                        <span class="outcome__index" aria-hidden="true">01</span>
                        <p>Seu primeiro mapa</p>
                    </div>

                    <p class="outcome__formula">
                        Quando <span>algo acontece</span>,<br>
                        eu costumo <span>agir de uma forma</span>.
                    </p>
                </div>

                <div class="outcome__discovery">
                    <p class="outcome__discovery-label">Pode aparecer algo como</p>
                    <p>
                        “Quando o dinheiro entra, eu gasto rapidamente.”<br>
                        “Quando alguém pede ajuda, eu quase sempre digo sim.”<br>
                        “Mesmo podendo gastar, eu fico inseguro.”
                    </p>
                </div>
            </div>

            <p class="patterns__note">
                O objetivo não é explicar toda a sua relação com dinheiro. É apenas tornar uma repetição mais fácil de enxergar.
            </p>
        </div>
    </section>

    <section id="receber-mapa" class="capture" aria-labelledby="capture-title">
        <div class="page-container capture__layout">
            <div class="capture__intro">
                <p class="section-kicker">Material gratuito</p>

                <h2 id="capture-title" class="capture__title">
                    Receba o Mapa do Dinheiro.
                </h2>

                <p class="capture__lead">
                    Preencha seus dados para acessar a experiência e começar a observar o que se repete na sua relação com dinheiro.
                </p>

                <p class="capture__note">
                    Gratuito · leva poucos minutos · sem diagnóstico ou julgamento.
                </p>
            </div>

            <form class="capture__form" data-capture-form data-thank-you-url="/obrigado-mapa-do-dinheiro" novalidate>
                <div class="capture__form-heading">
                    <span aria-hidden="true">01</span>
                    <p>Receba gratuitamente</p>
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

                <button class="button capture__submit" type="submit">
                    Quero receber o Mapa do Dinheiro
                </button>

                <p class="capture__feedback" data-capture-feedback role="status" aria-live="polite"></p>
            </form>
        </div>
    </section>

    <section id="duvidas" class="faq" aria-labelledby="faq-title">
        <div class="page-container">
            <div class="faq__intro">
                <p class="section-kicker section-kicker--light">Dúvidas frequentes</p>
                <h2 id="faq-title" class="faq__title">O essencial antes de começar.</h2>
            </div>

            <div class="faq__list">
                <details class="faq__item" open>
                    <summary>O Mapa do Dinheiro é gratuito?</summary>
                    <p>Sim. Esta experiência é gratuita.</p>
                </details>

                <details class="faq__item">
                    <summary>Quanto tempo leva?</summary>
                    <p>Poucos minutos. Você percorre situações simples e escolhe as respostas que mais se aproximam do que costuma acontecer com você.</p>
                </details>

                <details class="faq__item">
                    <summary>Vou receber um diagnóstico?</summary>
                    <p>Não. O Mapa não define quem você é e não oferece diagnóstico. Ele ajuda você a reconhecer um comportamento concreto.</p>
                </details>

                <details class="faq__item">
                    <summary>O que eu tenho no final?</summary>
                    <p>Uma primeira leitura sobre um comportamento que se repete e que você pode começar a observar com mais clareza.</p>
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

            <a class="button site-footer__cta" href="#receber-mapa">
                Quero receber grátis
            </a>
        </div>

        <div class="site-footer__content">
            <p class="site-footer__statement">
                Comece observando o que se repete.
            </p>

            <div class="site-footer__nav-group">
                <p class="site-footer__nav-heading">Mapa do Dinheiro</p>

                <nav class="site-footer__nav" aria-label="Navegação do rodapé">
                    <a href="#como-funciona">Como funciona</a>
                    <a href="#o-que-voce-recebe">O que você recebe</a>
                    <a href="#receber-mapa">Receber grátis</a>
                    <a href="#duvidas">Dúvidas</a>
                </nav>
            </div>

            <div class="site-footer__social">
                <p>Redes sociais</p>

                <div class="site-footer__social-links">
                    <a href="https://www.instagram.com/pos_wellness?stkn=MW85bmp1cGtnamR3YQ%3D%3D&amp;utm_source=qr" target="_blank" rel="noopener noreferrer" aria-label="Instagram Pós-Wellness">
                        <svg class="social-icon" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8">
                            <rect x="3" y="3" width="18" height="18" rx="5"></rect>
                            <circle cx="12" cy="12" r="4.15"></circle>
                            <circle cx="17.5" cy="6.5" r=".8" fill="currentColor" stroke="none"></circle>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/consumo.felicidade?stkn=MWg2cTNzYmdpaGtuOQ%3D%3D&amp;utm_source=qr" target="_blank" rel="noopener noreferrer" aria-label="Instagram Consumo Felicidade">
                        <svg class="social-icon" viewBox="0 0 24 24" aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.8">
                            <rect x="3" y="3" width="18" height="18" rx="5"></rect>
                            <circle cx="12" cy="12" r="4.15"></circle>
                            <circle cx="17.5" cy="6.5" r=".8" fill="currentColor" stroke="none"></circle>
                        </svg>
                    </a>
                    <a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer" aria-label="YouTube">
                        <svg class="social-icon" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor">
                            <path d="M21.6 7.2a2.8 2.8 0 0 0-2-2C17.8 4.7 12 4.7 12 4.7s-5.8 0-7.6.5a2.8 2.8 0 0 0-2 2C2 9 2 12 2 12s0 3 .4 4.8a2.8 2.8 0 0 0 2 2c1.8.5 7.6.5 7.6.5s5.8 0 7.6-.5a2.8 2.8 0 0 0 2-2C22 15 22 12 22 12s0-3-.4-4.8ZM10 15.5v-7l6 3.5-6 3.5Z"></path>
                        </svg>
                    </a>
                    <a href="https://www.linkedin.com/" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
                        <svg class="social-icon" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor">
                            <path d="M5.1 3.5a2.35 2.35 0 1 0 0 4.7 2.35 2.35 0 0 0 0-4.7ZM3 9.7h4.2V21H3V9.7Zm6.8 0h4v1.55h.06c.56-1.05 1.92-2.15 3.96-2.15C22 9.1 22.8 11.8 22.8 15.3V21h-4.2v-5.05c0-1.2-.02-2.75-1.68-2.75-1.68 0-1.94 1.3-1.94 2.66V21H10.8V9.7Z"></path>
                        </svg>
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
