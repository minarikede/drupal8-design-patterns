<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 23:05
 */

namespace Drupal\observer_pattern\WeatherStation;


class StatisticsDisplay implements Observer, DisplayElement{
  private $maxTemp = 0.0;
  private $minTemp = 200;
  private $tempSum= 0.0;
  private $numReadings;
  private $weatherData;

 function __construct(WeatherData $weatherData) {
    $this->weatherData = $weatherData;
    $this->weatherData->registerObserver($this);
  }

  public function update($temp, $humidity, $pressure) {
    $this->tempSum += $temp;
    $this->numReadings++;

    if ($temp > $this->maxTemp) {
      $this->maxTemp = $temp;
    }

    if ($temp < $this->minTemp) {
      $this->minTemp = $temp;
    }
  }

	public function display() {
    return "Avg/Max/Min temperature = " . ($this->tempSum / $this->numReadings) . "/" . $this->maxTemp . "/" . $this->minTemp;
	}
}