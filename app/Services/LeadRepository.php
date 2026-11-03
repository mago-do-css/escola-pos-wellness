<?php

declare(strict_types=1);

namespace App\Services;

use PDO;

final class LeadRepository
{
    private PDO $database;

    public function __construct()
    {
        $directory = dirname(__DIR__, 2) . '/storage';
        if (!is_dir($directory)) {
            mkdir($directory, 0700, true);
        }

        $this->database = new PDO('sqlite:' . $directory . '/leads.sqlite', null, null, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        $this->database->exec('PRAGMA journal_mode = WAL');
        $this->database->exec('PRAGMA busy_timeout = 3000');
        $this->database->exec(
            'CREATE TABLE IF NOT EXISTS leads (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                email TEXT NOT NULL UNIQUE,
                whatsapp TEXT NOT NULL,
                consent INTEGER NOT NULL DEFAULT 1,
                ip_hash TEXT NOT NULL,
                user_agent TEXT NOT NULL,
                subscribed_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )'
        );
        $this->database->exec(
            'CREATE TABLE IF NOT EXISTS lead_attempts (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                ip_hash TEXT NOT NULL,
                accepted INTEGER NOT NULL DEFAULT 0,
                attempted_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )'
        );
        $this->database->exec('CREATE INDEX IF NOT EXISTS idx_leads_subscribed_at ON leads(subscribed_at)');
        $this->database->exec("CREATE TABLE IF NOT EXISTS lead_pipeline (lead_id INTEGER PRIMARY KEY, status TEXT NOT NULL DEFAULT 'novo', updated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (lead_id) REFERENCES leads(id))");
        $this->database->exec('CREATE TABLE IF NOT EXISTS inactive_leads (lead_id INTEGER PRIMARY KEY, inactivated_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP, FOREIGN KEY (lead_id) REFERENCES leads(id))');
        $this->database->exec('CREATE INDEX IF NOT EXISTS idx_lead_attempts_ip_time ON lead_attempts(ip_hash, attempted_at)');
    }

    public function pipelineLeads(string $search, string $from, string $to, bool $showInactive = false): array
    {
        $sql = "SELECT l.id, l.name, l.email, l.whatsapp, l.subscribed_at, COALESCE(p.status, 'novo') AS status, (i.lead_id IS NOT NULL) AS inactive FROM leads l LEFT JOIN lead_pipeline p ON p.lead_id = l.id LEFT JOIN inactive_leads i ON i.lead_id = l.id WHERE (l.name LIKE :search OR l.email LIKE :search OR l.whatsapp LIKE :search)";
        if (!$showInactive) { $sql .= ' AND i.lead_id IS NULL'; }
        $params = [':search' => '%' . $search . '%'];
        if ($from !== '') { $sql .= " AND date(l.subscribed_at, '-3 hours') >= :from_date"; $params[':from_date'] = $from; }
        if ($to !== '') { $sql .= " AND date(l.subscribed_at, '-3 hours') <= :to_date"; $params[':to_date'] = $to; }
        $query = $this->database->prepare($sql . ' ORDER BY l.subscribed_at DESC, l.id DESC');
        $query->execute($params);
        return $query->fetchAll();
    }

    public function createManual(string $name, string $email, string $whatsapp): bool
    {
        $query = $this->database->prepare("INSERT OR IGNORE INTO leads (name, email, whatsapp, consent, ip_hash, user_agent) VALUES (:name, :email, :whatsapp, 0, '', 'Cadastro manual')");
        $query->execute([':name' => $name, ':email' => $email, ':whatsapp' => $whatsapp]);
        return $query->rowCount() === 1;
    }

    public function setInactive(int $id, bool $inactive): void
    {
        $sql = $inactive ? 'INSERT OR IGNORE INTO inactive_leads (lead_id) SELECT id FROM leads WHERE id = :id' : 'DELETE FROM inactive_leads WHERE lead_id = :id';
        $this->database->prepare($sql)->execute([':id' => $id]);
    }

    public function updatePipeline(int $id, string $status): bool
    {
        $query = $this->database->prepare('INSERT INTO lead_pipeline (lead_id, status, updated_at) SELECT id, :status, CURRENT_TIMESTAMP FROM leads WHERE id = :id ON CONFLICT(lead_id) DO UPDATE SET status = excluded.status, updated_at = CURRENT_TIMESTAMP');
        $query->execute([':id' => $id, ':status' => $status]);
        return $query->rowCount() > 0;
    }

    public function isRateLimited(string $ipHash): bool
    {
        $query = $this->database->prepare(
            "SELECT COUNT(*) FROM lead_attempts WHERE ip_hash = :ip_hash AND attempted_at >= datetime('now', '-15 minutes')"
        );
        $query->execute(['ip_hash' => $ipHash]);

        return (int) $query->fetchColumn() >= 5;
    }

    public function recordAttempt(string $ipHash, bool $accepted): void
    {
        $query = $this->database->prepare('INSERT INTO lead_attempts (ip_hash, accepted) VALUES (:ip_hash, :accepted)');
        $query->execute(['ip_hash' => $ipHash, 'accepted' => $accepted ? 1 : 0]);
    }

    /** @param array{name: string, email: string, whatsapp: string, ip_hash: string, user_agent: string} $lead */
    public function store(array $lead): bool
    {
        $query = $this->database->prepare(
            'INSERT OR IGNORE INTO leads (name, email, whatsapp, consent, ip_hash, user_agent) VALUES (:name, :email, :whatsapp, 1, :ip_hash, :user_agent)'
        );
        $query->execute($lead);

        return $query->rowCount() === 1;
    }

    /** @return array{total: int, today: int, last_7_days: int} */
    public function dashboardStats(): array
    {
        $query = $this->database->query(
            "SELECT
                COUNT(*) AS total,
                SUM(CASE WHEN date(subscribed_at, '-3 hours') = date('now', '-3 hours') THEN 1 ELSE 0 END) AS today,
                SUM(CASE WHEN datetime(subscribed_at) >= datetime('now', '-6 days') THEN 1 ELSE 0 END) AS last_7_days
            FROM leads WHERE NOT EXISTS (SELECT 1 FROM inactive_leads i WHERE i.lead_id = leads.id)"
        );
        $stats = $query->fetch();

        return [
            'total' => (int) ($stats['total'] ?? 0),
            'today' => (int) ($stats['today'] ?? 0),
            'last_7_days' => (int) ($stats['last_7_days'] ?? 0),
        ];
    }

    public function countForDashboard(string $search): int
    {
        [$where, $parameters] = $this->dashboardSearch($search);
        $query = $this->database->prepare('SELECT COUNT(*) FROM leads ' . $where);
        $query->execute($parameters);

        return (int) $query->fetchColumn();
    }

    /** @return list<array{id: int, name: string, email: string, whatsapp: string, subscribed_at: string}> */
    public function listForDashboard(string $search, int $limit, int $offset): array
    {
        [$where, $parameters] = $this->dashboardSearch($search);
        $query = $this->database->prepare(
            'SELECT id, name, email, whatsapp, subscribed_at FROM leads ' . $where . ' ORDER BY datetime(subscribed_at) DESC, id DESC LIMIT :limit OFFSET :offset'
        );
        foreach ($parameters as $name => $value) {
            $query->bindValue($name, $value, PDO::PARAM_STR);
        }
        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->bindValue(':offset', $offset, PDO::PARAM_INT);
        $query->execute();

        /** @var list<array{id: int, name: string, email: string, whatsapp: string, subscribed_at: string}> $leads */
        $leads = $query->fetchAll();

        return $leads;
    }

    /** @return array{0: string, 1: array<string, string>} */
    private function dashboardSearch(string $search): array
    {
        if ($search === '') {
            return ['', []];
        }

        return [
            'WHERE name LIKE :search OR email LIKE :search OR whatsapp LIKE :search',
            [':search' => '%' . $search . '%'],
        ];
    }
}
