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

    public static function mediaUrl(string $network, string $username, string $mediaId): string
    {
        return match ($network) {
            'tiktok' => sprintf('https://www.tiktok.com/@%s/video/%s', $username, $mediaId),
            'instagram' => 'https://www.instagram.com/p/'.$mediaId,
            'youtube' => 'https://www.youtube.com/watch?v='.$mediaId,
            default => throw new InvalidNetworkException($network),
        };
    }
}
