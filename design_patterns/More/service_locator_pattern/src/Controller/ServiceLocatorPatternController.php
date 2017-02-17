<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\service_locator_pattern\Controller;

use Drupal\service_locator_pattern\Classes\LogService;
use Drupal\service_locator_pattern\Classes\LogServiceInterface;
use Drupal\service_locator_pattern\Classes\DatabaseService;
use Drupal\service_locator_pattern\Classes\ServiceLocator;
class ServiceLocatorPatternController {

  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'service_locator_pattern_content',
      ),
    );

    $serviceLocator = new ServiceLocator();

    $serviceLocator->addInstance(LogService::class, new LogService());
    $serviceLocator->addClass(LogService::class, []);

    $serviceLocator->addInstance(DatabaseService::class, new DatabaseService());
    $serviceLocator->addClass(DatabaseService::class, []);


    try {
      $logService = $serviceLocator->get('Drupal\service_locator_pattern\Classes\LogService');
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => $logService->execute(),
      ];
    }
    catch(\OutOfRangeException $e) {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => $e->getMessage(),
      ];
    }

    try {
      $dbService = $serviceLocator->get('Drupal\service_locator_pattern\Classes\DatabaseService');
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => $dbService->execute(),
      ];
    }
    catch(\OutOfRangeException $e) {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => $e->getMessage(),
      ];
    }

    return $output;
  }
}

