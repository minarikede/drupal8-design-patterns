<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\structural_design_patterns\Controller;


class StructuralDesignPatternsController {
  public function page() {
    $output[] = array(
      '#type' => 'html_tag',
      '#tag' => 'h1',
      '#value' => t('Structural Design Patterns'),
    );
    $output[] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => t('In Software Engineering, Structural Design Patterns are Design Patterns that
ease the design by identifying a simple way to realize relationships between
entities.'),
    ];
    return $output;
  }

}
