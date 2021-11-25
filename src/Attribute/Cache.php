<?php

namespace BiiiiiigMonster\AopCache\Attribute;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
final class Cache
{
    /**
     * Cache constructor.
     * @param string $key
     * @param int|null $ttl
     */
    public function __construct(
        public string $key,
        public ?int $ttl = 3600,
    )
    {
    }
}
