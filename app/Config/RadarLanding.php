<?php

declare(strict_types=1);

namespace App\Config;

final class RadarLanding
{
    public const VSL_VIDEO_URL = '/assets/videos/vsl-radar-29.mp4';
    public const VSL_POSTER_URL = '/assets/images/thumbnail-page-radar-do-dinheiro.png';
    /** O antigo Radar agora é o primeiro módulo do Por Trás do Dinheiro. */
    public const CHECKOUT_URL = 'https://pay.kiwify.com.br/Kl1kULi';
    public const REFERENCE_PRICE = 0;

    public static function checkoutHref(): string
    {
        return self::CHECKOUT_URL !== '' ? self::CHECKOUT_URL : '#oferta';
    }

    public static function hasVsl(): bool
    {
        return self::VSL_VIDEO_URL !== '';
    }
}
