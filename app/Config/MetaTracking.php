<?php

declare(strict_types=1);

namespace App\Config;

final class MetaTracking
{
    public const GRAPH_API_VERSION = 'v24.0';

    public static function pixelId(): string
    {
        return trim((string) getenv('META_PIXEL_ID'));
    }

    public static function accessToken(): string
    {
        return trim((string) getenv('META_CAPI_ACCESS_TOKEN'));
    }

    public static function isEnabled(): bool
    {
        return filter_var(getenv('META_CAPI_ENABLED') ?: false, FILTER_VALIDATE_BOOL)
            && self::pixelId() !== ''
            && self::accessToken() !== '';
    }
}
