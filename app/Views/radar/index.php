<?php

declare(strict_types=1);
?>
<link rel="stylesheet" href="/assets/css/radar-landing.css">
<main id="top" class="bg-cream text-ink">
    <section class="bg-ink text-cream">
        <?php require dirname(__DIR__) . '/partials/radar-navbar.php'; ?>
        <div class="page-container grid gap-10 py-16 lg:grid-cols-[minmax(0,1fr)_minmax(30rem,.95fr)] lg:items-center lg:py-24">
            <div>
                <p class="section-kicker section-kicker--light">Radar do Dinheiro · 7 dias</p>
                <!-- <h1 class="mt-6 max-w-[11ch] font-display text-[clamp(3.25rem,6.3vw,6.5rem)] leading-[.9] tracking-[-.05em]"><p class="mt-7 max-w-2xl text-lg leading-relaxed text-cream/80">Durante sete dias, acompanhe uma situação real da sua vida financeira e construa o seu Radar do Dinheiro: a sequência entre o que acontece, o que passa pela sua cabeça, o que você sente, o impulso, a ação e o que vem depois.</p> -->
              <h1 class="
    mt-6
    max-w-[13ch]
    font-display
    text-[4rem]
    leading-[.95]
    tracking-[-.045em]
    max-lg:text-[3.25rem]
    max-md:text-[2.75rem]
">
    Você já sabe o que costuma fazer com o dinheiro. O que ainda pode não enxergar é como chega até isso.
</h1>
                <p class="mt-5 max-w-xl font-display text-2xl leading-tight text-gold">Não é para se controlar melhor. É para conseguir observar melhor.</p>
                <a class="button button--primary mt-8" href="<?= htmlspecialchars($checkoutUrl, ENT_QUOTES, 'UTF-8') ?>">Quero construir meu Radar</a>
                <p class="mt-3 max-w-md text-sm leading-relaxed text-cream/65">Pagamento único. Mapa do Dinheiro incluído para quem ainda não fez. Acesso digital liberado conforme confirmação do pagamento.</p>
            </div>
            <div class="border border-cream/25 bg-bronze/30 p-3 sm:p-5">
                <p class="mb-3 font-display text-2xl tracking-[-.03em]">Antes de tentar mudar, veja o caminho.</p>
                <?php if ($hasVsl): ?>
                    <video class="aspect-video w-full bg-black" controls preload="metadata" playsinline poster="<?= htmlspecialchars($vslPosterUrl, ENT_QUOTES, 'UTF-8') ?>">
                        <source src="<?= htmlspecialchars($vslVideoUrl, ENT_QUOTES, 'UTF-8') ?>" type="video/mp4">
                        Seu navegador não oferece suporte para reproduzir este vídeo.
                    </video>
                <?php else: ?>
                    <div class="flex aspect-video flex-col items-center justify-center border border-cream/30 bg-ink p-8 text-center">
                        <span class="grid h-14 w-14 place-items-center rounded-full border border-gold text-gold" aria-hidden="true">▶</span>
                        <p class="mt-5 font-display text-3xl">VSL do Radar do Dinheiro</p>
                        <p class="mt-2 max-w-sm text-sm leading-relaxed text-cream/65">A VSL do Radar do Dinheiro estará disponível em breve.</p>
                    </div>
                <?php endif; ?>
                <p class="mt-4 text-sm leading-relaxed text-cream/70">Assista à explicação de Sávio Reginatto e Mari Steffan e entenda por que uma compra, um Pix ou uma fatura ignorada podem começar antes da ação que você percebe.</p>
                <a class="button button--primary mt-5 w-full" href="<?= htmlspecialchars($checkoutUrl, ENT_QUOTES, 'UTF-8') ?>">Quero construir meu Radar</a>
            </div>
        </div>
    </section>

    <section class="py-20 lg:py-32">
        <div class="page-container grid gap-10 lg:grid-cols-[minmax(0,1.1fr)_minmax(20rem,.9fr)]">
            <div>
                <p class="section-kicker">O que você já consegue ver</p>
                <h2 class="mt-6 max-w-[12ch] font-display text-[clamp(3rem,5.8vw,5.8rem)] leading-[.92] tracking-[-.05em]">Você pode conhecer o comportamento e ainda não perceber a sequência.</h2>
            </div>
            <div class="space-y-5 text-lg leading-relaxed text-ink/75">
                <p>Talvez a sua frase hoje seja simples. Essas frases mostram algo importante: existe um comportamento que chama sua atenção. Mas o comportamento costuma ser a parte mais visível da história.</p>
                <a class="inline-flex border-b border-bronze pb-1 text-bronze" href="<?= htmlspecialchars($checkoutUrl, ENT_QUOTES, 'UTF-8') ?>">Quero observar o que existe no meio</a>
            </div>
        </div>
        <div class="page-container mt-14 grid border-t border-ink/25 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach (['Eu gasto demais.', 'Eu adio minhas contas.', 'Quando alguém pede ajuda, eu quase sempre digo sim.', 'Eu guardo, mas continuo inseguro.', 'Eu confiro o saldo várias vezes.', 'Eu trabalho mais mesmo quando já estou esgotado.'] as $phrase): ?>
                <p class="min-h-36 border-b border-r border-ink/25 p-6 font-display text-2xl leading-tight tracking-[-.03em]">“<?= htmlspecialchars($phrase, ENT_QUOTES, 'UTF-8') ?>”</p>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="bg-[#d9cab5] py-20 lg:py-32">
        <div class="page-container grid gap-10 lg:grid-cols-[minmax(0,1.15fr)_minmax(20rem,.85fr)]">
            <div>
                <p class="section-kicker">Antes da ação</p>
                <h2 class="mt-6 max-w-[12ch] font-display text-[clamp(3rem,5.8vw,5.8rem)] leading-[.92] tracking-[-.05em]">Uma decisão com dinheiro pode começar antes do momento em que você percebe que decidiu.</h2>
            </div>
            <div class="space-y-5 text-lg leading-relaxed text-ink/75">
                <p>O cartão é o final visível. O Pix é o final visível. A fatura fechada sem ser aberta é o final visível.</p>
                <p>Antes disso, pode existir um contexto, um pensamento de um segundo, uma sensação no corpo, uma urgência de aliviar, resolver, garantir, agradar, controlar ou evitar.</p>
                <p class="font-display text-3xl leading-tight tracking-[-.03em] text-bronze">Você não precisa inventar uma causa. Precisa conseguir observar o que realmente aconteceu.</p>
            </div>
        </div>
    </section>

    <section id="o-radar" class="bg-bronze py-20 text-cream lg:py-32">
        <div class="page-container">
            <p class="section-kicker section-kicker--light">Radar do Dinheiro</p>
            <div class="mt-6 grid gap-10 lg:grid-cols-[minmax(0,1.15fr)_minmax(20rem,.85fr)]">
                <h2 class="max-w-[11ch] font-display text-[clamp(3rem,5.8vw,5.8rem)] leading-[.92] tracking-[-.05em]">Sete dias para transformar uma repetição genérica em uma sequência observável.</h2>
                <div class="space-y-5 text-lg leading-relaxed text-cream/80"><p>O Radar é uma investigação guiada. Você escolhe uma situação concreta da sua relação com dinheiro e acompanha o que acontece ao redor dela durante uma semana.</p><p>A cada dia, uma nova peça entra no campo de observação. No final, você reúne tudo em um único registro.</p></div>
            </div>
            <div class="mt-14 border-y border-cream/30 py-6 font-display text-[clamp(1.8rem,3.5vw,3.5rem)] leading-tight tracking-[-.04em] text-gold">Contexto <span class="text-cream/60">→</span> Pensamento <span class="text-cream/60">→</span> Afeto <span class="text-cream/60">→</span> Impulso <span class="text-cream/60">→</span> Comportamento <span class="text-cream/60">→</span> Efeito imediato <span class="text-cream/60">→</span> Consequência</div>
            <p class="mt-8 max-w-3xl text-lg leading-relaxed text-cream/75">Não é um teste. Não há pontuação, perfil financeiro ou resposta correta. Existe uma sequência que você conseguiu observar na sua própria vida.</p>
            <figure class="radar-editorial-media radar-editorial-media--product mt-12">
                <img src="/assets/images/radar/mockup-radar-do-dinheiro.webp" alt="Radar do Dinheiro aberto, pronto para observação" loading="lazy">
            </figure>
        </div>
    </section>

    <section id="sete-dias" class="py-20 lg:py-32">
        <div class="page-container"><p class="section-kicker">Uma peça por dia</p><div class="grid gap-10 lg:grid-cols-[minmax(0,1fr)_minmax(23rem,.8fr)] lg:items-end"><h2 class="mt-6 max-w-[12ch] font-display text-[clamp(3rem,5.8vw,5.8rem)] leading-[.92] tracking-[-.05em]">Você não vai tentar explicar tudo de uma vez.</h2><figure class="radar-editorial-media radar-editorial-media--days"><img src="/assets/images/radar/composicao-7-dias.webp" alt="Composição de sete cartões, uma prática para cada dia" loading="lazy"></figure></div>
            <ol class="mt-14 grid border-t border-ink/25 md:grid-cols-2 lg:grid-cols-3">
                <?php $days = [['Tire o rótulo da frente','Comportamento'],['Volte algumas horas','Contexto'],['Capture a frase de um segundo','Pensamento'],['Perceba o afeto e o corpo','Afeto'],['Diferencie vontade de urgência','Impulso / urgência'],['Observe os primeiros minutos depois','Efeito imediato'],['Monte o seu Radar','Consequência']]; foreach ($days as $index => [$title, $piece]): ?>
                    <li class="flex min-h-64 flex-col border-b border-r border-ink/25 p-6"><span class="text-sm tracking-[.16em] text-bronze">0<?= $index + 1 ?></span><h3 class="mt-auto font-display text-3xl leading-none tracking-[-.04em]"><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h3><p class="mt-5 text-sm uppercase tracking-[.14em] text-ink/60">Peça do Radar: <?= htmlspecialchars($piece, ENT_QUOTES, 'UTF-8') ?></p></li>
                <?php endforeach; ?>
            </ol>
            <p class="mt-12 max-w-3xl font-display text-[clamp(1.8rem,3.5vw,3rem)] leading-tight tracking-[-.04em] text-bronze">Sete dias atrás, você podia ter apenas um rótulo. No final, terá uma sequência para ler.</p>
        </div>
    </section>

    <section id="radar-preenchido" class="bg-ink py-20 text-cream lg:py-32">
        <div class="page-container grid gap-12 lg:grid-cols-[minmax(0,.75fr)_minmax(25rem,1.25fr)]"><div><p class="section-kicker section-kicker--light">Como isso pode ficar</p><h2 class="mt-6 max-w-[10ch] font-display text-[clamp(3rem,5.5vw,5.6rem)] leading-[.92] tracking-[-.05em]">O comportamento é uma parte. O Radar mostra o caminho.</h2><figure class="radar-editorial-media radar-editorial-media--filled mt-10"><img src="/assets/images/radar/radar-preenchido.webp" alt="Exemplo do Radar do Dinheiro preenchido" loading="lazy"></figure></div>
            <div class="border border-cream/30 p-6 sm:p-10"><p class="text-sm uppercase tracking-[.16em] text-gold">Radar preenchido — exemplo</p><?php $example = [['Contexto','Dia difícil, cansaço acumulado.'],['Pensamento','“Eu mereço alguma coisa.”'],['Afeto','Frustração e cansaço.'],['Impulso','Urgência de sentir algum prazer agora.'],['Comportamento','Compra não planejada.'],['Efeito imediato','Alívio.'],['Consequência','Culpa e preocupação com o gasto.']]; foreach ($example as $i => [$label, $value]): ?><div class="border-t border-cream/20 py-5 <?= $i === 0 ? 'mt-6' : '' ?>"><p class="text-sm uppercase tracking-[.14em] text-gold"><?= $label ?></p><p class="mt-2 font-display text-2xl tracking-[-.03em]"><?= $value ?></p></div><?php endforeach; ?><p class="mt-5 text-sm leading-relaxed text-cream/65">Este é apenas um exemplo de leitura, não um diagnóstico nem uma sequência universal. O seu Radar é construído a partir do que você observar.</p></div>
        </div>
    </section>

    <section class="py-20 lg:py-32">
        <div class="page-container">
            <p class="section-kicker">O que muda na qualidade da observação</p>
            <div class="observation-section mt-6">
                <div class="observation-section__intro">
                    <h2 class="max-w-[12ch] font-display text-[clamp(3rem,5.8vw,5.8rem)] leading-[.92] tracking-[-.05em]">Você não recebe uma explicação pronta. Recebe melhores condições para enxergar o que aconteceu.</h2>
                    <a class="button button--ink observation-section__cta" href="<?= htmlspecialchars($checkoutUrl, ENT_QUOTES, 'UTF-8') ?>">Quero construir essa sequência</a>
                </div>
                <div class="observation-section__content">
                    <ul class="space-y-4 text-lg leading-relaxed text-ink/75">
                        <li>Trocar rótulos amplos por um comportamento observável.</li>
                        <li>Perceber o contexto que costuma desaparecer quando você olha apenas para a decisão.</li>
                        <li>Capturar pensamentos rápidos próximos da ação.</li>
                        <li>Diferenciar uma vontade de uma urgência de agir.</li>
                        <li>Reunir sete elementos em um Radar preenchido, baseado em uma situação real.</li>
                        <li>Sair de “eu faço isso de novo” para “como eu chego até isso?”.</li>
                    </ul>
                    <figure class="radar-editorial-media radar-editorial-media--practice observation-section__media">
                        <img src="/assets/images/radar/pratica-de-observacao.png" alt="Pessoa registrando uma observação em seu caderno" loading="lazy">
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-[#d9cab5] py-20 lg:py-32"><div class="page-container"><p class="section-kicker">O que você recebe</p><div class="grid gap-10 lg:grid-cols-[minmax(0,1fr)_minmax(23rem,.8fr)] lg:items-end"><h2 class="mt-6 max-w-[12ch] font-display text-[clamp(3rem,5.8vw,5.8rem)] leading-[.92] tracking-[-.05em]">Uma experiência completa para construir o seu primeiro Radar do Dinheiro.</h2><figure class="radar-editorial-media radar-editorial-media--stages"><img src="/assets/images/radar/etapas-do-radar.webp" alt="Radar do Dinheiro e suas etapas de autoconhecimento, diagnóstico e planejamento" loading="lazy"></figure></div><div class="mt-14 grid border-t border-ink/25 md:grid-cols-2 lg:grid-cols-3"><?php $included = [['7 conduções diárias','Uma orientação por dia, com Sávio Reginatto e Mari Steffan.'],['Perguntas e exercícios de observação','Você registra situações concretas ao longo da semana.'],['Seu Radar preenchido','Contexto, pensamento, afeto, impulso, comportamento, efeito imediato e consequência organizados.'],['Mapa do Dinheiro incluído','Para escolher um comportamento concreto se você ainda não fez o produto gratuito.'],['Pergunta de continuidade','Depois de “como isso acontece?”, pode surgir “para que isso pode estar servindo?”.']]; foreach ($included as [$title, $text]): ?><article class="min-h-56 border-b border-r border-ink/25 p-6"><h3 class="font-display text-3xl leading-none tracking-[-.04em]"><?= $title ?></h3><p class="mt-5 leading-relaxed text-ink/70"><?= $text ?></p></article><?php endforeach; ?></div></div></section>

    <section class="py-20 lg:py-32"><div class="page-container grid gap-12 lg:grid-cols-2"><div><p class="section-kicker">Para quem é</p><h2 class="mt-6 font-display text-[clamp(3rem,5vw,5.2rem)] leading-[.92] tracking-[-.05em]">O Radar faz sentido para quem quer investigar com honestidade.</h2><ul class="mt-10 space-y-4 text-lg leading-relaxed text-ink/75"><li>Já percebeu uma situação financeira que se repete.</li><li>Quer observar uma situação real, em vez de receber um rótulo ou perfil.</li><li>Está disposto a acompanhar a própria experiência durante sete dias.</li><li>Prefere uma investigação honesta a uma resposta rápida.</li></ul></div><div class="border border-ink/25 p-7 lg:p-10"><p class="text-sm uppercase tracking-[.16em] text-bronze">Não foi criado para quem procura</p><ul class="mt-8 space-y-4 text-lg leading-relaxed text-ink/75"><li>Uma planilha ou método de organização financeira.</li><li>Uma técnica para gastar menos ou guardar mais.</li><li>Um diagnóstico psicológico.</li><li>Uma explicação definitiva para a origem de um comportamento.</li><li>Uma promessa de eliminar padrões em sete dias.</li></ul></div></div></section>

    <section class="bg-bronze py-20 text-cream lg:py-32"><div class="page-container grid gap-10 lg:grid-cols-[minmax(0,1.1fr)_minmax(20rem,.9fr)]"><div><p class="section-kicker section-kicker--light">Um limite importante</p><h2 class="mt-6 max-w-[12ch] font-display text-[clamp(3rem,5.8vw,5.8rem)] leading-[.92] tracking-[-.05em]">Observar com mais precisão não é o mesmo que prometer uma solução imediata.</h2></div><div class="space-y-5 text-lg leading-relaxed text-cream/80"><p>O Radar não promete que você deixará de repetir um comportamento, descobrir toda a história por trás dele ou reorganizar a sua vida financeira.</p><p>Não substitui psicoterapia, acompanhamento clínico, orientação financeira ou atendimento profissional.</p><p class="font-display text-3xl leading-tight tracking-[-.03em] text-gold">O Radar não tenta dizer quem você é. Ele registra o que você conseguiu observar.</p></div></div></section>

    <section id="faq" class="bg-ink py-20 text-cream lg:py-32"><div class="page-container"><p class="section-kicker section-kicker--light">Objeções e FAQ</p><h2 class="mt-6 max-w-[11ch] font-display text-[clamp(3rem,5.8vw,5.8rem)] leading-[.92] tracking-[-.05em]">Perguntas que podem aparecer antes de começar.</h2><div class="mt-14 border-t border-cream/30"><?php $faqs = [['Eu já sei qual é o meu problema com dinheiro. Por que faria o Radar?','Porque reconhecer o comportamento e perceber a sequência são coisas diferentes. “Eu gasto demais” descreve o final; o Radar acompanha o que aconteceu antes, durante e logo depois.'],['Preciso fazer o Mapa do Dinheiro antes?','Não. Se você ainda não fez, o Mapa está incluído para ajudar a escolher um comportamento concreto.'],['Vou descobrir por que faço isso?','Não necessariamente. O Radar responde a uma pergunta mais precisa: como isso acontece?'],['Isso é terapia?','Não. É uma experiência estruturada de observação e não substitui psicoterapia, acompanhamento clínico nem atendimento profissional.'],['É um método para controlar gastos?','Não. O objetivo não é impedir a ação, mas observar a urgência e a sequência ao redor dela.'],['E se o comportamento não acontecer durante os sete dias?','Você pode observar uma situação próxima dele. A proposta procura repetição e contexto, não perfeição.'],['O que eu tenho no final?','Um Radar preenchido com contexto, pensamento, afeto, impulso, comportamento, efeito imediato e consequência.']]; foreach ($faqs as $i => [$question, $answer]): ?><details class="border-b border-cream/30 py-5" <?= $i === 0 ? 'open' : '' ?>><summary class="cursor-pointer font-display text-2xl leading-tight tracking-[-.03em]"><?= $question ?></summary><p class="mt-4 max-w-3xl pr-8 leading-relaxed text-cream/75"><?= $answer ?></p></details><?php endforeach; ?></div></div></section>

    <section id="oferta" class="bg-[#d9cab5] py-20 lg:py-32"><div class="page-container grid gap-12 lg:grid-cols-[minmax(0,1fr)_minmax(24rem,.8fr)]"><div><p class="section-kicker">Começar o Radar</p><h2 class="mt-6 max-w-[12ch] font-display text-[clamp(3rem,5.8vw,5.8rem)] leading-[.92] tracking-[-.05em]">Se você já reconhece o que repete, o próximo passo é observar como chega até isso.</h2></div><article class="bg-ink p-7 text-cream sm:p-10"><p class="text-sm uppercase tracking-[.16em] text-gold">Radar do Dinheiro</p><p class="mt-5 font-display text-3xl leading-tight tracking-[-.04em]">Experiência guiada de 7 dias para construir a sua sequência.</p><p class="mt-7 text-lg leading-relaxed text-cream/75">Inclui 7 conduções diárias, perguntas e exercícios de observação, construção do Radar preenchido e Mapa do Dinheiro para quem ainda não fez.</p><div class="mt-9 border-y border-cream/25 py-6"><p class="text-sm uppercase tracking-[.14em] text-cream/65">Pagamento único</p><p class="mt-2 text-lg text-cream/65 line-through">De R$<?= $referencePrice ?></p><p class="font-display text-6xl tracking-[-.06em] text-gold">R$29</p><?php if ($referencePrice === 58): ?><p class="mt-2 text-sm text-cream/70">50% de redução · pagamento único</p><?php else: ?><p class="mt-2 text-sm text-cream/70">Pagamento único.</p><?php endif; ?></div><a class="button button--primary mt-8 w-full" href="<?= htmlspecialchars($planCheckoutUrl, ENT_QUOTES, 'UTF-8') ?>">Quero construir meu Radar</a><p class="mt-4 text-center text-sm leading-relaxed text-cream/65">Sem assinatura. Sem urgência artificial. Comece quando fizer sentido acompanhar uma situação por sete dias.</p></article></div></section>

    <section class="bg-ink py-20 text-cream lg:py-32"><div class="page-container"><p class="section-kicker section-kicker--light">Radar do Dinheiro</p>
    <!-- <h2 class="mt-6 max-w-[12ch] font-display text-[clamp(3.25rem,6.3vw,6.5rem)] leading-[.9] tracking-[-.05em]">O que você faz com o dinheiro é o final mais fácil de enxergar. O Radar começa um pouco antes.</h2> -->
     <h2 class="
    mt-6
    max-w-[14ch]
    font-display
    text-[3.75rem]
    leading-[.96]
    tracking-[-.045em]
    max-lg:text-[3rem]
    max-md:text-[2.5rem]
">
    O que você faz com o dinheiro é o final mais fácil de enxergar. O Radar começa um pouco antes.
</h2>
    <div class="mt-12 grid gap-8 lg:grid-cols-[minmax(0,1fr)_minmax(22rem,.8fr)]"><p class="max-w-xl text-lg leading-relaxed text-cream/75">No contexto. Na frase rápida. No que o corpo sente. Na urgência. Na ação. No que muda nos primeiros minutos. E no que permanece depois.</p><div><p class="font-display text-4xl leading-tight tracking-[-.04em] text-gold">Como isso acontece?</p><a class="button button--primary mt-7" href="<?= htmlspecialchars($checkoutUrl, ENT_QUOTES, 'UTF-8') ?>">Construir meu Radar por R$29</a><p class="mt-3 text-sm leading-relaxed text-cream/65">Experiência guiada de sete dias · Mapa do Dinheiro incluído · pagamento único.</p></div></div></div></section>
</main>
<footer class="bg-bronze py-14 text-cream"><div class="page-container grid gap-10 lg:grid-cols-[minmax(0,1fr)_auto]"><div><img class="w-40" src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness"><p class="mt-8 max-w-2xl font-display text-3xl leading-tight tracking-[-.04em]">A Escola Pós-Wellness investiga o que vem depois da consciência: o ponto em que compreender deixa de ser suficiente e a vida pede sustentação.</p><p class="mt-4 text-cream/70">Depois da consciência, a vida.</p></div><nav class="grid content-start gap-3 text-cream/80" aria-label="Rodapé"><a href="#o-radar">O Radar</a><a href="#sete-dias">Como funciona</a><a href="#faq">FAQ</a><a href="#top">Voltar ao início ↑</a></nav></div></footer>
