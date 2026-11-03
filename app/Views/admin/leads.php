<?php

declare(strict_types=1);

/** @var array{total: int, today: int, last_7_days: int} $stats */
/** @var list<array{id: int, name: string, email: string, whatsapp: string, subscribed_at: string}> $leads */
/** @var string $search */
/** @var int $page */
/** @var int $totalPages */
/** @var int $totalMatching */

$pageUrl = static function (int $targetPage) use ($search, $from, $to, $view, $showInactive): string {
    $query = ['page' => $targetPage, 'from' => $from, 'to' => $to, 'view' => $view, 'inactive' => $showInactive ? '1' : '0'];
    if ($search !== '') {
        $query['q'] = $search;
    }

    return '/admin/leads?' . http_build_query($query);
};
$renderLeadAction = static function (array $lead) use ($csrf, $view, $showInactive): void { ?>
    <form class="lead-action" method="post" action="/admin/leads/manage">
        <input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>">
        <input type="hidden" name="id" value="<?= (int) $lead['id'] ?>">
        <input type="hidden" name="view" value="<?= htmlspecialchars($view, ENT_QUOTES, 'UTF-8') ?>">
        <input type="hidden" name="inactive" value="<?= $showInactive ? '1' : '0' ?>">
        <input type="hidden" name="action" value="<?= $lead['inactive'] ? 'reactivate' : 'inactivate' ?>">
        <?php if ($lead['inactive']): ?><span class="lead-inactive">Inativo</span> <?php endif; ?>
        <button type="submit"><?= $lead['inactive'] ? 'Reativar' : 'Inativar' ?></button>
    </form>
<?php };
?>
<link rel="stylesheet" href="/assets/css/admin-leads.css?v=20261031-1">
<link rel="stylesheet" href="/assets/css/admin-kanban.css?v=2">
<style>
.lead-manual { margin: 1.5rem 0; padding: 1.25rem; background: #fff; border: 1px solid #e5d8c9; border-radius: .75rem; }
.lead-manual summary { cursor: pointer; font-weight: 700; }
.lead-manual form { display: flex; flex-wrap: wrap; align-items: end; gap: .75rem; margin-top: 1rem; }
.lead-manual label { display: grid; gap: .3rem; flex: 1 1 12rem; font-size: .85rem; }
.lead-manual input { width: 100%; padding: .6rem; border: 1px solid #b7a99a; border-radius: .3rem; }
.lead-manual button, .lead-action button { padding: .5rem .75rem; border: 1px solid #795a3d; border-radius: .35rem; color: #35261c; background: #f8f1e7; cursor: pointer; }
.lead-manual p, .lead-message { font-size: .85rem; margin: .75rem 0 0; }
.lead-action { margin-top: .5rem; }
.lead-inactive { color: #8c3d2a; font-weight: 700; font-size: .8rem; }
.lead-filters .lead-inactive-filter { display: flex; align-items: center; gap: .4rem; }
</style>

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

        <?php $statuses = ['novo' => 'Chegou recente', 'tentativa1' => '1º contato enviado', 'tentativa2' => '2º contato enviado', 'respondeu' => 'Cliente respondeu', 'qualificado' => 'Lead qualificado', 'sem_resposta' => 'Sem resposta', 'fechada' => 'Venda fechada']; ?>
        <?php $messages = ['created' => 'Lead cadastrado.', 'duplicate' => 'Este e-mail já está cadastrado. Pesquise e exiba os inativos para encontrá-lo.', 'invalid' => 'Confira nome, e-mail e WhatsApp com DDD.', 'inactivated' => 'Lead inativado.', 'reactivated' => 'Lead reativado.']; $result = (string) ($_GET['result'] ?? ''); ?>
        <?php if (isset($messages[$result])): ?><p class="lead-message" role="status"><?= htmlspecialchars($messages[$result], ENT_QUOTES, 'UTF-8') ?></p><?php endif; ?>
        <details class="lead-manual"><summary>Cadastrar lead manualmente</summary><form method="post" action="/admin/leads/manage"><input type="hidden" name="csrf" value="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>"><input type="hidden" name="action" value="create"><input type="hidden" name="view" value="<?= $view ?>"><input type="hidden" name="inactive" value="<?= $showInactive ? '1' : '0' ?>"><label>Nome<input name="name" maxlength="150" required></label><label>E-mail<input name="email" type="email" maxlength="254" required></label><label>WhatsApp com DDD<input name="whatsapp" type="tel" inputmode="numeric" placeholder="61999999999" pattern="[0-9]{10,11}" required></label><button type="submit">Cadastrar lead</button></form><p>Cadastros manuais não registram consentimento para comunicações de marketing.</p></details>
        <nav class="lead-tabs" aria-label="Visualização"><a href="?<?= htmlspecialchars(http_build_query(['view'=>'lista','q'=>$search,'from'=>$from,'to'=>$to,'inactive'=>$showInactive ? '1' : '0']), ENT_QUOTES, 'UTF-8') ?>" <?= $view === 'lista' ? 'aria-current="page"' : '' ?>>Lista</a><a href="?<?= htmlspecialchars(http_build_query(['view'=>'kanban','q'=>$search,'from'=>$from,'to'=>$to,'inactive'=>$showInactive ? '1' : '0']), ENT_QUOTES, 'UTF-8') ?>" <?= $view === 'kanban' ? 'aria-current="page"' : '' ?>>Kanban</a></nav>
        <form class="lead-filters" method="get" action="/admin/leads"><input type="hidden" name="view" value="<?= $view ?>"><label>Buscar contato<input type="search" name="q" value="<?= htmlspecialchars($search, ENT_QUOTES, 'UTF-8') ?>" placeholder="Nome, e-mail ou WhatsApp"></label><label>Inscrito de<input type="date" name="from" value="<?= htmlspecialchars($from, ENT_QUOTES, 'UTF-8') ?>"></label><label>Até<input type="date" name="to" value="<?= htmlspecialchars($to, ENT_QUOTES, 'UTF-8') ?>"></label><label class="lead-inactive-filter"><input type="checkbox" name="inactive" value="1" <?= $showInactive ? 'checked' : '' ?>> Exibir inativos</label><button type="submit">Filtrar</button><a href="?view=<?= $view ?>">Limpar</a></form>
        <?php if ($view === 'kanban'): ?>
        <div class="kanban-toolbar"><p class="kanban-help">Arraste os cartões para mudar de etapa. Para navegar pelo quadro, arraste uma área livre ou use as setas.</p><div class="kanban-navigation"><button type="button" data-kanban-scroll="-1" aria-label="Ver etapas anteriores">←</button><button type="button" data-kanban-scroll="1" aria-label="Ver próximas etapas">→</button></div></div>
        <div class="kanban" data-csrf="<?= htmlspecialchars($csrf, ENT_QUOTES, 'UTF-8') ?>" aria-label="Quadro de acompanhamento de leads">
            <?php foreach ($statuses as $key => $label): $columnLeads = array_filter($allLeads, static fn($lead) => $lead['status'] === $key); ?>
            <section class="kanban__column kanban__column--<?= $key ?>" data-status="<?= $key ?>"><h2><?= htmlspecialchars($label, ENT_QUOTES, 'UTF-8') ?> <span data-count><?= count($columnLeads) ?></span></h2><div class="kanban__cards">
                <?php foreach ($columnLeads as $lead): ?><article class="kanban__card" draggable="true" data-id="<?= (int) $lead['id'] ?>"><strong><?= htmlspecialchars($lead['name'], ENT_QUOTES, 'UTF-8') ?></strong><a href="mailto:<?= rawurlencode($lead['email']) ?>"><?= htmlspecialchars($lead['email'], ENT_QUOTES, 'UTF-8') ?></a><a href="https://wa.me/55<?= htmlspecialchars($lead['whatsapp'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer"><?= htmlspecialchars($lead['whatsapp'], ENT_QUOTES, 'UTF-8') ?></a><small>Inscrição: <?= htmlspecialchars($lead['subscribed_at'], ENT_QUOTES, 'UTF-8') ?> UTC</small><label>Etapa<select aria-label="Etapa de <?= htmlspecialchars($lead['name'], ENT_QUOTES, 'UTF-8') ?>"><?php foreach ($statuses as $value => $text): ?><option value="<?= $value ?>" <?= $value === $key ? 'selected' : '' ?>><?= htmlspecialchars($text, ENT_QUOTES, 'UTF-8') ?></option><?php endforeach; ?></select></label><?php $renderLeadAction($lead); ?></article><?php endforeach; ?>
            </div></section><?php endforeach; ?>
        </div><p class="kanban-feedback" role="status" aria-live="polite"></p><script src="/assets/js/admin-kanban.js?v=2" defer></script>
        <?php else: ?>
        <section class="admin-leads__table-card" aria-labelledby="admin-leads-table-title">
            <div class="admin-leads__table-top">
                <div>
                    <h2 id="admin-leads-table-title">Contatos recebidos</h2>
                    <p><?= number_format($totalMatching, 0, ',', '.') ?> resultado<?= $totalMatching === 1 ? '' : 's' ?> encontrado<?= $totalMatching === 1 ? '' : 's' ?>.</p>
                </div>
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
                                <th scope="col">Etapa</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($leads as $lead): ?>
                                <tr>
                                    <td><?= htmlspecialchars($lead['name'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><a href="mailto:<?= rawurlencode($lead['email']) ?>"><?= htmlspecialchars($lead['email'], ENT_QUOTES, 'UTF-8') ?></a></td>
                                    <td><a href="https://wa.me/55<?= htmlspecialchars($lead['whatsapp'], ENT_QUOTES, 'UTF-8') ?>" target="_blank" rel="noopener noreferrer"><?= htmlspecialchars($lead['whatsapp'], ENT_QUOTES, 'UTF-8') ?></a></td>
                                    <td><?= htmlspecialchars($lead['subscribed_at'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?= htmlspecialchars($statuses[$lead['status']] ?? $lead['status'], ENT_QUOTES, 'UTF-8') ?></td>
                                    <td><?php $renderLeadAction($lead); ?></td>
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
        <?php endif; ?>
    </section>
</main>
