<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\dependency_injection_pattern\Controller;

use Drupal\dependency_injection_pattern\Classes\DatabaseConnection;
use Drupal\dependency_injection_pattern\Classes\DatabaseConfiguration;
class DependencyInjectionPatternController {

  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'dependency_injection_pattern_content',
      ),
    );
    $config = new DatabaseConfiguration('localhost', 3306, 'domnikl', '1234');
    $connection = new DatabaseConnection($config);
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => t('The connection settings: @settings', ['@settings' => $connection->getDsn()])
    ];

    return $output;
  }
}
