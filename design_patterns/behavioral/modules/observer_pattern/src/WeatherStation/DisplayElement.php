<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 22:31
 */

namespace Drupal\observer_pattern\WeatherStation;


interface DisplayElement {
  public function display();
}