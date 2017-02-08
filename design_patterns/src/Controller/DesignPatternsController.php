<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\design_patterns\Controller;


class DesignPatternsController {
  public function page() {
    $output = [
      '#markup' => '<p>' . t('A variety of Desing Paterns code.') . '</p>',
    ];
    return $output;
  }

}
