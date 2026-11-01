<?php

declare(strict_types=1);

namespace App\Config;

final class PorTrasLanding
{
    /** Informe a URL do checkout do produto Por Trás do Dinheiro. */
    public const CHECKOUT_URL = 'https://pay.kiwify.com.br/Kl1kULi';

    public const PRICE = 47;
    public const VSL_VIDEO_URL = '/assets/videos/vsl-por-tras-do-dinheiro.mp4';
    public const VSL_POSTER_URL = '/assets/images/por-tras/thumbnail-vsl-por-tras-v2.webp';

    public static function checkoutHref(): string
    {
        return self::CHECKOUT_URL !== '' ? self::CHECKOUT_URL : '#oferta';
    }
}
