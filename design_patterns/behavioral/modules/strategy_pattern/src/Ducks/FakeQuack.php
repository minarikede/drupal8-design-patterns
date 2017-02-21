<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 14:57
 */

namespace Drupal\strategy_pattern\Ducks;


class FakeQuack implements QuackBehavior{
  public function quack() {
    return 'Qwack';
  }
}