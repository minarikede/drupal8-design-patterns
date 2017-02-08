<?php

namespace Drupal\Tests\singleton\Unit;

use Drupal\Tests\UnitTestCase;

use Drupal\singleton\Classes\Singleton;

class SingletonTest extends UnitTestCase
{
    public function testUniqueness()
    {
        $firstCall = Singleton::getInstance();
        $secondCall = Singleton::getInstance();

        $this->assertInstanceOf('Drupal\singleton\Classes\Singleton', $firstCall);
        $this->assertSame($firstCall, $secondCall);
    }
}
