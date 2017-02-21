<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 14:56
 */

namespace Drupal\strategy_pattern\Ducks;


class FlyWithWings implements FlyBehavior{
  public function fly() {
    return "I'm flying";
  }
}