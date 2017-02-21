<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 22:32
 */

namespace Drupal\observer_pattern\WeatherStation;


interface Subject {
  public function registerObserver(Observer $o);
  public function removeObserver(Observer $o);
  public function notifyObservers();
}