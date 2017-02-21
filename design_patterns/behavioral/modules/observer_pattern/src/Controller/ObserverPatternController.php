<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\observer_pattern\Controller;

use Drupal\observer_pattern\User\User;
use Drupal\observer_pattern\User\UserObserver;

use Drupal\observer_pattern\WeatherStation\HeatIndexDisplay;
use Drupal\observer_pattern\WeatherStation\WeatherData;
use Drupal\observer_pattern\WeatherStation\CurrentConditionsDisplay;
use Drupal\observer_pattern\WeatherStation\StatisticsDisplay;
use Drupal\observer_pattern\WeatherStation\ForecastDisplay;
class observerPatternController {
  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'observer_pattern_content',
      ),
    );
    $observer = new UserObserver();

    $user = new User();
    $user->attach($observer);

    $user->changeEmail('foo@bar.com');
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => 'Changed user:' . count($observer->getChangedUsers()),
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'Weather Station',
    ];

    $weatherData = new WeatherData();

		$currentConditions = new CurrentConditionsDisplay($weatherData);
		$statisticsDisplay = new StatisticsDisplay($weatherData);
		$forecastDisplay = new ForecastDisplay($weatherData);
    $heatIndexDisplay = new HeatIndexDisplay($weatherData);

    $weatherData->setMeasurements(80, 65, 30.4);
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'strong',
      '#value' => 'Measured values: 80, 65, 30.4',
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Current condition: {$currentConditions->display()}",
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Statistics display: {$statisticsDisplay->display()}",
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Forecast display: {$forecastDisplay->display()}",
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Heat index display: {$heatIndexDisplay->display()}",
    ];


		$weatherData->setMeasurements(82, 70, 29.2);
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'strong',
      '#value' => 'Measured values: 82, 70, 29.2',
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Current condition: {$currentConditions->display()}",
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Statistics display: {$statisticsDisplay->display()}",
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Forecast display: {$forecastDisplay->display()}",
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Heat index display: {$heatIndexDisplay->display()}",
    ];

    $weatherData->removeObserver($heatIndexDisplay);
    $weatherData->setMeasurements(78, 90, 29.2);
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'strong',
      '#value' => 'Measured values: 78, 90, 29.2',
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Current condition: {$currentConditions->display()}",
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Statistics display: {$statisticsDisplay->display()}",
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Forecast display: {$forecastDisplay->display()}",
    ];

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => "Heat index display: {$heatIndexDisplay->display()}",
    ];

    return $output;
  }
}
