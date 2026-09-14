<?php

declare(strict_types=1);

namespace App\Config;

final class RadarLanding
{
    /** Configure antes da publicação. */
    public const VSL_URL = '';
    public const CHECKOUT_URL = '';
    public const REFERENCE_PRICE = 58;

    public static function checkoutHref(): string
    {
        return self::CHECKOUT_URL !== '' ? self::CHECKOUT_URL : '#oferta';
    }

    public static function hasVsl(): bool
    {
        return self::VSL_URL !== '';
    }
}
