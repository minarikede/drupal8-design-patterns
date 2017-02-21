<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 14:54
 */

namespace Drupal\strategy_pattern\Ducks;


class FlyNoWay implements FlyBehavior{
  public function fly() {
    return 'I cannot fly';
  }
}