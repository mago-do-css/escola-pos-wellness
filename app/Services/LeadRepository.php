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
        $this->database->exec('CREATE INDEX IF NOT EXISTS idx_lead_attempts_ip_time ON lead_attempts(ip_hash, attempted_at)');
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
}
