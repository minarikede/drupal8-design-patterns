<?php

namespace Drupal\Tests\builder_pattern\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\builder_pattern\Classes\TruckBuilder;
use Drupal\builder_pattern\Classes\CarBuilder;
use Drupal\builder_pattern\Classes\Director;
/**
 * Demonstrates how to write tests.
 *
 * @group facade_test
 */
class BuilderTest extends UnitTestCase {
  public function testCanBuildTruck()
  {
    $truckBuilder = new TruckBuilder();
    $newVehicle = (new Director())->build($truckBuilder);

    $this->assertInstanceOf('Drupal\builder_pattern\Classes\Parts\Truck', $newVehicle);
  }

  public function testCanBuildCar()
  {
    $carBuilder = new CarBuilder();
    $newVehicle = (new Director())->build($carBuilder);

    $this->assertInstanceOf('Drupal\builder_pattern\Classes\Parts\Car', $newVehicle);
  }
}
