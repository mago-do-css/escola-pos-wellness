<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Config\AdminAuth;
use App\Services\LeadRepository;

final class AdminLeadsController
{
    private const PER_PAGE = 25;

    public function index(): void
    {
        if (!AdminAuth::authenticate()) {
            return;
        }

        $search = trim((string) ($_GET['q'] ?? ''));
        $search = mb_substr($search, 0, 120, 'UTF-8');
        session_start(['cookie_httponly' => true, 'cookie_samesite' => 'Strict']);
        $_SESSION['admin_csrf'] ??= bin2hex(random_bytes(32));
        $csrf = $_SESSION['admin_csrf'];
        $view = ($_GET['view'] ?? '') === 'kanban' ? 'kanban' : 'lista';
        $showInactive = ($_GET['inactive'] ?? '') === '1';
        $from = (string) ($_GET['from'] ?? '');
        $to = (string) ($_GET['to'] ?? '');
        foreach (['from', 'to'] as $key) { if ($$key !== '' && (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $$key) || !\DateTime::createFromFormat('!Y-m-d', $$key) || \DateTime::createFromFormat('!Y-m-d', $$key)->format('Y-m-d') !== $$key)) { $$key = ''; } }
        $page = max(1, (int) ($_GET['page'] ?? 1));

        $repository = new LeadRepository();
        $allLeads = $repository->pipelineLeads($search, $from, $to, $showInactive);
        $totalMatching = count($allLeads);
        $totalPages = max(1, (int) ceil($totalMatching / self::PER_PAGE));
        $page = min($page, $totalPages);
        $leads = array_slice($allLeads, ($page - 1) * self::PER_PAGE, self::PER_PAGE);
        $stats = $repository->dashboardStats();
        $pageTitle = 'Leads | Administração Pós-Wellness';
        $noIndex = true;
        $showWhatsapp = false;

        ob_start();
        require dirname(__DIR__) . '/Views/admin/leads.php';
        $content = (string) ob_get_clean();

        require dirname(__DIR__) . '/Views/layout.php';
    }

    public function manage(): void
    {
        if (!AdminAuth::authenticate()) return;
        session_start(['cookie_httponly' => true, 'cookie_samesite' => 'Strict']);
        $token = (string) ($_POST['csrf'] ?? '');
        if (!isset($_SESSION['admin_csrf']) || !hash_equals($_SESSION['admin_csrf'], $token)) { http_response_code(403); echo 'Sessão inválida. Atualize a página e tente novamente.'; return; }
        $repository = new LeadRepository();
        $action = (string) ($_POST['action'] ?? '');
        $result = 'invalid';
        if ($action === 'create') {
            $name = trim(preg_replace('/\s+/', ' ', (string) ($_POST['name'] ?? '')) ?? '');
            $email = mb_strtolower(trim((string) ($_POST['email'] ?? '')), 'UTF-8');
            $phone = preg_replace('/\D+/', '', (string) ($_POST['whatsapp'] ?? '')) ?? '';
            if ($name !== '' && mb_strlen($name, 'UTF-8') <= 150 && strlen($email) <= 254 && filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/^\d{10,11}$/', $phone)) {
                $result = $repository->createManual($name, $email, $phone) ? 'created' : 'duplicate';
            }
        } elseif (in_array($action, ['inactivate', 'reactivate'], true)) {
            $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
            if ($id) { $repository->setInactive($id, $action === 'inactivate'); $result = $action === 'inactivate' ? 'inactivated' : 'reactivated'; }
        }
        $view = ($_POST['view'] ?? '') === 'kanban' ? 'kanban' : 'lista';
        $query = ['view' => $view, 'result' => $result];
        if (($_POST['inactive'] ?? '') === '1') $query['inactive'] = '1';
        header('Location: /admin/leads?' . http_build_query($query), true, 303);
    }

    public function update(): void
    {
        if (!AdminAuth::authenticate()) return;
        session_start(['cookie_httponly' => true, 'cookie_samesite' => 'Strict']);
        header('Content-Type: application/json; charset=utf-8');
        $token = (string) ($_POST['csrf'] ?? '');
        if (!isset($_SESSION['admin_csrf']) || !hash_equals($_SESSION['admin_csrf'], $token)) { http_response_code(403); echo json_encode(['ok' => false]); return; }
        $status = (string) ($_POST['status'] ?? '');
        $id = filter_var($_POST['id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        if (!$id || !in_array($status, ['novo', 'tentativa1', 'tentativa2', 'respondeu', 'qualificado', 'sem_resposta', 'fechada'], true)) { http_response_code(422); echo json_encode(['ok' => false]); return; }
        $ok = (new LeadRepository())->updatePipeline($id, $status);
        if (!$ok) http_response_code(404);
        echo json_encode(['ok' => $ok]);
    }
}
