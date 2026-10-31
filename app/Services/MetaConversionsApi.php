<?php

declare(strict_types=1);

namespace App\Services;

use App\Config\MetaTracking;

final class MetaConversionsApi
{
    public static function trackPageView(string $eventId): void
    {
        self::send('PageView', $eventId);
    }

    /** @param array{name?: string, email?: string, whatsapp?: string} $lead */
    public static function trackLead(string $eventId, array $lead): void
    {
        self::send('Lead', $eventId, $lead, [
            'content_name' => 'Mapa do Dinheiro',
            'content_category' => 'Lead magnet',
        ]);
    }

    /** @param array{name?: string, email?: string, whatsapp?: string} $lead @param array<string, string> $customData */
    private static function send(string $eventName, string $eventId, array $lead = [], array $customData = []): void
    {
        if (!MetaTracking::isEnabled()) {
            return;
        }

        $payload = [
            'data' => [[
                'event_name' => $eventName,
                'event_time' => time(),
                'event_id' => $eventId,
                'event_source_url' => self::currentUrl(),
                'action_source' => 'website',
                'user_data' => self::userData($lead),
                'custom_data' => (object) $customData,
            ]],
        ];
        $testEventCode = MetaTracking::testEventCode();
        if ($testEventCode !== '') {
            $payload['test_event_code'] = $testEventCode;
        }

        $url = sprintf(
            'https://graph.facebook.com/%s/%s/events?access_token=%s',
            MetaTracking::graphApiVersion(),
            rawurlencode(MetaTracking::pixelId()),
            rawurlencode(MetaTracking::accessToken())
        );

        try {
            $context = stream_context_create([
                'http' => [
                    'method' => 'POST',
                    'header' => "Content-Type: application/json\r\n",
                    'content' => json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR),
                    'timeout' => 2,
                    'ignore_errors' => true,
                ],
            ]);
            $response = @file_get_contents($url, false, $context);
            $statusLine = $http_response_header[0] ?? '';

            $statusCode = preg_match('/\s(\d{3})\s/', $statusLine, $matches) ? (int) $matches[1] : 0;
            $responseData = is_string($response) ? json_decode($response, true) : null;

            if ($response === false || $statusCode < 200 || $statusCode >= 300) {
                self::log('rejected event=' . $eventName . ' status=' . $statusCode);
                return;
            }

            if (MetaTracking::isDebugEnabled()) {
                $eventsReceived = is_array($responseData) ? (string) ($responseData['events_received'] ?? 'unknown') : 'unknown';
                $traceId = is_array($responseData) ? (string) ($responseData['fbtrace_id'] ?? '') : '';
                self::log(sprintf(
                    'Meta CAPI accepted event=%s event_id=%s status=%d events_received=%s fbtrace_id=%s',
                    $eventName,
                    $eventId,
                    $statusCode,
                    $eventsReceived,
                    $traceId
                ));
            }
        } catch (\Throwable) {
            // Tracking must never interrupt the visitor's journey.
            self::log('could not send event=' . $eventName);
        }
    }

    /** @param array{name?: string, email?: string, whatsapp?: string} $lead @return array<string, string> */
    private static function userData(array $lead): array
    {
        $data = [
            'client_ip_address' => self::clientIp(),
            'client_user_agent' => substr((string) ($_SERVER['HTTP_USER_AGENT'] ?? ''), 0, 1000),
        ];

        $fbp = trim((string) ($_COOKIE['_fbp'] ?? ''));
        if ($fbp !== '') {
            $data['fbp'] = $fbp;
        }

        $fbc = trim((string) ($_COOKIE['_fbc'] ?? ''));
        if ($fbc === '' && isset($_GET['fbclid'])) {
            $fbc = 'fb.1.' . ((string) round(microtime(true) * 1000)) . '.' . preg_replace('/[^A-Za-z0-9._-]/', '', (string) $_GET['fbclid']);
        }
        if ($fbc !== '') {
            $data['fbc'] = $fbc;
        }

        foreach (['email' => 'em', 'whatsapp' => 'ph', 'name' => 'fn'] as $input => $field) {
            $value = self::normalizedLeadValue($input, (string) ($lead[$input] ?? ''));
            if ($value !== '') {
                $data[$field] = hash('sha256', $value);
            }
        }

        return array_filter($data, static fn (string $value): bool => $value !== '');
    }

    private static function normalizedLeadValue(string $field, string $value): string
    {
        $value = mb_strtolower(trim($value), 'UTF-8');

        return match ($field) {
            'whatsapp' => preg_replace('/\D+/', '', $value) ?? '',
            'name' => preg_replace('/\s+.*/', '', $value) ?? '',
            default => $value,
        };
    }

    private static function clientIp(): string
    {
        $cloudflareIp = trim((string) ($_SERVER['HTTP_CF_CONNECTING_IP'] ?? ''));
        if (filter_var($cloudflareIp, FILTER_VALIDATE_IP)) {
            return $cloudflareIp;
        }

        $forwarded = trim(explode(',', (string) ($_SERVER['HTTP_X_FORWARDED_FOR'] ?? ''))[0]);
        if (filter_var($forwarded, FILTER_VALIDATE_IP)) {
            return $forwarded;
        }

        $realIp = trim((string) ($_SERVER['HTTP_X_REAL_IP'] ?? ''));
        if (filter_var($realIp, FILTER_VALIDATE_IP)) {
            return $realIp;
        }

        return (string) ($_SERVER['REMOTE_ADDR'] ?? '');
    }

    private static function currentUrl(): string
    {
        $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https') ? 'https' : 'http';
        $host = preg_replace('/[^A-Za-z0-9.:-]/', '', (string) ($_SERVER['HTTP_HOST'] ?? 'localhost')) ?: 'localhost';
        $uri = (string) ($_SERVER['REQUEST_URI'] ?? '/');

        return $scheme . '://' . $host . $uri;
    }

    private static function log(string $message): void
    {
        file_put_contents('php://stderr', '[Meta CAPI] ' . $message . PHP_EOL);
    }
}
