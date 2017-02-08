<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\null_object_pattern\Controller;

use Drupal\null_object_pattern\Classes\NullLogger;
use Drupal\null_object_pattern\Classes\Service;
use Drupal\null_object_pattern\Classes\PrintLogger;

class NullObjectPatternController {
  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'null_object_pattern_content',
      ),
    );
    $service = new Service(new NullLogger());
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'Service with NullLogger',
    ];
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => $service->doSomething(),
    ];

    $service = new Service(new PrintLogger());
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'h2',
      '#value' => 'Service with PrintLogger',
    ];
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => $service->doSomething(),
    ];
    return $output;
  }
}
