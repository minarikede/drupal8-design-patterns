<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\design_patterns\Controller;


class MorePatternsController {
  public function page() {
    $output = [
      '#markup' => '<p>' . t('Some more Design Patterns.') . '</p>',
    ];
    return $output;
  }

}
