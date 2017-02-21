<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 22:35
 */

namespace Drupal\observer_pattern\WeatherStation;


class WeatherData implements  Subject{
  private $observers;
  private $temperature;
  private $humidity;
  private $pressure;

  public function __construct() {
//    $this->observers[] = new Observer();
  }

  public function registerObserver(Observer $o) {
    $this->observers[] = $o;
  }

	public function removeObserver(Observer $o) {
  $i = array_search($o, $this->observers);
		if ($i >= 0) {
      unset($this->observers[$i]);
    }
	}

	public function notifyObservers() {
     foreach($this->observers as $observer) {
        $observer->update($this->temperature, $this->humidity, $this->pressure);
      }
	}

	public function measurementsChanged() {
      $this->notifyObservers();
	}

	public function setMeasurements($temperature, $humidity, $pressure) {
      $this->temperature = $temperature;
      $this->humidity = $humidity;
      $this->pressure = $pressure;
      $this->measurementsChanged();
  }

	public function getTemperature() {
		return $this->temperature;
	}

	public function getHumidity() {
		return $this->humidity;
	}

	public function getPressure() {
		return $this->pressure;
	}

}