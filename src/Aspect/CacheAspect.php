<?php

namespace BiiiiiigMonster\AopCache\Aspect;

use BiiiiiigMonster\Aop\Attributes\Around;
use BiiiiiigMonster\Aop\Attributes\Aspect;
use BiiiiiigMonster\AopCache\Attribute\Cache as CacheAttribute;
use BiiiiiigMonster\Aop\Points\ProceedingJoinPoint;
use Illuminate\Support\Facades\Cache;

#[Aspect(CacheAttribute::class)]
class CacheAspect
{
    #[Around]
    public function around(ProceedingJoinPoint $pointer): mixed
    {
        /** @var CacheAttribute $cacheAttribute */
        [$cacheAttribute] = $pointer->getAttributeInstances();

        return Cache::remember($cacheAttribute->key, $cacheAttribute->ttl, fn() => $pointer->process());
    }
}
