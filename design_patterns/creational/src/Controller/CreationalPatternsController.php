<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\creational_patterns\Controller;


class CreationalPatternsController {
  public function page() {
    $message = '<h1>' . t('A variety of Creational Desing Paterns code.') . '</h1>';
    $message .= "<p>In software engineering, creational design patterns are design patterns
that deal with object creation mechanisms, trying to create objects in a
manner suitable to the situation. The basic form of object creation
could result in design problems or added complexity to the design.
    Creational design patterns solve this problem by somehow controlling
this object creation.</p>";

    return array(
      '#markup' => $message,
    );
  }

}