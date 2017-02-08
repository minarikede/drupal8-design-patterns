<?php
namespace Drupal\Tests\factory_method\Unit;

use Drupal\Tests\UnitTestCase;
use Drupal\factory_method\Classes\GermanFactory;
use Drupal\factory_method\Classes\FactoryMethod;
use Drupal\factory_method\Classes\ItalianFactory;


class FactoryMethodTest extends UnitTestCase {
  public function testCanCreateCheapVehicleInGermany() {
    $factory = new GermanFactory();
    $result = $factory->create(FactoryMethod::CHEAP);

    $this->assertInstanceOf('Drupal\factory_method\Classes\Bicycle', $result);
  }

  public function testCanCreateFastVehicleInGermany() {
    $factory = new GermanFactory();
    $result = $factory->create(FactoryMethod::FAST);

    $this->assertInstanceOf('Drupal\factory_method\Classes\CarMercedes', $result);
  }

  public function testCanCreateCheapVehicleInItaly() {
    $factory = new ItalianFactory();
    $result = $factory->create(FactoryMethod::CHEAP);

    $this->assertInstanceOf('Drupal\factory_method\Classes\Bicycle', $result);
  }

  public function testCanCreateFastVehicleInItaly() {
    $factory = new ItalianFactory();
    $result = $factory->create(FactoryMethod::FAST);

    $this->assertInstanceOf('Drupal\factory_method\Classes\CarFerrari', $result);
  }

  /**
   * @expectedException \InvalidArgumentException
   * @expectedExceptionMessage spaceship is not a valid vehicle
   */
  public function testUnknownType() {
    (new ItalianFactory())->create('spaceship');
  }
}
