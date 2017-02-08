<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.01.29.
 * Time: 22:09
 */

namespace Drupal\multiton_pattern\Controller;

use Drupal\multiton_pattern\Classes\Multiton;

class MultitonPatternController {
  public function page() {
    $output = array(
      'main_content' => array(
        '#theme' => 'multiton_pattern_content',
      ),
    );

    $firstCall = Multiton::getInstance(Multiton::INSTANCE_1);
    $secondCall = Multiton::getInstance(Multiton::INSTANCE_1);
    $thirdCall = Multiton::getInstance(Multiton::INSTANCE_2);
    $fourthCall = Multiton::getInstance(Multiton::INSTANCE_2);
    if ($firstCall === $secondCall) {
      $output[] = array(
        '#markup' => "<br />first and second call of " . Multiton::INSTANCE_1 . ' are the same',
      );
    }
    if ($firstCall !== $thirdCall) {
      $output[] = array(
        '#markup' => "<br/> first and third call of ". Multiton::INSTANCE_1 . ' and ' . Multiton::INSTANCE_2 . ' are the different',
      );
    }

    return $output;
  }

}
