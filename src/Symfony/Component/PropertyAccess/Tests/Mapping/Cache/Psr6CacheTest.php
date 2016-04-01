<?php

namespace Symfony\Component\PropertyAccess\Tests\Mapping\Cache;

use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\PropertyAccess\Mapping\Cache\Psr6Cache;
use Symfony\Component\PropertyAccess\Mapping\ClassMetadata;

/**
 * @author Luis Ramón López <lrlopez@gmail.com>
 */
class Psr6CacheTest extends AbstractCacheTest
{
    protected function setUp()
    {
        $this->cache = new Psr6Cache(new ArrayAdapter());
    }

    public function testNameCollision()
    {
        $metadata = new ClassMetadata('Foo\\Bar');

        $this->cache->write($metadata);
        $this->assertFalse($this->cache->has('Foo_Bar'));
    }
}
