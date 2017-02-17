<?php

namespace Drupal\service_locator_pattern\Tests;

use Drupal\service_locator_pattern\Classes\LogService;
use Drupal\service_locator_pattern\Classes\ServiceLocator;
use Drupal\Tests\UnitTestCase;

class ServiceLocatorTest extends UnitTestCase
{
    /**
     * @var ServiceLocator
     */
    private $serviceLocator;

    public function setUp()
    {
        $this->serviceLocator = new ServiceLocator();
    }

    public function testHasServices()
    {
        $this->serviceLocator->addInstance(LogService::class, new LogService());

        $this->assertTrue($this->serviceLocator->has(LogService::class));
        $this->assertFalse($this->serviceLocator->has(self::class));
    }

    public function testGetWillInstantiateLogServiceIfNoInstanceHasBeenCreatedYet()
    {
        $this->serviceLocator->addClass(LogService::class, []);
        $logger = $this->serviceLocator->get(LogService::class);

        $this->assertInstanceOf('Drupal\service_locator_pattern\Classes\LogService', $logger);
    }
}
