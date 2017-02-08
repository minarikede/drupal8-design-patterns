<?php

namespace Drupal\null_object_pattern\Tests;

use Drupal\null_object_pattern\Classes\NullLogger;
use Drupal\null_object_pattern\Classes\Service;
use Drupal\null_object_pattern\Classes\PrintLogger;
use Drupal\Tests\UnitTestCase;

class LoggerTest extends UnitTestCase
{
    public function testNullObject()
    {
        $service = new Service(new NullLogger());
        $this->expectOutputString(null);
        $this->assertEquals(NULL, $service->doSomething());
    }

    public function testStandardLogger()
    {
        $service = new Service(new PrintLogger());
        $this->assertEquals('We are in Drupal\null_object_pattern\Classes\Service::doSomething', $service->doSomething());
    }
}
