<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 16:27
 */

namespace Drupal\proxy_pattern\Controller;

use Drupal\proxy_pattern\Classes\RecordProxy;
class ProxyPatternController {
  public function page() {
    $output[] = [
      'main_content' => [
        '#theme' => 'proxy_pattern_content',
      ]
    ];

    $recordProxy = new RecordProxy(['valami' => 'csuda']);

    try {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => $recordProxy->__get('valami'),
      ];
    }
    catch (\OutOfRangeException $e) {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => $e->getMessage(),
      ];
    }
    return $output;
  }
}
