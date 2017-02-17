<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 16:27
 */

namespace Drupal\registry_pattern\Controller;

use Drupal\registry_pattern\Classes\Registry;;
class RegistryPatternController {
  public function page() {
    $output[] = [
      'main_content' => [
        '#theme' => 'registry_pattern_content',
      ]
    ];

    try {
      $key = Registry::LOGGER;
      Registry::get($key);
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => t("<strong>@key</strong> : is a successfull found not set key", ['@key' => $key]),
      ];
    }
    catch (\InvalidArgumentException $e) {
      $output[] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => $e->getMessage() . ": <strong>{$key}</strong>",
      ];
    }

    $keys = ['logger', 'foobar'];
    $logger = new \stdClass();

    foreach ($keys as $key) {
      try {
        Registry::set($key, $logger);
        $output[] = [
          '#type' => 'html_tag',
          '#tag' => 'p',
          '#value' => t("<strong>@key</strong> valid key in the Registry", ['@key' => $key]),
        ];
      }
      catch (\InvalidArgumentException $e) {
        $output[] = [
          '#type' => 'html_tag',
          '#tag' => 'p',
          '#value' => $e->getMessage() . ": <strong>{$key}</strong>",
        ];
      }
    }

    return $output;
  }
}
