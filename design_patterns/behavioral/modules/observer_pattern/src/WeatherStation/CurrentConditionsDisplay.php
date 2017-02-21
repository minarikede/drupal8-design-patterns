<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 22:45
 */

namespace Drupal\observer_pattern\WeatherStation;


class CurrentConditionsDisplay implements Observer, DisplayElement{
  private $temperature;
  private $humidity;
  private $weatherData;

  public function __construct(Subject $weatherData) {
    $this->weatherData = $weatherData;
    $this->weatherData->registerObserver($this);
  }

  public function update($temperature, $humidity, $pressure) {
    $this->temperature = $temperature;
    $this->humidity = $humidity;
  }

	public function display() {
     return "Current conditions: " . $this->temperature . "F degrees and " . $this->humidity . "% humidity";
	}
}