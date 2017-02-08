<?php

namespace Drupal\Tests\simple_factory\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\simple_factory\Classes\SimpleFactory;
/**
 * Demonstrates how to write tests.
 *
 * @group simple_factory
 */
class SimpleFactoryTest extends UnitTestCase {
  public function testCanCreateBicycle()
  {
    $bicycle = (new SimpleFactory())->createBicycle();
    $this->assertInstanceOf('Drupal\simple_factory\Classes\Bicycle', $bicycle);

    $car = (new SimpleFactory())->createCar();
    $this->assertInstanceOf('Drupal\simple_factory\Classes\Car', $car);
  }
}
