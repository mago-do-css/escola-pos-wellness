<?php

declare(strict_types=1);

namespace App\Config;

final class PorTrasLanding
{
    /** Informe a URL do checkout do produto Por Trás do Dinheiro. */
    public const CHECKOUT_URL = 'https://pay.kiwify.com.br/Kl1kULi';

    /** Informe a URL do checkout do upsell Dinheiro é Fruto. */
    public const UPSELL_CHECKOUT_URL = '';

    public const PRICE = 49;
    public const UPSELL_PRICE = 297;

    public static function checkoutHref(): string
    {
        return self::CHECKOUT_URL !== '' ? self::CHECKOUT_URL : '#oferta';
    }

    public static function upsellCheckoutHref(): string
    {
        return self::UPSELL_CHECKOUT_URL !== '' ? self::UPSELL_CHECKOUT_URL : '#vsl';
    }
}
