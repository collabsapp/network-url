<?php

use Collabs\NetworkUrl\InvalidNetworkException;
use Collabs\NetworkUrl\NetworkUrl;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class NetworkUrlTest extends TestCase
{
    #[DataProvider('dataProvider')]
    public function test_it_converts_to_url(string $expected, string $network, string $username): void
    {
        self::assertSame($expected, NetworkUrl::fullUrl($network, $username));
    }

    public static function dataProvider(): Generator
    {
        yield ['https://www.instagram.com/foobar', 'instagram', 'foobar'];
        yield ['https://www.tiktok.com/@baz', 'tiktok', 'baz'];
        yield ['https://www.youtube.com/foobarbaz', 'youtube', 'foobarbaz'];
    }

    public function test_is_throws_exception_if_invalid_network(): void
    {
        self::expectException(InvalidNetworkException::class);
        self::expectExceptionMessage('Invalid network "doge"');

        NetworkUrl::fullUrl('doge', 'foo');
    }
}
