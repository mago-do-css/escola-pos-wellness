<?php

declare(strict_types=1);

namespace App\Config;

final class AdminAuth
{
    public static function authenticate(): bool
    {
        $expectedUsername = trim((string) getenv('ADMIN_USERNAME'));
        $expectedPassword = (string) getenv('ADMIN_PASSWORD');

        if ($expectedUsername === '' || $expectedPassword === '') {
            http_response_code(404);
            echo 'Página não encontrada.';

            return false;
        }

        [$username, $password] = self::credentials();

        if (!hash_equals($expectedUsername, $username) || !hash_equals($expectedPassword, $password)) {
            header('WWW-Authenticate: Basic realm="Pós-Wellness Admin", charset="UTF-8"');
            http_response_code(401);
            echo 'Autenticação necessária.';

            return false;
        }

        header('Cache-Control: no-store, private, max-age=0');
        header('Pragma: no-cache');
        header('X-Robots-Tag: noindex, nofollow, noarchive', true);

        return true;
    }

    /** @return array{0: string, 1: string} */
    private static function credentials(): array
    {
        $username = (string) ($_SERVER['PHP_AUTH_USER'] ?? '');
        $password = (string) ($_SERVER['PHP_AUTH_PW'] ?? '');

        if ($username !== '' || $password !== '') {
            return [$username, $password];
        }

        $authorization = (string) ($_SERVER['HTTP_AUTHORIZATION'] ?? $_SERVER['REDIRECT_HTTP_AUTHORIZATION'] ?? '');
        if (!preg_match('/^Basic\s+(.+)$/i', $authorization, $matches)) {
            return ['', ''];
        }

        $decoded = base64_decode($matches[1], true);
        if ($decoded === false || !str_contains($decoded, ':')) {
            return ['', ''];
        }

        return explode(':', $decoded, 2);
    }
}
