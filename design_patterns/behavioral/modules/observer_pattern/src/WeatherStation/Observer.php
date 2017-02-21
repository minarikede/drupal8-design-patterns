<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 22:30
 */

namespace Drupal\observer_pattern\WeatherStation;


interface Observer {
  public function update($temp, $humidity, $pressure);
}