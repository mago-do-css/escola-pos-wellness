<?php

declare(strict_types=1);

namespace App\Config;

final class DinheiroFrutoLanding
{
    /** Informe a URL do checkout do Dinheiro é Fruto quando estiver disponível. */
    public const CHECKOUT_URL = '';

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
