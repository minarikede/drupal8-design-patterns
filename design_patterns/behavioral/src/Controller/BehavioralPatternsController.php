<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.05.
 * Time: 15:50
 */

namespace Drupal\behavioral_patterns\Controller;

class BehavioralPatternsController {
  public function page() {
    $message = '<h1>' . t('A variety of behavioral Desing Paterns code.') . '</h1>';
    $message .= "<p>In software engineering, behavioral design patterns are design patterns that
identify common communication patterns between objects and realize these
patterns. By doing so, these patterns increase flexibility in carrying out this
communication.</p>";

    return array(
      '#markup' => $message,
    );
  }

}