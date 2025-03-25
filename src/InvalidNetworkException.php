<?php

namespace Collabs\NetworkUrl;

final class InvalidNetworkException extends \InvalidArgumentException
{
    public function __construct(string $network)
    {
        parent::__construct(sprintf('Invalid network "%s"', $network));
    }
}
