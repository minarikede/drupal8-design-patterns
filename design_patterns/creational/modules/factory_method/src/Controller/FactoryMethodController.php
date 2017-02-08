<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.19.
 * Time: 17:58
 */

namespace Drupal\factory_method\Controller;

use Drupal\factory_method\Classes\GermanFactory;
use Drupal\factory_method\Classes\FactoryMethod;

class FactoryMethodController {
  public function page() {
    $page[] = $this->getIntroduction();

    $factory = new GermanFactory();
    $fast_car = $factory->create(FactoryMethod::FAST);
    $page[]['#markup'] = $fast_car->getVechicleType();

    $cheap = $factory->create(FactoryMethod::CHEAP);
    $page[]['#markup'] = $cheap->getVechicleType();

    return $page;
  }

  private function getIntroduction() {
    $path = drupal_get_path('module', 'factory_method');
    return array(
      array(
        '#type' => 'html_tag',
        '#tag' => 'h1',
        '#value' => 'Factory Method',
      ),
      array(
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'The good point over the SimpleFactory is you can subclass it to
implement different ways to create objects.',
      ),
      array(
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'For simple case, this abstract class could be just an interface',
      ),
      array(
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'This pattern is a "real" Design Pattern because it achieves the
"Dependency Inversion Principle" a.k.a the "D" in S.O.L.I.D principles.',
      ),
      array(
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => 'It means the FactoryMethod class depends on abstractions, not concrete
classes. This is the real trick compared to SimpleFactory or
StaticFactory.',
      ),
      array(
        '#theme' => 'image',
        '#uri' => "{$path}/images/uml.png",
      ),
    );
  }
}