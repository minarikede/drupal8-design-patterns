<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 14:58
 */

namespace Drupal\strategy_pattern\Ducks;


class Squeak implements QuackBehavior {
  public function quack() {
    return 'Squeak';
  }
}