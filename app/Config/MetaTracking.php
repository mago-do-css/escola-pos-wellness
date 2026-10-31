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

    public static function testEventCode(): string
    {
        return trim((string) getenv('META_TEST_EVENT_CODE'));
    }

    public static function graphApiVersion(): string
    {
        $version = trim((string) getenv('META_GRAPH_API_VERSION'));

        return preg_match('/^v\d+\.\d+$/', $version) ? $version : self::GRAPH_API_VERSION;
    }

    public static function isDebugEnabled(): bool
    {
        return filter_var(getenv('META_CAPI_DEBUG') ?: false, FILTER_VALIDATE_BOOL);
    }

    public static function isEnabled(): bool
    {
        return filter_var(getenv('META_CAPI_ENABLED') ?: false, FILTER_VALIDATE_BOOL)
            && self::pixelId() !== ''
            && self::accessToken() !== '';
    }
}
