<?php

declare(strict_types=1);

namespace WebimpressTest\Mezzio\Latte;

use PHPUnit\Framework\TestCase;
use Webimpress\Mezzio\Latte\ConfigProvider;

class ConfigProviderTest extends TestCase
{
    /** @var ConfigProvider */
    private $provider;

    protected function setUp() : void
    {
        $this->provider = new ConfigProvider();
    }

    public function testInvocationReturnsArray() : array
    {
        $config = ($this->provider)();
        self::assertIsArray($config);

        return $config;
    }

    /**
     * @depends testInvocationReturnsArray
     */
    public function testReturnedArrayContainsDependencies(array $config) : void
    {
        self::assertArrayHasKey('dependencies', $config);
        self::assertArrayHasKey('templates', $config);
        self::assertIsArray($config['dependencies']);
    }
}
