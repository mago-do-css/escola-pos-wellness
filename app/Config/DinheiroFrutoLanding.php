<?php

declare(strict_types=1);

namespace App\Config;

final class DinheiroFrutoLanding
{
    public const CHECKOUT_URL = 'https://pay.kiwify.com.br/Br2rGnS';

    public const PRICE = '297';

    public const VSL_VIDEO_URL = '/assets/videos/dinheiro-fruto/vsl-dinheiro-e-fruto.mp4';

    public const VSL_POSTER_URL = '/assets/images/dinheiro-fruto/vsl-dinheiro-e-fruto-poster.jpg';

    public static function checkoutHref(): string
    {
        return self::CHECKOUT_URL !== '' ? self::CHECKOUT_URL : '#oferta';
    }

    public static function hasCheckout(): bool
    {
        return self::CHECKOUT_URL !== '';
    }
}
