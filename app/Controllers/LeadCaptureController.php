<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Services\LeadRepository;
use App\Services\MetaConversionsApi;

final class LeadCaptureController
{
    public function store(): void
    {
        session_start([
            'cookie_httponly' => true,
            'cookie_samesite' => 'Lax',
        ]);

        $payload = $_POST;
        $ipHash = hash('sha256', $this->clientIp());
        $repository = new LeadRepository();

        if (!$this->sameOriginRequest() || !$this->validToken((string) ($payload['csrf_token'] ?? ''))) {
            $repository->recordAttempt($ipHash, false);
            $this->respond(403, 'Não foi possível validar o envio. Atualize a página e tente novamente.');
            return;
        }

        if (trim((string) ($payload['company_website'] ?? '')) !== '') {
            $repository->recordAttempt($ipHash, false);
            $this->respond(422, 'Não foi possível concluir o envio.');
            return;
        }

        $startedAt = (int) ($payload['form_started_at'] ?? 0);
        if ($startedAt <= 0 || time() - $startedAt < 3 || time() - $startedAt > 7200) {
            $repository->recordAttempt($ipHash, false);
            $this->respond(422, 'Aguarde alguns segundos e tente novamente.');
            return;
        }

        if ($repository->isRateLimited($ipHash)) {
            $this->respond(429, 'Muitas tentativas. Aguarde alguns minutos para tentar novamente.');
            return;
        }

        $name = $this->normalizeName((string) ($payload['name'] ?? ''));
        $email = mb_strtolower(trim((string) ($payload['email'] ?? '')), 'UTF-8');
        $whatsapp = preg_replace('/\D+/', '', (string) ($payload['whatsapp'] ?? '')) ?? '';
        $consent = (string) ($payload['consent'] ?? '') === '1';

        if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match('/^\d{10,11}$/', $whatsapp) || !$consent) {
            $repository->recordAttempt($ipHash, false);
            $this->respond(422, 'Revise seus dados e confirme o consentimento para continuar.');
            return;
        }

        $lead = [
            'name' => $name,
            'email' => $email,
            'whatsapp' => $whatsapp,
            'ip_hash' => $ipHash,
            'user_agent' => substr((string) ($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 1000),
        ];
        $isNewLead = $repository->store($lead);
        $repository->recordAttempt($ipHash, true);

        if ($isNewLead) {
            $eventId = preg_replace('/[^A-Za-z0-9_-]/', '', (string) ($payload['event_id'] ?? '')) ?? '';
            if ($eventId !== '') {
                MetaConversionsApi::trackLead($eventId, $lead);
            }
        }

        $this->respond(200, '', $isNewLead);
    }

    private function validToken(string $token): bool
    {
        return isset($_SESSION['lead_csrf_token']) && hash_equals((string) $_SESSION['lead_csrf_token'], $token);
    }

    private function sameOriginRequest(): bool
    {
        $origin = (string) ($_SERVER['HTTP_ORIGIN'] ?? '');
        if ($origin === '') {
            return true;
        }

        return parse_url($origin, PHP_URL_HOST) === preg_replace('/:\d+$/', '', (string) ($_SERVER['HTTP_HOST'] ?? ''));
    }

    private function normalizeName(string $value): string
    {
        return trim(preg_replace('/\s+/', ' ', $value) ?? '');
    }

    private function clientIp(): string
    {
        $forwarded = trim(explode(',', (string) ($_SERVER['HTTP_X_FORWARDED_FOR'] ?? ''))[0]);

        return $forwarded !== '' ? $forwarded : (string) ($_SERVER['REMOTE_ADDR'] ?? '');
    }

    private function respond(int $status, string $message = '', bool $isNewLead = false): void
    {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['status' => $status < 300 ? 'ok' : 'error', 'message' => $message, 'is_new_lead' => $isNewLead], JSON_UNESCAPED_UNICODE);
    }
}
