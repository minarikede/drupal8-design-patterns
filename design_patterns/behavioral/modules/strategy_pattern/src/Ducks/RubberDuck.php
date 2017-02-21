<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 15:07
 */

namespace Drupal\strategy_pattern\Ducks;


class RubberDuck extends Duck{
  public function __construct() {
    $this->setFlyBehavior(new FlyNoWay());
    $this->setQuackBehavior(new Squeak());
  }

  public function display() {
    return "I'm a rubber duckie";
  }
}