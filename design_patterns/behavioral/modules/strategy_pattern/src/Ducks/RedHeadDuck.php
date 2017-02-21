<?php
/**
 * Created by PhpStorm.
 * User: kovacsaba
 * Date: 2017.02.20.
 * Time: 15:05
 */

namespace Drupal\strategy_pattern\Ducks;


class RedHeadDuck extends Duck{
  public function __construct() {
    $this->setFlyBehavior(new FlyNoWay());
    $this->setQuackBehavior(new Quack());
  }

  public function display() {
    return "I'm a real Red Headed duck";
  }
}