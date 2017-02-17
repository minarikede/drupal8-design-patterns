<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\eav_pattern\Controller;

use Drupal\eav_pattern\Classes\Attribute;
use Drupal\eav_pattern\Classes\Entity;
use Drupal\eav_pattern\Classes\Value;
class EAVPatternController {

  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'eav_pattern_content',
      ),
    );
    $colorAttribute = new Attribute('color');
    $colorSilver = new Value($colorAttribute, 'silver');
    $colorBlack = new Value($colorAttribute, 'black');

    $memoryAttribute = new Attribute('memory');
    $memory8Gb = new Value($memoryAttribute, '8GB');

    $entity = new Entity('MacBook Pro', [$colorSilver, $colorBlack, $memory8Gb]);

    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => (string) $entity,
    ];
    return $output;
  }
}
