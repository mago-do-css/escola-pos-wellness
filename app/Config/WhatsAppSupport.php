<?php

declare(strict_types=1);

namespace App\Config;

final class WhatsAppSupport
{
    private const PHONE_NUMBER = '5561981826441';

    public const DEFAULT_MESSAGE = 'Olá, gostaria de mais informações sobre os produtos da Pós-Wellness.';

    public static function link(string $message): string
    {
        return 'https://wa.me/' . self::PHONE_NUMBER . '?text=' . rawurlencode($message);
    }
}
