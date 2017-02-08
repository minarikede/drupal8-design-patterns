<?php

namespace Drupal\Tests\multiton_pattern\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\multiton_pattern\Classes\Multiton;

class MultitonTest extends UnitTestCase
{
    public function testUniqueness()
    {
        $firstCall = Multiton::getInstance(Multiton::INSTANCE_1);
        $secondCall = Multiton::getInstance(Multiton::INSTANCE_1);

        $this->assertInstanceOf('Drupal\multiton_pattern\Classes\Multiton', $firstCall);
        $this->assertSame($firstCall, $secondCall);
    }

    public function testUniquenessForEveryInstance()
    {
        $firstCall = Multiton::getInstance(Multiton::INSTANCE_1);
        $secondCall = Multiton::getInstance(Multiton::INSTANCE_2);

        $this->assertInstanceOf('Drupal\multiton_pattern\Classes\Multiton', $firstCall);
        $this->assertInstanceOf('Drupal\multiton_pattern\Classes\Multiton', $secondCall);
        $this->assertNotSame($firstCall, $secondCall);
    }
}
