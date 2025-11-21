<?php

namespace Collabs\NetworkUrl;

final class NetworkUrl
{
    public static function fullUrl(string|NetworkEnum $network, string $username): string
    {
        if ($network instanceof NetworkEnum) {
            $network = $network->value;
        }

        return match ($network) {
            NetworkEnum::TIKTOK->value => 'https://www.tiktok.com/@'.$username,
            NetworkEnum::INSTAGRAM->value => 'https://www.instagram.com/'.$username,
            NetworkEnum::YOUTUBE->value => preg_match('/[^\w]/', $username)
                ? 'https://www.youtube.com/c/'.$username
                : 'https://www.youtube.com/@'.$username,
            NetworkEnum::X->value => 'https://x.com/'.$username,
            NetworkEnum::PATREON->value => 'https://www.patreon.com/c/'.$username,
            NetworkEnum::SNAPCHAT->value => 'https://www.snapchat.com/@'.$username,
            default => throw new InvalidNetworkException($network),
        };
    }

    public static function mediaUrl(string|NetworkEnum $network, string $username, string $mediaId): string
    {
        if ($network instanceof NetworkEnum) {
            $network = $network->value;
        }

        return match ($network) {
            NetworkEnum::TIKTOK->value => sprintf('https://www.tiktok.com/@%s/video/%s', $username, $mediaId),
            NetworkEnum::INSTAGRAM->value => 'https://www.instagram.com/p/'.$mediaId,
            NetworkEnum::YOUTUBE->value => 'https://www.youtube.com/watch?v='.$mediaId,
            NetworkEnum::X->value => sprintf('https://x.com/%s/status/%s', $username, $mediaId),
            NetworkEnum::PATREON->value => 'https://www.patreon.com/posts/'.$mediaId,
            NetworkEnum::SNAPCHAT->value => sprintf('https://www.snapchat.com/@%s/highlight/%s', $username, $mediaId),
            default => throw new InvalidNetworkException($network),
        };
    }
}
