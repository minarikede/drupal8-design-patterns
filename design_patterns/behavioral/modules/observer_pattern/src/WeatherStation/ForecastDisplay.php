<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 22:49
 */

namespace Drupal\observer_pattern\WeatherStation;


class ForecastDisplay implements Observer, DisplayElement{
  private $currentPressure = 29.92;
  private $lastPressure;
  private $weatherData;

  public function __construct(WeatherData $weatherData) {
    $this->weatherData = $weatherData;
    $this->weatherData->registerObserver($this);
  }

  public function update($temp, $humidity, $pressure) {
    $this->lastPressure = $this->currentPressure;
    $this->currentPressure = $pressure;
  }

	public function display() {
    $output = "Forecast: ";
		if ($this->currentPressure > $this->lastPressure) {
      $output .= "Improving weather on the way!";
    } else if ($this->currentPressure == $this->lastPressure) {
      $output .= "More of the same";
    } else if ($this->currentPressure < $this->lastPressure) {
      $output .= "Watch out for cooler, rainy weather";
    }
    return $output;
	}
}