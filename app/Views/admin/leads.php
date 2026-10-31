<?php

declare(strict_types=1);

/** @var array{total: int, today: int, last_7_days: int} $stats */
/** @var list<array{id: int, name: string, email: string, whatsapp: string, subscribed_at: string}> $leads */
/** @var string $search */
/** @var int $page */
/** @var int $totalPages */
/** @var int $totalMatching */

$pageUrl = static function (int $targetPage) use ($search): string {
    $query = ['page' => $targetPage];
    if ($search !== '') {
        $query['q'] = $search;
    }

    return '/admin/leads?' . http_build_query($query);
};
?>
<link rel="stylesheet" href="/assets/css/admin-leads.css?v=20261031-1">

<main class="admin-leads">
    <header class="admin-leads__header">
        <div class="admin-leads__container">
            <a class="admin-leads__brand" href="/" aria-label="Voltar para o site da Pós-Wellness">
                <img src="/assets/images/logo-pos-wellness-offwhite.svg" alt="Pós-Wellness">
                <span>Administração</span>
            </a>
            <p>Leads capturados pelo formulário do Mapa do Dinheiro.</p>
        </div>
    </header>

    <section class="admin-leads__content admin-leads__container" aria-labelledby="admin-leads-title">
        <div class="admin-leads__intro">
            <div>
                <p class="admin-leads__eyebrow">Visão geral</p>
                <h1 id="admin-leads-title">Leads</h1>
                <p>Consulte os contatos enviados pelo formulário, sem expor informações técnicas de navegação.</p>
            </div>
            <a class="admin-leads__back" href="/">Abrir site ↗</a>
        </div>

        <div class="admin-leads__stats" aria-label="Resumo de leads">
            <article>
                <span>Total</span>
                <strong><?= number_format($stats['total'], 0, ',', '.') ?></strong>
                <p>contatos únicos</p>
            </article>
            <article>
                <span>Hoje</span>
                <strong><?= number_format($stats['today'], 0, ',', '.') ?></strong>
                <p>novos registros</p>
            </article>
            <article>
                <span>Últimos 7 dias</span>
                <strong><?= number_format($stats['last_7_days'], 0, ',', '.') ?></strong>
                <p>novos registros</p>
            </article>
        </div>

        <section class="admin-leads__table-card" aria-labelledby="admin-leads-table-title">
            <div class="admin-leads__table-top">
                <div>
                    <h2 id="admin-leads-table-title">Contatos recebidos</h2>
                    <p><?= number_format($totalMatching, 0, ',', '.') ?> resultado<?= $totalMatching === 1 ? '' : 's' ?> encontrado<?= $totalMatching === 1 ? '' : 's' ?>.</p>
                </div>
                <form class="admin-leads__search" method="get" action="/admin/leads" role="search">
                    <label for="lead-search">Buscar contato</label>
                    <div>
                        <input id="lead-search" name="q" type="search" value="<?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?>" placeholder="Nome, e-mail ou WhatsApp">
                        <button type="submit">Buscar</button>
                    </div>
                </form>
            </div>

            <?php if ($leads === []): ?>
                <div class="admin-leads__empty">
                    <strong>Nenhum lead encontrado.</strong>
                    <p><?= $search !== '' ? 'Tente uma busca diferente.' : 'Os novos contatos aparecerão aqui depois do envio do formulário.' ?></p>
                </div>
            <?php else: ?>
                <div class="admin-leads__table-wrap">
                    <table>
                        <thead>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">WhatsApp</th>
                                <th scope="col">Inscrição</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($leads as $lead): ?>
                                <tr>
                                    <td><?= htmlspecialchars($lead['name'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><a href="mailto:<?= rawurlencode($lead['email']) ?>"><?= htmlspecialchars($lead['email'], ENT_QUOTES, 'UTF-8') ?></a></td>
                                    <td><a href="https://wa.me/55<?= htmlspecialchars($lead['whatsapp'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer"><?= htmlspecialchars($lead['whatsapp'], ENT_QUOTES, 'UTF-8') ?></a></td>
                                    <td><?= htmlspecialchars($lead['subscribed_at'], ENT_QUOTES, 'UTF-8') ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>

            <?php if ($totalPages > 1): ?>
                <nav class="admin-leads__pagination" aria-label="Paginação dos contatos">
                    <?php if ($page > 1): ?><a href="<?= htmlspecialchars($pageUrl($page - 1), ENT_QUOTES, 'UTF-8') ?>">← Anterior</a><?php endif; ?>
                    <span>Página <?= $page ?> de <?= $totalPages ?></span>
                    <?php if ($page < $totalPages): ?><a href="<?= htmlspecialchars($pageUrl($page + 1), ENT_QUOTES, 'UTF-8') ?>">Próxima →</a><?php endif; ?>
                </nav>
            <?php endif; ?>
        </section>
    </section>
</main>
