<?php declare(strict_types=1); ?>
<link rel="stylesheet" href="/assets/css/assinatura.css?v=7">
<main class="members-page members-page--lesson">
    <header class="members-header"><div class="members-container"><a href="/" aria-label="Pós-Wellness, página inicial"><img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness"></a><div class="members-header__actions"><a href="#proxima-aula" class="members-header__cta">Continuar <span aria-hidden="true">→</span></a></div></div></header>
    <section class="members-hero"><div class="members-container members-container--narrow"><p class="members-kicker"><span></span> Uma aula para começar</p><h1>Você já parou para observar o que acontece <em>antes de uma decisão com dinheiro?</em></h1><p class="members-lead">Nesta aula gratuita, descubra um jeito de observar situações que se repetem e dê o primeiro passo para entender suas escolhas com mais clareza.</p>
        <div class="members-video-wrap">
        <?php if ($videoUrl !== ''): ?>
            <div class="members-video"><video data-video-play-overlay data-play-label="Clique para iniciar a aula" playsinline preload="metadata"<?= $posterUrl !== '' ? ' poster="' . htmlspecialchars($posterUrl, ENT_QUOTES, 'UTF-8') . '"' : '' ?>><source src="<?= htmlspecialchars($videoUrl, ENT_QUOTES, 'UTF-8') ?>" type="video/mp4">Seu navegador não oferece suporte à reprodução deste vídeo.</video></div>
        <?php else: ?>
            <div class="members-video-placeholder"><span class="members-video-placeholder__icon" aria-hidden="true">▶</span><strong>Sua aula estará disponível aqui</strong><span>O vídeo será adicionado em breve.</span></div>
        <?php endif; ?>
        </div>
        <div class="members-material"><div><span class="members-material__icon" aria-hidden="true">↓</span></div><div><strong>Tenha o Mapa do Dinheiro por perto</strong><p>Acompanhe a aula com o e-book gratuito e registre suas observações.</p></div><a href="<?= htmlspecialchars($downloadUrl, ENT_QUOTES, 'UTF-8') ?>" download>Baixar material <span aria-hidden="true">↗</span></a></div>
        <div class="members-capture" id="proxima-aula"><div class="members-capture__intro"><p class="members-kicker">Continue a jornada</p><h2>Preencha os dados e continue para a próxima aula.</h2><p>Conheça a continuidade e o acesso completo.</p></div><?php $formId = 'principal'; require __DIR__ . '/formulario.php'; ?></div>
    </div></section>
    <section class="members-playlist"><div class="members-container"><div class="members-section-heading"><div><p class="members-kicker"><span></span> Continue aprendendo</p><h2>Uma aula abre caminho. <em>As próximas aprofundam.</em></h2></div><p>Conheça os temas que fazem parte da jornada na área de membros.</p></div><div class="members-playlist__items">
        <?php foreach ($lessons as $index => [$title, $description, $thumbnail]): $number = str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT); ?>
        <article class="members-lesson"><div class="members-lesson__text"><span>AULA <?= $number ?></span><h3><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?></h3><p><?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8') ?></p></div><div class="members-lesson__thumb" aria-label="Aula bloqueada"><span class="members-lesson__background"<?= $thumbnail !== '' ? ' style="background-image:url(&quot;' . htmlspecialchars($thumbnail, ENT_QUOTES, 'UTF-8') . '&quot;)"' : '' ?>></span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" aria-hidden="true"><rect x="5" y="10" width="14" height="11" rx="2"/><path d="M8 10V7a4 4 0 1 1 8 0v3"/></svg></div></article>
        <?php endforeach; ?><div class="members-playlist__more" aria-hidden="true"><span>Mais conteúdos para continuar sua jornada</span><div></div></div></div>
        <div class="members-capture members-capture--bottom"><div class="members-capture__intro"><p class="members-kicker">Seu próximo passo</p><h2>Continue essa descoberta no seu ritmo.</h2><p>Preencha seus dados para conhecer a continuidade da jornada.</p></div><?php $formId = 'final'; require __DIR__ . '/formulario.php'; ?></div>
    </div></section>
</main>
<footer class="members-footer"><div class="members-container"><p>Pós-Wellness · Mais presença nas suas escolhas.</p><?php require dirname(__DIR__) . '/partials/footer-social-links.php'; ?></div></footer>
