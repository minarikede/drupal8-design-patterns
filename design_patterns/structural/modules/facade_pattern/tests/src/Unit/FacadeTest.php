<?php

namespace Drupal\Tests\facade_pattern\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\facade_pattern\Classes\Facade;
/**
 * Demonstrates how to write tests.
 *
 * @group facade_test
 */
class FacadeTest extends UnitTestCase {
  public function testOs() {
    $os = $this->getMock('Drupal\facade_pattern\Classes\OsInterface');

    $os->method('getName')
      ->will($this->returnValue('Linux'));

    $bios = $this->getMockBuilder('Drupal\facade_pattern\Classes\BiosInterface')
      ->setMethods(['launch', 'execute', 'waitForKeyPress', 'powerDown'])
      ->disableAutoload()
      ->getMock();

    $bios->expects($this->once())
      ->method('launch')
      ->with($os);

    $facade = new Facade($bios, $os);
    $facade->turnOn();

    $this->assertEquals('Linux', $os->getName());
  }
}
