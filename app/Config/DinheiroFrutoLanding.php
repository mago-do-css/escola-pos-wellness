<?php

declare(strict_types=1);

namespace App\Config;

final class DinheiroFrutoLanding
{
    public const CHECKOUT_URL = 'https://pay.kiwify.com.br/Br2rGnS';

    /** Informe a URL do vídeo da VSL quando ela estiver finalizada. */
    public const VSL_VIDEO_URL = '';

    /** Informe a URL da thumbnail da VSL quando ela estiver finalizada. */
    public const VSL_POSTER_URL = '';

    public static function checkoutHref(): string
    {
        return self::CHECKOUT_URL !== '' ? self::CHECKOUT_URL : '#oferta';
    }

    public static function hasCheckout(): bool
    {
        return self::CHECKOUT_URL !== '';
    }
}
