<?php

namespace Collabs\NetworkUrl;

final class NetworkUrl
{
    public static function fullUrl(string $network, string $username): string
    {
        return match ($network) {
            'tiktok' => 'https://www.tiktok.com/@'.$username,
            'instagram' => 'https://www.instagram.com/'.$username,
            'youtube' => 'https://www.youtube.com/'.$username,
            default => throw new InvalidNetworkException($network),
        };
    }
}
