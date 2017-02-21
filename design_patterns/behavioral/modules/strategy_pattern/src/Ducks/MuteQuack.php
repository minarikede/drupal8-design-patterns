<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 15:03
 */

namespace Drupal\strategy_pattern\Ducks;


class MuteQuack implements QuackBehavior {
  public function quack() {
    return '<< Silence >>';
  }
}