<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\fluent_interface_pattern\Controller;

use Drupal\fluent_interface_pattern\Classes\Sql;
class FluentInterfacePatternController {

  public function page() {
    $output = [
      'main_content' => [
        '#theme' => 'fluent_interface_pattern_content',
      ]
    ];
    $query = (new Sql())
      ->select(['foo', 'bar'])
      ->from('foobar', 'f')
      ->where('f.bar = bar');

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => (string) $query,
    ];
    return $output;
  }
}
