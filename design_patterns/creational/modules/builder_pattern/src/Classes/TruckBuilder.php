<?php

namespace Drupal\builder_pattern\Classes;

use Drupal\builder_pattern\Classes\Parts\Vehicle;
use Drupal\builder_pattern\Classes\Parts\Truck;

class TruckBuilder implements BuilderInterface {
  /**
   * @var Parts\Truck
   */
  private $truck;

  public function addDoors() {
    $this->truck->setPart('door', 'rightDoor', new Parts\Door());
    $this->truck->setPart('door', 'leftDoor', new Parts\Door());
  }

  public function addEngine() {
    $this->truck->setPart('engine', 'truckEngine', new Parts\Engine());
  }

  public function addWheel() {
    $this->truck->setPart('wheel', 'wheel1', new Parts\Wheel());
    $this->truck->setPart('wheel', 'wheel2', new Parts\Wheel());
    $this->truck->setPart('wheel', 'wheel3', new Parts\Wheel());
    $this->truck->setPart('wheel', 'wheel4', new Parts\Wheel());
    $this->truck->setPart('wheel', 'wheel5', new Parts\Wheel());
    $this->truck->setPart('wheel', 'wheel6', new Parts\Wheel());
  }

  public function createVehicle() {
    $this->truck = new Parts\Truck();
  }

  public function getVehicle(): Vehicle {
    return $this->truck;
  }
}
