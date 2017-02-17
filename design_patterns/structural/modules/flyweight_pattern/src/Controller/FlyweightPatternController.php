<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 16:27
 */

namespace Drupal\flyweight_pattern\Controller;

use Drupal\flyweight_pattern\Classes\FlyweightFactory;
class FlyweightPatternController {
  private $characters = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k',
    'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
  private $fonts = ['Arial', 'Times New Roman', 'Verdana', 'Helvetica'];
  public function page() {
    $output[] = [
      'main_content' => [
        '#theme' => 'flyweight_pattern_content',
      ]
    ];
    $factory = new FlyweightFactory();

    foreach ($this->characters as $char) {
      $flyweight = $factory->get($char);
      foreach ($this->fonts as $font) {
        $rendered = $flyweight->render($font);

        $output[] = [
          '#type' => 'html_tag',
          '#tag' => 'p',
          '#value' => $rendered,
        ];
      }
    }

    return $output;

  }
}
