<?php

use Collabs\NetworkUrl\InvalidNetworkException;
use Collabs\NetworkUrl\NetworkUrl;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class NetworkUrlTest extends TestCase
{
    #[DataProvider('profileDataProvider')]
    public function test_it_converts_to_profile_url(string $expected, string $network, string $username): void
    {
        self::assertSame($expected, NetworkUrl::fullUrl($network, $username));
    }

    public static function profileDataProvider(): Generator
    {
        yield ['https://www.instagram.com/foobar', 'instagram', 'foobar'];
        yield ['https://www.tiktok.com/@baz', 'tiktok', 'baz'];
        yield ['https://www.youtube.com/@foobarbaz', 'youtube', 'foobarbaz'];
    }

    #[DataProvider('mediaDataProvider')]
    public function test_it_converts_to_media_url(string $expected, string $network, string $username, string $mediaId): void
    {
        self::assertSame($expected, NetworkUrl::mediaUrl($network, $username, $mediaId));
    }

    public static function mediaDataProvider(): Generator
    {
        yield ['https://www.instagram.com/p/aaa', 'instagram', 'foobar', 'aaa'];
        yield ['https://www.tiktok.com/@baz/video/bbb', 'tiktok', 'baz', 'bbb'];
        yield ['https://www.youtube.com/watch?v=ccc', 'youtube', 'foobarbaz', 'ccc'];
    }

    public function test_is_throws_exception_if_invalid_network_for_profile(): void
    {
        self::expectException(InvalidNetworkException::class);
        self::expectExceptionMessage('Invalid network "doge"');

        NetworkUrl::fullUrl('doge', 'foo');
    }

    public function test_is_throws_exception_if_invalid_network_for_media(): void
    {
        self::expectException(InvalidNetworkException::class);
        self::expectExceptionMessage('Invalid network "doge"');

        NetworkUrl::mediaUrl('doge', 'foo', 'bar');
    }
}
