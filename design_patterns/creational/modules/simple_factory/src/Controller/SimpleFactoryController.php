<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 16:27
 */

namespace Drupal\simple_factory\Controller;

use Drupal\simple_factory\Classes\SimpleFactory;
class SimpleFactoryController {
  public function page() {
    $page[] = $this->getIntroduction();

    $factory = new SimpleFactory();
    $bicycle = $factory->createBicycle();
    $page[]['#markup'] = $bicycle->driveTo('Paris');

    $car = $factory->createCar();
    $page[]['#markup'] = $car->driveTo('Paris');

    return $page;
  }

  private function getIntroduction() {
    $path = drupal_get_path('module', 'simple_factory');
    return array(
      array(
        '#type' => 'html_tag',
        '#tag' => 'h1',
        '#value' => 'Simple Factory',
      ),
      array(
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'SimpleFactory is a simple factory pattern.',
      ),
      array(
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'It differs from the static factory because it is not static.
Therefore, you can have multiple factories, differently parametrized, you can subclass it and you can mock it.
It always should be preferred over a static factory!',
      ),
      array(
        '#theme' => 'image',
        '#uri' => "{$path}/images/uml.png",
      ),
    );
  }
}
