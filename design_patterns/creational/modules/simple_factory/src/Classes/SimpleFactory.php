<?php

namespace Drupal\simple_factory\Classes;

class SimpleFactory {
  public function createBicycle(): Bicycle {
    return new Bicycle();
  }
  public function createCar(): Car {
    return new Car();
  }
}
