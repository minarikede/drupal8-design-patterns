<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 16:27
 */

namespace Drupal\builder_pattern\Controller;

use Drupal\builder_pattern\Classes\TruckBuilder;
use Drupal\builder_pattern\Classes\CarBuilder;
use Drupal\builder_pattern\Classes\Director;

class BuilderPatternController {
  public function page() {
    $director = new Director();

    $truckBuilder = new TruckBuilder();
    $newTruck = $director->build($truckBuilder);

    $carBuilder = new CarBuilder();
    $newCar = $director->build($carBuilder);

    return array(
      'main_content' => array(
        '#theme' => 'builder_content',
      ),
      'truck' => array(
        '#markup' => "<h2>Truck</h2>",
      ),
      'door' => array(
        '#markup' => $newTruck->getPart('door'),
      ),
      'engine' => array(
        '#markup' => $newTruck->getPart('engine'),
      ),
      'wheel' => array(
        '#markup' => $newTruck->getPart('wheel'),
      ),
      'car' => array(
        '#markup' => "<h2>Car</h2>",
      ),
      'car_door' => array(
        '#markup' => $newCar->getPart('door'),
      ),
      'car_engine' => array(
        '#markup' => $newCar->getPart('engine'),
      ),
      'car_wheel' => array(
        '#markup' => $newCar->getPart('wheel'),
      ),
    );
  }
}
