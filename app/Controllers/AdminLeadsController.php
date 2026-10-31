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
        $page = max(1, (int) ($_GET['page'] ?? 1));

        $repository = new LeadRepository();
        $totalMatching = $repository->countForDashboard($search);
        $totalPages = max(1, (int) ceil($totalMatching / self::PER_PAGE));
        $page = min($page, $totalPages);
        $leads = $repository->listForDashboard($search, self::PER_PAGE, ($page - 1) * self::PER_PAGE);
        $stats = $repository->dashboardStats();
        $pageTitle = 'Leads | Administração Pós-Wellness';
        $noIndex = true;

        ob_start();
        require dirname(__DIR__) . '/Views/admin/leads.php';
        $content = (string) ob_get_clean();

        require dirname(__DIR__) . '/Views/layout.php';
    }
}
